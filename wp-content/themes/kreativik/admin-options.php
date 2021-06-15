<?
// billboard
// update options
if(isset($_GET['type']) && $_GET['type'] == 'billboard' && isset($_GET['action']) && $_GET['action'] == 'delete' && is_numeric($_GET['id'])){
	$id = (int)$_GET['id'];
	$old_billboards = unserialize(get_option("udesign-billboard"));
	$billboards = array();
	foreach($old_billboards as $key => $billboard){
		if($key != $id){
			$billboards[] = $billboard;
		}
	}
	update_option("udesign-billboard", serialize($billboards));
} elseif(isset($_POST['slide_image_add']) && !empty($_POST['slide_image_add'])){
	$new_billboard = Array();
	$new_billboard['image'] = $_POST['slide_image_add'];
	$billboards = Array();
	$i = 0;
	while(!empty($_POST['slide_image_'.$i])){
		$billboard = Array();
		$billboard['image'] = $_POST['slide_image_'.$i];
		$billboards[] = $billboard;
		$i++;
	}
	$billboards[] = $new_billboard;
	update_option("udesign-billboard", serialize($billboards));
} elseif (!empty($_POST['slide_image_0'])) {
	$billboards = Array();
	$i = 0;
	while(!empty($_POST['slide_image_'.$i])){
		$billboard = Array();
		$billboard['image'] = $_POST['slide_image_'.$i];
		$billboards[] = $billboard;
		$i++;
	}
	update_option("udesign-billboard", serialize($billboards));
}

// retrieve options
$billboards = unserialize(get_option("udesign-billboard"));
if(!is_array($billboards)) {
	$billboards = Array();
}

// features

// update options
if(isset($_GET['type']) && $_GET['type'] == 'featured' && isset($_GET['action']) && $_GET['action'] == 'delete' && is_numeric($_GET['id'])){
	$id = (int)$_GET['id'];
	$old_features = unserialize(get_option("udesign-features"));
	$features = array();
	foreach($old_features as $key => $feature){
		if($key != $id){
			$features[] = $feature;
		} else {
			$features[] = array(
				'heading'=>'',
				'text'=>'',
				'image'=>''
			);
		}
	}
	update_option("udesign-features", serialize($features));
} elseif(isset($_POST['featured_heading_add']) && !empty($_POST['featured_heading_add'])){
	$new_feature = Array();
	$new_feature['heading'] = $_POST['featured_heading_add'];
	$new_feature['text'] = $_POST['featured_text_add'];
	$new_feature['image'] = $_POST['featured_image_add'];
	$features = Array();
	$i = 0;
	while(!empty($_POST['featured_heading_'.$i])){
		$feature = Array();
		$feature['heading'] = $_POST['featured_heading_'.$i];
		$feature['text'] = $_POST['featured_text_'.$i];
		$feature['image'] = $_POST['featured_image_'.$i];
		$features[] = $feature;
		$i++;
	}
	$features[] = $new_feature;
	update_option("udesign-features", serialize($features));
} elseif (!empty($_POST['featured_heading_0'])) {
	$features = Array();
	$i = 0;
	while(!empty($_POST['featured_heading_'.$i])){
		$feature = Array();
		$feature['heading'] = $_POST['featured_heading_'.$i];
		$feature['text'] = $_POST['featured_text_'.$i];
		$feature['image'] = $_POST['featured_image_'.$i];
		$features[] = $feature;
		$i++;
	}
	update_option("udesign-features", serialize($features));
}

// retrieve options
$features = unserialize(get_option("udesign-features"));
if(!is_array($features)) {
	$features = Array();
}

// icons

// update options
if(isset($_GET['type']) && $_GET['type'] == 'service' && isset($_GET['action']) && $_GET['action'] == 'delete' && is_numeric($_GET['id'])){
	$id = (int)$_GET['id'];
	$old_services = unserialize(get_option("udesign-services"));
	$services = array();
	foreach($old_services as $key => $service){
		if($key != $id){
			$services[] = $service;
		} else {
			$services[] = array(
				'heading'=>'',
				'link'=>'',
				'text'=>'',
				'image'=>''
			);
		}
	}
	update_option("udesign-services", serialize($services));
} elseif(isset($_POST['service_heading_add']) && !empty($_POST['service_heading_add'])){
	$new_service = Array();
	$new_service['heading'] = $_POST['service_heading_add'];
	$new_service['link'] = $_POST['service_link_add'];
	$new_service['text'] = $_POST['service_text_add'];
	$new_service['image'] = $_POST['service_image_add'];
	$services = Array();
	$i = 0;
	while(!empty($_POST['service_heading_'.$i])){
		$service = Array();
		$service['heading'] = $_POST['service_heading_'.$i];
		$service['link'] = $_POST['service_link_'.$i];
		$service['text'] = $_POST['service_text_'.$i];
		$service['image'] = $_POST['service_image_'.$i];
		$services[] = $service;
		$i++;
	}
	$services[] = $new_service;
	update_option("udesign-services", serialize($services));
} elseif (!empty($_POST['service_heading_0'])) {
	$services = Array();
	$i = 0;
	while(!empty($_POST['service_heading_'.$i])){
		$service = Array();
		$service['heading'] = $_POST['service_heading_'.$i];
		$service['link'] = $_POST['service_link_'.$i];
		$service['text'] = $_POST['service_text_'.$i];
		$service['image'] = $_POST['service_image_'.$i];
		$services[] = $service;
		$i++;
	}
	update_option("udesign-services", serialize($services));
}

// retrieve options
$services = unserialize(get_option("udesign-services"));
if(!is_array($services)) {
	$services = Array();
}

// portfolio

// update options
if(isset($_GET['type']) && $_GET['type'] == 'portfolio' && isset($_GET['action']) && $_GET['action'] == 'delete' && is_numeric($_GET['id'])){
	$id = (int)$_GET['id'];
	$old_portfolios = unserialize(get_option("udesign-portfolios"));
	$portfolios = array();
	foreach($old_portfolios as $key => $portfolio){
		if($key != $id){
			$portfolios[] = $portfolio;
		} else {
			$portfolios[] = array(
				'category'=>'',
				'image'=>''
			);
		}
	}
	update_option("udesign-portfolios", serialize($portfolios));
} elseif(isset($_POST['portfolio_image_add']) && !empty($_POST['portfolio_image_add'])){
	$new_portfolio = Array();
	$new_portfolio['category'] = $_POST['portfolio_category_add'];
	$new_portfolio['image'] = $_POST['portfolio_image_add'];
	$portfolios = Array();
	$i = 0;
	while(!empty($_POST['portfolio_image_'.$i])){
		$portfolio = Array();
		$portfolio['category'] = $_POST['portfolio_category_'.$i];
		$portfolio['image'] = $_POST['portfolio_image_'.$i];
		$portfolios[] = $portfolio;
		$i++;
	}
	$portfolios[] = $new_portfolio;
	update_option("udesign-portfolios", serialize($portfolios));
} elseif (!empty($_POST['portfolio_image_0'])) {
	$portfolios = Array();
	$i = 0;
	while(!empty($_POST['portfolio_image_'.$i])){
		$portfolio = Array();
		$portfolio['category'] = $_POST['portfolio_category_'.$i];
		$portfolio['image'] = $_POST['portfolio_image_'.$i];
		$portfolios[] = $portfolio;
		$i++;
	}
	update_option("udesign-portfolios", serialize($portfolios));
}

// retrieve options
$portfolios = unserialize(get_option("udesign-portfolios"));
if(!is_array($portfolios)) {
	$portfolios = Array();
}

?>
<div class="wrap">
	<h2>Kreativik Theme options</h2>
	<div id="tabs">
		<ul>
			<li><a href="#general-options">General Options</a></li>
			<li><a href="#billboard-settings">Billboard Settings</a></li>
			<li><a href="#featured-services">Featured Services</a></li>
			<li><a href="#services">Homepage Services</a></li>
			<li><a href="#portfolio">Portfolio</a></li>
			<li><a href="#help">Help</a></li>
		</ul>
		<div id="general-options">
			<div>
				<form method="post" action="options.php">
				<?php wp_nonce_field('update-options') ?>
				<fieldset>
					<legend>General Settings:</legend>
					<table class="theme-options">
						<tr>
							<td>Heading: </td>
							<td><input type="text" name="uds-heading" value="<?=get_option("uds-heading")?>" size="40" /></td>
							<td>Blog name</td>
						</tr>
						<tr>
							<td>Subheading: </td>
							<td><input type="text" name="uds-subheading" value="<?=get_option("uds-subheading")?>" size="40" /></td>
							<td>Blog tagline</td>
						</tr>
						<tr>
							<td>Background: </td>
							<td>
								<select name="uds-background">
									<option value="none" <?=(get_option('uds-background') == 'none' ? 'selected="selected"' : '') ?>>None</option>
									<option value="wood" <?=(get_option('uds-background') == 'wood' ? 'selected="selected"' : '') ?>>Wood</option>
									<option value="bokeh" <?=(get_option('uds-background') == 'bokeh' ? 'selected="selected"' : '') ?>>Bokeh</option>
									<option value="carbon" <?=(get_option('uds-background') == 'carbon' ? 'selected="selected"' : '') ?>>Carbon</option>
									<option value="vintage" <?=(get_option('uds-background') == 'vintage' ? 'selected="selected"' : '') ?>>Vintage</option>
								</select>
							</td>
							<td>Blog background image</td>
						</tr>
						<tr>
							<td>Google Analytics Tracking Code: </td>
							<td><input type="text" name="uds_ga_tracking_code" value="<?=get_option("uds_ga_tracking_code")?>" size="40" /></td>
							<td>Leave empty to disable Google Analtics</td>
						</tr>
						<tr>
							<td>Exclude from top menu: </td>
							<td><input type="text" name="top_menu_exclude" value="<?=get_option("top_menu_exclude")?>" size="40" /></td>
							<td>Use comma separated page ID's</td>
						</tr>
						<tr>
							<td>Copyright: </td>
							<td><input type="text" name="copyright" value="<?=get_option("copyright")?>" size="40" /></td>
							<td>Your copyright line</td>
						</tr>
						<tr>
							<td>Homepage configuration: </td>
							<td>
								<select name="uds-hp-config">
									<option value="services" <?=(get_option('uds-hp-config') == 'services' ? 'selected="selected"' : '') ?>>Services</option>
									<option value="recent-posts" <?=(get_option('uds-hp-config') == 'recent-posts' ? 'selected="selected"' : '') ?>>Recent posts</option>
									<option value="recent-comments" <?=(get_option('uds-hp-config') == 'recent-comments' ? 'selected="selected"' : '') ?>>Recent comments</option>
									<option value="widgets" <?=(get_option('uds-hp-config') == 'widgets' ? 'selected="selected"' : '') ?>>Widgets</option>
								</select>
							</td>
							<td>Combined with the text description on the left side</td>
						</tr>
					</table>
					<input type="hidden" name="action" value="update" />
					<input type="hidden" name="page_options" value="uds-heading,uds-subheading,uds-background,top_menu_exclude,copyright,uds_ga_tracking_code,uds-hp-config" />
				</fieldset>
				<input type="submit" name="Submit" value="Update Options" />
				</form>
			</div>
		</div>
		<div id="billboard-settings">
			<form method="post" action="themes.php?page=kreativik#billboard-settings">
			<?php wp_nonce_field('update-options') ?>
			<table class="billboard">
				   <tr>
				   	<th>No.</th>
				   	<th>Image</th>
				   	<th>Delete</th>
				   </tr>
				   <? $count = count($billboards); ?>
				   <? for($i = 0; $i < $count; $i++): ?>
				   <tr>
				   	<td><?=($i+1)?></td>
				   	<td>
				   		<a class="thickbox" title="Add an Image" href="media-upload.php?type=image&TB_iframe=true&width=640&height=345">
				   			<? if(!empty($billboards[$i]['image'])): ?>
								<img alt="Add an Image" src="<?=$billboards[$i]['image']?>" id="slide_image_<?=$i?>" class="billboard-image" />
							<? else: ?>
								<img alt="Add an Image" src="<?=get_template_directory_uri()?>/images/noimg470x188.jpg" id="slide_image_<?=$i?>" class="billboard-image" />
							<? endif; ?>
				   		</a>
				   		<input type='hidden' name='slide_image_<?=$i?>' value="<?=$billboards[$i]['image']?>" id='slide_image_<?=$i?>_hidden' />
				   	</td>
				   	<td><a href="themes.php?page=kreativik&type=billboard&action=delete&id=<?=$i?>#billboard-settings">Delete</a></td>
				   </tr>
				   <? endfor; ?>
				   <tr>
				   	<td><?=($count+1)?></td>
				   	<td>
				   		<a class="thickbox" title="Add an Image" href="media-upload.php?type=image&TB_iframe=true&width=640&height=345">
				   			<img alt="Add an image" src="<?=get_template_directory_uri()?>/images/noimg470x188.jpg" id="slide_image_add" class="billboard-image" />
				   		</a>
				   		<input type='hidden' name='slide_image_add' id='slide_image_add_hidden' />
				   	</td>
				   	<td>-</td>
				   </tr>
			</table>
			<p><input type="submit" name="Submit" value="Update Options" /></p>
			</form>
			<form method="post" action="options.php">
			<?php wp_nonce_field('update-options') ?>
				<fieldset>
					<table>
						<tr>
							<td>Billboard delay: </td>
							<td><input type="text" name="uds-billboard-delay" value="<?=get_option("uds-billboard-delay")?>" size="40" /></td>
							<td>In miliseconds</td>
						</tr>
						<tr>
							<td>Billboard Transition: </td>
							<td>
								<select name="uds-billboard-effect">
									<option value="all" <?=get_option('uds-billboard-effect') == 'all' ? 'selected="selected"' : '';?>>Cycle all</option>
									<option value="random" <?=get_option('uds-billboard-effect') == 'random' ? 'selected="selected"' : '';?>>Random squares</option>
									<option value="horizontal" <?=get_option('uds-billboard-effect') == 'horizontal' ? 'selected="selected"' : '';?>>Left to right</option>
									<option value="vertical" <?=get_option('uds-billboard-effect') == 'vertical' ? 'selected="selected"' : '';?>>Top to bottom</option>
								</select>
							</td>
							<td>In miliseconds</td>
						</tr>
					</table>
					<input type="hidden" name="action" value="update" />
					<input type="hidden" name="page_options" value="uds-billboard-delay,uds-billboard-effect" />
					<input type="submit" name="Submit" value="Update Options" />
				</fieldset>
			</form>
		</div>
		<div id="featured-services">
			<form method="post" action="themes.php?page=kreativik#featured-services">
			<?php wp_nonce_field('update-options') ?>
			<table class="featured">
				   <tr>
				   	<th>No.</th>
				   	<th>Heading</th>
				   	<th>Text</th>
				   	<th>Image</th>
				   	<th>Delete</th>
				   </tr>
				   <? $count = count($features); ?>
				   <? for($i = 0; $i < 3; $i++): ?>
				   <tr>
				   	<td><?=($i+1)?></td>
				   	<td><input type="text" name="featured_heading_<?=$i?>" value="<?=$features[$i]['heading']?>" /></td>
				   	<td><input type="text" name="featured_text_<?=$i?>" value="<?=$features[$i]['text']?>" /></td>
				   	<td>
				   		<a class="thickbox" title="Add an Image" href="media-upload.php?type=image&TB_iframe=true&width=640&height=345">
				   			<? if(!empty($features[$i]['image'])): ?>
								<img alt="Add an Image" src="<?=$features[$i]['image']?>" id="featured_image_<?=$i?>" class="featured-image" />
							<? else: ?>
								<img alt="Add an Image" src="<?=get_template_directory_uri()?>/images/noimg230x80.jpg" id="featured_image_<?=$i?>" class="featured-image" />
							<? endif; ?>
				   		</a>
				   		<input type='hidden' name='featured_image_<?=$i?>' value="<?=$features[$i]['image']?>" id='featured_image_<?=$i?>_hidden' />
				   	</td>
				   	<td><a href="themes.php?page=kreativik&type=featured&action=delete&id=<?=$i?>#featured-services">Delete</a></td>
				   </tr>
				   <? endfor; ?>
			</table>
			<p><input type="submit" name="Submit" value="Update Options" /></p>
			</form>
		</div>
		<div id="services">
			<form method="post" action="themes.php?page=kreativik#services">
			<?php wp_nonce_field('update-options') ?>
			<table class="serviced">
				   <tr>
				   	<th>No.</th>
				   	<th>Heading</th>
				   	<th>Link</th>
				   	<th>Text</th>
				   	<th>Image</th>
				   	<th>Delete</th>
				   </tr>
				   <? $count = count($services); ?>
				   <? for($i = 0; $i < 4; $i++): ?>
				   <tr>
				   	<td><?=($i+1)?></td>
				   	<td><input type="text" name="service_heading_<?=$i?>" value="<?=$services[$i]['heading']?>" /></td>
				   	<td><input type="text" name="service_link_<?=$i?>" value="<?=$services[$i]['link']?>" /></td>
				   	<td><input type="text" name="service_text_<?=$i?>" value="<?=$services[$i]['text']?>" /></td>
				   	<td>
				   		<a class="thickbox" title="Add an Image" href="media-upload.php?type=image&TB_iframe=true&width=640&height=345">
				   			<? if(!empty($services[$i]['image'])): ?>
								<img alt="Add an Image" src="<?=$services[$i]['image']?>" id="service_image_<?=$i?>" class="service-image" />
							<? else: ?>
								<img alt="Add an Image" src="<?=get_template_directory_uri()?>/images/noimg40x40.jpg" id="service_image_<?=$i?>" class="service-image" />
							<? endif; ?>
				   		</a>
				   		<input type='hidden' name='service_image_<?=$i?>' value="<?=$services[$i]['image']?>" id='service_image_<?=$i?>_hidden' />
				   	</td>
				   	<td><a href="themes.php?page=kreativik&type=service&action=delete&id=<?=$i?>#services">Delete</a></td>
				   </tr>
				   <? endfor; ?>
			</table>
			<p><input type="submit" name="Submit" value="Update Options" /></p>
			</form>
		</div>
		<div id="portfolio">
			<form method="post" action="themes.php?page=kreativik#portfolios">
			<?php wp_nonce_field('update-options') ?>
			<table class="portfoliod">
				   <tr>
				   	<th>No.</th>
				   	<th>Image</th>
				   	<th>Category</th>
				   	<th>Delete</th>
				   </tr>
				   <? $count = count($portfolios); ?>
				   <? for($i = 0; $i < $count; $i++): ?>
				   <tr>
				   	<td><?=($i+1)?></td>
				   	<td>
				   		<a class="thickbox" title="Add an Image" href="media-upload.php?type=image&TB_iframe=true&width=640&height=345">
				   			<? if(!empty($portfolios[$i]['image'])): ?>
								<img alt="Add an Image" src="<?=$portfolios[$i]['image']?>" id="portfolio_image_<?=$i?>" class="portfolio-image" width="280px" />
							<? else: ?>
								<img alt="Add an Image" src="<?=get_template_directory_uri()?>/images/noimg40x40.jpg" id="portfolio_image_<?=$i?>" class="portfolio-image" />
							<? endif; ?>
				   		</a>
				   		<input type='hidden' name='portfolio_image_<?=$i?>' value="<?=$portfolios[$i]['image']?>" id='portfolio_image_<?=$i?>_hidden' />
				   	</td>
				   	<td>
				   		<select name="portfolio_category_<?=$i?>">
				   			<option value="1" <?=($portfolios[$i]['category'] == 1 ? "selected='selected'" : "") ?>>Category 1</option>
				   			<option value="2" <?=($portfolios[$i]['category'] == 2 ? "selected='selected'" : "") ?>>Category 2</option>
				   			<option value="3" <?=($portfolios[$i]['category'] == 3 ? "selected='selected'" : "") ?>>Category 3</option>
				   		</select>
				   	</td>
				   	<td><a href="themes.php?page=kreativik&type=portfolio&action=delete&id=<?=$i?>#portfolios">Delete</a></td>
				   </tr>
				   <? endfor; ?>
				   <tr>
				   	<td><?=($count+1)?></td>
				   	<td>
				   		<a class="thickbox" title="Add an Image" href="media-upload.php?type=image&TB_iframe=true&width=640&height=345">
				   			<img alt="Add an Image" src="<?=get_template_directory_uri()?>/images/noimg.jpg" id="portfolio_image_add" class="portfolio-image" />
				   		</a>			 
				   		<input type='hidden' name='portfolio_image_add' value="" id='portfolio_image_add_hidden' />
				   	</td>
				   	<td>
				   		<select name="portfolio_category_add">
				   			<option value="1">Category 1</option>
				   			<option value="2">Category 2</option>
				   			<option value="3">Category 3</option>
				   		</select>
				   	</td>
				   	<td><a href="themes.php?page=kreativik&type=portfolio&action=delete&id=<?=$i?>#portfolios">Delete</a></td>
				   </tr>
			</table>
			<p><input type="submit" name="Submit" value="Update Options" /></p>
			</form>
			<div>
				<p>Legend:</p>
				<table>
					<tr>
						<th>Category 1</th>
						<th>Category 2</th>
						<th>Category 3</th>
					</tr>
					<tr>
						<td><img src="<?=get_template_directory_uri()?>/images/ribbon-1.png" alt="" /></td>
						<td><img src="<?=get_template_directory_uri()?>/images/ribbon-2.png" alt="" /></td>
						<td><img src="<?=get_template_directory_uri()?>/images/ribbon-3.png" alt="" /></td>
					</tr>
				</table>
			</div>
		</div>
		<div id="help">
			<? include('admin/help.php'); ?>
		</div>
	</div>
</div>
<script language='JavaScript' type='text/javascript'>
var set_receiver = function(rec){
	//console.log(rec);
	window.receiver = jQuery(rec).attr('id');
	window.receiver_hidden = jQuery(rec).attr('id')+'_hidden';
}
var send_to_editor = function(img){
	 tb_remove();
	 var src = jQuery(jQuery(img)).attr('src');
	 //console.log(window.receiver);
	 jQuery('#'+window.receiver).attr('src', src);
	 jQuery("#"+window.receiver_hidden).val(src);
}
jQuery('.billboard-image,.featured-image,.service-image,.portfolio-image').click(function(){
	set_receiver(this);
});
</script>