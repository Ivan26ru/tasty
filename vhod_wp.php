<div class="div-form-vhod dn" id="div-form-vhod">
<!-- 			
		<form name="loginform" id="loginform" action="http://test1.v-svetlograde.ru/wp-login.php" method="post">
			
			<p class="login-username">
				<label for="user_login">Имя пользователя или e-mail</label>
				<input type="text" name="log" id="user_login" class="input" value="" size="20">
			</p>
			<p class="login-password">
				<label for="user_pass">Пароль</label>
				<input type="password" name="pwd" id="user_pass" class="input" value="" size="20">
			</p>
			
			<p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Запомнить меня</label></p>
			<p class="login-submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Войти">
				<input type="hidden" name="redirect_to" value="http://test1.v-svetlograde.ru/">
			</p>
			
		</form>	
 -->



                    <!-- начало табов -->
                    <div class="div-tabs">
                        <!-- кнопки -->
                        <ul class="tab-ul">
                            <li class="active"><a id="tab-1" href="#tab-1">Вход</a></li>
                            <li><a id="tab-2" href="#tab-2">Регистрация</a></li>
                        </ul>
                        <!-- отображение -->
                        <div class="panels clearfix">
                            <div class="panel-wrapper">
                            <!-- окно1 -->
                                <div id="tab-div-1" class="panel">
                                    <?php if ( ! is_user_logged_in() ) : ?>

						<?php 
						// настройка формы входа
$args = array(
	'echo'           => true,
	'redirect'       => site_url( $_SERVER['REQUEST_URI'] ), 
	'form_id'        => 'loginform',
	'label_username' => __( '' ),
	'label_password' => __( '' ),
	'label_remember' => __( '' ),
	'label_log_in'   => __( 'Log In' ),
	'id_username'    => 'user_login',
	'id_password'    => 'user_pass',
	'id_remember'    => 'rememberme',
	'id_submit'      => 'wp-submit',
	'remember'       => false,
	'value_username' => NULL,
	'value_remember' => false 
);
						wp_login_form( $args );
			// Ссылки на регистрацию и случай, если пароль утерян: ?>

			<?php wp_register(); ?>
			<li><a href="<?php echo wp_lostpassword_url(); ?>"><?php _e('Lost Password'); ?></a></li>
			</ul>
		<?php endif; ?>
                                </div>

                                <!-- окно2 -->
                                <div id="tab-div-2" class="panel dn">
<?php //echo do_shortcode('[wppb-register]'); ?>
<?php //echo do_shortcode('[clean-login-register]'); ?>
<?php //login_with_ajax () ?>
<a href="<?php echo esc_url( site_url( 'wp-login.php?action=register', 'login' ) ); ?>"><?php _e( 'Register' ); ?></a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- конец табов -->
 </div>