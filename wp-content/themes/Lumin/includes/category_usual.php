<?php $thumb = get_thumbnail(); ?>

<div class="entry">
	<h2 class="cat-title"><a href="<?php the_permalink() ?>" title="<?php printf(__ ('Permanent Link to %s', 'Lumin'), get_the_title()) ?>"><?php the_title(); ?></a></h2>

	<?php if (get_option('lumin_postinfo1_show') == 'on') include(TEMPLATEPATH . '/includes/postinfo.php'); ?>
	
	<?php if($thumb !== '') { ?>
		<a href="<?php the_permalink() ?>" title="<?php printf(__ ('Permanent Link to %s', 'Lumin'), get_the_title()) ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=<?php echo(get_option('lumin_thumbnail_height_usual')); ?>&amp;w=<?php echo(get_option('lumin_thumbnail_width_usual')); ?>&amp;zc=1" alt="<?php echo the_title(); ?>" class="thumbnail-post alignleft category" width="<?php echo(get_option('lumin_thumbnail_width_usual')); ?>" height="<?php echo(get_option('lumin_thumbnail_height_usual')); ?>px" /></a>
	<?php }; ?> 
	
	<?php if (get_option('lumin_blog_style') == 'on') the_content(""); else { ?>
		<p><?php truncate_post(400); ?></p>
	<?php }; ?>	
	<a class="readmore" href="<?php the_permalink(); ?>"><span><?php _e('read more','Lumin'); ?></span></a>
	<div class="clear"></div>
</div> <!-- end .entry -->