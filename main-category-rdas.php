<?php
/**
 * Шаблон лучшие девайсы (category-best_device.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<!-- Начало рубрики-->
<!-- заголовок -->
	<h1 class="zagolovok"><span class="line"><?php single_cat_title() ?></span></h1>
	<!-- описание -->
	<p class="text-other mt35"><?php echo category_description(); ?></p>


<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
	<!-- начало поста -->
<!-- название поста -->
<div class="div-post-best_device">
<p class="podzagolovok"><?php the_title(); ?></p>
<!-- содержание поста -->
<div class="post-text clearfix">
<!-- миниатюра и кнопки покупки -->
<div class="img-pukupka clearfix">
		<div class="post-div-img">
			<?php
// вывод картинки из произвольного поля
$image = get_field('img');

if( !empty($image) ): ?>

    <img class="post-img" src="<?php echo $image['url']; ?>" />

<?php endif; ?>
		</div>
		<p class="skidka"><?php cus('skidka');// функция вывода произвольного?></p>
		<div class="pokupka">
			<a href="http://<?php echo get_post_custom_values('china')[0] ?>" class="pokupka-china">купить в Китае</a>
			<br>
			<a href="http://<?php echo get_post_custom_values('russia')[0] ?>" class="pokupka-russia">купить в России</a>
		</div>
	</div>
	<!-- плюсы минусы, характеристики -->
	<div class="plus-minus-har clearfix">
		<div class="info-post plus">
			<p class="pmh-title"><span class="line">плюсы</span></p>
			<ul>
<?php //вывод данных по произвольному полю
	lic('plus1');
	lic('plus2');
	lic('plus3');
	lic('plus4');
	lic('plus5');
 ?>
			</ul>
		</div>
		<div class="info-post minus">
			<p class="pmh-title"><span class="line">минусы</span></p>
			<ul>
<?php //вывод данных по произвольному полю
	lic('minus1');
	lic('minus2');
	lic('minus3');
	lic('minus4');
	lic('minus5');
 ?>
			</ul>
		</div>
		<div class="info-post harki">
			<p class="pmh-title"><span class="line">характеристики</span></p>
			<ul>
<?php //вывод данных по произвольному полю
	lic('har1');
	lic('har2');
	lic('har3');
	lic('har4');
	lic('har5');
 ?>
			</ul>
		</div>
	</div>
	<div class="text-device">
			<?php the_content(); // пост превью, до more ?>
	</div>
</div>
</div>
<!-- конец поста -->
<!-- =============================== -->
<?php endwhile; // конец цикла
else: echo '<p>Нет записей.</p>'; endif; // если записей нет, напишим "простите" ?>


<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>