<?php $thumb = get_thumbnail(); ?>
<div class="thumb-gallery<?php if ($i%4 == 0) echo(" last"); ?>">
	<a href="<?php the_permalink() ?>" title="<?php printf(__ ('Permanent Link to %s', 'Lumin'), get_the_title()) ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=123&amp;w=123&amp;zc=1" alt="<?php echo the_title(); ?>" width="123" height="123" class="preview-thumb" /></a>
	<div class="project-popup">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=218&amp;w=377&amp;zc=1" alt="<?php echo(the_title()); ?>" width="377" height="218" />
		<span class="project-overlay"></span>
	</div> <!-- end project-popup -->
</div> <!-- end .thumb-gallery -->
<?php if ($i%4 == 0) echo("<div class='clear'></div>"); ?>