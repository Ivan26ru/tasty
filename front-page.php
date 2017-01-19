<?php
/**
 * Шаблон главной страницы (front-page.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

	<!-- основное содержание -->
	<!-- разделение на 2 колонки -->
		<article class="clearfix">
			<!-- левая колонка -->
			<div class="block block-left">
				<a href="<?php echo get_category_link(7); //вывод url категории,рубрики по id ?>" class="zagolovok"><span class="line"><?php echo get_cat_name(7); //название категории, рубрики по id ?></span></a>
				<div class="img-colomn mixologiya"></div>
				<!-- краткое описание новости -->


				<!-- посты из цикла -->
<?php $args = array( 	'cat' => 7,
						'posts_per_page' =>5
						 );

$query = new WP_Query( $args );
while ( $query->have_posts() ) {
	$query->the_post();
	?>

<?php $post_front_top[]=get_the_ID();//сбор id выводимых постов ?>
				<div class="news clearfix">
					<span class="data data-block"><?php the_time('d.m.Y'); ?></span>
					<p class="title title-block"><?php the_title(); ?></p>
					<p class="text text-block"><?php the_truncated_post( 255 ); ?></p>
					<a href="<?php the_permalink() ?>" class="read-all read-all-block">читать полностью...</a>
				</div>

	<?php } ?>

		<!-- конец пагинаци -->
	<?php	wp_reset_postdata(); ?>
<!-- конец постав -->

			</div>
			<!-- правая колонка -->
			<div class="block block-right">
				<a href="<?php echo get_category_link(4); //вывод url категории,рубрики по id ?>" class="zagolovok"><span class="line">vape новости</span></a>
				<div class="img-colomn vipe-news"></div>

	<!-- посты из цикла -->

<?php $args = array( 	'cat' => 4,
						'posts_per_page' =>5
						 );

$query = new WP_Query( $args );
while ( $query->have_posts() ) {
	$query->the_post();
	?>
<?php $post_front_top[]=get_the_ID();//сбор id выводимых постов ?>
				<div class="news clearfix">
					<span class="data data-block"><?php the_time('d.m.Y'); ?></span>
					<p class="title title-block"><?php the_title(); ?></p>
					<p class="text text-block"><?php the_truncated_post( 255 ); ?></p>
					<a href="<?php the_permalink() ?>" class="read-all read-all-block">читать полностью...</a>
				</div>


	<?php } ?>

		<!-- конец пагинаци -->
	<?php wp_reset_postdata(); ?>
<!-- конец постав -->

			</div>
		</article>

		<!-- подключение слайдера -->
<?php include('slider.php'); ?>

<!-- подключение остальных постов нижние -->
<?php //include('front_other_post.php'); //изначальное подключение постов в одну колонку?>

	<!-- разделение на 2 колонки -->
		<article class="clearfix article-front-2">
			<!-- левая колонка -->
			<div class="block block-left">
				<a href="<?php echo get_category_link(5); //вывод url категории,рубрики по id ?>" class="zagolovok"><span class="line"><?php echo get_cat_name(5); //название категории, рубрики по id ?></span></a>
				<div class="img-colomn mixologiya"></div>
				<!-- краткое описание новости -->


				<!-- посты из цикла -->
<?php $args = array( 	'cat' => 5,
						'posts_per_page' =>5
						 );

$query = new WP_Query( $args );
while ( $query->have_posts() ) {
	$query->the_post();
	?>

<?php $post_front_top[]=get_the_ID();//сбор id выводимых постов ?>
				<div class="news clearfix">
					<span class="data data-block"><?php the_time('d.m.Y'); ?></span>
					<p class="title title-block"><?php the_title(); ?></p>
					<p class="text text-block"><?php the_truncated_post( 255 ); ?></p>
					<a href="<?php the_permalink() ?>" class="read-all read-all-block">читать полностью...</a>
				</div>
	<?php } ?>

		<!-- конец пагинаци -->
	<?php	wp_reset_postdata(); ?>
<!-- конец постав -->

			</div>
			<!-- правая колонка -->
			<div class="block block-right">
				<a href="<?php echo get_category_link(6); //вывод url категории,рубрики по id ?>" class="zagolovok"><span class="line"><?php echo get_cat_name(6); //название категории, рубрики по id ?></span></a>
				<div class="img-colomn vipe-news"></div>

	<!-- посты из цикла -->

<?php $args = array( 	'cat' => 6,
						'posts_per_page' =>5
						 );

$query = new WP_Query( $args );
while ( $query->have_posts() ) {
	$query->the_post();
	?>
<?php $post_front_top[]=get_the_ID();//сбор id выводимых постов ?>
				<div class="news clearfix">
					<span class="data data-block"><?php the_time('d.m.Y'); ?></span>
					<p class="title title-block"><?php the_title(); ?></p>
					<p class="text text-block"><?php the_truncated_post( 255 ); ?></p>
					<a href="<?php the_permalink() ?>" class="read-all read-all-block">читать полностью...</a>
				</div>

	<?php } ?>

		<!-- конец пагинаци -->
	<?php wp_reset_postdata(); ?>
<!-- конец постав -->

			</div>
		</article>

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>