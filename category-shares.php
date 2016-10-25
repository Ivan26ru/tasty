<?php
/**
 * Шаблон лучшие девайсы (category-best_device.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<!-- Начало рубрики-->
<div class="header-category clearfix">
	<p class="podzagolovok fs12 nazvanie"><span class="line">название</span></p>
	<p class="podzagolovok fs12 company"><span class="line">компания</span></p>
</div>
<!-- все посты -->
<div class="post-shares-all">

<!-- начало поста -->
<div class="post-shares clearfix">
	<!-- миниатюра -->
	<div class="post-shares-div-img">
		<img class="post-shares-img" src="http://placehold.it/220x120/2ecc71/ecf0f1">
	</div>
	<!-- содежрание поста -->
	<div class="post-shares-content">
		<p class="podzagolovok fs16">Акция от GearBest — Good Deals in  Clearance Special</p>
		<p class="text-other fs12">Акция от GearBest — распродажа товаров для вэйпинга, среди которых много модов, баков и дрипок. Количество товаров по низким ценам ограничено. Акция от GearBest Олимпийский цены. Список товаров доступен на странице акции. Там действительно много всего.</p>
	</div>
	<!-- компания -->
	<div class="post-shares-name-company">
		<p class="shares-name-company">GEARBEST</p>
	</div>
</div>
<!-- конец поста -->

</div>
<!-- конец всех постов -->

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>

