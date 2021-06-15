<!-- Featured Slider -->
<div id="featured-slider">
	<div id="s1" class="pics">
		<?php $ids = array(); $arr = array(); $i=1;
		$featured_cat = get_option('lumin_feat_cat');
		query_posts("showposts=3&cat=".get_catId($featured_cat));
		while (have_posts()) : the_post(); ?>
		
			<?php $thumb = get_thumbnail(); ?>
			
			<div>
				<img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=348&amp;w=571&amp;zc=1" width="571" height="348" alt="<?php echo(the_title()); ?>" />
				<a href="<?php the_permalink() ?>" title="<?php printf(__ ('Permanent Link to %s', 'Lumin'), get_the_title()) ?>"><span class="feat-overlay"></span></a>
			</div>
			<?php $arr[$i]["thumb"] = $thumb;
		    $arr[$i]["title"] = truncate_title(21,false);
		    $arr[$i]["fulltitle"] = truncate_title(250,false);
		    $arr[$i]["excerpt"] = truncate_post(100,false);
		    $i++; 
			$ids[]= $post->ID; ?>
			
		<?php endwhile; wp_reset_query(); ?>
	</div> <!-- end .pics -->
	
	<div id="slider-control">
		<?php for ($i = 1; $i <= 3; $i++) {
			if ($arr[$i]["thumb"] <> '' ) { ?>				
					
				<div class="featitem<?php if ($i==1) echo(" active"); if ($i==3) echo(" last");?>">
					<div class="item-content">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $arr[$i]["thumb"]; ?>&amp;h=80&amp;w=80&amp;zc=1" alt="<?php echo($arr[$i]["fulltitle"]); ?>" />
						<div class="description">
							<h2><?php echo($arr[$i]["title"]);?></h2>
							<p class="excerpt"><?php echo($arr[$i]["excerpt"]); ?></p>
						</div> <!-- end .description -->
					</div> <!-- end .item-content -->
					<span class="order"><?php echo($i); ?></span>
				</div> <!-- end .featitem -->
						
			<?php } else { break; }
		} ?>
	</div> <!-- end slider-control div -->
					
	<div class="clear"></div>
</div> <!-- div featured-slider -->