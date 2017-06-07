<?php
/**
 * Шаблон страницы статей (single-article.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<div class="w750">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
<h1 class="akciya-h1"><?php the_title(); ?></h1>
<!-- Начало поста -->

<?php // вывод картинки из произвольного поля
$image = get_field('img_big');

if( !empty($image) ): ?>

<img class="art-img" src="<?php echo $image['url']; ?>" />


<?php endif; ?>




<p class="text-other-2"><?php //add_filter('the_content','htm_image_content_filter',11); ?>
<?php the_content(); // контент без картинок?></p>

<div class="soc-f-vk">
<a href="http://facebook.com/share.php?u=<?php echo get_permalink(); ?>" target='_blank'>
	<p class="f-book">
		<i class="fa fa-facebook" aria-hidden="true"></i>
		<span>Поделиться</span>
	</p>
</a>
<a href="http://vkontakte.ru/share.php?url=<?php echo get_permalink(); ?>" target='_blank'>
	<p class="vk-blue">
		<i class="fa fa-vk" aria-hidden="true"></i>
		<span>Поделиться</span>
	</p>
</a>
<a href="
https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php echo get_permalink(); ?>" target='_blank'>
	<p class="vk-blue twitter">
		<i class="fa fa-twitter" aria-hidden="true"></i>
		<span>Поделиться</span>
	</p>
</a>

</div>
<?php endwhile; // конец цикла ?>
</div>
<!-- w750 -->
<?php if (comments_open() || get_comments_number()) comments_template('', true); // если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев ?>


<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>