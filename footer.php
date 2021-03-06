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
							<a href="<?php $link_twitter = get_post_meta( '2', 'link_twitter', true ); echo $link_twitter; ?>" class="inst">
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>
			</div>


	</footer>
<div class="loader"></div>

<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/js/jquery.placeholder.min.js'></script>

<!-- автонаполнение jq ui -->
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<script type='text/javascript' src='<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/js/jquery-ui.js'></script>

<script type='text/javascript' src='<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/js/main.js'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/js/myrecipe.js'></script>

<!-- настройки слайдера на главной -->
<script>
jQuery(document).ready(function() {
	// alert(jQuery.fn.jquery);
	jQuery("#owl-example, #owl-example-mobile, #owl-example-baner-1, #owl-example-baner-2, #owl-example-baner-3").owlCarousel({
	    autoPlay : 3000,
	    stopOnHover : true,
	    // navigation:true,
	    paginationSpeed : 3000,
	    goToFirstSpeed : 3000,
	    singleItem : true,
	    autoHeight : false,
	    transitionStyle:"fade"
	});

});
</script>

<?php if (get_the_ID()=='98')://срипт для автозаполнения рецептов ?>
<script>
    var availableTags = new Array(),
    	availableList = new Array();

  jQuery( function() {



<?php $args = array(
						'post_type'=>'ingredients',//какие посты выбирать
						'orderby'=> 'title',//сотрировка по дате
						'order' => 'ASC',//обратный порядок
						'posts_per_page' =>-1//количество выводимых постов
					);

$query = new WP_Query( $args );
while ( $query->have_posts() ) {
	$query->the_post();
	?>
<?php
	// echo the_title();
 ?>
        <?php
        // присваиваем данные из произвольных полей
		$post_id = get_the_ID();
        $i_name = get_the_title();
        $i_pg = get_post_custom_values('i_pg')[0];
        $i_vg = get_post_custom_values('i_vg')[0];
        $i_uv = get_post_custom_values('i_uv')[0];


        echo 'availableTags.push("' . $i_name . '");';//присваиваем массиву имена ингридиентов
        echo 'availableList["' . $i_name . '"]=["' . $i_pg .'", "' . $i_vg .'", "' . $i_uv .'", "' . $post_id .'"];';//создаем многомерный массив, ключ - имя ингридиента
        ?>
	<?php } ?>
    	<?php wp_reset_postdata(); ?>
<!-- конец постов -->
    jQuery( "#e_name" ).autocomplete({//условия для автонаполнения
      source: availableTags,//передаем массив имен
      minLength: 2,// минимальное количество символов
      //disabled: true,//автонаполнение
      delay: 1000,//задержка
      width:500,
      autoFill: true
    });//.условия для автонаполнения

	jQuery('#ui-id-1').width(200);
  } );
  </script>
<?php endif ?>

</body>
</html>