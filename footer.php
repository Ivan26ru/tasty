<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
<!-- стрелка вверх -->
<div class="up" id="back-top"></div>
</div>
<!-- конец container -->
	<footer>
	<!-- по центру -->
			<div class="footer footer-1">
				<div class="w1200">
				<!-- футер 1(верхний) -->
					<!-- 1 меню футера -->
					<?php $args = array( // опции для вывода нижнего меню,
						'theme_location' => 'footer1', // идентификатор меню, определен в register_nav_menus() в function.php
						'container'=> false, // обертка списка, false - это ничего
						'menu_class' => 'footer-menu footer-menu-1-ul', // класс для ul
			  		);
					wp_nav_menu($args); // выводим нижние меню
					?>

					<!-- 2 меню футера -->
					<?php $args = array( // опции для вывода нижнего меню,
						'theme_location' => 'footer2', // идентификатор меню, определен в register_nav_menus() в function.php
						'container'=> false, // обертка списка, false - это ничего
						'menu_class' => 'footer-menu footer-menu-2-ul', // класс для ul
			  		);
					wp_nav_menu($args); // выводим нижние меню
					?>

					<!-- вход + соцсети -->
					<div class="footer-soc">
						<div class="footer-vhod">
							<a href="#" class="footer-zamok">ВОЙТИ</a>
							<a href="#" class="footer-key">ЗАРЕГИСТРИРОВАТЬСЯ</a>
						</div>
						<div class="footer-socseti">
							<a href="#" class="vk">
								<i class="fa fa-vk" aria-hidden="true"></i>
							</a>
							<a href="#" class="inst">
								<i class="fa fa-instagram" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- футер 2(нижний) -->
			<div class="footer footer-2">
				<div class="w1200">
					<a href="#" class="politika">Политика конфиденциальности</a>
					<a href="#" class="design"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/design.png"></a>
				</div>
			</div>

	</footer>
<div class="loader"></div>

<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/js/jquery.placeholder.min.js'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/js/main.js?<?php $date_css=date('YmdHis'); echo $date_css; // мои стили шаблона ВСЕГДА ОБНОВЛЯЮТСЯ?>'></script>
</body>
</html>