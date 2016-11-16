<?php
/**
 * Шаблон страницы рецептов (single-recipes.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

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

<?php 
// ДОБАВЛЕНИЕ ЗАПИСИ ЧЕРЕЗ PHP
// Создаем массив
  $post_data = array(
	 'post_title'    => 'Заголовок записи 3',
	 'post_content'  => 'Здесь должен быть контент (текст) записи. 2',
	 'post_status'   => 'pending',
	 'post_type'     => 'post',
	 'post_author'   => 1,
	 'post_category' => array(20)
  );

// Вставляем данные в БД
//$post_id = wp_insert_post( wp_slash($post_data) );//создаем запись
//add_post_meta($post_id, 'YOUTUBE3', 'code3');//добавляем значение произвольным полям
  ?>

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>