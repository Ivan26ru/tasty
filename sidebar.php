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

?>
	</section>
<!-- правый сайдбар -->
<sidebar>
<!-- top5 -->
<div class="sb-r top5">
	<img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/top5.png" class="sidebar-img">
<!-- 	<a href="http://tastyvape.ru/vipe-fest/">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</a>
	<a href="#">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</a>
	<a href="#">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</a>
	<a href="#">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</a>
	<a href="#">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</a> -->

	 <?php kama_get_most_viewed("num=5&format={a}{title}{/a}"); ?>

</div>
<!-- лучшие девайсы -->
<div class="best-device">
	<p class="zagolovok"><a href="<?php echo get_category_link( '10' ); ?>"><span class="line">лучшие девайсы</span></a></p>
	<a href="http://tastyvape.ru/category/best_device/box_mods/" class="best-device-a d1"><span>BOX MODS</span></a>
	<a href="http://tastyvape.ru/category/best_device/mechanical_mod/" class="best-device-a d2"><span>Mechanical  Mod</span></a>
	<a href="http://tastyvape.ru/category/best_device/rdas/" class="best-device-a d3"><span>RDas</span></a>
	<a href="http://tastyvape.ru/category/best_device/sub_ohm_tanks/" class="best-device-a d4"><span>Sub ohm  tanks</span></a>
	<a href="http://tastyvape.ru/category/best_device/battary_chargers/" class="best-device-a d5"><span>battery  chargers</span></a>
	<a href="http://tastyvape.ru/category/best_device/batteries/" class="best-device-a d6"><span>batteries</span></a>
</div>

<!-- рекламный блок -->
<?php
	$args = array( 'posts_per_page' => 1, 'post__not_in' => array($baner3,$baner2), 'orderby'=> 'date', 'post_type' => 'baners', 'category' => $category2,'order' => 'DESC' );//выбираем посты соответствующие категории
	$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
<div class="sb-banner sb-banner-1">
<a href="<?php cus('link'); ?>">
	<?php the_post_thumbnail('full'); ?>
</a>
</div>
	<?php endforeach;
wp_reset_postdata();?>

<!-- the best -->
<div class="sb-r best">
	<img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/email-sb.png" class="sidebar-img">
	<?php $widgetNL = new WYSIJA_NL_Widget(true);
echo $widgetNL->widget(array('form' => 2, 'form_type' => 'php')); ?>
	<!-- <?php echo do_shortcode('[subscribe2]'); ?></div> -->
</div>
<!-- опрос -->
<div class="sb-r what">
	<img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/what.png" class="sidebar-img">
	<?php dynamic_sidebar('left-sidebar'); // выводим сайдбар, имя определено в function.php ?>
	<?php //echo do_shortcode('[democracy id="1"]'); //вывод шорткода ?>
</div>



<!-- рекламный блок -->
<?php
	$args = array( 'posts_per_page' => 100, 'post__not_in' => array($baner1,$baner3), 'orderby'=> 'date', 'post_type' => 'baners', 'category' => $category2,'order' => 'DESC' );//выбираем посты соответствующие категории
	$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
<div class="sb-banner sb-banner-2">
<a href="<?php cus(link); ?>">
	<?php the_post_thumbnail('full'); ?>
</a>
	</div>
	<?php endforeach;
wp_reset_postdata();?>


<!-- рекламный блок -->
<?php
	//выбираем посты соответствующие категории
	$args = array( 'posts_per_page' => 100, 'post__not_in' => array($baner1,$baner2),'orderby'=> 'date', 'post_type' => 'baners', 'category' => $category2,'order' => 'DESC' );
	// отбираем посты, по массиву выше
	$myposts = get_posts( $args );
	// перебор массива постов
foreach ( $myposts as $post ) : setup_postdata( $post );

if (cus(link)): ?>
<div class="sb-banner sb-banner-3">
<a href="<?php cus(link); ?>">
	<?php the_post_thumbnail('full'); ?>
</a>
</div>
<?php endif ?>


	<?php endforeach;
wp_reset_postdata();?>

</sidebar>