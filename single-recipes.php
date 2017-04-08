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
<h1 class="recipes-h1"><?php the_title(); // заголовок поста ?></h1>

	<!-- таблица ингридиенты -->
<!-- 	<table class="post-recipes-ingredient">
		<tr>
			<th><span>INGREDIENT</span></th>
			<th><span>ml</span></th>
			<th><span>GRAMS</span></th>
			<th><span>%</span></th>
		</tr> -->
		<!-- содержимое таблицы -->

	<!-- </table> -->

	<!-- <?php //the_meta(); ?> -->
	<?php
	/**
 * Проверит, что первая строка начинается со второй
 *
 * @param string $str      основная строка
 * @param string $substr   та, которая может содержаться внутри основной
 */
	?>


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
	<!-- .контакты -->

	<?php
//данные рецепта
$atm	=	get_post_custom_values('atm')[0];
$ds		=	get_post_custom_values('ds')[0];
$dpg	=	get_post_custom_values('dpg')[0];
$dvg	=	get_post_custom_values('dvg')[0];
$ns		=	get_post_custom_values('ns')[0];
$pgc	=	get_post_custom_values('pgc')[0];
$vgc	=	get_post_custom_values('vgc')[0];

$e_pg_raznost=$dpg-$ds;
$e_vg_raznost=$dvg;
?>


<?php 
//переменные таблицы

$tb_ml = $atm-$e_ml_summ;//total base (ml)
$nj_ml = $tb_ml/100*$ds; //Nicotine juice 100 mg (100% PG) (ml)
$nj_g = round($nj_ml*1.038,2); //Nicotine juice 100 mg (100% PG) (grams)

$tb_proc = $ds+$e_pg_raznost+$e_vg_raznost;
$pgd_ml = round($tb_ml/100*$e_pg_raznost,2);
$pgd_g = round($pgd_ml*1.038);

$vgd_ml = round($tb_ml/100*$e_vg_raznost,2);
$vgd_g = round($vgd_ml*1.038);

$tb_g = $nj_g+$pgd_g+$vgd_g;

$total_g += $tb_g;
$total_proc += $tb_proc;

?>



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
			<td id="c1-2"><?php echo $nj_ml; ?></td>
			<td id="c1-3"><?php echo $nj_g; ?></td>
			<td id="c1-4"><?php echo $ds; ?></td>
		</tr>
		<tr>
			<td id="c2-1">PG dilutant</td>
			<td id="c2-2"><?php echo $pgd_ml; ?></td>
			<td id="c2-3"><?php echo $pgd_g; ?></td>
			<td id="c2-4"><?php echo $e_pg_raznost; ?></td>
		</tr>
		<tr>
			<td id="c3-1">VG dilutant</td>
			<td id="c3-2"><?php echo $vgd_ml; ?></td>
			<td id="c3-3"><?php echo $vgd_g; ?></td>
			<td id="c3-4"><?php echo $e_vg_raznost; ?></td>
		</tr>


		<!-- ингридиенты -->
<?php 

if( have_rows('ingredients') ):

 	// loop through the rows of data
    while ( have_rows('ingredients') ) : the_row();

        // display a sub field value
      $i_name=  get_sub_field('i_name');
      $i_vol=  get_sub_field('i_vol');
      $i_pg=  get_sub_field('i_pg');
      $i_vg=  get_sub_field('i_vg');
      $i_uv=  get_sub_field('i_uv');
      // echo '<hr>'.$test;
      $e_ml = $atm/100*$i_vol;
      $e_grams = $e_ml*$i_uv;

      $e_ml_summ +=$e_ml;

      $e_pg_raznost -= $i_vol/100*$i_pg;
      $e_vg_raznost -= $i_vol/100*$i_vg;

      $total_g +=$e_grams;
      $total_proc +=$i_vol;
      ?>
	  	<!-- строка -->
		<tr>
			<td><?php echo $i_name; ?></td>
			<td><?php echo $e_ml; ?></td>
			<td><?php echo $e_grams; ?></td>
			<td><?php echo $i_vol; //значение элемента?></td>
		</tr>
		<!-- .строка -->

<?php
    endwhile;
else :
    // no rows found
endif;

?>
		<tr class="tatal-base" id="total-base">
			<td id="c4-1">Total base</td>
			<td id="c4-2"><?php echo $tb_ml; ?></td>
			<td id="c4-3"><?php echo $tb_g; ?></td>
			<td id="c4-4"><?php echo $tb_proc; ?></td>
		</tr>


		<tr class="tatal-base" id="total">
			<td id="total-1">Totals</td>
			<td id="total-2"><?php echo $atm; ?></td>
			<td id="total-3"><?php echo $total_g; ?></td>
			<td id="total-4"><?php echo $total_proc; ?></td>
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




	<div class="o-post-recipes mt33">
		<!-- описание поста -->
		<p class="podzagolovok"><span class="line">Описание</span></p>
		<div class="text-other">
			<?php add_filter('the_content','htm_image_content_filter',11); ?>
<?php the_content(); // контент без картинок?>
		</div>
	<!-- описание поста -->

	</div>

	
</div>

<?php nonView(); ?>

<?php endwhile; // конец цикла ?>


<div class="o-post-recipes-comment">
<!-- конец поста -->
<?php if (comments_open() || get_comments_number()) comments_template('', true); // если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев ?>
</div>

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>