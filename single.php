<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<?php

//раскадываем шаблоны страниц по рубрикам

if (in_category('shares')) { //акции
	include(TEMPLATEPATH.'/single-shares.php'); 
	exit;
} else {//общий шаблон
    include (TEMPLATEPATH.'/single-all.php');
    exit;
}ж
?>