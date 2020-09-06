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
						<?php require('helpers/article_preview.php'); ?>
					<?php endwhile; ?>

					<?php wpbeginner_numeric_posts_nav(); ?>
					
				<?php else : ?>
					<p>Leider ergab die Suche keine Ergebnisse.</p>
				<?php endif; ?>
		</article>
	</div>
</div>
<?php get_footer(); ?>
