<?php $thumb = get_thumbnail(); ?>
<div class="post">
	<?php if ($thumb <> '') { ?>
		<a href="<?php the_permalink() ?>" title="<?php printf(__ ('Permanent Link to %s', 'Lumin'), get_the_title()) ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=44&amp;w=44&amp;zc=1" alt="<?php echo(the_title()); ?>" class="thumb" /></a>
		<p class="date"><span><?php the_time('M d') ?></span></p>
	<?php } ?>
	<h4><a href="<?php the_permalink() ?>" title="<?php printf(__ ('Permanent Link to %s', 'Lumin'), get_the_title()) ?>"><?php truncate_title(24); ?></a></h4>
	<p class="meta"><?php _e('Posted ','Lumin'); ?>
	<?php if (in_array('author', get_option('lumin_postinfo_fromblog'))) { _e(' by ','Lumin'); the_author_posts_link(); }; 
	if (in_array('comments', get_option('lumin_postinfo_fromblog'))) { echo(" | <span class='comments-number'>"); comments_popup_link('0', '1','%'); echo("</span>"); }; ?></p>
</div> <!-- end post -->