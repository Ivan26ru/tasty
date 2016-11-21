<?php
/**
 * Шаблон Рецепты рубрики (category-recipes.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<!-- Начало рубрики-->

<h1 class="recipes-h1">Рецепты</h1>

<!-- строка поиска и добавить рецепт -->
<div class="search clearfix">
		<div class="fl search-div">
			<!-- сама форма поиска -->
			<form class="clearfix" id="search_string" method="get" role="search" action="<?php echo home_url( '/' ) ?>/category/recipes/" >
				<!-- строка поиска -->
				<input class="search-text" type="text" placeholder="поиск" name="s" id="s">
				<!-- кнопка поиска -->
				<button class="search-button" type="submit" id="searchsubmit" ><i class="fa fa-search" aria-hidden="true"></i></button>
			</form>
		</div>
		<?php 
		// если залогинен
		if ( is_user_logged_in() ) {
		 ?>
			<a href="/recept-admin" class="fr btn-green">добавить рецепт</a>
		<?php
			}
		 ?>
</div>

<!-- контейнер таблицы-->
<div class="table-recipes">
	<!-- таблица с рецептами -->
	<table class="list-recipes">
		<!-- шапка таблицы -->
		<tr>
			<th class="rec-th-name"><p class="podzagolovok"><span class="line">Название</span></p></th>
			<th class="rec-th-avtor"><p class="podzagolovok"><span class="line">Автор</span></p></th>
			<th class="rec-th-data"><p class="podzagolovok"><span class="line">Дата</span></p></th>
			<th class="rec-th-rejting">
				<p class="podzagolovok">
				<a href="#"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-up.png"></a>
					<span class="line">Рейтинг</span>
				<a href="#"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-down.png"></a>
				</p>
			</th>
		</tr>
		<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>

		<!-- пост -->
		<tr class="tr">
			<td class="rec-td-name"><a href="<?php the_permalink() ?>" class=""><?php the_title(); ?></a></td>
			<td class="rec-td-avtor"><?php the_author(); ?></td>
			<td class="rec-td-data"><?php the_time('j F H:i'); ?></td>
			<td class="rec-td-rejting">
				<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
				<span class="green font-rr">+12</span>
				<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
			</td>
		</tr>

		<?php endwhile; // конец цикла
	else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишим "простите" ?>	 
	<?php pagination(); // пагинация, функция нах-ся в function.php ?>

	</table>
</div>


<?php pagination(); // пагинация, функция нах-ся в function.php ?>


<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>