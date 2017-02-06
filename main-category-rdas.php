<?php
/**
 * Шаблон лучшие девайсы (category-best_device.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<!-- Начало рубрики-->
<!-- заголовок -->
	<h1 class="zagolovok"><span class="line"><?php single_cat_title() ?></span></h1>
	<!-- описание -->
	<p class="text-other mt35"><?php echo category_description(); ?></p>


<?php 
	$thisID = get_query_var('cat');//id текущей категории
 ?>

<?php
// 1 значение по умолчанию
$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

$the_query = new WP_Query( array(
	'posts_per_page' => 10,//количество записей на одной странице
	'paged'          => $paged,//номер текущей страницы
	'cat'=> $thisID,//id категории которую надо отобразить
) );

// цикл вывода полученных записей
while( $the_query->have_posts() ){
	$the_query->the_post();
?>



	<!-- начало поста -->
<!-- название поста -->
<div class="div-post-best_device">
<p class="podzagolovok"><?php the_title(); ?></p>
<!-- содержание поста -->
<div class="post-text clearfix">
<!-- миниатюра и кнопки покупки -->
<div class="img-pukupka clearfix">
		<div class="post-div-img">
			<?php
// вывод картинки из произвольного поля
$image = get_field('img');

if( !empty($image) ): ?>

    <img class="post-img" src="<?php echo $image['url']; ?>" />

<?php endif; ?>
		</div>
		<p class="skidka"><?php cus('skidka');// функция вывода произвольного?></p>
		<div class="pokupka">
			<a href="http://<?php echo get_post_custom_values('china')[0] ?>" class="pokupka-china">купить в Китае</a>
			<br>
			<a href="http://<?php echo get_post_custom_values('russia')[0] ?>" class="pokupka-russia">купить в России</a>
		</div>
	</div>
	<!-- плюсы минусы, характеристики -->
	<div class="plus-minus-har clearfix">
		<div class="info-post plus">
			<p class="pmh-title"><span class="line">плюсы</span></p>
			<ul>
<?php //вывод данных по произвольному полю
	lic('plus1');
	lic('plus2');
	lic('plus3');
	lic('plus4');
	lic('plus5');
 ?>
			</ul>
		</div>
		<div class="info-post minus">
			<p class="pmh-title"><span class="line">минусы</span></p>
			<ul>
<?php //вывод данных по произвольному полю
	lic('minus1');
	lic('minus2');
	lic('minus3');
	lic('minus4');
	lic('minus5');
 ?>
			</ul>
		</div>
		<div class="info-post harki">
			<p class="pmh-title"><span class="line">характеристики</span></p>
			<ul>
<?php //вывод данных по произвольному полю
	lic('har1');
	lic('har2');
	lic('har3');
	lic('har4');
	lic('har5');
 ?>
			</ul>
		</div>
	</div>
	<div class="text-device">
			<?php the_content(); // пост превью, до more ?>
	</div>
</div>
</div>
<!-- конец поста -->
<!-- =============================== -->
<?php 
} // конец цикла
wp_reset_postdata();//сброс значенйи поста

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