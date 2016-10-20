<?php
/**
 * Шаблон главной страницы (front-page.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<!-- основа сайта-->
<div class="container">
<!-- контент -->
	<section>
		<article>
			<div class="block block-left">
				<a href="#" class="zagolovok"><span class="line">МИКСОЛОГИЯ</span></a>
				<div class="mixologiya"></div>
				<div class="news">
					<span class="data">09.08.2016</span>
					<p class="title">Обзор жидкости ZE-PAR –
Креатив и фантазия и все такое</p>
					<p class="text">Баланс представления, качества и цены - залог успеха. Сегодня я хочу рассказать о линейке жидкости ZE-PAR, оригинальной в подаче, вкусной в содержании, доступной в цене</p>
					<a href="#" class="read-all">читать полностью...</a>
				</div>

			</div>
			<div class="block block-right">
				<a href="#" class="zagolovok"><span class="line">vape новости</span></a>
			</div>
		</article>
	</section>

<!-- правый сайдбар -->
<sidebar>
сайтбар
</sidebar>

</div>

<?php get_footer(); // подключаем footer.php ?>