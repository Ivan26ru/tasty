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
<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>

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

		<?php endwhile; // конец цикла
	else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишим "простите" ?>

</div>


<?php pagination(); // пагинация, функция нах-ся в function.php ?>


<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>