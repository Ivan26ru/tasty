<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); // вывод атрибутов языка ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); // кодировка ?>">
	<?php /* RSS и всякое */ ?>
	<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/style.css?<?php $date_css=date('YmdHis'); echo $date_css; // мои стили шаблона ВСЕГДА ОБНОВЛЯЮТСЯ?>">
	 <!--[if lt IE 9]>
	 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	 <![endif]-->
	<title><?php typical_title(); // выводи тайтл, функция лежит в function.php ?></title>
	<?php wp_head(); // необходимо для работы плагинов и функционала ?>
</head>
<body <?php body_class(); // все классы для body ?>>
	<header>

<!-- верхняя линия -->
<div class="line-top-white">
	<div class="w1200">
		<!-- лого сайта -->
		<div class="div-logo"></div>
		<!-- верхнее меню, форма входа -->
		<div class="menu-user">

		<!-- верхнее меню 1 -->
				<?php $args = array( // опции для вывода верхнего меню, чтобы они работали, меню должно быть создано в админке
				'theme_location' => 'topup', // идентификатор меню, определен в register_nav_menus() в function.php
				'container'=> '', // обертка списка
				'menu_class' => 'ul-top-1' // класс для ul
	  			);
				wp_nav_menu($args); // выводим верхнее меню
			?>
			<div class="vhod btn-top-1">
				<a href="#">ВОЙТИ</a>
				<a href="#">ЗАРЕГИСТРИРОВАТЬСЯ</a>
			</div>
		</div>
	</div>
</div>

<!-- линия пониже(черная) -->
<div class="line-top-black">
	<div class="w1200">

	</div>
</div>



		<?php $args = array( // опции для вывода верхнего меню, чтобы они работали, меню должно быть создано в админке
			'theme_location' => 'top', // идентификатор меню, определен в register_nav_menus() в function.php
			'container'=> 'nav', // обертка списка
			'menu_class' => 'bottom-menu', // класс для ul
	  		'menu_id' => 'bottom-nav', // id для ul
  			);
			//wp_nav_menu($args); // выводим верхнее меню
		?>
	</header>