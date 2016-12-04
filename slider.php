<?php
/**
 * Шаблон СЛАЙДЕРА главной страницы (slider.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
<!-- слайдер -->

<!-- блок для слайдера -->
<div class="slider-block">
	<div id="owl-example" class="owl-carousel">
		<div><img src="<?php echo get_template_directory_uri(); //путь до темы; ?>/img/png/slider/slide1.png" alt="описание картинки"></div>
		<div><img src="<?php echo get_template_directory_uri(); //путь до темы; ?>/img/png/slider/slide1.png" alt="описание картинки"></div>
		<div><img src="<?php echo get_template_directory_uri(); //путь до темы; ?>/img/png/slider/slide1.png" alt="описание картинки"></div>
	</div>
</div>

<!-- .слайдер -->