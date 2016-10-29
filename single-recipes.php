<?php
/**
 * Шаблон страницы рецептов (single-recipes.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>

<!-- начало поста -->
<div class="akciya-container clearfix">
	<!-- контейнер с картинкой и контактами -->
	<div class="container-akciya-kontakt clearfix">
		<!-- блок с основной картинкой -->
		<div class="company-div-logo">
<!-- 		<?php if ( has_post_thumbnail() ) the_post_thumbnail('504x304','class=post-shares-img'); // выводим миниатюру поста, если есть
else echo '<img class="post-shares-img" src="http://placehold.it/540x304/2ecc71/ecf0f1">';?> -->
<img class="post-shares-img" src="http://placehold.it/90x72/2ecc71/ecf0f1">

		</div>
		<!-- Таблица с контактами -->
		<div class="company-kontakt">
			<table class="akciya-kontakt-table">
				<tr>
					<td>Компания:</td>
					<td><?php echo get_post_custom_values(shares_company)[0]; //вывод произвольного поля?></td>
				</tr>
				<tr>
					<td>Рейтинг:</td>
					<td>
						<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
						<span class="green font-rr">+12</span>
						<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
					</td>
				</tr>
				<tr>
					<td>Отзывы:</td>
					<td><span class="green font-rr"><?php comments_number('пока нет', '1', '%'); ?></span></td>
				</tr>
				<tr>
					<td>Телефон:</td>
					<td><?php echo get_post_custom_values(shares_telefon)[0]; //вывод произвольного поля?></td>
				</tr>
				<tr>
					<td>Адрес:</td>
					<td><?php echo get_post_custom_values(shares_adres)[0]; //вывод произвольного поля?></td>
				</tr>
				<tr>
					<td class="text-center" colspan="2"><a href="#" class="btn-green">Перейти на сайт</a></td>
				</tr>
			</table>

		</div>
	</div>
	<!-- коонец блок с картинкой и контактами -->
	<div class="o-akcii mt33">
		<!-- описание поста -->
		<p class="podzagolovok"><span class="line">Описание</span></p>
		<div class="text-other">
			<?php add_filter('the_content','htm_image_content_filter',11); ?>
<?php the_content(); // контент без картинок?>
		</div>

	</div>
</div>

<?php endwhile; // конец цикла ?>

<!-- конец поста -->
<?php if (comments_open() || get_comments_number()) comments_template('', true); // если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев ?>

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>