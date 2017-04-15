<?php
/**
 * Шаблон страницы рецептов (single-recipes.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<?php

if ( is_user_logged_in() ) {//условие если залогинен
	?>

<!-- начало поста -->
<div class="recipes-admin-div">

		<!-- элемент -->
		<p id="element-id" class="elements-input dn c-bg3">
		<label class="clearfix ">
			<span class="name-element">Объем</span>
			<span class="span-input-ml">
				<input type="text" name="e_i_name" id="e_i_name" class="dn">
				<input class="input-ml max-val new-element" type="number" name="русское слово" value="0"><span class="ml">%</span>
			</span>
		</label>
		</p>
		<!-- .элемент -->

	<!-- форма элементов -->
	<form action="<?php echo site_url(); ?>/user-post" method="post" class="text-center form-elements">
		<!-- Название рецепта -->
		<input type="text" name="title-recipes" class="input-name" placeholder="Введите имя" required>
		<!-- контейнер элементов -->

		<div class="w283 clearfix">
		<div id="div-elements">
			<!-- элементы по умолчанию -->

			<!-- первый фон -->
			<div class="c-bg1">


			<!-- Объем -->
			<p id="element-id" class="elements-input">
			<label class="clearfix ">
				<span class="name-element">Объем</span>
				<span class="span-input-ml">
					<input type="text" name="e_i_name" id="" class="dn">
					<input class="input-ml" id="atm" type="number" name="atm" value="30"><span class="ml">ml</span>
				</span>
			</label>
			</p>
			<!-- .Объем -->

			<!-- Крепость -->
			<p id="element-id" class="elements-input">
			<label class="clearfix ">
				<span class="name-element">Крепость</span>
				<span class="span-input-ml">
					<input type="text" name="e_i_name" id="" class="dn">
					<input class="input-ml" id="ds" type="number" name="ds" value="3"><span class="ml">mg</span>
				</span>
			</label>
			</p>
			<!-- .Крепость -->

			<!-- PG -->
			<p id="element-id" class="elements-input">
			<label class="clearfix ">
				<span class="name-element">PG</span>
				<span class="span-input-ml">
					<input type="text" name="e_i_name" id="" class="dn">
					<input class="input-ml" id="dpg" type="number" name="dpg" value="30"><span class="ml">%</span>
				</span>
			</label>
			</p>
			<!-- .PG -->
			<!-- VG -->
			<p id="element-id" class="elements-input">
			<label class="clearfix ">
				<span class="name-element">VG</span>
				<span class="span-input-ml">
					<input type="text" name="e_i_name" id="" class="dn">
					<input class="input-ml" id="dvg" type="number" name="dvg" value="70"><span class="ml">%</span>
				</span>
			</label>
			</p>
			<!-- .VG -->

						</div>
			<!-- .первый фон -->

			<!-- второй фон -->
			<div class="c-bg2">
			<!-- Никотиновая база -->
			<p id="element-id" class="elements-input">
			<label class="clearfix ">
				<span class="name-element">Никотиновая база</span>
				<span class="span-input-ml">
					<input type="text" name="e_i_name" id="" class="dn">
					<input class="input-ml" id="ns" type="number" name="ns" value="100"><span class="ml">mg</span>
				</span>
			</label>
			</p>
			<!-- .Никотиновая база -->



			<!-- VG в никотине -->
			<p id="element-id" class="elements-input">
			<label class="clearfix ">
				<span class="name-element">VG в никотине</span>
				<span class="span-input-ml">
					<input type="text" name="e_i_name" id="" class="dn">
					<input class="input-ml" id="pgc" type="number" name="pgc" value="100"><span class="ml">%</span>
				</span>
			</label>
			</p>
			<!-- .VG в никотине -->
			<!-- PG в никотине -->
			<p id="element-id" class="elements-input">
			<label class="clearfix ">
				<span class="name-element">PG в никотине</span>
				<span class="span-input-ml">
					<input type="text" name="e_i_name" id="" class="dn">
					<input class="input-ml" id="vgc" type="number" name="vgc" value="0"><span class="ml">%</span>
				</span>
			</label>
			</p>
			<!-- .PG в никотине -->
			</div>
			<!-- .второй фон -->

		<!-- .элементы по умолчанию -->



		</div>
		<!-- новый элемент -->
		<p class="elements-input-new">
			<input id="e_name" class="input-name-el" type="search" placeholder="Ингредиент 1">
			<input id="e_value" class="input-ml max-val" type="number" value="0"><span class="ml">%</span>
		</p>

		<a href="#" id="add-element" class="btn-green">добавить ингредиент</a>
		<br>
		<!-- описание -->
		<textarea name="opisanie" class="opisanie" name="opisanie" id="" cols="30" rows="10" placeholder="Добавить описание"></textarea>
		<input type="text" id="i_post_id" name="i_post_id" style="display: none">
		<!-- <a href="#" class="btn-green">сохранить</a> -->
		<input class="btn-green" type="submit" value="сохранить">
		</div>
	</form>
</div>
<!-- конец формы добавления рецепта -->

<!-- инфа о рецепте -->
<div class="recipes-table">
	<table class="table-info-r">
		<tr class="color-1">
			<th class="table-info-INGREDIENT"><span class="line">ИНГРЕДИЕНТ</span></th>
			<th class="table-info-ml"><span class="line">ml</span></th>
			<th class="table-info-GRAMS"><span class="line">GRAMS</span></th>
			<th class="table-info-proc"><span class="line">%</span></th>
		</tr>
		<tr class="c-green color-2">
			<td id="c1-1">Никотин <span id="nic-1">100</span> mg (<span id="nic-2">100</span>/<span id="nic-3">0</span> PG/VG)</td>
			<td id="c1-2">0</td>
			<td id="c1-3">0</td>
			<td id="c1-4">0</td>
		</tr>
		<tr class="c-green color-3">
			<td id="c2-1">PG dilutant</td>
			<td id="c2-2">1.67</td>
			<td id="c2-3">1.73</td>
			<td id="c2-4">5.57</td>
		</tr>
		<tr class="c-green color-4">
			<td id="c3-1">VG dilutant</td>
			<td id="c3-2">1.67</td>
			<td id="c3-3">1.73</td>
			<td id="c3-4">5.57</td>
		</tr>
		<tr class="tatal-base c-green color-5" id="total-base">
			<td id="c4-1">Total base</td>
			<td id="c4-2">1.67</td>
			<td id="c4-3">1.73</td>
			<td id="c4-4">5.57</td>
		</tr>

		<!-- ингридиенты -->




		<tr class="tatal-base c-orange color-5" id="total">
			<td id="total-1">Всего: </td>
			<td id="total-2">30</td>
			<td id="total-3">1.73</td>
			<td id="total-4">5.57</td>
		</tr>
		<tr class="dn c-orange color-6" id="td-etalon">
			<td class="cell-1">0</td>
			<td class="cell-2">0</td>
			<td class="cell-3">0</td>
			<td class="cell-4">0</td>
		</tr>
	</table>
</div>
<!-- .инфа о рецепте -->

	<div class="info-small post-recipes-container">
		<p>Крепость: <span id="small-s">3</span> mg</p>
		<p>PG/VG: <span id="small-pg">30</span> / <span id="small-vg">70</span></p>
		<p>Всего аром.: <span id="small-f1">0</span> ml / <span id="small-f2">0</span> g (<span id="small-f3">0</span>%)</p>
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
<style>
	.put{
		display: none;
	}
</style>

<?php

}
else {//Если не залогинен
	echo '<h1>Необходимо зарегистрироваться</h1>';
}//конец проверки залогинен или нет
 ?>

<?php update_post_meta(98, 'views', '0');//убираем популярность ссылки ?>

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>