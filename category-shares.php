<?php
/**
 * акции (category-shares.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<h1 class="recipes-h1"><?php single_cat_title();//вывод имени текущей категории ?></h1>
<!-- Начало рубрики-->
<div class="header-category clearfix">
	<p class="podzagolovok fs12 nazvanie"><span class="line">название</span></p>
	<p class="podzagolovok fs12 company"><span class="line">компания</span></p>
</div>
<!-- все посты -->
<div class="post-shares-all">

	<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>


<!-- начало поста -->
<div class="post-shares clearfix">
	<!-- миниатюра -->
	<div class="post-shares-div-img"><a href="<?php the_permalink() ?>">
<?php if ( has_post_thumbnail() ) the_post_thumbnail(thumbnail,'class=post-shares-img'); // выводим миниатюру поста, если есть
else echo '<img class="post-shares-img" src="http://placehold.it/220x120/2ecc71/ecf0f1">';?>
</a>
	</div>
	<!-- содежрание поста -->
	<div class="post-shares-content">
		<a href="<?php the_permalink() ?>"><p class="podzagolovok fs16"><?php the_title(); ?></p></a>
		<p class="text-other fs12"><?php the_truncated_post( 400 ); ?></p>
	</div>
	<!-- компания -->
	<div class="post-shares-name-company">
		<p class="shares-name-company"><?php $id_company=get_field( "shares_company" )[0]; //id компании ?>
					<a href="<?php echo get_permalink($id_company);//ссылка по id ?>"><?php echo get_the_title( $id_company ); //заголовок по id?></a></p>
	</div>
	<!-- дата поста -->
	<span class="post-shares-data">
		<?php the_time('F j, Y'); ?>
	</span>
</div>
<!-- конец поста -->


	<?php endwhile; // конец цикла
	else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишим "простите" ?>
	<?php pagination(); // пагинация, функция нах-ся в function.php ?>





</div>
<!-- конец всех постов -->

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>

