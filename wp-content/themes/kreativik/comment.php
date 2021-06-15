<div <? comment_class();?> id="comment-<? comment_ID(); ?>">
	<?=get_avatar($comment, '128', get_template_directory_uri().'/images/avatar.jpg')?>
	<p class="comment-date">on <? comment_date(); ?>, <? comment_time();?></p>
	<p><b><? comment_author(); ?></b> said:</p>
	<p><? comment_text(); ?></p>
	<? edit_comment_link(__('(Edit)'),'	 ','') ?>
	<? comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	<div class="clear"></div>