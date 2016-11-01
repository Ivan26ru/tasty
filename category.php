<?php
/**
 * Шаблон рубрики (category.php)
 * @package WordPress
 * @subpackage your-clean-template
 */

$current_category = get_the_category()[0]->slug;;//slug ярлык текущей категории
switch ($current_category) {
	//девайсы
	case "box_mods":
		include('main-category-rdas.php');
		break;

	case "battary_chargers":
		include('main-category-rdas.php');
		break;

	case "batteries":
		include('main-category-rdas.php');
		break;

	case "mechanical_mod":
		include('main-category-rdas.php');
		break;

	case "rdas":
		include('main-category-rdas.php');
		break;

	case "sub_ohm_tanks":
		include('main-category-rdas.php');
		break;

	case "best_device":
		include('main-category-rdas.php');
		break;

	case "events"://мероприятия
		include('category-shares.php');
		break;


	default://шаблон категории по умолчанию
		include('category-all.php');
		break;
}
?>