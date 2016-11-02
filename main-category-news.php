<?php
/**
 * Шаблон категории новосте и других(main-category-news.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

	<!-- основное содержание -->
			<!-- другие посты с картинками -->
		<div class="div-post-other">

		<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>

			<!-- пост -->
			<div class="post-other">
			<!-- миниатюра поста -->
				<div class="post-other-img">
				<?php 	if ( has_post_thumbnail() ) the_post_thumbnail(thumbnail,'class=post-shares-img'); // выводим миниатюру поста, если есть
						else echo '<img class="post-shares-img" src="http://placehold.it/420x167/2ecc71/ecf0f1">';?>

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
<?php endwhile; // конец цикла
else: echo '<p>Нет записей.</p>'; endif; // если записей нет, напишим "простите" ?>

		</div>
		<!-- конец раздела -->


<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>