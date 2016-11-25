<!-- другие посты с картинками -->
		<div class="div-post-other">



	<!-- посты из цикла -->


<?php $args = array( 	'cat' => array('7','4'),
						'post_type'=>'post',
  'posts_per_page'         => '5',
  'posts_per_archive_page' => '5',
						'post__not_in'=> $post_front_top //исключить посты, указанные выше(РАБОТАЕТ)
 );
$query = new WP_Query( $args );
while ( $query->have_posts() ) {
	$query->the_post(); ?>

			<!-- пост -->
			<div class="post-other">
			<!-- миниатюра поста -->
				<div class="post-other-img">

<?php 	if ( has_post_thumbnail() ) the_post_thumbnail(array(420,167)); // выводим миниатюру поста, если есть
						else echo '<img src="http://placehold.it/420x167/2ecc71/ecf0f1">';?>
					<div class="post-other-black-info">
						<span class="data data-other"><?php the_time('d.m.Y'); ?></span>
						<a href="<?php the_permalink() ?>" class="read-all read-all-other">Читать полностью...</a>
					</div>
				</div>
				<!-- анонс поста -->
				<div class="post-other-info">
					<div class="va-c">
						<p class="title title-other"><?php the_title(); ?></p>
						<p class="text text-other"><?php the_truncated_post( 400 ); ?></p>
					</div>
				</div>
			</div>
			<!-- конец поста -->


	<?php } ?>

		<div class="pagination-index">
			<?php pagination(); // пагинация, функция нах-ся в function.php ?>
		</div>

	<?php wp_reset_postdata(); ?>



<?php unset($post_front_top); //чистим переменную?>


		</div>
		<!-- конец раздела других постов -->