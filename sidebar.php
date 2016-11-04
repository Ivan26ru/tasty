<?php
/**
 * Шаблон сайдбара (sidebar.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
	</section>
<!-- правый сайдбар -->
<sidebar>
<!-- top5 -->
<div class="sb-r top5">
	<img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/top5.png" class="sidebar-img">
<!-- 	<a href="http://test1.v-svetlograde.ru/vipe-fest/">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</a>
	<a href="#">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</a>
	<a href="#">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</a>
	<a href="#">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</a>
	<a href="#">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</a> -->

	 <?php kama_get_most_viewed("num=5&format={a}{title}{/a}"); ?>

</div>
<!-- лучшие девайсы -->
<div class="best-device">
	<p class="zagolovok"><span class="line">лучшие девайсы</span></p>
	<a href="http://test1.v-svetlograde.ru/category/best_device/box_mods/" class="best-device-a d1"><span>BOX MODS</span></a>
	<a href="http://test1.v-svetlograde.ru/category/best_device/mechanical_mod/" class="best-device-a d2"><span>Mechanical  Mod</span></a>
	<a href="http://test1.v-svetlograde.ru/category/best_device/rdas/" class="best-device-a d3"><span>RDas</span></a>
	<a href="http://test1.v-svetlograde.ru/category/best_device/sub_ohm_tanks/" class="best-device-a d4"><span>Sub ohm  tanks</span></a>
	<a href="http://test1.v-svetlograde.ru/category/best_device/battary_chargers/" class="best-device-a d5"><span>battery  chargers</span></a>
	<a href="http://test1.v-svetlograde.ru/category/best_device/batteries/" class="best-device-a d6"><span>batteries</span></a>
</div>

<!-- рекламный блок -->
<div class="sb-banner sb-banner-1">
	<a href="#"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/banner/banner1.png" class="sb-banner-img"></a>
</div>

<!-- the best -->
<div class="sb-r best">
	<img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/email-sb.png" class="sidebar-img">
<!-- 	<p>Подборка крутых новостей недели</p>
	<form action="">
		<input class="input-email" type="email" name="email" id="" placeholder="Введите email">
		<input type="submit" class="btn-green" value="Подписаться">
	</form> -->
	<?php $widgetNL = new WYSIJA_NL_Widget(true);
echo $widgetNL->widget(array('form' => 2, 'form_type' => 'php')); ?>
	<!-- <?php echo do_shortcode('[subscribe2]'); ?></div> -->
</div>
<!-- опрос -->
<div class="sb-r what">
	<img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/what.png" class="sidebar-img">
<!-- 	<p>Какой вкус вам больше нравится</p>
	<form action="#">
	<label>
		<input type="radio" name="vkus" value="variant1" checked>Вариант 1
	</label>
	<label>
		<input type="radio" name="vkus" value="variant2">Вариант 2
	</label>
		<input type="submit" class="btn-green" value="Отправить">
	</form> -->
	<?php dynamic_sidebar('left-sidebar'); // выводим сайдбар, имя определено в function.php ?>
	<?php //echo do_shortcode('[democracy id="1"]'); //вывод шорткода ?>
</div>
<!-- рекламный блок -->
<div class="sb-banner sb-banner-2">
	<a href="#"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/banner/banner2.png" class="sb-banner-img"></a>
</div>

<!-- рекламный блок -->
<div class="sb-banner sb-banner-3">
	<a href="#"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/banner/banner3.png" class="sb-banner-img"></a>
</div>



</sidebar>