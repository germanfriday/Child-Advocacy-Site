<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title><?php bloginfo('name'); ?> <? wp_title(); ?></title>
		<? wp_head(); ?>
		<!--[if IE]>
		    <link rel="stylesheet" href="<?=get_template_directory_uri() ?>/css/ie.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
		<![endif]-->
		<!--[if IE 7]>
		    <link rel="stylesheet" href="<?=get_template_directory_uri() ?>/css/ie7.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
		<![endif]-->
		<!--[if IE 6]>
		    <link rel="stylesheet" href="<?=get_template_directory_uri() ?>/css/ie6.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
		<![endif]-->
	</head>
	<body>
		<!-- start outer wrapper, in some cases this will create shadow over bg -->
		<div id="wrapper-shadow">
			<!-- start main wrapper -->
			<div id="wrapper">
				<!-- start header -->
				<div id="header">
					<!-- start the logo part of the header -->
					<div id="heading">
					<h3><?=get_option('uds-subheading'); ?></h3>
						<h1><a href="http://childadvocacynonprofit.org"><?=get_option('uds-heading'); ?></a></h1>
						
					</div>
					<!-- end logo part of the header -->
					<!-- start menu part of the header -->
					<div id="menu">
						<ul id="nav">
							<?
							wp_list_pages(array(
								'depth'        => 3,
								'show_date'    => false,
								'date_format'  => get_option('date_format'),
								'child_of'     => 0,
								'exclude'      => get_option('top_menu_exclude'),
								'title_li'     => '',
								'echo'         => 1,
								'authors'      => '',
								'sort_column'  => 'menu_order, post_title',
								'link_before'  => '',
								'link_after'   => '',
								'exclude_tree' => '' )
							);
							?>
						</ul>
					</div>
					<!-- end menu part of the header -->
					<div class="clear"></div>
				</div>