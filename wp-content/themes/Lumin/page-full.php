<?php 
/* 
Template Name: Full Width Page
*/
?>
<?php if (is_front_page()) { ?>
	<?php include(TEMPLATEPATH . '/home.php'); ?>
<?php } else { ?>
	<?php get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1 id="post-title"><span><?php the_title(); ?></span></h1>
		<div id="main" class="fullwidth">
			<div class="post">
				<?php $thumb = get_post_meta($post->ID, 'Thumbnail', $single = true); ?>
				<?php if($thumb !== '' && get_option('lumin_page_thumbnails') == 'on') { ?>
					<img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=<?php echo(get_option('lumin_thumbnail_height_pages')); ?>&amp;w=<?php echo(get_option('lumin_thumbnail_width_pages')); ?>&amp;zc=1" alt="<?php echo the_title(); ?>" class="thumbnail-post alignleft" width="<?php echo(get_option('lumin_thumbnail_width_pages')); ?>" height="<?php echo(get_option('lumin_thumbnail_height_pages')); ?>px" />
				<?php }; ?> 
				<?php the_content(); ?>
				<?php edit_post_link(__('Edit this page','Lumin')); ?>
				<div class="clear"></div>
			</div> <!-- end .post -->
			
			<?php if (get_option('lumin_show_pagescomments') == 'on') comments_template('', true); ?>
			
		</div> <!-- end #main -->
	<?php endwhile; ?>	
	<?php else : ?>
		<?php include(TEMPLATEPATH . '/includes/noresults.php'); ?>
	<?php endif; ?>
	<?php get_footer(); ?>
<?php } ?>