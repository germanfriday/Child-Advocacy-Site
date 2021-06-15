<?php global $lumin_catnum_posts, $lumin_grab_image, $lumin_blog_cat, $lumin_fromblog_recent, $lumin_fromblog_popular, $lumin_fromblog_random, $lumin_home_page_1, $lumin_home_page_2, $lumin_home_projectsnum, $lumin_projects_cat;
    if (get_option('lumin_menupages') <> '') $exclude_pages = implode(",", get_option('lumin_menupages')); 
	if (get_option('lumin_menucats') <> '') $exclude_cats = implode(",", get_option('lumin_menucats')); 
	$strdepth = '';
	if (get_option('lumin_categories_empty') == 'on') $hide = '1';
	if (get_option('lumin_categories_empty') == 'false') $hide = '0';
	if (get_option('lumin_enable_dropdowns') == 'on') $strdepth = "depth=".get_option('lumin_tiers_shown_pages');
	if ($strdepth == '') $strdepth = "depth=1";
	$strdepth2 = '';
	if (get_option('lumin_enable_dropdowns_categories') == 'on') $strdepth2 = "depth=".get_option('lumin_tiers_shown_categories'); 
	if ($strdepth2 == '') $strdepth2 = "depth=1";
	
	$category_menu = wp_list_categories("orderby=".get_option('lumin_sort_cat')."&order=".get_option('lumin_order_cat')."&".$strdepth2."&exclude=".$exclude_cats."&hide_empty=".$hide."&title_li=&echo=0"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php elegant_titles(); ?></title>
<?php elegant_description(); ?> 
<?php elegant_keywords(); ?> 
<?php elegant_canonical(); ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" media="screen" />

<?php $projects_cat = get_catid(get_option('lumin_projects_cat')); ?>
<?php if ((in_subcat($projects_cat) || in_category($projects_cat)) && is_single()) { ?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/jquery.fancybox-1.2.6.css" type="text/css" media="screen" />
<?php }; ?>
<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/ie6style.css" />
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
	<script type="text/javascript">DD_belatedPNG.fix('img#logo, p#slogan, .nav li ul, ul#top-navigation li ul a, div#search-icon, div#header div#search-form, div#featured-slider, span.feat-overlay,  div#from-blog ul.control li img, span.project-overlay, div#main-area div.page-block h3, p#slogan-phrase, div#main-area div.page-block div.separator, div#main-area a.readmore, div#main-area a.readmore span, div#from-blog div.content div.post p.meta a.comments-number, div#footer-widget-area a.readmore, div#footer-widget-area a.readmore span, div#from-blog img#subscribe, div.widget h3.title span, h1#post-title span, div.post p.date, div.post p.meta span.comments-number a, div.reply-container, a.comment-reply-link');</script>
<![endif]-->
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/ie7style.css" />
<![endif]-->

<?php if (get_option('lumin_color_scheme') <> 'Blue') { ?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style-<?php echo(get_option('lumin_color_scheme'));?>.css" type="text/css" media="screen" />
<?php }; ?>

<?php if (get_option('lumin_child_css') == 'on') { //Enable child stylesheet  ?>
<link rel="stylesheet" href="<?php echo(get_option('lumin_child_cssurl')); ?>" type="text/css" media="screen" />
<?php }; ?>

<?php if (get_option('lumin_custom_colors') == 'on') { //Enable custom colors  ?>
<style type="text/css">
	body { color: #<?php echo(get_option('lumin_color_mainfont')); ?>; }
	body { background-color: #<?php echo(get_option('lumin_color_bgcolor')); ?>; }
	#main-area .container #main a, #main-area .container .page-block a { color: #<?php echo(get_option('lumin_color_mainlink')); ?>; }
	div#header ul#top-navigation li a { color: #<?php echo(get_option('lumin_color_pagelink')); ?>; }
	#sidebar h3.title { color:#<?php echo(get_option('lumin_color_sidebar_titles')); ?>; }
	#main-area #sidebar div.widget a { color:#<?php echo(get_option('lumin_color_sidebar_links')); ?>; }
	div.footer-widget h4 { color:#<?php echo(get_option('lumin_footer_headings')); ?> }
	div.footer-widget a { color:#<?php echo(get_option('lumin_color_footerlinks')); ?> }
	a.comment-reply-link { color:#<?php echo(get_option('lumin_color_reply')); ?>; }
	
	h1#post-title  { color:#<?php echo(get_option('lumin_color_heading')); ?>; }
</style>
<?php }; ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script type="text/javascript">
	document.documentElement.className = 'js';
</script>

<?php if (get_option('lumin_integration_head') <> '' && get_option('lumin_integrate_header_enable') == 'on') echo(get_option('lumin_integration_head')); ?>
</head>
<body <?php if (is_home()) echo('id="home"');?>>
	<div id="header">
		<div class="container">
			<div id="logo-highlight"></div>
			
			<!-- Logo -->
			<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="logo" id="logo" /></a>
			<p id="slogan"><?php echo(get_option('lumin_tagline')); ?></p>
			
			<ul id="top-navigation" class="superfish nav">
				<?php if (get_option('lumin_home_link') == 'on') { ?>
					<li <?php if (is_front_page()) echo('class="current_page_item"') ?>><a href="<?php bloginfo('url'); ?>"><?php _e('Home','Lumin'); ?></a></li>
				<?php }; ?>
				
				<?php if ($category_menu <> '<li>No categories</li>') echo($category_menu); ?>
				
				<?php wp_list_pages("sort_column=".get_option('lumin_sort_pages')."&sort_order=".get_option('lumin_order_page')."&".$strdepth."&exclude=".$exclude_pages."&title_li="); ?>		
			</ul> <!-- end top-navigation -->
			
			<div id="search-icon">
				<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/search-icon.png" alt="search" id="search"/></a>
			</div> <!-- end search-icon -->
			
			<div id="search-form">
				<form method="get" id="searchform1" action="<?php bloginfo('url'); ?>/">
					<input type="text" value="<?php _e('search this site...','Lumin'); ?>" name="s" id="searchinput" />
				</form>
			</div> <!-- end searchform -->
		</div> <!-- end header/container -->
	</div> <!-- end header -->

	<div id="main-area">
		<div class="container">