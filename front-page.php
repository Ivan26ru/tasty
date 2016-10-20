<?php
/**
 * Шаблон главной страницы (front-page.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<!-- основа сайта-->
<div class="container clearfix">
<!-- контент -->
	<section>
	<!-- основное содержание -->
	<!-- разделение на 2 колонки -->
		<article class="clearfix">
		<!-- левая колонка -->
			<div class="block block-left">
				<a href="#" class="zagolovok"><span class="line">МИКСОЛОГИЯ</span></a>
				<div class="img-colomn mixologiya"></div>
				<!-- краткое описание новости -->
				<div class="news clearfix">
					<span class="data">09.08.2016</span>
					<p class="title">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</p>
					<p class="text">Баланс представления, качества и цены – залог успеха. Сегодня я хочу рассказать о линейке жидкости ZE-PAR, оригинальной в подаче, вкусной в содержании, доступной в цене.</p>
					<a href="#" class="read-all">читать полностью...</a>
				</div>
				<!-- краткое описание новости -->
				<div class="news clearfix">
					<span class="data">09.08.2016</span>
					<p class="title">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</p>
					<p class="text">Баланс представления, качества и цены – залог успеха. Сегодня я хочу рассказать о линейке жидкости ZE-PAR, оригинальной в подаче, вкусной в содержании, доступной в цене.</p>
					<a href="#" class="read-all">читать полностью...</a>
				</div>

			</div>
			<!-- правая колонка -->
			<div class="block block-right">
				<a href="#" class="zagolovok"><span class="line">vape новости</span></a>
				<div class="img-colomn vipe-news"></div>
				<!-- краткое описание новости -->
				<div class="news clearfix">
					<span class="data">09.08.2016</span>
					<p class="title">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</p>
					<p class="text">Баланс представления, качества и цены – залог успеха. Сегодня я хочу рассказать о линейке жидкости ZE-PAR, оригинальной в подаче, вкусной в содержании, доступной в цене.</p>
					<a href="#" class="read-all">читать полностью...</a>
				</div>
				<!-- краткое описание новости -->
				<div class="news clearfix">
					<span class="data">09.08.2016</span>
					<p class="title">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</p>
					<p class="text">Баланс представления, качества и цены – залог успеха. Сегодня я хочу рассказать о линейке жидкости ZE-PAR, оригинальной в подаче, вкусной в содержании, доступной в цене.</p>
					<a href="#" class="read-all">читать полностью...</a>
				</div>
			</div>
		</article>
		<!-- другие посты с картинками -->
		<div class="div-post-other">
			<!-- пост -->
			<div class="post-other">
				<div class="post-other-img">
					<img src="img/png/img-post.png">
					<span class="data">09.08.2016</span>
					<a href="" class="read-all">Читать полностью...</a>
				</div>
				<div class="post-other-info">
					<p class="title">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</p>
					<p class="text">Баланс представления, качества и цены – залог успеха. Сегодня я хочу рассказать о линейке жидкости ZE-PAR, оригинальной в подаче, вкусной в содержании, доступной в цене.</p>
				</div>
			</div>
		</div>
	</section>

<!-- правый сайдбар -->
<sidebar>
сайтбар
</sidebar>

</div>

<?php get_footer(); // подключаем footer.php ?>