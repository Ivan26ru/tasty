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
		<span><?php the_author(); ?>, <?php the_time('j F H:i'); ?></span>
		<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
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

		<!-- ингридиенты -->
<?php

if( have_rows('ingredients') ):

 	// loop through the rows of data
    while ( have_rows('ingredients') ) : the_row();

        // данные из произвольных полей поста. Данные ингридиента
      $i_name=  get_sub_field('i_name');
      $i_vol=  get_sub_field('i_vol');
      $i_pg=  get_sub_field('i_pg');
      $i_vg=  get_sub_field('i_vg');
      $i_uv=  get_sub_field('i_uv');

      $e_ml = $atm/100*$i_vol;
      $e_grams = $e_ml*$i_uv;

      $e_ml_summ +=$e_ml;

      $e_pg_raznost -= $i_vol/100*$i_pg;
      $e_vg_raznost -= $i_vol/100*$i_vg;

      $total_g +=$e_grams;
      $total_proc +=$i_vol;



    endwhile;
else :
    // no rows found
endif;

?>

<?php
//переменные таблицы

$tb_ml = $atm-$e_ml_summ;//total base (ml)

$nj_ml = round($atm/100*$ds,2); //Nicotine juice 100 mg (100% PG) (ml)
$nj_g = round($nj_ml*1.036,2); //Nicotine juice 100 mg (100% PG) (grams)

$tb_proc = $ds+$e_pg_raznost+$e_vg_raznost;
$pgd_ml = round($atm/100*$e_pg_raznost,2);
$pgd_g = round($pgd_ml*1.036,2);

$vgd_ml = round($atm/100*$e_vg_raznost,2);
$vgd_g = round($vgd_ml*1.261,2);

$tb_g = $nj_g+$pgd_g+$vgd_g;

$total_g += $tb_g;
$total_proc += $tb_proc;

?>



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
			<td id="c1-2"><?php echo $nj_ml; ?></td>
			<td id="c1-3"><?php echo $nj_g; ?></td>
			<td id="c1-4"><?php echo $ds; ?></td>
		</tr>
		<tr class="c-green color-3">
			<td id="c2-1">PG в базе</td>
			<td id="c2-2"><?php echo $pgd_ml; ?></td>
			<td id="c2-3"><?php echo $pgd_g; ?></td>
			<td id="c2-4"><?php echo $e_pg_raznost; ?></td>
		</tr>
		<tr class="c-green color-4">
			<td id="c3-1">VG в базе</td>
			<td id="c3-2"><?php echo $vgd_ml; ?></td>
			<td id="c3-3"><?php echo $vgd_g; ?></td>
			<td id="c3-4"><?php echo $e_vg_raznost; ?></td>
		</tr>

				<tr class="tatal-base c-green color-5" id="total-base">
			<td id="c4-1">Всего в базе</td>
			<td id="c4-2"><?php echo $tb_ml; ?></td>
			<td id="c4-3"><?php echo $tb_g; ?></td>
			<td id="c4-4"><?php echo $tb_proc; ?></td>
		</tr>




		<!-- ингридиенты -->
<?php

if( have_rows('ingredients') ):

 	// loop through the rows of data
    while ( have_rows('ingredients') ) : the_row();


        // данные из произвольных полей поста. Данные ингридиента
      $i_name=  get_sub_field('i_name');
      $i_vol=  get_sub_field('i_vol');
      $i_pg=  get_sub_field('i_pg');
      $i_vg=  get_sub_field('i_vg');
      $i_uv=  get_sub_field('i_uv');

      $e_ml = $atm/100*$i_vol;
      $e_grams = $e_ml*$i_uv;
      // $e_grams = $i_uv;

      // $e_ml_summ +=$e_ml;

      // $e_pg_raznost -= $i_vol/100*$i_pg;
      // $e_vg_raznost -= $i_vol/100*$i_vg;

      // $total_g +=$e_grams;
      // $total_proc +=$i_vol;

            //сумма элементов
      $total_i_pg+=$e_ml;
      $total_i_vg+=$e_grams;
      $total_i_uv+=$i_vol;

?>
		<tr class="c-orange color-6">
			<td><a href="<?php echo site_url(). '/tag/' .name_url($i_name); ?>"><?php echo $i_name; ?></a></td>
			<td><?php echo round($e_ml,2); ?></td>
			<td><?php echo round($e_grams,2); ?></td>
			<td><?php echo round($i_vol,2); //значение элемента?></td>
		</tr>
		<!-- .строка -->

<?php
    endwhile;
else :
    // no rows found
endif;

$total_i_pg=round($total_i_pg,2);
$total_i_vg=round($total_i_vg,2);
$total_i_uv=round($total_i_uv,2);

?>

		<tr class="tatal-base c-orange color-5" id="total">
			<td id="total-1">Всего: </td>
			<td id="total-2"><?php echo $atm; ?></td>
			<td id="total-3"><?php echo round($total_g,2); ?></td>
			<td id="total-4"><?php echo $total_proc; ?></td>
		</tr>
		<tr class="dn c-orange" id="td-etalon">
			<td class="cell-1">0</td>
			<td class="cell-2">0</td>
			<td class="cell-3">0</td>
			<td class="cell-4">0</td>
		</tr>
	</table>
	<div class="info-small">
		<a href="http://xaoc-lab.ru/" class="btn-green buy-arom">купить ароматизаторы</a>
		<p>Крепость: <span><?php echo $ds . " mg"; ?></span></p>
		<p>PG/VG: <span><?php echo $dpg . ' / ' . $dvg; ?></span></p>
		<p>Всего аром.: <span><?php echo $total_i_pg . " ml / " .  $total_i_vg . " g (" . $total_i_uv . "%)" ?></span></p>
	</div>
</div>
<!-- .инфа о рецепте -->




	<div class="o-post-recipes mt33">
		<!-- описание поста -->
		<p class="podzagolovok"><span class="line">Описание</span></p>
		<div class="text-other">
<?php the_content(); // контент?>
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