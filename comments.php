<?php
/*
    Comments template file
*/
?> 
   <!-- Comments -->
<?php
//$commenter = wp_get_current_commenter();
//$req = get_option( 'require_name_email' );
//$aria_req = ( $req ? " aria-required='true'" : '' );
//$consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
//$fields = array(
//'author' => '<p class="comment-form-author">'.
//'<input id="author" name="author" type="text" '. ( $req ? 'required ' : '' ) .' placeholder="'. __( 'Name' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
//'email' => '<p class="comment-form-email">'.
//'<input id="email" name="email" type="text" '. ( $req ? 'required ' : '' ) .' placeholder="'. __( 'Email' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
//'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="wp-comment-cookies-consent">' . __( 'Сохранить мои имя и email в этом браузере для последующих комментариев.' ) . '</label></p>',
//);
$comment_args = array(
//    'fields' => $fields,
    'comment_notes_before' => '',
    'title_reply' => '',
    'title_reply_to' => 'Ответить',
	'label_submit'=>'Оставить комментарий',
	// удаляем сообщение со списком разрешенных HTML-тегов из-под формы комментирования
	'comment_notes_after' => '',
    'comment_field' => '<p class="comment-form-comment"><label style="display:none" for="comment"></label><br /><textarea id="comment" name="comment" class="comment-text-area" aria-required="true" placeholder="Ваш комментарий..."></textarea></p>',
    'id_form' => 'comment-form-container'
	);
if (get_comments_number() == 0) : ?>
    <div class="comment-container">
     <h6 id="comment-header">Комментариев пока нет, но вы можете стать первым!</h6>
     <?php if ($comment->comment_approved == '0') : ?>
                        <em><?php _e('Ваш комментарий ожидает модерации.') ?></em>
                    <br />
     <?php endif; ?>
     <?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Комментарии закрыты.' ); ?></p>
	<?php endif; ?>
      <!-- Comment Form -->
    <div class="commen-form">
      <?php comment_form($comment_args); ?>
      <div class="clear"></div>
      <p class="hidden">Ваш комментарий будет отправлен на модерацию.</p>
    </div>
    <div class="clear"></div>
    <!-- End Comment Form -->
</div>
    <?php else : ?>
<div class="post">
    <div class="post-margin">
          <div class="wrap-comments">
            <h6 id="comment-header" class="comments-caption"><a name="comments"><?php comments_number('Комментарии', '1 комментарий', '% комментариев'); ?> читателей статьи "<?php the_title();?>"</a></h6>
               <!-- Start Related Item -->
                <ul class="commentlist">
                 <?php              
                  $args = array(
                    'style'       => 'ul',
					'short_ping'  => true,  
                    'avatar_size' => 48,
                    'reply_text' => 'Ответить',
                    'callback' => 'my_comments'
                  );
                  wp_list_comments($args);
                ?>
              </ul>
                <!-- End Related Item -->
         </div>
    </div>
</div>
<div class="comment-container">
<?php if ($comment->comment_approved == '0') : ?>
                        <em><?php _e('Ваш комментарий ожидает модерации.') ?></em>
                    <br />
<?php endif; ?>
<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Комментарии закрыты'); ?></p>
	<?php endif; ?>
 <!-- Comment Form -->
    <div class="commen-form">
      <?php comment_form($comment_args); ?>
      <div class="clear"></div>
      <p class="hidden">Ваш комментарий будет отправлен на модерацию.</p>
    </div>
    <div class="clear"></div>
    <!-- End Comment Form -->
</div>
<?php endif; ?>