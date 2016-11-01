<?php
/**
 * Шаблон страницы статей (single-article.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>

<!-- Начало поста -->
<img class="art-img" src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/statya.png">
<p class="text-other-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos accusantium, modi porro quo voluptatum quod.</p>

<div class="soc-f-vk">
<a href="#">
	<p class="f-book">
		<i class="fa fa-facebook" aria-hidden="true"></i>
		<span>Поделиться</span>
	</p>
</a>
<a href="#">
	<p class="vk-blue">
		<i class="fa fa-vk" aria-hidden="true"></i>
		<span>Поделиться</span>
	</p>
</a>

</div>
<?php endwhile; // конец цикла ?>

<?php if (comments_open() || get_comments_number()) comments_template('', true); // если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев ?>


<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>