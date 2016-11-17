<?php
/**
 * Шаблон страницы рецептов (single-recipes.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<!-- начало поста -->
<div class="recipes-admin-div">

		<!-- элемент -->
		<p id="element-id" class="elements-input dn">
		<label class="clearfix" class="clearfix">
			<span class="name-element">Amount to make</span>
			<span class="span-input-ml">
				<input type="text" name="e_i_name" id="e_i_name" class="dn">
				<input class="input-ml" type="search" name="русское слово"><span class="ml">ml</span>
			</span>
		</label>
		</p>
		<!-- .элемент -->

	<!-- форма элементов -->
	<form action="http://tastyvape.ru/user-post" method="post" class="text-center form-elements">
		<!-- Название рецепта -->
		<input type="text" name="title-recipes" class="input-name" placeholder="Введите имя">
		<!-- контейнер элементов -->

		<div class="w263 clearfix">
		<div id="div-elements">



		</div>
		<!-- новый элемент -->
		<p class="elements-input-new">
			<input id="e_name" class="input-name-el" type="search" placeholder="Ингридиент 1">
			<input id="e_value" class="input-ml" type="search"><span class="ml">ml</span>
		</p>

		<a href="#" id="add-element" class="btn-green">добавить ингридиент</a>
		<br>
		<!-- описание -->
		<textarea name="opisanie" class="opisanie" name="opisanie" id="" cols="30" rows="10" placeholder="Добавить описание"></textarea>
		<!-- <a href="#" class="btn-green">сохранить</a> -->
		<input class="btn-green" type="submit" value="сохранить">
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