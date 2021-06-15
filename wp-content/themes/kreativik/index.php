<? get_header(); ?>
	<div id="page-heading">
	    <h2>Blog</h2>
	    <div class="clear"></div>
	</div>
	<div id="content" class="golden">
	    <div class="maincontent">
	    <? if(have_posts()): ?>
	    	<? while(have_posts()): the_post(); ?>
	    	<div class="blog-post">
	    		<h3><a href="<? the_permalink();?>"><? the_title();?></a></h3>
	    		<p class="meta">posted by <b><? the_author();?></b> in <b><? the_category(', ');?></b> on <b><? the_date();?></b></p>
	    		<? $custom = get_post_custom();?>
	    		<? if(!empty($custom['uds_post_image'][0])): ?>
	    			<img src="<?=$custom['uds_post_image'][0]?>" alt="" />
	    		<? endif; ?>
	    		<? the_excerpt(); ?>
	    		<a href="<? the_permalink();?>">Read more</a>
	    	</div>
	    	<? endwhile; ?>
	    <? else: ?>
	    	<p>No posts matched your criteria</p>
	    <? endif; ?>
	    </div>
	    <? get_sidebar("blog"); ?>
	</div>
<? get_footer(); ?>