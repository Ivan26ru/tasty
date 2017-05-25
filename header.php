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
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

		<div class="menu-user mobile">
			<!-- поиск -->
			<!-- сама форма поиска -->
			<form class="header-form" id="search_string" method="get" role="search" action="<?php echo home_url( '/' ) ?>" >
				<!-- строка поиска -->
				<input class="search-text" type="text" placeholder="поиск" name="s" id="s">
				<!-- кнопка поиска -->
				<button class="search-button" type="submit" id="searchsubmit" ><i class="fa fa-search" aria-hidden="true"></i></button>
			</form>
			<!-- .поиск -->
		</div>

		<!-- верхнее меню, форма входа -->
		<div class="menu-user not-mobile">

		<!-- верхнее меню 1 -->
				<?php $args = array( // опции для вывода верхнего меню, чтобы они работали, меню должно быть создано в админке
				'theme_location' => 'topup', // идентификатор меню, определен в register_nav_menus() в function.php
				'container'=> '', // обертка списка
				'menu_class' => 'ul-top-1' // класс для ul
	  			);
				wp_nav_menu($args); // выводим верхнее меню
			?>
		<!-- .верхнее меню 1 -->

<!-- поиск -->
			<!-- сама форма поиска -->
			<form class="header-form" id="search_string" method="get" role="search" action="<?php echo home_url( '/' ) ?>" >
				<!-- строка поиска -->
				<input class="search-text" type="text" placeholder="поиск" name="s" id="s">
				<!-- кнопка поиска -->
				<button class="search-button" type="submit" id="searchsubmit" ><i class="fa fa-search" aria-hidden="true"></i></button>
			</form>
<!-- .поиск -->

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
			<!-- .vhod -->


		</div>
	</div>
</div>

<!-- линия пониже(черная) -->
<div class="line-top-black">
	<div class="w1200">
		<span class="mobile get-menu"><i class="fa fa-bars" aria-hidden="true"></i></span>
		<div class="mobile-menu">
			<div class="menu-user">

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
					<ul>
						<li><a href="<?php echo site_url(); ?>\wp-login.php" id="a-form-vhod"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/zamok.png">ВОЙТИ</a></li>
						<li><a href="<?php echo site_url(); ?>\wp-login.php?action=register"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/key.png">ЗАРЕГИСТРИРОВАТЬСЯ</a></li>
					</ul>
				<?php
				}//.условие залогиненности ?>
				</div>
				<!-- .vhod -->

			</div>
			<?php $args = array( // опции для вывода верхнего меню, чтобы они работали, меню должно быть создано в админке
				'theme_location' => 'top', // идентификатор меню, определен в register_nav_menus() в function.php
				'container'=> '', // обертка списка
				'menu_class' => 'ul-top-2', // класс для ul
	'link_before'          => '<span class="line-menu">',              // (string) Текст перед <a> каждой ссылки
		'link_after'           => '</span>',              // (string) Текст после </a> каждой ссылки
	  			);
				wp_nav_menu($args); // выводим верхнее меню
			?>

			<!-- верхнее меню 1 -->
					<?php $args = array( // опции для вывода верхнего меню, чтобы они работали, меню должно быть создано в админке
					'theme_location' => 'topup', // идентификатор меню, определен в register_nav_menus() в function.php
					'container'=> '', // обертка списка
					'menu_class' => 'ul-top-1' // класс для ul
		  			);
					wp_nav_menu($args); // выводим верхнее меню
				?>
			<!-- .верхнее меню 1 -->
		</div>
		<div class="not-mobile">
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
</div>

<div class="mobile"><?php $mobile = true; include('slider.php'); $mobile = false; ?></div>
		<!-- лучшие девайсы -->
		<div class="best-device mobile">
			<a href="<?php echo get_category_link( '10' ); ?>" class="get-device">лучшие девайсы</a>
			<ul class="mobile-device">
				<li><a href="<?php echo site_url(); ?>/category/best_device/box_mods/" class="best-device-a d1"><span>BOX MODS</span></a></li>
				<li><a href="<?php echo site_url(); ?>/category/best_device/mechanical_mod/" class="best-device-a d2"><span>Mechanical  Mod</span></a></li>
				<li><a href="<?php echo site_url(); ?>/category/best_device/rdas/" class="best-device-a d3"><span>RDas</span></a></li>
				<li><a href="<?php echo site_url(); ?>/category/best_device/sub_ohm_tanks/" class="best-device-a d4"><span>Sub ohm  tanks</span></a></li>
				<li><a href="<?php echo site_url(); ?>/category/best_device/battary_chargers/" class="best-device-a d5"><span>battery  chargers</span></a></li>
				<li><a href="<?php echo site_url(); ?>/category/best_device/batteries/" class="best-device-a d6"><span>batteries</span></a></li>
			</ul>
		</div>
	</header>
	<!-- основа сайта-->
	<div class="wrap">
<div class="container clearfix">
<!-- контент -->
	<section>
