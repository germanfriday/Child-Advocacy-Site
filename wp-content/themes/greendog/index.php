<?php get_header(); ?>

<div id="centerTL">
<div id="centerTR">
<div id="centerBR">
<div id="centerBL">
	<div id="container">
		<div id="left">
		
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="postHeader">
				<p class="cal"><?php the_time('jS') ?><small><?php the_time('F') ?></small></p>
				<h2><a href="<?php the_permalink() ?>" title="Permanent Link to &laquo;<?php the_title(); ?>&raquo;"><?php the_title(); ?></a></h2>
				</div>
				
				<div class="postBody">
				<?php the_content('Read more'); ?>
				</div>
			
				<div class="postFooter">
				<?php comments_popup_link('Нет комментариев', '1 комментарий', 'Комментариев: %'); ?>
				</div>
			</div>
			
			<?php comments_template(); ?>
			
			<?php endwhile; ?>
			
			<ul class="postScroll">
				<li class="next"><?php next_posts_link('Раньше') ?></li>
				<li class="prev"><?php previous_posts_link('Позже') ?></li>
			</ul>
			
		<?php else : ?>
		
			<h3>Ошибка 404. Страница не найдена.</h3>
			
		<?php endif; ?>
			
		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>