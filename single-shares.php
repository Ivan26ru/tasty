<?php
/**
 * Шаблон лучшие девайсы (category-best_device.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<!-- начало поста -->
<h1 class="akciya-h1">Акция от GearBest — Good Deals in Clearance Special</h1>
<div class="akciya-container clearfix">
	<!-- контейнер с картинкой и контактами -->
	<div class="container-akciya-kontakt clearfix">
		<!-- блок с основной картинкой -->
		<div class="akciya-div-logo">
			<img src="http://placehold.it/540x304/2ecc71/ecf0f1">
		</div>
		<!-- Таблица с контактами -->
		<div class="akciya-kontakt">
			<table class="akciya-kontakt-table">
				<tr>
					<td>Компания:</td>
					<td>геар бест</td>
				</tr>
				<tr>
					<td>Рейтинг:</td>
					<td><span class="green">+12</span></td>
				</tr>
				<tr>
					<td>Отзывы:</td>
					<td><span class="green">2</span></td>
				</tr>
				<tr>
					<td>Телефон:</td>
					<td>8(955)323-12-12</td>
				</tr>
				<tr>
					<td>Адрес:</td>
					<td>Россия, г.Москва, ул.Смольная, дом 24а</td>
				</tr>
				<tr>
					<td class="text-center" colspan="2"><a href="#" class="btn-green">Перейти на сайт</a></td>
				</tr>
			</table>
		</div>
	</div>
	<!-- коонец блок с картинкой и контактами -->
	<div class="o-akcii mt33">
		<p class="podzagolovok"><span class="line">О акции</span></p>
		<p class="text-other">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos tempore debitis facilis quidem dicta facere, ipsam odio dolores, necessitatibus velit, laboriosam inventore. Animi, consequatur pariatur deserunt quod eveniet delectus, neque. Nesciunt doloribus delectus soluta, repellat consectetur non aperiam perferendis illo, fuga cum nulla porro nihil blanditiis unde expedita, est sapiente!</p>
		
		<p class="podzagolovok akcii-p-foto"><span class="line">Фотографии</span></p>
		<!-- контейнер с фото -->
		<div class="akcii-div-img">
						<img class="post-img" src="http://placehold.it/512x512/2ecc71/ecf0f1">
						<img class="post-img" src="http://placehold.it/512x512/2ecc71/ecf0f1">
						<img class="post-img" src="http://placehold.it/512x512/2ecc71/ecf0f1">
						<img class="post-img" src="http://placehold.it/512x512/2ecc71/ecf0f1">
						<img class="post-img" src="http://placehold.it/512x512/2ecc71/ecf0f1">
						<img class="post-img" src="http://placehold.it/512x512/2ecc71/ecf0f1">
						<img class="post-img" src="http://placehold.it/512x512/2ecc71/ecf0f1">
		</div>
	</div>
</div>
<!-- конец поста -->
<?php get_comments(); ?>
<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>