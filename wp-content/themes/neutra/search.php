<?php get_header(); ?>

<div id="page">
	<div id="left">
	
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="padding">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				</div><!-- end .padding -->
					<div class="border-gray"></div>
				<div class="padding">
				
					<?php the_content('Read more&#8230;'); ?>

					<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
								
			</div><!-- end .padding -->
			</div><!-- end .post -->
		
			<?php endwhile; ?>
			<?php else : ?>

			<div class="post">
				<div class="padding">
					<h2>I'm sorry, I couldn't find it!</h2><br />
					<p>Try <strong>a different search</strong>. You can browse the <strong>categories</strong> or <strong>archives</strong>.</p>
				</div><!-- end .padding -->
			</div><!-- end .post -->

	<?php endif; ?>
	
	</div><!-- end #left -->
	
	<div id="right">
		<?php get_sidebar(); ?>
	</div><!-- end #right -->
	
<div class="clearing"></div>
</div><!-- end #page -->

<?php get_footer(); ?>
