<?php
/**
 * Шаблон категории новосте и других(main-category-news.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<h1 class="recipes-h1"><?php single_cat_title();//вывод имени текущей категории ?></h1>

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
	'posts_per_page' => 40,//количество записей на одной странице
	'paged'          => $paged,//номер текущей страницы
	'cat'=> $thisID,//id категории которую надо отобразить
) );

// цикл вывода полученных записей
while( $the_query->have_posts() ){
	$the_query->the_post();
	?>


<!-- пост -->
			<div class="post-other">
			<!-- миниатюра поста -->
				<div class="post-other-img">
					<a href="<?php the_permalink() ?>">
				<?php 	if ( has_post_thumbnail() ) the_post_thumbnail(full,'class=post-shares-img'); // выводим миниатюру поста, если есть
						else echo '<img class="post-shares-img" src="http://placehold.it/420x167/2ecc71/ecf0f1">';?>
					</a>
					<div class="post-other-black-info">
						<span class="data data-other"><?php the_time('d.m.Y'); ?></span>
					</div>
				</div>
				<!-- анонс поста -->
				<div class="post-other-info">
					<div class="va-c">
						<a href="<?php the_permalink() ?>"><p class="title title-other"><?php the_title(); ?></p></a>
						<p class="text text-other"><?php the_truncated_post( 400 ); ?></p>
					</div>
				</div>
			</div>
			<!-- конец поста -->


	<?php
}
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

</div>
		<!-- конец раздела -->

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>