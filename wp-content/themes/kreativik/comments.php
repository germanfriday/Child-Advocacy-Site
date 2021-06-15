<div class="divider-full"></div>
<? if(have_comments()): ?>
	<h2>Comments</h2>
	<div class="divider-full"></div>
	<div id="comments">
		<? 
		wp_list_comments(array(
			'avatar_size'=>128,
			'style'=> 'div',
			'callback'=>'uds_comment'
		)); 
		?>
	</div>
	<div>
		<div class="align-left"><? previous_comments_link() ?></div>
		<div class="align-right"><? next_comments_link() ?></div>
	</div>
	<div class="clear"></div>
<? else: ?>	
	<? if(comments_open()): ?>
		<p>There are no comments yet</p>
	<? else: ?>
		<p>Comments are closed</p>
	<? endif; ?>
<? endif; //have comments?>		
<? if(comments_open()): ?>
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>
			<a href="<?php echo wp_login_url( get_permalink() ); ?>">Log in</a> <? wp_register(' or ', '');?> to post a comment.
		</p>
	<?php else : ?>
		<?php if ( is_user_logged_in() ) : ?>
			<p>Logged in as 
				<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 
				<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a>
			</p>
		<?php endif; ?>
		<form method="post" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" id="add-comment">
    		<fieldset>
    			<?php comment_id_fields(); ?>
    			<div>
    				<label>Your name:</label>
    				<input type="text" class="input-text" name="author" />
    			</div>
    			<div>
    				<label>Your email:</label>
    				<input type="text" class="input-text" name="email" />
   		 		</div>
    			<div>
    				<label>Comment:</label>
    				<textarea rows="3" cols="54" name="comment" class="comment-text"></textarea>
    			</div>
    			<div class="buttons">
    				<button type="reset">Reset</button>
    				<button type="submit">Submit</button>
    			</div>
    		</fieldset>
		</form>
		<div class="cancel-comment-reply">
			<small><?php cancel_comment_reply_link(); ?></small>
		</div>
	<?php endif; // If registration required and not logged in ?>
<? endif; ?>
<div class="clear"></div>