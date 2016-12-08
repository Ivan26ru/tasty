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
		<?php
				// вывод картинок из произвольного поля
				$images = get_field('slider', 955);//массив картинок

			if( $images ): //если картинка есть?>
			        <?php foreach( $images as $image ): //перебор массива?>
			        	<div><a href="<?php echo $image[caption]; ?>"><img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" /></div></a>
			        <?php endforeach; //конец перебора?>
			<?php endif; //конец условия?>
	</div>
</div>

<!-- .слайдер -->