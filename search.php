<?php get_header(); ?>
  <div class="contentWrapper mainWrapper">

     <div class="xColumnView">

         <article class="pageContentViewItem oneColumnViewItem pageStyle">

 
				<?php if ( have_posts() ) : ?>
				                <h1>Suchergebnisse für: <span><?php the_search_query(); ?></span></h1>

				<?php while ( have_posts() ) : the_post() ?>

				                <div id="post-<?php the_ID(); ?>" class="searchResultItem">
				                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				                    <div class="entry-summary">
										<?php the_excerpt( __( 'Mehr lesen <span class="meta-nav">&raquo;</span>', 'hbd-theme' )  ); ?>
										<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'hbd-theme' ) . '&after=</div>') ?>
				                    </div>
				                </div>

				<?php endwhile; ?>

				<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
				                <div id="nav-below" class="navigation">
				                    <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Ältere Artikel', 'hbd-theme' )) ?></div>
				                    <div class="nav-next"><?php previous_posts_link(__( 'Neuere Artikel <span class="meta-nav">&raquo;</span>', 'hbd-theme' )) ?></div>
				                </div>
				<?php } ?>            
				<?php else : ?>
	                <h2 class="entry-title">Keine Ergebnisse</h2>
	                <p>Leider ergab die Suche keine Ergebnisse.</p>
				<?php endif; ?>           

         </article>
     </div>
 </div>

     
<?php get_footer(); ?>