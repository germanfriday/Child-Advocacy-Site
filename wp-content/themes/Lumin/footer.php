<?php $projects_cat = get_catid(get_option('lumin_projects_cat')); ?>

			<div class="clear"></div>
		</div> <!-- end main-area/container -->
	</div> <!-- end main-area -->
	<div id="main-area-wrap"></div> <!-- end main-area wrap-->
	
	<div id="footer-widget-area">
		<div class="container">

<?php if (is_front_page() && (get_option('lumin_blog_style') == 'false')) { ?>
			<div id="recent-projects">
				<h3><?php _e('recent projects','Lumin'); ?></h3>
				<?php $i=1;
				query_posts("showposts=".get_option('lumin_home_projectsnum')."&cat=$projects_cat");
				if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php $thumb = get_thumbnail(); ?>
					<div class="project-item<?php if ($i%6==0) echo(" last"); ?>">
						<a href="<?php the_permalink() ?>" title="<?php printf(__ ('Permanent Link to %s', 'Lumin'), get_the_title()) ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=123&amp;w=123&amp;zc=1" alt="<?php echo(the_title()); ?>" class="preview-thumb" /></a>
						<div class="project-popup">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=218&amp;w=377&amp;zc=1" alt="<?php echo(the_title()); ?>" width="377" height="218" />
							<span class="project-overlay"></span>
						</div> <!-- end project-popup -->
					</div> <!-- end project-item -->
				<?php $i++; endwhile; endif; wp_reset_query(); ?>
				
				<a class="readmore" href="<?php echo get_bloginfo('url'),"/?cat=",get_catid(get_option('lumin_projects_cat')); ?>"><span><?php _e('enter the gallery &raquo;','Lumin'); ?></span></a>
				
				<div class="clear"></div>
			</div> <!-- end recent-projects -->
<?php } else { ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?>
			<?php endif; ?>
			<div class="clear"></div>
<?php }; ?>
		</div> <!-- end footer-widget-area/container -->
	</div> <!-- end footer-widget-area-->
	
	<div id="footer">
		<div class="container">
			<p><?php _e('Powered by ','Lumin'); ?><a href="http://crshare.com/">crShare.COM</a> | <?php _e('Designed by ','Lumin'); ?><a href="http://www.elegantthemes.com">Elegant Themes</a></p>
		</div> <!-- end footer/container -->
	</div> <!-- end footer-->
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.cycle.all.min.js"></script> 
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.easing.1.3.js"></script>	
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/superfish.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/init.js"></script>
	
	<?php if ((in_subcat($projects_cat) || in_category($projects_cat)) && is_single()) { ?>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.fancybox-1.2.6.pack.js"></script>
		<script type="text/javascript">
			jQuery("a[rel^='fancybox']").fancybox({
				'overlayOpacity'	:	0.7,
				'overlayColor'		:	'#000000',
				'zoomSpeedIn'		:	500,
				'zoomSpeedOut'		:	500
			});
		</script>
	<?php }; ?>

	<script type="text/javascript">
	//<![CDATA[
<?php if (is_front_page() && (get_option('lumin_featured')=='on')) { ?>
		jQuery('#s1').cycle({
			timeout: 0, 
			speed: 300,
			fx: '<?php echo(get_option('lumin_slider_effect')); ?>'
		});
						
		var $featured_area = jQuery('#featured-slider');
		var $featured_item = jQuery('#featured-slider div#slider-control div.featitem');
		var $slider_control = jQuery('#featured-slider div#slider-control');
		var $image_container = jQuery('div#s1 > div');
		
		var ordernum;
		var pause_scroll = false;
				
		$featured_item.fadeTo("fast", 0.5);
		$slider_control.children("div.featitem.active").fadeTo("fast", 1);
		$image_container.css("background-color","#000000");
		
		$image_container.hover(
			function () {
				jQuery(this).find("img").fadeTo("fast", 0.7);
			}, 
			function () {
				jQuery(this).find("img").fadeTo("fast", 1);
			}
		);

		<?php if (get_option('lumin_pause_hover') == 'on') { ?>				
			$featured_area.mouseover(function(){
				pause_scroll = true;
			}).mouseout(function(){
				pause_scroll = false;
			});
		<?php }; ?>		

		function gonext(this_element){
			$slider_control
			.children("div.featitem.active")
				.fadeTo("fast", 0.5)
				.removeClass('active');
			this_element.addClass('active');
			$slider_control.children("div.featitem.active").fadeTo("fast", 1);
			ordernum = this_element.find("span.order").html();
			jQuery('#s1').cycle(ordernum - 1);
		} 
		
		$featured_item.click(function() {
			clearInterval(interval);
			gonext(jQuery(this)); 
			return false;
		});
		
		var auto_number;
		var interval;
		
		$featured_item.bind('autonext', function autonext(){
			if (!(pause_scroll)) gonext(jQuery(this)); 
			return false;
		});

		<?php if (get_option('lumin_slider_auto') == 'on') { ?>
			interval = setInterval(function () {
				auto_number = $slider_control.find("div.featitem.active span.order").html();
				if (auto_number == $featured_item.length) auto_number = 0;
				$featured_item.eq(auto_number).trigger('autonext');
			}, <?php echo(get_option('lumin_slider_autospeed')); ?>);
		<?php }; ?>

<?php }; ?>

<?php if (is_front_page() || is_category($projects_cat) || in_subcat($projects_cat,$cat)) { ?>
		jQuery("div#from-blog").tabs({ fx: { opacity: 'toggle' } });

		var $project_item = <?php if (is_front_page()) { ?>jQuery('div.project-item');<?php } else { ?>jQuery('div.thumb-gallery');<?php } ?>
		
		$project_item.mouseenter(function(e) {
			this_el = jQuery(this);

			this_el.children("img.preview-thumb").fadeTo("fast", 0.5);			
			move_thumb(this_el,e);
			this_el.css('z-index','15').children("div.project-popup").css({'top': y + 10,'left': x + 20,'display':'block'});
		}).mousemove(function(e) {
			move_thumb(this_el,e);	
			this_el.children("div.project-popup").css({'top': y + 10,'left': x + 20});
		}).mouseleave(function() {
			this_el.css('z-index','1')
				.children("img.preview-thumb")
				.fadeTo("fast", 1)
				.end()
			.children("div.project-popup")
			.animate({"opacity": "hide"}, "fast");
		});
		
		function move_thumb(this_element,event_name){
			x = event_name.pageX - this_element.offset().left;
			y = event_name.pageY - this_element.offset().top;
		};
		
		jQuery(".js #featured-slider, .js div#recent-projects, .js div#from-blog div.content").show(); //prevents a flash of unstyled content
<?php }; ?>
		
	//]]>	
	</script>

<?php if (get_option('lumin_disable_toptier') == 'on') { ?>
	<script type="text/javascript">
		<?php echo('jQuery("ul.nav > li > a > span.sf-sub-indicator").parent().attr("href","#")'); ?>
	</script>
<?php }; ?>
	
<?php if (get_option('lumin_integration_body') <> '' && get_option('lumin_integrate_body_enable') == 'on') echo(get_option('lumin_integration_body'));
wp_footer(); ?>
</body>
</html>