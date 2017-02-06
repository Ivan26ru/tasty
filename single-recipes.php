<?php
/**
 * Шаблон страницы рецепта (single-recipes.php)
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
		<p>Автор:<span><?php the_author(); ?></span></p>
		<p>Дата:<span><?php the_time('j F H:i'); ?></span></p>
		<div class="rejt-div"><div class="rejt-name">Рейтинг:</div>
			<div class="rejt-vol">
			<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
 			</div>
		</div>
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

	<!-- <?php the_meta(); ?> -->
	<?php
	/**
 * Проверит, что первая строка начинается со второй
 *
 * @param string $str      основная строка
 * @param string $substr   та, которая может содержаться внутри основной
 */
function isStart($str, $substr)
{
	// strpos проверяет, что первая строка начинается со второй, $a='abcd', $b='ab' строка ИСТИНА
    $result = strpos($str, $substr);
    if ($result === 0) { // если содержится, начиная с первого символа
    	return true;
    } else {
    	return false;
    }
}//конец функции строк

	$meta_values = get_post_meta($post->ID);
	// print_r($meta_values);
	foreach ($meta_values as $key => $value) {//перебор массива произвольных полей
		if (isStart($key,'n:')) {//если произвольное поле начинается на n:
			    // echo 'символ найден';
			    ?>
	  	<!-- строка -->
		<tr>
			<td><?php echo substr($key,2) //убираем первые 2 символа строки, имя элемента?></td>
			<td><?php echo $value[0] //значение элемента?></td>
			<td>1.73</td>
			<td>5.57</td>
		</tr>
		<!-- .строка -->

<?php
			}//конец условия отбора нужного
	}//конец перебора

	?>

	</table>



	<div class="o-post-recipes mt33">
		<!-- описание поста -->
		<p class="podzagolovok"><span class="line">Описание</span></p>
		<div class="text-other">
			<?php add_filter('the_content','htm_image_content_filter',11); ?>
<?php the_content(); // контент без картинок?>
		</div>

	</div>



<!-- инфа о рецепте -->
<div class="recipes-table">
	<table class="table-info-r">
		<tr>
			<th class="table-info-INGREDIENT"><span class="line">INGREDIENT</span></th>
			<th class="table-info-ml"><span class="line">ml</span></th>
			<th class="table-info-GRAMS"><span class="line">GRAMS</span></th>
			<th class="table-info-proc"><span class="line">%</span></th>
		</tr>
		<tr>
			<td id="c1-1">Nicotine juice 100 mg (100% PG)</td>
			<td id="c1-2">0</td>
			<td id="c1-3">0</td>
			<td id="c1-4">0</td>
		</tr>
		<tr>
			<td id="c2-1">PG dilutant</td>
			<td id="c2-2">1.67</td>
			<td id="c2-3">1.73</td>
			<td id="c2-4">5.57</td>
		</tr>
		<tr>
			<td id="c3-1">VG dilutant</td>
			<td id="c3-2">1.67</td>
			<td id="c3-3">1.73</td>
			<td id="c3-4">5.57</td>
		</tr>
		<tr class="tatal-base" id="total-base">
			<td id="c4-1">Total base</td>
			<td id="c4-2">1.67</td>
			<td id="c4-3">1.73</td>
			<td id="c4-4">5.57</td>
		</tr>

		<!-- ингридиенты -->




		<tr class="tatal-base" id="total">
			<td id="total-1">Totals</td>
			<td id="total-2">30</td>
			<td id="total-3">1.73</td>
			<td id="total-4">5.57</td>
		</tr>
		<tr class="dn" id="td-etalon">
			<td class="cell-1">0</td>
			<td class="cell-2">0</td>
			<td class="cell-3">0</td>
			<td class="cell-4">0</td>
		</tr>
	</table>
</div>
<!-- .инфа о рецепте -->


	
</div>

<?php nonView(); ?>

<?php endwhile; // конец цикла ?>


<div class="o-post-recipes-comment">
<!-- конец поста -->
<?php if (comments_open() || get_comments_number()) comments_template('', true); // если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев ?>
</div>

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>