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

				<!-- краткое описание новости -->


				<!-- посты из цикла -->
<?php $args = array( 	'cat' => 7,
						'posts_per_page' =>5
						 );

$query = new WP_Query( $args );
	$raz = true;//для разового срабатывания

while ( $query->have_posts() ) {
	$query->the_post();
	?>
<?php

	if($raz){//условия срабатывания только раз
		?>
		<a href="<?php the_permalink() ?>">
<?php echo '<img class="img-colomn mixologiya" src="'.get_the_post_thumbnail_url(get_the_ID(),'full').'">';//вывод миниатюры?>
</a>

		<?php
		$raz=false;//что б не срабатывало больше условие
	}//.условия срабатывания только раз
 ?>

<?php $post_front_top[]=get_the_ID();//сбор id выводимых постов ?>
				<div class="news clearfix">
					<span class="data data-block"><?php the_time('d.m.Y'); ?></span>
					<a href="<?php the_permalink() ?>">
					<p class="title title-block"><?php the_title(); ?></p>
					</a>
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

	<!-- посты из цикла -->

<?php $args = array( 	'cat' => 4,
						'posts_per_page' =>5
						 );

$query = new WP_Query( $args );
$raz = true;
while ( $query->have_posts() ) {
	$query->the_post();
	?>

<?php
	if($raz){//условия срабатывания только раз
		?>
		<a href="<?php the_permalink() ?>">
<?php echo '<img class="img-colomn vipe-news" src="'.get_the_post_thumbnail_url(get_the_ID(),'full').'">';//вывод миниатюры?>
</a>
		<?php
		$raz=false;//что б не срабатывало больше условие
	}//.условия срабатывания только раз
 ?>

<?php $post_front_top[]=get_the_ID();//сбор id выводимых постов ?>
				<div class="news clearfix">
					<span class="data data-block"><?php the_time('d.m.Y'); ?></span>
					<a href="<?php the_permalink() ?>">
					<p class="title title-block"><?php the_title(); ?></p>
					</a>
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
		<div class="not-mobile">
			<?php include('slider.php'); ?>
		</div>

<!-- подключение остальных постов нижние -->
<?php //include('front_other_post.php'); //изначальное подключение постов в одну колонку?>

	<!-- разделение на 2 колонки -->
		<article class="clearfix article-front-2">
			<!-- левая колонка -->
			<div class="block block-left">
				<a href="<?php echo get_category_link(5); //вывод url категории,рубрики по id ?>" class="zagolovok"><span class="line"><?php echo get_cat_name(5); //название категории, рубрики по id ?></span></a>
				<!-- краткое описание новости -->


				<!-- посты из цикла -->
<?php $args = array( 	'cat' => 5,
						'posts_per_page' =>5
						 );

$query = new WP_Query( $args );
$raz = true;
while ( $query->have_posts() ) {
	$query->the_post();
	?>


	<?php
	if($raz){//условия срабатывания только раз
		?>
		<a href="<?php the_permalink() ?>">
<?php echo '<img class="img-colomn mixologiya" src="'.get_the_post_thumbnail_url(get_the_ID(),'full').'">';//вывод миниатюры?>
</a>
		<?php
		$raz=false;//что б не срабатывало больше условие
	}//.условия срабатывания только раз
 ?>

<?php $post_5[]=get_the_ID();//сбор id выводимых постов ?>
				<div class="news clearfix">
					<span class="data data-block"><?php the_time('d.m.Y'); ?></span>
					<a href="<?php the_permalink() ?>">
					<p class="title title-block"><?php the_title(); ?></p>
					</a>
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

	<!-- посты из цикла -->

<?php
unset($args);
 $args = array( 	'cat' => array(6,-5),//исключил посты из предыдущей категории
					'posts_per_page' =>5,//количество выводимых постов

						 );

$query = new WP_Query( $args );
$raz = true;
while ( $query->have_posts() ) {
	$query->the_post();
	?>

	<?php
	if($raz){//условия срабатывания только раз
		?>
		<a href="<?php the_permalink() ?>">
<?php echo '<img class="img-colomn vipe-news" src="'.get_the_post_thumbnail_url(get_the_ID(),'full').'">';//вывод миниатюры?>
</a>

		<?php
		$raz=false;//что б не срабатывало больше условие
	}//.условия срабатывания только раз
 ?>

<?php $post_front_top[]=get_the_ID();//сбор id выводимых постов ?>
				<div class="news clearfix">
					<span class="data data-block"><?php the_time('d.m.Y'); ?></span>
					<a href="<?php the_permalink() ?>">
					<p class="title title-block"><?php the_title(); ?></p>
					</a>
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