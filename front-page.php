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
					<span class="data data-block">09.08.2016</span>
					<p class="title title-block">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</p>
					<p class="text text-block">Баланс представления, качества и цены – залог успеха. Сегодня я хочу рассказать о линейке жидкости ZE-PAR, оригинальной в подаче, вкусной в содержании, доступной в цене.</p>
					<a href="#" class="read-all read-all-block">читать полностью...</a>
				</div>

			</div>
			<!-- правая колонка -->
			<div class="block block-right">
				<a href="#" class="zagolovok"><span class="line">vape новости</span></a>
				<div class="img-colomn vipe-news"></div>
				<!-- краткое описание новости -->
				<div class="news clearfix">
					<span class="data data-block">09.08.2016</span>
					<p class="title title-block">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</p>
					<p class="text text-block">Баланс представления, качества и цены – залог успеха. Сегодня я хочу рассказать о линейке жидкости ZE-PAR, оригинальной в подаче, вкусной в содержании, доступной в цене.</p>
					<a href="#" class="read-all read-all-block">читать полностью...</a>
				</div>

			</div>
		</article>
		<!-- другие посты с картинками -->
		<div class="div-post-other">
			<!-- пост -->
			<div class="post-other">
			<!-- миниатюра поста -->
				<div class="post-other-img">
					<img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/img-post.png">
					<div class="post-other-black-info">
						<span class="data data-other">09.08.2016</span>
						<a href="" class="read-all read-all-other">Читать полностью...</a>
					</div>
				</div>
				<!-- анонс поста -->
				<div class="post-other-info">
					<div class="va-c">
						<p class="title title-other">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</p>
						<p class="text text-other">Баланс представления, качества и цены – залог успеха. Сегодня я хочу рассказать о линейке жидкости ZE-PAR, оригинальной в подаче, вкусной в содержании, доступной в цене.</p>
					</div>
				</div>
			</div>
			<!-- конец поста -->
						<!-- пост -->
			<div class="post-other">
			<!-- миниатюра поста -->
				<div class="post-other-img">
					<img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/img-post.png">
					<div class="post-other-black-info">
						<span class="data data-other">09.08.2016</span>
						<a href="" class="read-all read-all-other">Читать полностью...</a>
					</div>
				</div>
				<!-- анонс поста -->
				<div class="post-other-info">
					<div class="va-c">
						<p class="title title-other">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</p>
						<p class="text text-other">Баланс представления, качества и цены – залог успеха. Сегодня я хочу рассказать о линейке жидкости ZE-PAR, оригинальной в подаче, вкусной в содержании, доступной в цене.</p>
					</div>
				</div>
			</div>
			<!-- конец поста -->
						<!-- пост -->
			<div class="post-other">
			<!-- миниатюра поста -->
				<div class="post-other-img">
					<img src="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/img/png/img-post.png">
					<div class="post-other-black-info">
						<span class="data data-other">09.08.2016</span>
						<a href="" class="read-all read-all-other">Читать полностью...</a>
					</div>
				</div>
				<!-- анонс поста -->
				<div class="post-other-info">
					<div class="va-c">
						<p class="title title-other">Обзор жидкости ZE-PAR – Креатив и фантазия и все такое</p>
						<p class="text text-other">Баланс представления, качества и цены – залог успеха. Сегодня я хочу рассказать о линейке жидкости ZE-PAR, оригинальной в подаче, вкусной в содержании, доступной в цене.</p>
					</div>
				</div>
			</div>
			<!-- конец поста -->
		</div>
		<!-- конец раздела других постов -->

		<!-- пагинация(номера страниц) -->
		<div class="pagination-index">
			<ul class="page-numbers">
				<li><a class="prev page-numbers" href="#">Назад</a></li>
				<li><a class="page-numbers" href="#">1</a></li>
				<li><a class="page-numbers" href="#">2</a></li>
				<li><a class="page-numbers" href="#">3</a></li>
				<li><span class="page-numbers current">4</span></li>
				<li><a class="page-numbers" href="#">5</a></li>
				<li><a class="page-numbers" href="#">6</a></li>
				<li><a class="page-numbers" href="#">7</a></li>
				<li><a class="page-numbers" href="#">8</a></li>
				<li><a class="next page-numbers" href="#">Вперед</a></li>
			</ul>
		</div>
		<!-- конец пагинаци -->
	</section>

<!-- правый сайдбар -->
<sidebar>
сайтбар
</sidebar>
</div>
<!-- конец container -->

<?php get_footer(); // подключаем footer.php ?>