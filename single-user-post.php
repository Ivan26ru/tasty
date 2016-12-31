<?php get_header(); // подключаем header.php ?>

<?php

if ( is_user_logged_in() ) {//условие если залогинен
	?>


<h1>Ваш рецепт отобразиться на сайте, после проверки его администратором сайта</h1>

<?php
// echo('Отправил на утверждение');
// print_r($_POST);
// echo $_POST["title-recipes"];
$cur_user_id = get_current_user_id();//ID текущего пользователя

$title_post = $_POST['title-recipes'];//заголовок
$opisanie = $_POST['opisanie'];//содержимое поста

// ДОБАВЛЕНИЕ ЗАПИСИ ЧЕРЕЗ PHP
// Создаем массив
  $post_data = array(
	 'post_title'    => $title_post,//заголовок
	 'post_content'  => $opisanie,//содержимое поста
	 'post_status'   => 'pending',//на утверждении
	 'post_type'     => 'post',//тип поста (запись)
	 'post_author'   => $cur_user_id,//id от чьего имени публикуется пост
	 'post_category' => array(20)//в каких рубриках состоит
  );

// Вставляем данные в БД
$post_id = wp_insert_post( wp_slash($post_data) );//создаем запись


$key_name='name_element_';//шаблон ключа имени элемента
$key_value='value_element_';//шаблон ключа значения элемента
$num=1;

$key_n_n = $key_value . (string)$num;

// echo "<hr>" . $key_n_n;

while ($_POST[$key_n_n]){//цикл перебора ингридиентов

	$num++;//счетчик для нормального прогона массива
	$schet++;//количество элеменов, счетчик


$key_n_n = $key_name . (string)$schet;//Имя элемента
$key_v_n = $key_value . (string)$schet;//значение элемента


if ($_POST[$key_v_n]) {//если строка наименования пустая, то не считать
	add_post_meta($post_id,'n:'.$_POST[$key_n_n], $_POST[$key_v_n]);//добавляем значение произвольным полям
}//конец условия


};//конец цикла

update_post_meta(246, 'views', '0');//обнуляем популярность ссылки

?>

<!-- дляскрытия хлебных крошек в шапке -->
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

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>