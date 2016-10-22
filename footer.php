<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
	<footer>
	<!-- по центру -->
			<div class="footer footer-1">
				<div class="w1200">
				<!-- футер 1(верхний) -->
					<?php $args = array( // опции для вывода нижнего меню,
					'theme_location' => 'bottom', // идентификатор меню, определен в register_nav_menus() в function.php
					'container'=> false, // обертка списка, false - это ничего
					'menu_class' => 'bottom-menu', // класс для ul
			  		'menu_id' => 'bottom-nav', // id для ul
			  		);
					//wp_nav_menu($args); // выводим нижние меню
					?>
					<!-- 1 меню футера -->
						<ul class="footer-menu footer-menu-1-ul">
							<li><a href="#">lorem</a></li>
							<li><a href="#">lorem</a></li>
							<li><a href="#">lorem</a></li>
						</ul>

					<!-- 2 меню футера -->
						<ul class="footer-menu footer-menu-2-ul">
							<li><a href="#">lorem</a></li>
							<li><a href="#">lorem</a></li>
							<li><a href="#">lorem</a></li>
							<li><a href="#">lorem</a></li>
							<li><a href="#">lorem</a></li>
						</ul>

					<!-- вход + соцсети -->
					<div class="footer-soc">
						<div class="footer-vhod">
							<a href="#"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/zamok.png">ВОЙТИ</a>
							<a href="#"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/key.png">ЗАРЕГИСТРИРОВАТЬСЯ</a>
						</div>
						<div class="footer-socseti">
							<a href="#" class="vk"></a>
							<a href="#" class="inst"></a>
						</div>
					</div>
				</div>
			</div>
			<!-- футер 2(нижний) -->
			<div class="footer footer-2">
				<div class="w1200">
					<a href="#" class="politika">Политика конфиденциальности</a>
					<a href="#" class="design">DESIGN AGENCY</a>
				</div>
			</div>

	</footer>
<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
</body>
</html>