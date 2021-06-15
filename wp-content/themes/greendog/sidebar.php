		<div id="right">
			
			<div id="search">
			<form method="get" id="searchform" action="<?php bloginfo('home'); ?>">
			<div><input type="text" value="Поиск" onfocus="this.value='';" onblur="if(!this.value) this.value='Поиск';" name="s" id="s" /></div>
			</form>
			</div>
			
			<div id="cats">
				<h3>Категории</h3>
				<ul>
					<?php wp_list_cats('sort_column=name&optioncount=0&hierarchical=0&hide_empty=0'); ?>
				</ul>
			</div>
			
			<div id="misc">
				
				<div id="recent">
				<h3>Свежие заметки</h3>
				<ul>
				
				<?php
					$posts = get_posts('numberposts=5');
					foreach($posts as $post) :
					?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endforeach; ?>

				</ul>				
				</div>
				
				<div id="archive">
				<h3>Архив</h3>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</div>
				
			</div>
			
			<div id="footlinks">
				<div id="links">
					<h3>Ссылки</h3>
					<ul>
						<?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', TRUE, 
						TRUE, -1, TRUE); ?>
					</ul>
				</div>
				<div id="buttons">
				<ul>
						<li><a href="<?php bloginfo('rss2_url'); ?>">RSS заметок</a></li>
						<li><a href="<?php bloginfo('comments_rss2_url'); ?>">RSS комментариев</a></li>
				</ul>
				</div>
			</div>
		
		</div>
