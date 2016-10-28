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
			<form class="" id="search_string" method="get" role="search" action="<?php echo home_url( '/' ) ?>" >
				<!-- строка поиска -->
				<input class="search-text" type="text" value="поиск" name="s" id="s">
				<!-- кнопка поиска -->
				<button class="search-button" type="submit" id="searchsubmit" ><i class="fa fa-search" aria-hidden="true"></i></button>
			</form>
		</div>
	<a href="#" class="fr btn-green">добавить рецепт</a>
</div>


<?php pagination(); // пагинация, функция нах-ся в function.php ?>


<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>