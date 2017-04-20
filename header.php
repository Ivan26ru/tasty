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
	<!-- РАЗРАБОТКА САЙТОВ https://vk.com/ivan26ru -->
	<meta charset="<?php bloginfo( 'charset' ); // кодировка ?>">
	<?php /* RSS и всякое */ ?>
	<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/style.css?<?php $date_css=date('YmdHis'); echo $date_css; // мои стили шаблона ВСЕГДА ОБНОВЛЯЮТСЯ?>">
	<!-- карусель -->
	<!-- Important Owl stylesheet -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/owl-carousel/owl.carousel.css">

<!-- Default Theme -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/owl-carousel/owl.theme.css">
	 <!--[if lt IE 9]>
	 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	 <![endif]-->
	 <title><?php typical_title(); // выводи тайтл, функция лежит в function.php ?></title>
	<?php wp_head(); // необходимо для работы плагинов и функционала ?>
</head>
<body <?php body_class(); // все классы для body ?>>
<?php include('vhod_wp.php') ?>
	<header>

<!-- верхняя линия -->
<div class="line-top-white">
	<div class="w1200">
		<!-- лого сайта -->
		<div class="div-logo"><a href="<?php echo site_url(); ?>"></a></div>

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
			<?php if ( is_user_logged_in() ) {//условие залогиненности |-> Если пользователь залогинен
	?>
	<span>Добро пожаловать <?php
 	global $current_user;
	get_currentuserinfo();
	echo  '<b>' . $current_user->display_name . '</b>';?>
	</span>
<a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Выход">Выход</a>
	<?php
}
else { //если ни залогинен?>
				<a href="<?php echo site_url(); ?>\wp-login.php" id="a-form-vhod"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/zamok.png">ВОЙТИ</a>
				<a href="<?php echo site_url(); ?>\wp-login.php?action=register"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/key.png">ЗАРЕГИСТРИРОВАТЬСЯ</a>
<?php
}//.условие залогиненности ?>
			</div>
		</div>
	</div>
</div>

<!-- линия пониже(черная) -->
<div class="line-top-black">
	<div class="w1200">
		<?php $args = array( // опции для вывода верхнего меню, чтобы они работали, меню должно быть создано в админке
			'theme_location' => 'top', // идентификатор меню, определен в register_nav_menus() в function.php
			'container'=> '', // обертка списка
			'menu_class' => 'ul-top-2', // класс для ul
'link_before'          => '<span class="line-menu">',              // (string) Текст перед <a> каждой ссылки
	'link_after'           => '</span>',              // (string) Текст после </a> каждой ссылки
  			);
			wp_nav_menu($args); // выводим верхнее меню
		?>
	</div>
</div>
	</header>
	<!-- основа сайта-->
<div class="container clearfix">
<!-- контент -->
	<section>
