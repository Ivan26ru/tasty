<?php
/**
 * Шаблон Видео рубрики (category-video.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<!-- Начало рубрики-->
<h1 class="recipes-h1"><?php single_cat_title();//вывод имени текущей категории ?></h1>
<div class="video-category">

<?php 
	$thisID = get_query_var('cat');//id текущей категории
 ?>
	<!-- основное содержание -->
			<!-- другие посты с картинками -->
		<div class="div-post-other">

<?php
// 1 значение по умолчанию
$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

$the_query = new WP_Query( array(
	'posts_per_page' => 36,//количество записей на одной странице
	'paged'          => $paged,//номер текущей страницы
	'cat'=> $thisID,//id категории которую надо отобразить
) );

// цикл вывода полученных записей
while( $the_query->have_posts() ){
	$the_query->the_post();
	?>
	
	
	<!-- начало поста -->
	<div class="video-div">
	<a href="<?php the_permalink() ?>" class="video-read green">
		<!-- контейнер картинки -->
		<div class="video-div-img">

		<?php 	the_post_thumbnail(array(265,145)); // выводим миниатюру поста, если есть ?>

			
		</div>
	</a>
		<!-- Заголовок поста -->
			<p class="video-title"><?php the_title(); ?></p>
		<!-- ссылка смотреть -->
		<a href="<?php the_permalink() ?>" class="video-read green">Смотреть</a>
	</div>
	<!-- конец поста -->

	
	<?php 
} 
wp_reset_postdata();//сброс значенйи поста
?>

</div>

<?php 
// пагинация для произвольного запроса
	$big = 999999999; // число для замены
	echo paginate_links(array( // вывод пагинации с опциями ниже
		'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))), // что заменяем в формате ниже
		'format' => '?paged=%#%', // формат, %#% будет заменено
		'current' => max(1, get_query_var('paged')), // текущая страница, 1, если $_GET['page'] не определено
		'type' => 'list', // ссылки в ul
		'prev_text'    => '<img src="'.get_template_directory_uri().'/img/png/prev.png">', // текст назад
    	'next_text'    => '<img src="'.get_template_directory_uri().'/img/png/next.png">', // текст вперед
		'total' => $the_query->max_num_pages, // общие кол-во страниц в пагинации
		'show_all'     => false, // не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
		'end_size'     => 15, //  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
		'mid_size'     => 15, // сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
		'add_args'     => false, // массив GET параметров для добавления в ссылку страницы
		'add_fragment' => '',	// строка для добавления в конец ссылки на страницу
		'before_page_number' => '', // строка перед цифрой
		'after_page_number' => '' // строка после цифры
	));

unset($thisID)
?>

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>