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
			<div class="block block-left">left</div>
			<div class="block block-right">right</div>
		</article>
	</section>

<!-- правый сайдбар -->
<sidebar>
сайтбар
</sidebar>

</div>

<?php get_footer(); // подключаем footer.php ?>