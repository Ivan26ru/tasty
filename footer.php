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
<!-- Yandex.Metrika counter --> 
<script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter41269184 = new Ya.Metrika({ id:41269184, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> 
<!-- /Yandex.Metrika counter -->
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
						<?php if ( is_user_logged_in() ) {//условие залогиненности |-> Если пользователь залогинен
							?>
							<a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Выход">Выход</a>
							<?php 
						}else{
						?>
							<a href="<?php echo site_url(); ?>\wp-login.php" class="footer-zamok">ВОЙТИ</a>
							<a href="<?php echo site_url(); ?>\wp-login.php?action=register" class="footer-key">ЗАРЕГИСТРИРОВАТЬСЯ</a>
							<?php } ?>
						</div>
						<div class="footer-socseti">
							<a href="<?php $link_vk = get_post_meta( '2', 'link_vk', true ); echo $link_vk; ?>" class="vk">
								<i class="fa fa-vk" aria-hidden="true"></i>
							</a>
							<a href="<?php $link_ok = get_post_meta( '2', 'link_ok', true ); echo $link_ok; ?>" class="inst">
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
					<a href="http://expert-convertion.ru/?utm_sourse=tastyvape.ru" class="design"><img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/design.png"></a>
				</div>
			</div>

	</footer>
<div class="loader"></div>

<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/js/jquery.placeholder.min.js'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/js/main.js?<?php $date_css=date('YmdHis'); echo $date_css; // мои стили шаблона ВСЕГДА ОБНОВЛЯЮТСЯ?>'></script>
</body>
</html>