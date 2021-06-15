<? get_header(); ?>
	<div id="page-heading">
		<h2><? the_breadcrumbs(); ?></h2>
		<div class="clear"></div>
	</div>
	<div id="content" class="golden">
		<div class="maincontent">
			<? the_post(); ?>
			<? $custom = get_post_custom();?>
			<? if(!empty($custom['uds_post_image'][0])): ?>
				<img src="<?=$custom['uds_post_image'][0]?>" alt="" />
			<? endif; ?>
			<div class="blog-post-author-date">
				<p><b>By:</b> <? the_author();?> | <b>posted on:</b> <? the_date(); ?> | <b>in: </b><? the_category(', ');?></p>
			</div>
			<? the_content(); ?>
			<? comments_template(); ?>
		</div>
		<? get_sidebar('blog'); ?>	
	</div>
<? get_footer(); ?>