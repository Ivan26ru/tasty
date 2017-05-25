<?php
/**
 * Шаблон лучшие девайсы (category-best_device.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<h1 class="recipes-h1"><?php single_cat_title();//вывод имени текущей категории ?></h1>
<!-- Начало рубрики-->
<table class="list-company">
<tr>
	<th class="th-null">&nbsp;</th>
	<th class="th-name"><p class="podzagolovok">

		<a href="<?php echo get_category_link('company');  ?>?sort=up-name"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-up.png"></a>
			<span class="line">Название</span>
		<a href="<?php echo get_category_link('company');  ?>?sort=down-name"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-down.png"></a>

	</p></th>
	<th class="th-otziv"><p class="podzagolovok"><span class="line">Отзывы</span></p></th>
	<th class="th-rejting">
		<p class="podzagolovok">
			<a href="<?php echo get_category_link('company');  ?>?sort=up-rejt"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-up.png"></a>
				<span class="line">Рейтинг</span>
			<a href="<?php echo get_category_link('company');  ?>?sort=down-rejt"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-down.png"></a>
		</p>
		</th>
</tr>

<?php

if(isset($_GET['sort'])) $sort = $_GET['sort'];

// echo $sort;
?>

<?php global $query_string; // параметры базового запроса

switch ($sort) {


    case "up-name":
        query_posts( $query_string.'&order=ASC&posts_per_page=20&orderby=title'); // базовый запрос + свои параметры
        break;
    case "down-name":
        query_posts( $query_string.'&order=DESC&posts_per_page=20&orderby=title'); // базовый запрос + свои параметры
        break;

    case "up-author":
        query_posts( $query_string.'&order=ASC&posts_per_page=20&orderby=author'); // базовый запрос + свои параметры
        break;
    case "down-author":
        query_posts( $query_string.'&order=DESC&posts_per_page=20&orderby=author'); // базовый запрос + свои параметры
        break;

    case "up-data":
        query_posts( $query_string.'&order=DESC&posts_per_page=20&orderby=date'); // базовый запрос + свои параметры
        break;
    case "down-data":
        query_posts( $query_string.'&order=ASC&posts_per_page=20&orderby=date'); // базовый запрос + свои параметры
        break;

    case "up-rejt":
        query_posts( $query_string.'&order=DESC&posts_per_page=20&orderby=meta_value_num&meta_key=ratings_score'); // базовый запрос + свои параметры
        break;
    case "down-rejt":
        query_posts( $query_string.'&order=ASC&posts_per_page=20&orderby=meta_value_num&meta_key=ratings_score'); // базовый запрос + свои параметры
        break;
    default:
        query_posts( $query_string.'&posts_per_page=40'); // базовый запрос + свои параметры
// endswitch;
}




 ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
<!-- начало поста -->
<!-- описание компании -->
<tr class="company-content">
	<td class="td-img">
		<div class="company-div-img">
		<a href="<?php the_permalink() ?>">
			<?php
// вывод картинки из произвольного поля
$image = get_field('img');

if( !empty($image) ): ?>

    <img class="post-shares-img" src="<?php echo $image['url']; ?>" />

<?php endif; ?>
		</a>
		</div>
	</td>
	<td class="td-name">
		<a href="<?php the_permalink() ?>"><p class="podzagolovok fs16"><?php the_title(); ?></p></a>
		<p class="text-other fs12"><?php the_truncated_post( 400 ); ?></p>
	</td>
	<td class="td-otziv">
		<span class="green font-rr"><?php comments_number('пока нет', '1', '%'); ?></span>
	</td>
	<td class="td-rejting">
<!-- 		<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
		<span class="green font-rr">+12</span>
		<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> -->
		<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
	</td>
</tr>

<tr class="tr-hr">
	<td colspan="4"></td>
</tr>

<tr class="tr-null-2">
	<td colspan="4"></td>
</tr>

<!-- конец поста -->
<?php endwhile; // конец цикла
else: echo '<p>Нет записей.</p>'; endif; // если записей нет, напишим "простите" ?>
	</table>

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>
