<?php
/**
 * Шаблон поиска (search.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<div class="w750">
<section>
	<h1><?php printf('Поиск по строке: %s', get_search_query()); // заголовок поиска ?></h1>
	<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
		<?php get_template_part('loop'); // для отображения каждой записи берем шаблон loop.php ?>
	<?php endwhile; // конец цикла
	else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишим "простите" ?>
	<?php pagination(); // пагинация, функция нах-ся в function.php ?>
</section>
</div>
<?php get_sidebar(); // подключаем sidebar.php ?>
<?php get_footer(); // подключаем footer.php ?>


