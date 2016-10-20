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