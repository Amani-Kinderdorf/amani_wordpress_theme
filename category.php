<?php get_header(); ?>
 

<div class="contentWrapper mainWrapper">
     <div class="xColumnView">
        <?php get_sidebar(); ?>
        <article class="pageContentViewItem pageStyle">


        <div id="container">
            <div id="content">
 
                <?php the_post(); ?>          

				<h1>Archiv - <span><?php single_cat_title() ?></span></h1>

				<?php rewind_posts(); ?>

				<?php 
				$lastOutputMonth = 0;
				$lastOutputYear = 0;
				while(have_posts() ):the_post(); 
					//output month
					if(get_the_date('n')!=$lastOutputMonth || get_the_date('Y') != $lastOutputYear) {
						echo '<h2 class="archiveNewMonth">'.get_the_date('F Y').'</h2>';
						$lastOutputMonth = get_the_date('n');
						$lastOutputYear = get_the_date('Y');
					}
					?>

				        <ul id="post-<?php the_ID(); ?>" class="archiveItem">
				        <a href="<?php the_permalink(); ?>">
				            <li class="archiveTitle"><?php the_title(); ?></li>
				            <li class="archiveDate"><?php  echo get_the_date('d. F'); ?></li>
				            </a>
						</ul>

				<?php endwhile; ?>            

				<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
				                <div id="nav-below" class="navigation">
				                    <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Ältere Artikel', 'hbd-theme' )) ?></div>
				                    <div class="nav-next"><?php previous_posts_link(__( 'Neuere Artikel <span class="meta-nav">&raquo;</span>', 'hbd-theme' )) ?></div>
				                </div><!-- #nav-below -->
				<?php } ?>                 
 
            </div><!-- #content -->
        </div><!-- #container -->
</article>
</div>
</div>



<?php get_footer(); ?>