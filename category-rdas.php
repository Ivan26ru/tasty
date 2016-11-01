<?php
/**
 * Шаблон лучшие девайсы (category-best_device.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<!-- Начало рубрики-->
<!-- заголовок -->
	<h1 class="zagolovok"><span class="line">Best Box Mods, Vape Mods and E-Cig Mods 2016</span></h1>
	<!-- описание -->
	<p class="text-other mt35">In this “best of list” we take a look at the best box mods & vape mods on the market. Our top box mod list comprises beginner box mods,
high powered box mods, compact box mods and all-in-one vape mods. Our “best box mod” list is based on the box mods we have tested so
far and those highly recommended to us by close friends and fellow experts. Not everyone will agree with our list, but we hope it will provide
 readers with a clear overview of some of the best vape mods on the market. We will be updating the top box mods article as we review
more devices going forward. Please take into consideration that there are many new mods coming out on a daily basis, therefore it might
take a while for the best ones to make it onto our list. Do bear in mind that this list is based on our personal opinions here at Vaping360 and
on those of some fellow vaping experts</p>

<!-- Начало рубрики -->
<!-- название рубрики -->
<h2 class="zagolovok mt50"><span class="line"><?php single_cat_title() ?></span></h2>

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
		<p class="skidka">скидка 30%</p>
		<div class="pokupka">
			<a href="<?php echo get_post_custom_values('china')[0] ?>" class="pokupka-china">купить в Китае</a>
			<br>
			<a href="<?php echo get_post_custom_values('russia')[0] ?>" class="pokupka-russia">купить в России</a>
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