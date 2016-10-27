<?php
/**
 * Шаблон лучшие девайсы (category-best_device.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<!-- Начало рубрики-->
<table class="list-company">
<tr>
	<th class="th-null">&nbsp;</th>
	<th class="th-name"><p class="podzagolovok"><span class="line">Название</span></p></th>
	<th class="th-otziv"><p class="podzagolovok"><span class="line">Отзывы</span></p></th>
	<th class="th-rejting">
		<p class="podzagolovok">
		<a href="#"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-up.png"></a>
			<span class="line">Рейтинг</span>
		<a href="#"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-down.png"></th></a>
		</p>
</tr>

<!-- описание компании -->
<tr class="company-content">
	<td class="td-img">
		<div class="company-div-img"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/logo_company_moimodru.png"></div>
	</td>
	<td class="td-name">
		<a href="<?php the_permalink() ?>"><p class="podzagolovok fs16"><?php the_title(); ?></p></a>
		<p class="text-other fs12">MoiMod.ru — интернет магазин, в котором продаются моды электронных сигарет, В нашем магазине вы всегда найдете самые последние модели обслуживаемых испарителей, механических модов, а также все необходимые аксессуары для обслуживания.</p>
	</td>
	<td class="td-otziv">
		<span class="green font-rr"><?php comments_number('0', '1', '%'); ?></span>
	</td>
	<td class="td-rejting">
		<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
		<span class="green font-rr">+12</span>
		<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
	</td>
</tr>

<!-- разделительные яцейки -->
<!-- <tr class="tr-null">
	<td colspan="4"></td>
</tr> -->

<tr class="tr-hr">
	<td colspan="4"></td>
</tr>

<tr class="tr-null-2">
	<td colspan="4"></td>
</tr>

<!-- описание компании -->
<tr class="company-content">
	<td class="td-img">
		<div class="company-div-img"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/logo_company_elsmokersru_100x100.png"></div>
	</td>
	<td class="td-name">
		<a href="<?php the_permalink() ?>"><p class="podzagolovok fs16"><?php the_title(); ?></p></a>
		<p class="text-other fs12">MoiMod.ru — интернет магазин, в котором продаются моды электронных сигарет, В нашем магазине вы всегда найдете самые последние модели обслуживаемых испарителей, механических модов, а также все необходимые аксессуары для обслуживания.</p>
	</td>
	<td class="td-otziv">
		<span class="green font-rr"><?php comments_number('0', '1', '%'); ?></span>
	</td>
	<td class="td-rejting">
		<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
		<span class="green font-rr">+12</span>
		<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
	</td>
</tr>

<!-- разделительные яцейки -->
<!-- <tr class="tr-null">
	<td colspan="4"></td>
</tr> -->

<tr class="tr-hr">
	<td colspan="4"></td>
</tr>

<tr class="tr-null-2">
	<td colspan="4"></td>
</tr>


<!-- описание компании -->
<tr class="company-content">
	<td class="td-img">
		<div class="company-div-img"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/logo_company_elsmokersru_100x100.png"></div>
	</td>
	<td class="td-name">
		<a href="<?php the_permalink() ?>"><p class="podzagolovok fs16"><?php the_title(); ?></p></a>
		<p class="text-other fs12">MoiMod.ru — интернет магазин, в котором продаются моды электронных сигарет, В нашем магазине вы всегда найдете самые последние модели обслуживаемых испарителей, механических модов, а также все необходимые аксессуары для обслуживания.</p>
	</td>
	<td class="td-otziv">
		<span class="green font-rr"><?php comments_number('0', '1', '%'); ?></span>
	</td>
	<td class="td-rejting">
		<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
		<span class="green font-rr">+12</span>
		<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
	</td>
</tr>

<!-- разделительные яцейки -->
<!-- <tr class="tr-null">
	<td colspan="4"></td>
</tr> -->

<tr class="tr-hr">
	<td colspan="4"></td>
</tr>

<tr class="tr-null-2">
	<td colspan="4"></td>
</tr>
</table>

<!-- все посты -->
<div class="post-shares-all">





</div>
<!-- конец всех постов -->

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>
