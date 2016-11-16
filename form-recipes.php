<?php
echo('Отправил на утверждение');
print_r($_POST);
// echo $_POST["title-recipes"];

$title_post = $_POST['title-recipes'];
$opisanie = $_POST['opisanie'];


echo "название поста " . $title_post;
echo "описание поста " . $opisanie;



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

echo $key_n_n;
    echo $_POST[$key_n_n];


// if ($_POST[$key_n_n]) {
//     echo "Массив содержит элемент 'first'.";
//     // echo $_POST['$key_n_n'];

// }

$key_v_n = $key_name . (string)$schet;//Имя элемента
$key_n_n = $key_value . (string)$schet;//значение элемента

// echo "<hr><hr>";

// echo $_POST[$key_n_n];
// echo "<br>";
// echo $_POST[$key_v_n];

	// echo "<br> сколько полей" . $key_n;
	// $key_n=$key_n+1;


};


?>