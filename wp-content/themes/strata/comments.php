<?php if ( post_password_required() ) { ?>
	<p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'strata' ); ?></p>
	<?php
	return;
}

if ( comments_open() || get_comments_number() ) { ?>
	<div class="comment_holder clearfix" id="comments">
		<div class="comment_number">
			<div class="comment_number_inner">
				<h5><i class="fa fa-comment-o"></i><?php comments_number( esc_html__('No Comments','strata'), '1'.esc_html__('Comment','strata'), '% '.esc_html__('Comments','strata')); ?></h5>
			</div>
		</div>
		<div class="comments">
			<?php if ( have_comments() ) : ?>
				<ul class="comment-list">
					<?php wp_list_comments(array( 'callback' => 'strata_qode_comment')); ?>
				</ul>
			<?php else : // this is displayed if there are no comments so far
				if ( ! comments_open() ) : ?>
					<p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'strata'); ?></p>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
	<?php
	$qodef_commenter = wp_get_current_commenter();
	$qodef_req       = get_option( 'require_name_email' );
	$qodef_aria_req  = ( $qodef_req ? " aria-required='true'" : '' );
	$qodef_consent   = empty( $qodef_commenter['comment_author_email'] ) ? '' : ' checked="checked"';
	
	$args = array(
		'id_form' => 'commentform',
		'id_submit' => 'submit_comment',
		'title_reply'=>'<h4>'. esc_html__( 'Post a Comment','strata' ) .'</h4>',
		'title_reply_to' => esc_html__( 'Post A Reply to %s','strata' ),
		'cancel_reply_link' => esc_html__( 'Cancel Reply','strata' ),
		'label_submit' => esc_html__( 'Submit','strata' ),
		'comment_field' => '<textarea id="comment" placeholder="&#xf040;" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '<div class="three_columns clearfix"><div class="column1"><div class="column_inner"><input id="author" name="author" placeholder="&#xf007;" type="text" value="' . esc_attr( $qodef_commenter['comment_author'] ) . '"' . $qodef_aria_req . ' /></div></div>',
			'email' => '<div class="column2"><div class="column_inner"><input id="email" name="email" placeholder="&#xf0e0;" type="text" value="' . esc_attr(  $qodef_commenter['comment_author_email'] ) . '"' . $qodef_aria_req . ' /></div></div>',
			'url' => '<div class="column3"><div class="column_inner"><input id="url" name="url" type="text" placeholder="&#xf0ac;" value="' . esc_attr( $qodef_commenter['comment_author_url'] ) . '" /></div></div></div>',
			'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" ' . $qodef_consent . ' />' .
			             '<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'strata' ) . '</label></p>'
		) ) );
	?>
	<div class="comment_pager">
		<p><?php paginate_comments_links(); ?></p>
	</div>
	<div class="comment_form">
		<?php comment_form( $args ); ?>
	</div>
<?php } ?>