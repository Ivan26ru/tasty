<?php get_header(); // подключаем header.php ?>

<?php

if ( is_user_logged_in() ) {//условие если залогинен
	?>


<h1>Ваш рецепт отобразиться на сайте, после проверки его администратором сайта</h1>

<?php
// echo('Отправил на утверждение');
// print_r($_POST);
// echo $_POST["i_post_id"];

$recept=$_POST["i_post_id"];//данные рецепта json + экранированные кавычки
$recept=stripslashes($recept);//убрал экранирование кавычек

$recept=json_decode($recept);//декодировал json преобразовал в массив
// print_r($recept);//проверка массива

$cur_user_id = get_current_user_id();//ID текущего пользователя

$title_post = stripslashes($_POST['title-recipes']);//заголовок
$opisanie = stripslashes($_POST['opisanie']);//содержимое поста

unset($post_tags);
foreach ($recept[0] as $key => $value) {//присваивание имени
	$post_tags[]=$value[0];//имя
};

// print_r($post_tags); //проверяем заполненность тегов

// ДОБАВЛЕНИЕ ЗАПИСИ ЧЕРЕЗ PHP
// Создаем массив
  $post_data = array(
	 'post_title'    => $title_post,//заголовок
	 'post_content'  => $opisanie,//содержимое поста
	 'post_status'   => 'pending',//на утверждении
	 'post_type'     => 'post',//тип поста (запись)
	 'post_author'   => $cur_user_id,//id от чьего имени публикуется пост
	 'post_category' => array(20),//в каких рубриках состоит
	 'tags_input'	 => $post_tags//добавляем теги данной записи, выбирая их из названий ингридиентов
  );

// Вставляем данные произвольны полей в БД
$post_id = wp_insert_post( wp_slash($post_data) );//создаем запись

// произвольные поля

// данные самого рецепта
$atm	=	$recept[1][0];
$ds		=	$recept[1][1];
$dpg	=	$recept[1][2];
$dvg	=	$recept[1][3];
$ns		=	$recept[1][4];
$pgc	=	$recept[1][5];
$vgc	=	$recept[1][6];
$ingredients_kolvo=count($recept[0]);//количество ингредиентов

// добавляю данные рецепта в произвольные поля
add_post_meta($post_id,'atm',$atm);
add_post_meta($post_id,'ds',$ds);
add_post_meta($post_id,'dpg',$dpg);
add_post_meta($post_id,'dvg',$dvg);
add_post_meta($post_id,'ns',$ns);
add_post_meta($post_id,'pgc',$pgc);
add_post_meta($post_id,'vgc',$vgc);

// довляют количество ингридиентов в произвольные поля
add_post_meta($post_id,'ingredients',$ingredients_kolvo);//добавляем значение произвольным полям

// добавляю ингридиенты с их свойствами в произвольные поля
foreach ($recept[0] as $key => $value) {//перевор массива данные ингредиента
	add_post_meta($post_id,'ingredients_' .$key. '_i_name',addslashes($value[0]));//имя
	add_post_meta($post_id,'ingredients_' .$key. '_i_vol',$value[1]);//количество
	add_post_meta($post_id,'ingredients_' .$key. '_i_pg',$value[2]);//pg
	add_post_meta($post_id,'ingredients_' .$key. '_i_vg',$value[3]);//vg
	add_post_meta($post_id,'ingredients_' .$key. '_i_uv',$value[4]);//uv удельный вес
};

update_post_meta(246, 'views', '0');//обнуляем популярность ссылки

?>

<!-- для скрытия хлебных крошек в шапке -->
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

<?php
//print_r($recept); //просмотр / проверка массива данных ингридиента
?>

<?php get_sidebar(); // подключаем footer.php ?>
<?php get_footer(); // подключаем footer.php ?>