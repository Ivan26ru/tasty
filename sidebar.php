<?php
/**
 * Шаблон сайдбара (sidebar.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
<?php
$category = get_the_category(); //
$category2 = $category[0]->cat_ID; //узнаем ID категории
$baner1 =  191;
$baner2 = 196;
$baner3 = 200;
$slider_post = 955;

?>
	</section>
<!-- правый сайдбар -->
<sidebar>
<!-- top5 -->
<div class="sb-r top5">
	<img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/top5.png" class="sidebar-img">

	 <?php kama_get_most_viewed("num=5&format={a}{title}{/a}"); ?>

</div>
<!-- лучшие девайсы -->
<div class="best-device">
	<p class="zagolovok"><a href="<?php echo get_category_link( '10' ); ?>"><span class="line">лучшие девайсы</span></a></p>
	<a href="<?php echo site_url(); ?>/category/best_device/box_mods/" class="best-device-a d1"><span>BOX MODS</span></a>
	<a href="<?php echo site_url(); ?>/category/best_device/mechanical_mod/" class="best-device-a d2"><span>Mechanical  Mod</span></a>
	<a href="<?php echo site_url(); ?>/category/best_device/rdas/" class="best-device-a d3"><span>RDas</span></a>
	<a href="<?php echo site_url(); ?>/category/best_device/sub_ohm_tanks/" class="best-device-a d4"><span>Sub ohm  tanks</span></a>
	<a href="<?php echo site_url(); ?>/category/best_device/battary_chargers/" class="best-device-a d5"><span>battery  chargers</span></a>
	<a href="<?php echo site_url(); ?>/category/best_device/batteries/" class="best-device-a d6"><span>batteries</span></a>
</div>




<!-- рекламный блок -->
<div class="sb-banner sb-banner-1">

	<div id="owl-example-baner-1" class="owl-carousel">
		<?php
				// вывод картинок из произвольного поля
				$images = get_field('slider', $baner1);//массив картинок

			if( $images ): //если картинка есть?>
			        <?php foreach( $images as $image ): //перебор массива?>
			        	<div><a href="<?php echo $image[caption]; ?>"><img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" /></div></a>
			        <?php endforeach; //конец перебора?>
			<?php endif; //конец условия?>
	</div>

</div>


<!-- рекламный блок -->
<div class="sb-banner sb-banner-2">

	<div id="owl-example-baner-2" class="owl-carousel">
		<?php
				// вывод картинок из произвольного поля
				$images = get_field('slider', $baner2);//массив картинок

			if( $images ): //если картинка есть?>
			        <?php foreach( $images as $image ): //перебор массива?>
			        	<div><a href="<?php echo $image[caption]; ?>"><img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" /></div></a>
			        <?php endforeach; //конец перебора?>
			<?php endif; //конец условия?>
	</div>

</div>




<!-- рекламный блок -->
<div class="sb-banner sb-banner-3">

	<div id="owl-example-baner-3" class="owl-carousel">
		<?php
				// вывод картинок из произвольного поля
				$images = get_field('slider', $baner3);//массив картинок

			if( $images ): //если картинка есть?>
			        <?php foreach( $images as $image ): //перебор массива?>
			        	<div><a href="<?php echo $image[caption]; ?>"><img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" /></div></a>
			        <?php endforeach; //конец перебора?>
			<?php endif; //конец условия?>
	</div>

</div>




<!-- опрос -->
<div class="sb-r what">
	<img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/what.png" class="sidebar-img">
	<?php dynamic_sidebar('left-sidebar'); // выводим сайдбар, имя определено в function.php ?>
	<?php //echo do_shortcode('[democracy id="1"]'); //вывод шорткода ?>
</div>






<!-- the best -->
<div class="sb-r best">
	<img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/email-sb.png" class="sidebar-img">
	<?php
$widgetNL = new WYSIJA_NL_Widget(true);
echo $widgetNL->widget(array('form' => 2, 'form_type' => 'php')); ?>
	<!-- <?php echo do_shortcode('[subscribe2]'); ?></div> -->
</div>

</sidebar>