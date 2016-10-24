<?php
/**
 * Шаблон комментариев (comments.php)
 * Выводит список комментариев и форму добавления
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
<!-- комментарии -->
<div class="comments">
	<p class="zagolovok">
	<span class="line">Оставьте комментарий, нам очень важно ваше мнение</span></p>



<div id="comments"> <?php // див с этим id нужен для якорьных ссылок на комменты ?>
	<span>Всего комментариев: <?php echo get_comments_number(); // общие кол-во комментов ?></span>
	<?php if (have_comments()) : // если комменты есть ?>
	<ul class="comment-list">
		<?php
			$args = array( // аргументы для списка комментариев, некоторые опции выставляются в админке, остальное в классе clean_comments_constructor
				'walker' => new clean_comments_constructor, // класс, который собирает все структуру комментов, нах-ся в function.php
			);
			wp_list_comments($args); // выводим комменты
		?>
	</ul>
	<?php if (get_comment_pages_count() > 1 && get_option( 'page_comments')) : // если страниц с комментами > 1 и пагинация комментариев включена ?>
	<?php $args = array( // аргументы для пагинации
			'prev_text' => '«', // текст назад
			'next_text' => '»' // текст вперед
		);
		paginate_comments_links($args); // выводим пагинацию
	?>
	<?php endif; // если страниц с комментами > 1 и пагинация комментариев включена - конец ?>
	<?php endif; // // если комменты есть - конец ?>
	<?php if (comments_open()) { // если комментирование включено для данного поста
		/* ФОРМА КОММЕНТИРОВАНИЯ */
		$fields =  array( // разметка текстовых полей формы
			'author' => '<label for="author"><input placeholder="Введите имя*" id="author" name="author" type="text" value="'.esc_attr($commenter['comment_author']).'" size="30" required></label>', // поле Имя
			'email' => '<label for="email"><input placeholder="Введите email*" id="email" name="email" type="text" value="'.esc_attr($commenter['comment_author_email']).'" size="30" required></label>', // поле email
			);
		$args = array( // опции формы комментирования
			'fields' => apply_filters('comment_form_default_fields', $fields), // заменяем стандартные поля на поля из массива выше ($fields)
			'comment_field' => '<label for="comment"><textarea placeholder="Что вы думаете о данной компании?" id="comment" name="comment" cols="45" rows="8"></textarea></label>', // разметка поля для комментирования
			'must_log_in' => '<p class="must-log-in">Вы должны быть зарегистрированы! '.wp_login_url(apply_filters('the_permalink',get_permalink())).'</p>', // текст "Вы должны быть зарегистрированы!"
			'logged_in_as' => '<p class="logged-in-as">'.sprintf(__( 'Вы вошли как <a href="%1$s">%2$s</a>. <a href="%3$s">Выйти?</a>'), admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink',get_permalink()))).'</p>', // разметка "Вы вошли как"
			'comment_notes_before' => '<p class="comment-notes">*Ваша почта не будет показана</p>', // Текст до формы
			//'comment_notes_after' => '<p class="form-allowed-tags">'.sprintf(__( 'Вы можете использовать следующие <abbr>HTML</abbr> тэги: %s'),'<code>'.allowed_tags().'</code>').'</p>', // текст после формы
			//'id_form' => 'commentform', // атрибут id формы
			//'id_submit' => 'submit', // атрибут id кнопки отправить
			//'title_reply' => 'Оставить комментарий', // заголовок формы
			'title_reply_to' => 'Ответить %s', // "Ответить" текст
			'cancel_reply_link' => 'Отменить ответ', // "Отменить ответ" текст
			'title_reply' => '',//добавить комментарий был
			'class_submit' => 'btn-green',//класс для кнопки отправить
			'label_submit' => 'Отправить' // Текст на кнопке отправить
		);
		/* Следующий кусок кода будет менять разметку формы, которую мы не можем изменить стандартным функционалом wp */
		/* Например, это может понадобиться, если надо сделать форму на бутстрапе */
		ob_start(); // включаем буферизацию вывода

		// МЕНЯЕМ ПОРЯДОК ВЫВОДА
	    add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
function kama_reorder_comment_fields( $fields ){
	//die(print_r( $fields )); // посмотрим какие поля есть

	$new_fields = array(); // сюда соберем поля в новом порядке

	$myorder = array('author','email','comment'); // нужный порядок

	foreach( $myorder as $key ){
		$new_fields[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}

	// если остались еще какие-то поля добавим их в конец
	if( $fields )
		foreach( $fields as $key => $val )
			$new_fields[ $key ] = $val;

	return $new_fields;
}
	    comment_form($args); // показываем нашу форму
	    $what_changes = array( // массив с заменой эдементов, ключ - то, что меняем. значение - то, на что меняем
	    		'<small>' => '', // удалим <small> тэг
	    		'</small>' => '', // удалим <small> тэг
	    		'<h3 id="reply-title" class="comment-reply-title">' => '<span id="reply-title">', // заменим h3 на span
	    		'</h3>' => '</span>', // заменим h3 на span
	    		'<input name="submit" type="submit" id="submit" value="'.$args['label_submit'].'" />' => '<button type="submit">'.$args['label_submit'].'</button>' // заменим submit input на button
	    	);
	    $new_form = str_replace(array_keys($what_changes), array_values($what_changes), ob_get_contents()); // меняем элементы в форме

	    ob_end_clean(); // очищаем буферизацию
	} ?>

	<!-- форма комментирования -->
	<div class="comments-div-form">
	<form action="#" class="comments-form">
	   <?php
	   			echo $new_form; // выводим новую форму
	   			// echo $new_fields; // выводим новую форму
	   ?>
	</form>
</div>
</div>
</div>
<!-- конец комментария -->