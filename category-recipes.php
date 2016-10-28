<?php
/**
 * Шаблон Рецепты рубрики (category-recipes.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<!-- Начало рубрики-->

<h1 class="recipes-h1">Рецепты</h1>


<?php pagination(); // пагинация, функция нах-ся в function.php ?>


<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>