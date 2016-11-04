<?php
/**
 * Функции шаблона (function.php)
 * @package WordPress
 * @subpackage your-clean-template
 */

function typical_title() { // функция вывода тайтла
	global $page, $paged; // переменные пагинации должны быть глобыльными
	wp_title('|', true, 'right'); // вывод стандартного заголовка с разделителем "|"
	//bloginfo('name'); // вывод названия сайта
	$site_description = get_bloginfo('description', 'display'); // получаем описание сайта
	if ($site_description && (is_home() || is_front_page())) //если описание сайта есть и мы на главной
		echo " | $site_description"; // выводим описание сайта с "|" разделителем
	if ($paged >= 2 || $page >= 2) // если пагинация была использована
		echo ' | '.sprintf(__( 'Страница %s'), max($paged, $page)); // покажем номер страницы с "|" разделителем
}

register_nav_menus(array( // Регистрируем 2 меню
	'topup' => 'Верхнее1', // Верхнее
	'top' => 'Верхнее2', // Верхнее
	'footer1' => 'Нижнее1', // Верхнее
	'footer2' => 'Нижнее2' // Верхнее
));

add_theme_support('post-thumbnails'); // включаем поддержку миниатюр
set_post_thumbnail_size(250, 150); // задаем размер миниатюрам 250x150
add_image_size('big-thumb', 400, 400, true); // добавляем еще один размер картинкам 400x400 с обрезкой

register_sidebar(array( // регистрируем левую колонку, этот кусок можно повторять для добавления новых областей для виджитов
	'name' => 'Опросы', // Название в админке
	'id' => "left-sidebar", // идентификатор для вызова в шаблонах
	'description' => 'Виджет для опросника', // Описалово в админке
	'before_widget' => '<div id="%1$s" class="widget %2$s">', // разметка до вывода каждого виджета
	'after_widget' => "</div>\n", // разметка после вывода каждого виджета
	'before_title' => '<span class="widgettitle">', //  разметка до вывода заголовка виджета
	'after_title' => "</span>\n", //  разметка после вывода заголовка виджета
));

class clean_comments_constructor extends Walker_Comment { // класс, который собирает всю структуру комментов
	public function start_lvl( &$output, $depth = 0, $args = array()) { // что выводим перед дочерними комментариями
		$output .= '<ul class="children">' . "\n";
	}
	public function end_lvl( &$output, $depth = 0, $args = array()) { // что выводим после дочерних комментариев
		$output .= "</ul><!-- .children -->\n";
	}
    protected function comment( $comment, $depth, $args ) { // разметка каждого комментария, без закрывающего </li>!
    	$classes = implode(' ', get_comment_class()).($comment->comment_author_email == get_the_author_meta('email') ? ' author-comment' : ''); // берем стандартные классы комментария и если коммент пренадлежит автору поста добавляем класс author-comment
        echo '<li id="li-comment-'.get_comment_ID().'" class="'.$classes.'">'."\n"; // родительский тэг комментария с классами выше и уникальным id
    	echo '<div id="comment-'.get_comment_ID().'">'."\n"; // элемент с таким id нужен для якорных ссылок на коммент
    	// echo '<p class="meta">Автор: '.get_comment_author()."\n"; // имя автора коммента
    	//if ( '0' == $comment->comment_approved ) echo '<em class="comment-awaiting-moderation">Ваш комментарий будет опубликован после проверки модератором.</em>'."\n"; // если комментарий должен пройти проверку
        comment_text(); // текст коммента
    	echo '<p class="comment-user-data">'.get_comment_time('j F Y H:i').' <span class="comment-author">' .get_comment_author()."</span></p>"; // дата и время комментирования

        echo '</div>'."\n"; // закрываем див
    }
    public function end_el( &$output, $comment, $depth = 0, $args = array() ) { // конец каждого коммента
		$output .= "</li><!-- #comment-## -->\n";
	}
}

function pagination() { // функция вывода пагинации
	global $wp_query; // текущая выборка должна быть глобальной
	$big = 999999999; // число для замены
	echo paginate_links(array( // вывод пагинации с опциями ниже
		'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))), // что заменяем в формате ниже
		'format' => '?paged=%#%', // формат, %#% будет заменено
		'current' => max(1, get_query_var('paged')), // текущая страница, 1, если $_GET['page'] не определено
		'type' => 'list', // ссылки в ul
		'prev_text'    => '<img src="'.get_template_directory_uri().'/img/png/prev.png">', // текст назад
    	'next_text'    => '<img src="'.get_template_directory_uri().'/img/png/next.png">', // текст вперед
		'total' => $wp_query->max_num_pages, // общие кол-во страниц в пагинации
		'show_all'     => false, // не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
		'end_size'     => 15, //  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
		'mid_size'     => 15, // сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
		'add_args'     => false, // массив GET параметров для добавления в ссылку страницы
		'add_fragment' => '',	// строка для добавления в конец ссылки на страницу
		'before_page_number' => '', // строка перед цифрой
		'after_page_number' => '' // строка после цифры
	));
}

// вывод часть поста анонс
function the_truncated_post($symbol_amount) {
	$filtered = strip_tags( preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_content()))) );
	echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}

// вывод поста без изображений
function htm_image_content_filter($content){
  $content = preg_replace("/<img[^>]+\>/i", "", $content);
  return $content;
}

// подключение jquery
function my_scripts_method() {
	// отменяем зарегистрированный jQuery
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', false, null, true );
	wp_enqueue_script( 'jquery' );
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

// функция вывода произвольного поля в теге li
function lic($stroka){
	$stroka2= get_post_custom_values($stroka)[0];
	if($stroka2) echo "<li>" . $stroka2 . "</li>";
}

// просто вывод произвольного поля
function cus($stroka){
	echo get_post_custom_values($stroka)[0];
}

// своя страница настроек темы
include('myparameters.php');

// вставка картинки на странице настроек(js файл вставляем)
function true_include_myuploadscript() {
	// у вас в админке уже должен быть подключен jQuery, если нет - раскомментируйте следующую строку:
	// wp_enqueue_script('jquery');
	// дальше у нас идут скрипты и стили загрузчика изображений WordPress
	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
	// само собой - меняем admin.js на название своего файла
 	wp_enqueue_script( 'myuploadscript', get_stylesheet_directory_uri() . '/admin.js', array('jquery'), null, false );
}

add_action( 'admin_enqueue_scripts', 'true_include_myuploadscript' );

// функция вставки картинки
function true_image_uploader_field( $name, $value = '', $w = 115, $h = 90) {
	$default = get_stylesheet_directory_uri() . '/img/no-image.png';
	if( $value ) {
		$image_attributes = wp_get_attachment_image_src( $value, array($w, $h) );
		$src = $image_attributes[0];
	} else {
		$src = $default;
	}
	echo '
	<div>
		<img data-src="' . $default . '" src="' . $src . '" width="' . $w . 'px" height="' . $h . 'px" />
		<div>
			<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" />
			<button type="submit" class="upload_image_button button">Загрузить</button>
			<button type="submit" class="remove_image_button button">&times;</button>
		</div>
	</div>
	';
}

function true_add_options_page_u() {
	if ( isset( $_GET['page'] ) && $_GET['page'] == 'uplsettings' ) {
		if ( isset( $_REQUEST['action'] ) && 'save' == $_REQUEST['action'] ) {
			update_option('uploader_custom', $_REQUEST[ 'uploader_custom' ]);
			header("Location: ". site_url() ."/wp-admin/options-general.php?page=uplsettings&saved=true");
			die;
		}
	}
	add_submenu_page('options-general.php','Дополнительные настройки','Настройки','edit_posts', 'uplsettings', 'true_print_options_u');
}

function true_print_options_u() {
	if ( isset( $_REQUEST['saved'] ) ){
		echo '<div class="updated"><p>Сохранено.</p></div>';
	}
	?><div class="wrap">
		<form method="post">
			<?php
			if( function_exists( 'true_image_uploader_field' ) ) {
				true_image_uploader_field('uploader_custom', get_option('uploader_custom'));
			}
			?><p class="submit">
				<input name="save" type="submit" class="button-primary" value="Сохранить изменения" />
				<input type="hidden" name="action" value="save" />
			</p>
		</form>

	</div><?php
}

add_action('admin_menu', 'true_add_options_page_u');

/* Подсчет количества посещений страниц
---------------------------------------------------------- */
add_action('wp_head', 'kama_postviews');
function kama_postviews() {

/* ------------ Настройки -------------- */
$meta_key       = 'views';  // Ключ мета поля, куда будет записываться количество просмотров.
$who_count      = 0;            // Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированных пользователей.
$exclude_bots   = 1;            // Исключить ботов, роботов, пауков и прочую нечесть :)? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.

global $user_ID, $post;
	if(is_singular()) {
		$id = (int)$post->ID;
		static $post_views = false;
		if($post_views) return true; // чтобы 1 раз за поток
		$post_views = (int)get_post_meta($id,$meta_key, true);
		$should_count = false;
		switch( (int)$who_count ) {
			case 0: $should_count = true;
				break;
			case 1:
				if( (int)$user_ID == 0 )
					$should_count = true;
				break;
			case 2:
				if( (int)$user_ID > 0 )
					$should_count = true;
				break;
		}
		if( (int)$exclude_bots==1 && $should_count ){
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			$notbot = "Mozilla|Opera"; //Chrome|Safari|Firefox|Netscape - все равны Mozilla
			$bot = "Bot/|robot|Slurp/|yahoo"; //Яндекс иногда как Mozilla представляется
			if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )
				$should_count = false;
		}

		if($should_count)
			if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);
	}
	return true;
}



/** Функция для вывода записей по произвольному полю содержащему числовое значение.
-------------------------------------
Параметры передаваемые функции (в скобках дефолтное значение):
num (10) - количество постов.
key (views) - ключ произвольного поля, по значениям которого будет проходить выборка.
order (DESC) - порядок вывода записей. Чтобы вывести сначала менее просматириваемые устанавливаем order=1
format(0) - Формат выводимых ссылок. По дефолту такой: ({a}{title}{/a}). Можно использовать, например, такой: {date:j.M.Y} - {a}{title}{/a} ({views}, {comments}).
days(0) - число последних дней, записи которых нужно вывести по количеству просмотров. Если указать год (2011,2010), то будут отбираться популярные записи за этот год.
cache (0) - использовать кэш или нет. Варианты 1 - кэширование включено, 0 - выключено (по дефолту).
echo (1) - выводить на экран или нет. Варианты 1 - выводить (по дефолту), 0 - вернуть для обработки (return).
Пример вызова: kama_get_most_viewed("num=5 &key=views &cache=1 &format={a}{title}{/a} - {date:j.M.Y} ({views}) ({comments})");
*/
function kama_get_most_viewed($args=''){
	parse_str($args, $i);
	$num    = isset($i['num']) ? $i['num']:10;
	$key    = isset($i['key']) ? $i['key']:'views';
	$order  = isset($i['order']) ? 'ASC':'DESC';
	$cache  = isset($i['cache']) ? 1:0;
	$days   = isset($i['days']) ? (int)$i['days']:0;
	$echo   = isset($i['echo']) ? 0:1;
	$format = isset($i['format']) ? stripslashes($i['format']):0;
	global $wpdb,$post;
	$cur_postID = $post->ID;

	if( $cache ){ $cache_key = (string) md5( __FUNCTION__ . serialize($args) );
		if ( $cache_out = wp_cache_get($cache_key) ){ //получаем и отдаем кеш если он есть
			if ($echo) return print($cache_out); else return $cache_out;
		}
	}

	if( $days ){
		$AND_days = "AND post_date > CURDATE() - INTERVAL $days DAY";
		if( strlen($days)==4 )
			$AND_days = "AND YEAR(post_date)=" . $days;
	}

	$sql = "SELECT p.ID, p.post_title, p.post_date, p.guid, p.comment_count, (pm.meta_value+0) AS views
	FROM $wpdb->posts p
		LEFT JOIN $wpdb->postmeta pm ON (pm.post_id = p.ID)
	WHERE pm.meta_key = '$key' $AND_days
		AND p.post_type = 'post'
		AND p.post_status = 'publish'
	ORDER BY views $order LIMIT $num";
	$results = $wpdb->get_results($sql);
	if( !$results ) return false;

	$out= '';
	preg_match( '!{date:(.*?)}!', $format, $date_m );
	foreach( $results as $pst ){
		$x == 'li1' ? $x = 'li2' : $x = 'li1';
		if ( (int)$pst->ID == (int)$cur_postID ) $x .= " current-item";
		$Title = $pst->post_title;
		$a1 = "<a href='". get_permalink($pst->ID) ."' title='{$pst->views} просмотров: $Title'>";
		$a2 = "</a>";
		$comments = $pst->comment_count;
		$views = $pst->views;
		if( $format ){
			$date = apply_filters('the_time', mysql2date($date_m[1],$pst->post_date));
			$Sformat = str_replace ($date_m[0], $date, $format);
			$Sformat = str_replace(array('{a}','{title}','{/a}','{comments}','{views}'), array($a1,$Title,$a2,$comments,$views), $Sformat);
		}
		else $Sformat = $a1.$Title.$a2;
		// $out .= "<li class='$x'>$Sformat</li>";
		$out .= $Sformat;
	}

	if( $cache ) wp_cache_add($cache_key, $out);

	if( $echo )
		return print $out;
	else
		return $out;
}
?>