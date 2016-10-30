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
} elseif (in_category('company')) { //компании
	include(TEMPLATEPATH.'/single-company.php');
	exit;
} elseif (in_category('video')) { //видео
	include(TEMPLATEPATH.'/single-video.php');
	exit;
} elseif (in_category('recipes')) { //рецепты
	include(TEMPLATEPATH.'/single-recipes.php');
	exit;
	} elseif (in_category('recipes-admin')) { //рецепты админка
	include(TEMPLATEPATH.'/single-recipes-admin.php');
	exit;
	} elseif (in_category('article')) { //рецепты админка
	include(TEMPLATEPATH.'/single-article.php');
	exit;
} else{//общий шаблон
    include (TEMPLATEPATH.'/single-all.php');
    exit;
}
?>