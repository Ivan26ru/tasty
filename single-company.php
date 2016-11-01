<?php
/**
 * Шаблон страницы компании (single-company.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>

<!-- начало поста -->
<div class="akciya-container clearfix">
	<!-- контейнер с картинкой и контактами -->
	<div class="container-akciya-kontakt clearfix">
		<!-- блок с основной картинкой -->
		<div class="company-div-logo">
			<?php 
// вывод картинки из произвольного поля
$image = get_field('img');

if( !empty($image) ): ?>

    <img class="post-shares-img" src="<?php echo $image['url']; ?>" />

<?php endif; ?>
<!-- <img class="post-shares-img" src="http://placehold.it/90x72/2ecc71/ecf0f1"> -->

		</div>
		<!-- Таблица с контактами -->
		<div class="company-kontakt">
			<table class="company-kontakt-table">
<h1 class="company-h1"><span class="line"><?php the_title(); ?></span></h1>
				<tr>
					<td class="brd w100">Рейтинг:</td>
					<td class="brd w180">
						<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
						<span class="green font-rr">+12</span>
						<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
					</td>
					<td class="null">&nbsp;</td>
					<td class="null">&nbsp;</td>
					<td class="brd w70">Телефон:</td>
					<td class="brd w330"><?php echo get_post_custom_values(company_telefon)[0]; //вывод произвольного поля?></td>

				</tr>
				<tr>
					<td class="brd">Отзывы:</td>
					<td class="brd"><span class="green font-rr"><?php comments_number('пока нет', '1', '%'); ?></span></td>
					<td class="null">&nbsp;</td>
					<td class="null">&nbsp;</td>
					<td class="brd ">Адрес:</td>
					<td class="brd"><?php echo get_post_custom_values(company_adres)[0]; //вывод произвольного поля?></td>
				</tr>
				<tr>
					<td class="null">&nbsp;</td>
					<td class="null">&nbsp;</td>
					<td class="null">&nbsp;</td>
					<td class="null">&nbsp;</td>
					<td class="text-right" colspan="2">
						<a href="http://<?php cus(site) ?>/" class="btn-green">Перейти на сайт</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<!-- коонец блок с картинкой и контактами -->
	<div class="o-akcii mt33">
		<p class="podzagolovok"><span class="line">О компании</span></p>
		<div class="text-other">
			<?php add_filter('the_content','htm_image_content_filter',11); ?>
<?php the_content(); // контент без картинок?>
		</div>

		<p class="podzagolovok akcii-p-foto"><span class="line">Фотографии</span></p>
		<!-- контейнер с фото -->
		<div class="akcii-div-img">
<?php //Вывод картинок поста
$str= get_the_content();
preg_match_all('/src="([^"]+)"/i', $str, $matches);
$img_urls = $matches[1]; ?>
<?php if($img_urls) { ?>
<? foreach ($img_urls as $img_url) {?>
<img class="post-img" src="<?php echo $img_url; ?>" />
<?php }}
?>
 		</div>
	</div>
</div>

<?php endwhile; // конец цикла ?>

<!-- конец поста -->
<?php if (comments_open() || get_comments_number()) comments_template('', true); // если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев ?>

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>