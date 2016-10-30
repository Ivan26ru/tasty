<?php
/**
 * Шаблон страницы рецептов (single-recipes.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>

<!-- начало поста -->
<div class="recipes-admin-div">
	<!-- форма элементов -->
	<form action="#" class="text-center form-elements">
		<input type="text" name="name-recipes" id="" class="input-name" placeholder="Введите имя">
		<!-- контейнер элементов -->
		<div class="w263 clearfix">
		<!-- элемент -->
		<p class="elements-input">
		<label class="clearfix" class="clearfix">
			<span class="name-element">Amount to make</span>
			<span class="span-input-ml">
				<input class="input-ml" type="search" name="site_search"><span class="ml">ml</span>
			</span>
		</label>
		</p>
		<!-- элемент -->
		<p class="elements-input">
		<label class="clearfix" class="clearfix">
			<span class="name-element">Amount to make</span>
			<span class="span-input-ml">
				<input class="input-ml" type="search" name="site_search"><span class="ml">ml</span>
			</span>
		</label>
		</p>
		<!-- элемент -->
		<p class="elements-input">
		<label class="clearfix" class="clearfix">
			<span class="name-element">Amount to make</span>
			<span class="span-input-ml">
				<input class="input-ml" type="search" name="site_search"><span class="ml">ml</span>
			</span>
		</label>
		</p>
		<!-- новый элемент -->
		<p class="elements-input-new">
			<input class="input-name-el" type="search" name="element-new" placeholder="Ингридиент 1">
			<input class="input-ml" type="search" name="site_search"><span class="ml">ml</span>
		</p>

		<a href="#" class="btn-green">добавить ингридиент</a>
		<br>
		<!-- описание -->
		<textarea class="opisanie" name="opisanie" id="" cols="30" rows="10" placeholder="Добавить описание"></textarea>
		<a href="#" class="btn-green">сохранить</a>
		</div>
	</form>
</div>

<?php endwhile; // конец цикла ?>


<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>