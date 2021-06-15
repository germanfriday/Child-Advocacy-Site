<? get_header(); ?>
	<? if(is_front_page()): ?>
		<? $billboards = unserialize(get_option("udesign-billboard"));?>
		<? if(!empty($billboards)): ?>
				<!-- start billboard -->
				<div id="billboard">
					<!-- Add here your images -->
					<!-- ATTENTION! All images must be 940x376px, otherwise the effect is not guaranteed to work -->
					<? foreach($billboards as $billboard): ?>
						<img src="<?=$billboard['image']?>" alt="" />
					<? endforeach; ?>
				</div>
				<div id="billboard-delay"><?=get_option('uds-billboard-delay');?></div>
				<div id="billboard-effect"><?=get_option('uds-billboard-effect');?></div>
				<!-- end billboard -->
		<? endif; // billoards ?>
		<? $featured = unserialize(get_option("udesign-features"));?>
		<? if(!empty($featured)): ?>
				<!-- start featured -->
				<div id="featured">
					<div class="featured first">
						<h4><?=$featured[0]['heading']; ?></h4>
						<h5><?=$featured[0]['text']; ?></h5>
						<a href="/events/"><img src="<?=$featured[0]['image']; ?>" alt="" /></a>
					</div>
					<div class="featured center">
						<h4><?=$featured[1]['heading']; ?></h4>
						<h5><?=$featured[1]['text']; ?></h5>
						<a href="http://childadvocacynonprofit.org/wp-content/uploads/2010/05/child-advocacy-request-for-funds.pdf"><img src="<?=$featured[1]['image']; ?>" alt="" /></a>
					</div>
					<div class="featured last">
						<h4><?=$featured[2]['heading']; ?></h4>
						<h5><?=$featured[2]['text']; ?></h5>
						<a href="/events/"><img src="<?=$featured[2]['image']; ?>" alt="" /></a>
					</div>
					<div class="clear"></div>
				</div>
				<!-- end featured -->
		<? endif; // featured ?>
				
				<div id="content" class="<?=get_option('uds-hp-config') == 'widgets' ? 'golden' : 'half' ?>">
					<div class="<?=get_option('uds-hp-config') == 'widgets' ? 'maincontent-hp' : 'half-1' ?>">
						<? the_post(); the_content(); ?>
					</div>
					<div class="<?=get_option('uds-hp-config') == 'widgets' ? 'sidebar' : 'half-2' ?>">
						<? if(get_option('uds-hp-config') == 'recent-posts'): ?>
							<h2>Recent Posts</h2>
							<?
								$lastposts = get_posts('numberposts=3');
								foreach($lastposts as $post) :
									setup_postdata($post); ?>
									<div>
										<h3><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a></h3>
										<p class="date">on <? the_date(); ?></p>
										<?php the_excerpt(); ?>
									</div>
							<? endforeach; ?>
							<div class="clear"></div>
						<? elseif(get_option('uds-hp-config') == 'recent-comments'): ?>
							<h2>Recent Comments</h2>
							<?
								$comments = get_comments('number=3');
								foreach($comments as $comment): ?>
									<div class="comment">
										<p><?=$comment->comment_content?></p>
										<p class="date">on <a href="<?=get_permalink($comment->comment_post_ID);?>"><?=get_the_title($comment->comment_post_ID);?></a> by <?=$comment->comment_author?></p>
									</div>
							<? 	endforeach; ?>
						<? elseif(get_option('uds-hp-config') == 'services'): ?>
							<? $services = unserialize(get_option('udesign-services')); ?>
							<div class="features-row">
								<? $n = 0; ?>
								<? foreach($services as $service): ?>
									<div class="feature <?=($n%2 == 0 ? 'first' : '')?>">
										<img src="<?=$service['image']?>" alt="<?=$service['heading']?>" />
										<div>
											<h6><a href="<?=$service['link']?>"><?=$service['heading']?></a></h6>
											<p><?=$service['text']?></p>
										</div>


										<div class="clear"></div>
									</div>
									<? if($n%2 == 1): ?>
										</div>
										<div class="features-row">
									<? endif; ?>
									<? $n++; ?>
								<? endforeach; ?>
							</div>
							<div class="clear"></div>
						<? else: ?>
							<? if(function_exists("dynamic_sidebar") && !dynamic_sidebar("hp-right")): ?>
								<!-- put your static widgets here -->
							<? endif; // funciton exists dynamic sidebar ?>
						<? endif; // option HP right ?>
					</div>
					<div class="clear"></div>
				</div>
				 
	<? else: ?>
	<div id="page-heading">
		<h2><? the_breadcrumbs(); ?></h2>
		<div class="clear"></div>
	</div>
	<? the_post(); ?>
	<? 
		$custom = get_post_custom();
		$layout = 'golden';
		if(!empty($custom['layout'][0])){
			$layout = $custom['layout'][0];
		}
	?>
	<div id="content" class="<?=$layout ?>">
		<div class="maincontent">
			<? if(!empty($custom['uds_post_image'][0])): ?>
				<img src="<?=$custom['uds_post_image'][0]?>" alt="" />
			<? endif; ?>
			<? the_content(); ?>
			<div class="clear"></div>
		</div>
		<? if($layout != 'full') get_sidebar('page'); ?>
		<div class="clear"></div>	
	</div>
	<? endif; // is_front_page?>
<? get_footer(); ?>