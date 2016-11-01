<?php
/**
 * Шаблон пост видео (single-video.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>

<!-- начало поста -->
<!-- зоголовок -->
<h1 class="pv-h1">Sigelei 213 VS Fuchai 213 сравнение изнутри - Vaporplace</h1>

<div class="video-info">
<!-- видео -->
<iframe width="650" height="360" src="<?php cus(video) ?>" frameborder="0" allowfullscreen></iframe>

<!-- рейтинг и автор -->
<div class="rejting-avtor clearfix">
	<!-- рейтинг -->
	<div class="video-rejting">
		<p class="video-rejitng">Рейтинг:
		<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
		<span class="green font-rr">+12</span>
		<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
		</p>
	</div>
	<!-- автор -->
	<div class="video-avtor">
		<p class="video-avtor">Автор:
		<span class="video-avtor-name"><?php the_author(); ?></span>
		</p>
	</div>
</div>
<!-- коней рейтинг и автор -->
</div>
<!-- коней контейнера видео инфо -->
<div class="o-akcii video-opisanie mt33">
		<p class="podzagolovok"><span class="line">Описание</span></p>
		<div class="text-other">
			<?php add_filter('the_content','htm_image_content_filter',11); ?>
<?php the_content(); // контент без картинок?>
		</div>
<!-- конец поста -->

<?php endwhile; // конец цикла ?>

<!-- конец поста -->
<?php if (comments_open() || get_comments_number()) comments_template('', true); // если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев ?>

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>