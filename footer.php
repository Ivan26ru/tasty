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
					wp_nav_menu($args); // выводим нижние меню
					?>
				</div>
			</div>
			<!-- футер 2(нижний) -->
			<div class="footer footer-2">
				<div class="w1200">
					футер 2
				</div>
			</div>

	</footer>
<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
</body>
</html>