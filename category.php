<?php
/**
 * Шаблон рубрики (category.php)
 * @package WordPress
 * @subpackage your-clean-template
 */

$current_category = single_cat_title('', 0);
// if($current_category=="box_mods"){
// 	include('category-rdas.php');
// 	exit;
// }

switch ($current_category) {
	case "best_device":
		include('category-rdas.php');
		break;

	case "box_mods":
		include('category-rdas.php');
		break;

	case "battary_chargers":
		include('category-rdas.php');
		break;

	case "batteries":
		include('category-rdas.php');
		break;

	case "mechanical_mod":
		include('category-rdas.php');
		break;

	case "sub_ohm_tanks":
		include('category-rdas.php');
		break;

	default:
		include('category-all.php');
		break;
}
?>