<?php get_header(); ?>
 <div class="contentWrapper mainWrapper">
	<div class="xColumnView">

		<aside class="sideBarViewItem sideBarPageTree">
			<form class="searchSidebarForm" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input id="searchField" type="search" name="s" value="<?php the_search_query(); ?>">
				<input type="submit" value="Suchen">
			</form>
			<div class="resultInfo"><?php global $wp_query; echo $wp_query->found_posts;?> Ergebnisse</div>
		</aside>
		<article class="pageContentViewItem pageStyle">
				<h1 class="searchHeading">Suche nach <span><?php the_search_query(); ?></span></h1>
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post() ?>
					<div id="post-<?php the_ID(); ?>" class="searchResultItem">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry-summary">
							<?php the_excerpt( __( 'Mehr lesen <span class="meta-nav">&raquo;</span>', 'amani-theme' )  ); ?>
							<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'amani-theme' ) . '&after=</div>') ?>
						</div>
					</div>
					<?php endwhile; ?>

					<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ): ?>
						<div id="nav-below" class="navigation">
							<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Ältere Ergebnisse', 'amani-theme' )) ?></div>
							<div class="nav-next"><?php previous_posts_link(__( 'Neuere Ergebnisse <span class="meta-nav">&raquo;</span>', 'amani-theme' )) ?></div>
						</div>
					<?php endif ?>
				<?php else : ?>
					<p>Leider ergab die Suche keine Ergebnisse.</p>
				<?php endif; ?>
		</article>
	</div>
</div>
<?php get_footer(); ?>
