<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!','Lumin'));

	if ( post_password_required() ) { ?>

<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','Lumin'); ?></p>
<?php
		return;
	}
?>
<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<div id="comment-section">
		<p id="comments"><?php comments_number(__('No Comments','Lumin'),  __('1 Comment','Lumin'), '% '.__('Comments','Lumin'));?></p>
		
	<?php if ( ! empty($comments_by_type['comment']) ) : ?>
		<ol class="commentlist">
			<?php wp_list_comments(array('type'=>comment,'callback'=>mytheme_comment,'avatar_size'=>50, 'reply_text'=>__('Reply','Lumin'))); ?>
		</ol>
	<?php endif; ?>
	
		<div class="navigation">
			<div class="alignleft">
				<?php previous_comments_link() ?>
			</div>
			<div class="alignright">
				<?php next_comments_link() ?>
			</div>
		</div>
		
	<?php if ( ! empty($comments_by_type['pings']) ) : ?>
	<div id="trackbacks">
		<h3 id="pings"><?php _e('Trackbacks/Pingbacks','Lumin'); ?></h3>
		<ol class="pinglist">
			<?php wp_list_comments('type=pings&callback=list_pings'); ?>
		</ol>
	</div>
	<?php endif; ?>	
<?php else : // this is displayed if there are no comments so far ?>
	<div id="comment-section" class="nocomments">
		<?php if ('open' == $post->comment_status) : ?>
			<!-- If comments are open, but there are no comments. -->
		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
				<div id="respond">
					<p class="nocomments"><?php _e('Comments are closed.','Lumin'); ?></p>
				</div> <!-- end respond div -->
		<?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>

	<div id="respond">
		<h3>
			<?php _e('Leave a Reply','Lumin'); ?>
		</h3>
		<div class="cancel-comment-reply"> <small>
			<?php cancel_comment_reply_link(); ?>
			</small> </div> <!-- end cancel-comment-reply div -->
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p><?php _e('You must be','Lumin'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in','Lumin'); ?></a> <?php _e('to post a comment.','Lumin'); ?></p>
		<?php else : ?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if ( $user_ID ) : ?>
				<p><?php _e('Logged in as','Lumin'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>"><?php _e('Log out &raquo;','Lumin'); ?></a></p>
			<?php else : ?>
				<p>
					<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
					<label for="author"><small><?php _e('Name','Lumin'); ?><?php if ($req) _e(' required','Lumin'); ?></small></label>
				</p>
				<p>
					<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
					<label for="email"><small><?php _e('Mail (will not be published)','Lumin'); ?> <?php if ($req) _e(' required','Lumin'); ?></small></label>
				</p>
				<p>
					<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
					<label for="url"><small><?php _e('Website','Lumin'); ?></small></label>
				</p>
			<?php endif; ?>
			<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
			<p>
				<textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea>
			</p>
			<p>
				<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment','Lumin'); ?>" />
				<?php comment_id_fields(); ?>
			</p>
			<?php do_action('comment_form', $post->ID); ?>
			</form>
		<?php endif; // If registration required and not logged in ?>
	</div> <!-- end respond div -->
<?php else: ?>

<?php endif; // if you delete this the sky will fall on your head ?>
</div> <!-- end comment-section -->