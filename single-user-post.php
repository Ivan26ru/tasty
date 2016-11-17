<?php get_header(); // подключаем header.php ?>

<h1>Ваш рецепт отобразиться на сайте, после проверки его администратором сайта</h1>

<?php
// echo('Отправил на утверждение');
// print_r($_POST);
// echo $_POST["title-recipes"];

$title_post = $_POST['title-recipes'];
$opisanie = $_POST['opisanie'];

// ДОБАВЛЕНИЕ ЗАПИСИ ЧЕРЕЗ PHP
// Создаем массив
  $post_data = array(
	 'post_title'    => $title_post,
	 'post_content'  => $opisanie,
	 'post_status'   => 'pending',
	 'post_type'     => 'post',
	 'post_author'   => 1,
	 'post_category' => array(20)
  );

// Вставляем данные в БД
$post_id = wp_insert_post( wp_slash($post_data) );//создаем запись

// echo "название поста " . $title_post;
// echo "описание поста " . $opisanie;



$key_name='name_element_';//шаблон ключа имени элемента
$key_value='value_element_';//шаблон ключа значения элемента
$num=1;

$key_n_n = $key_value . (string)$num;

// echo "<hr>" . $key_n_n;

while ($_POST[$key_n_n]){

	$num++;//счетчик для нормального прогона массива
	$schet++;//количество элеменов, счетчик
	// echo "<br>" . $num;
	// echo "<br>" . $schet;

// echo $key_n_n;
    // echo $_POST[$key_n_n];


// if ($_POST[$key_n_n]) {
//     echo "Массив содержит элемент 'first'.";
//     // echo $_POST['$key_n_n'];

// }

$key_n_n = $key_name . (string)$schet;//Имя элемента
$key_v_n = $key_value . (string)$schet;//значение элемента

// echo "<hr><hr>";

// echo $_POST[$key_n_n];
// echo "<br>";
// echo $_POST[$key_v_n];

	// echo "<br> сколько полей" . $key_n;
	// $key_n=$key_n+1;
if ($_POST[$key_v_n]) {
	add_post_meta($post_id,'n:'.$_POST[$key_n_n], $_POST[$key_v_n]);//добавляем значение произвольным полям
}


};

update_post_meta(246, 'views', '0');//убираем популярность ссылки

?>

<style>
	.put{
		display: none;
	}
</style>

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>