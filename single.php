<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<?php
  if ( in_category( 'news' )) {
    include 'single-290.php';
} elseif ( in_category('blog') {
    include 'single-291.php';
} else {
    include 'single-all.php';
}
?>