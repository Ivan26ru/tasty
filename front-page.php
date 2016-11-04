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
				<?php	query_posts('cat=7&posts_per_page=5'); // вместо "5" указываем идентификатор вашей рубрики.
 while (have_posts()) : the_post();?>

				<div class="news clearfix">
					<span class="data data-block"><?php the_time('d.m.Y'); ?></span>
					<p class="title title-block"><?php the_title(); ?></p>
					<p class="text text-block"><?php the_truncated_post( 400 ); ?></p>
					<a href="<?php the_permalink() ?>" class="read-all read-all-block">читать полностью...</a>
				</div>
<?php 	endwhile; 	wp_reset_query(); ?>
<!-- конец постав -->

			</div>
			<!-- правая колонка -->
			<div class="block block-right">
				<a href="<?php echo get_category_link(4); //вывод url категории,рубрики по id ?>" class="zagolovok"><span class="line">vape новости</span></a>
				<div class="img-colomn vipe-news"></div>
	<!-- посты из цикла -->
				<?php	query_posts('cat=4&posts_per_page=5'); // вместо "5" указываем идентификатор вашей рубрики.
 while (have_posts()) : the_post();?>

				<div class="news clearfix">
					<span class="data data-block"><?php the_time('d.m.Y'); ?></span>
					<p class="title title-block"><?php the_title(); ?></p>
					<p class="text text-block"><?php the_truncated_post( 400 ); ?></p>
					<a href="<?php the_permalink() ?>" class="read-all read-all-block">читать полностью...</a>
				</div>
<?php 	endwhile; 	wp_reset_query(); ?>
<!-- конец постав -->

			</div>
		</article>
		<!-- другие посты с картинками -->
		<div class="div-post-other">



	<!-- посты из цикла -->
				<?php	query_posts('cat=-20'); // вместо "5" указываем идентификатор вашей рубрики.
 while (have_posts()) : the_post();?>


			<!-- пост -->
			<div class="post-other">
			<!-- миниатюра поста -->
				<div class="post-other-img">

<?php 	if ( has_post_thumbnail() ) the_post_thumbnail(thumbnail); // выводим миниатюру поста, если есть
						else echo '<img src="http://placehold.it/420x167/2ecc71/ecf0f1">';?>
					<div class="post-other-black-info">
						<span class="data data-other"><?php the_time('d.m.Y'); ?></span>
						<a href="<?php the_permalink() ?>" class="read-all read-all-other">Читать полностью...</a>
					</div>
				</div>
				<!-- анонс поста -->
				<div class="post-other-info">
					<div class="va-c">
						<p class="title title-other"><?php the_title(); ?></p>
						<p class="text text-other"><?php the_truncated_post( 400 ); ?></p>
					</div>
				</div>
			</div>
			<!-- конец поста -->
<?php 	endwhile; 	wp_reset_query(); ?>
<!-- конец постав -->




		</div>
		<!-- конец раздела других постов -->

		<!-- пагинация(номера страниц) -->
		<div class="pagination-index">
<!-- 			<ul class="page-numbers">
				<li><a class="prev page-numbers" href="#"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/prev.png" alt=""></a></li>
				<li><a class="page-numbers" href="#">1</a></li>
				<li><a class="page-numbers" href="#">2</a></li>
				<li><a class="page-numbers" href="#">3</a></li>
				<li><span class="page-numbers current">4</span></li>
				<li><a class="page-numbers" href="#">5</a></li>
				<li><a class="page-numbers" href="#">6</a></li>
				<li><a class="page-numbers" href="#">7</a></li>
				<li><a class="page-numbers" href="#">8</a></li>
				<li><a class="next page-numbers" href="#"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/next.png" alt=""></a></li>
			</ul> -->
			<?php pagination(); // пагинация, функция нах-ся в function.php ?>
		</div>
		<!-- конец пагинаци -->


<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>