<?php
/**
 * Шаблон страницы рецептов (single-recipes.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>

<!-- начало поста -->
<div class="post-recipes-container clearfix">
<h1 class="recipes-h1">Рецепты</h1>
	<!-- контакты-->
	<div class="p-recipes-div-kont">
		<p>Автор:<span>Kimsmm</span></p>
		<p>Дата:<span>21 июля 12:40</span></p>
		<p>Рейтинг:
			<span>
				<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
				<span class="green font-rr">+12</span>
				<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
			</span>
		</p>
	</div>
	<!-- таблица ингридиенты -->
	<table class="post-recipes-ingredient">
		<tr>
			<th><span>INGREDIENT</span></th>
			<th><span>ml</span></th>
			<th><span>GRAMS</span></th>
			<th><span>%</span></th>
		</tr>
		<!-- содержимое таблицы -->
		<!-- строка -->
		<tr>
			<td>Nicotine juice 72 mg (100% PG)</td>
			<td>1.67</td>
			<td>1.73</td>
			<td>5.57</td>
		</tr>
				<!-- строка -->
		<tr>
			<td>Nicotine juice 72 mg (100% PG)</td>
			<td>1.67</td>
			<td>1.73</td>
			<td>5.57</td>
		</tr>
				<!-- строка -->
		<tr>
			<td>Nicotine juice 72 mg (100% PG)</td>
			<td>1.67</td>
			<td>1.73</td>
			<td>5.57</td>
		</tr>
				<!-- строка -->
		<tr>
			<td>Nicotine juice 72 mg (100% PG)</td>
			<td>1.67</td>
			<td>1.73</td>
			<td>5.57</td>
		</tr>
	</table>

	<div class="o-post-recipes mt33">
		<!-- описание поста -->
		<p class="podzagolovok"><span class="line">Описание</span></p>
		<div class="text-other">
			<?php add_filter('the_content','htm_image_content_filter',11); ?>
<?php the_content(); // контент без картинок?>
		</div>

	</div>
</div>

<?php endwhile; // конец цикла ?>


<div class="o-post-recipes-comment">
<!-- конец поста -->
<?php if (comments_open() || get_comments_number()) comments_template('', true); // если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев ?>
</div>

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>