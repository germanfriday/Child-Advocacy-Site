<?php get_header(); ?>

<?php $projects_cat = get_catid(get_option('lumin_projects_cat')); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php if (get_option('lumin_integration_single_top') <> '' && get_option('lumin_integrate_singletop_enable') == 'on') echo(get_option('lumin_integration_single_top')); ?>	
	<h1 id="post-title"><span><?php the_title(); ?></span></h1>
	<?php if (get_option('lumin_postinfo_posts') == 'on') include(TEMPLATEPATH . '/includes/postinfo.php'); ?>
	<div id="main">
		<div class="post">
			
			<?php if (in_subcat($projects_cat) || in_category($projects_cat)) { ?>
				<?php if (get_option('lumin_thumbnails_post') == 'on') { ?>
					<?php $thumb = get_thumbnail(); ?>
						<?php if($thumb !== '') { ?>
							<div class="gallery-postimage">
								<a href="<?php echo $thumb; ?>" rel="fancybox">
									<img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=328&amp;w=595&amp;zc=1" alt="<?php echo the_title(); ?>" class="thumbnail-post" width="595px" height="328px" />
									<span class="overlay"></span>
								</a>
							</div>
						<?php };
				}; ?>
			<?php } else { ?>
				<?php if (get_option('lumin_thumbnails') == 'on') { ?>
					<?php $thumb = get_thumbnail(); ?>
						<?php if($thumb !== '') { ?>
							<img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=<?php echo(get_option('lumin_thumbnail_height_posts')); ?>&amp;w=<?php echo(get_option('lumin_thumbnail_width_posts')); ?>&amp;zc=1" alt="<?php echo the_title(); ?>" class="thumbnail-post alignleft" width="<?php echo(get_option('lumin_thumbnail_width_posts')); ?>" height="<?php echo(get_option('lumin_thumbnail_height_posts')); ?>px" />
						<?php };
				}; ?>
			<?php }; ?>
			
			<?php the_content(); ?>
			<?php edit_post_link(__('Edit this page','Lumin')); ?>
			<div class="clear"></div>
		</div> <!-- end .post -->
		
		<?php if (get_option('lumin_integration_single_bottom') <> '' && get_option('lumin_integrate_singlebottom_enable') == 'on') echo(get_option('lumin_integration_single_bottom')); ?>		
        <?php if (get_option('lumin_468_enable') == 'on') { ?>
			<a href="<?php echo(get_option('lumin_468_url')); ?>"><img src="<?php echo(get_option('lumin_468_image')); ?>" alt="468 ad" class="foursixeight" /></a>
        <?php } ?>
        
		<?php if (get_option('lumin_show_postcomments') == 'on') comments_template('', true); ?>
		
	</div> <!-- end #main -->
<?php endwhile; ?>	
<?php else : ?>
	<?php include(TEMPLATEPATH . '/includes/noresults.php'); ?>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>