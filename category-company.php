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
	<th class="th-rejting"><p class="podzagolovok"><span class="line">Рейтинг</span></p></th>
</tr>

<tr class="company-content">
	<td class="td-img">
		<div class="company-div-img"><img src="http://placehold.it/150x150/2ecc71/ecf0f1" alt=""></div>
	</td>
	<td class="td-name">
		<a href="<?php the_permalink() ?>"><p class="podzagolovok fs16"><?php the_title(); ?></p></a>
		<p class="text-other fs12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt illum architecto commodi recusandae doloremque. Expedita quis non quam consectetur molestiae provident iste ducimus, quaerat eum repellendus ut excepturi iusto! Veniam enim commodi laboriosam totam, facilis ipsam quaerat obcaecati omnis numquam! Ratione voluptatibus maxime ipsa sapiente temporibus voluptate fuga, modi minus.</p>
	</td>
	<td class="td-otziv">
		<span class="green font-rr"><?php comments_number('пока нет', '1', '%'); ?></span>
	</td>
	<td class="td-rejting">
		<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
		<span class="green font-rr">+12</span>
		<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
	</td>
</tr>


</table>

<!-- все посты -->
<div class="post-shares-all">





</div>
<!-- конец всех постов -->

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>
