<?php
/**
 * Шаблон Рецепты рубрики (category-recipes.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<!-- Начало рубрики-->

<?php
@session_start();
$_SESSION['a'] = 5;
@session_write_close();

// переменная в сессии будет находиться пока файл
// сессии не будет уничтожен, или переменная из сессии не будет удалена
echo '<!-- test sesion a='.$_SESSION['a'] . '-->';

if(isset($_GET['sort'])) $sort = $_GET['sort'];

// echo $sort;
?>


<h1 class="recipes-h1"><?php single_cat_title();//вывод имени текущей категории ?></h1>

<!-- строка поиска и добавить рецепт -->
<div class="search clearfix">
		<div class="fl search-div">
			<!-- сама форма поиска -->
			<form class="clearfix" id="search_string" method="get" role="search" action="<?php echo home_url( '/' ) ?>category/recipes/" >
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
			<th class="rec-th-name"><p class="podzagolovok">
				<a href="<?php echo get_category_link(20);  ?>?sort=up-name"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-up.png"></a>
			<span class="line">Название</span>
				<a href="<?php echo get_category_link(20);  ?>?sort=down-name"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-down.png"></a>
			</p></th>

			<th class="rec-th-avtor"><p class="podzagolovok">
				<a href="<?php echo get_category_link(20);  ?>?sort=up-author"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-up.png"></a>
			<span class="line">Автор</span>
				<a href="<?php echo get_category_link(20);  ?>?sort=down-author"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-down.png"></a>
			</p></th>

			<th class="rec-th-data"><p class="podzagolovok">
				<a href="<?php echo get_category_link(20);  ?>?sort=up-data"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-up.png"></a>
			<span class="line">Дата</span>
				<a href="<?php echo get_category_link(20);  ?>?sort=down-data"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-down.png"></a>
			</p></th>


			<th class="rec-th-rejting">
				<p class="podzagolovok">
				<a href="<?php echo get_category_link(20);  ?>?sort=up-rejt"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-up.png"></a>
					<span class="line">Рейтинг</span>
				<a href="<?php echo get_category_link(20);  ?>?sort=down-rejt"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/strelka-down.png"></a>
				</p>
			</th>
		</tr>
<?php global $query_string; // параметры базового запроса

switch ($sort) {


    case "up-name":
        query_posts( $query_string.'&order=ASC&posts_per_page=40&orderby=title'); // базовый запрос + свои параметры
        break;
    case "down-name":
        query_posts( $query_string.'&order=DESC&posts_per_page=40&orderby=title'); // базовый запрос + свои параметры
        break;

    case "up-author":
        query_posts( $query_string.'&order=ASC&posts_per_page=40&orderby=author'); // базовый запрос + свои параметры
        break;
    case "down-author":
        query_posts( $query_string.'&order=DESC&posts_per_page=40&orderby=author'); // базовый запрос + свои параметры
        break;

    case "up-data":
        query_posts( $query_string.'&order=DESC&posts_per_page=40&orderby=date'); // базовый запрос + свои параметры
        break;
    case "down-data":
        query_posts( $query_string.'&order=ASC&posts_per_page=40&orderby=date'); // базовый запрос + свои параметры
        break;

    case "up-rejt":
        query_posts( $query_string.'&order=DESC&posts_per_page=40&orderby=meta_value_num&meta_key=ratings_score'); // базовый запрос + свои параметры
        break;
    case "down-rejt":
        query_posts( $query_string.'&order=ASC&posts_per_page=40&orderby=meta_value_num&meta_key=ratings_score'); // базовый запрос + свои параметры
        break;
    default:
        query_posts( $query_string.'&posts_per_page=40'); // базовый запрос + свои параметры
// endswitch;
}




 ?>
<?php //echo $query_string ?>


		<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>

		<!-- пост -->
		<tr class="tr">
			<td class="rec-td-name"><a href="<?php the_permalink() ?>" class=""><?php the_title(); ?></a></td>
			<td class="rec-td-avtor"><?php the_author(); ?></td>
			<td class="rec-td-data"><?php the_time('j F H:i'); ?></td>
			<td class="rec-td-rejting">
				<div class="rejt-vol">
					<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
				</div>
			</td>
		</tr>
		<!-- .пост -->

	<?php endwhile; // конец цикла
	else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишим "простите" ?>
	</table>
</div>

<?php //the_posts_pagination(); ?>

<?php //echo do_shortcode('[ajax_load_more container_type="div" post_type="post" button_label="читать дальше ..."]'); //вывод аякс подгрузки постов ?>

<?php pagination(); // пагинация, функция нах-ся в function.php ?>
<?php wp_reset_query(); // сброс запроса ?>


<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>