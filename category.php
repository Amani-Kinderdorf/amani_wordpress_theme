<?php get_header(); ?>
 

<div class="contentWrapper mainWrapper">
     <div class="xColumnView">
        <?php get_sidebar(); ?>
        <article class="pageContentViewItem pageStyle">


        <div id="container">
            <div id="content" class="archive-content">

                <?php the_post(); ?>          
				<h1>Archiv - <span><?php single_cat_title() ?></span></h1>
				<?php rewind_posts(); ?>
				<?php 
				$lastOutputMonth = 0;
				$lastOutputYear = 0;
				global $query_string;
				query_posts( $query_string . '&posts_per_page=-1' );
				if ( have_posts() ) : while ( have_posts() ) : the_post();
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
				            <li class="archiveDate"><?php  echo get_the_date('d.m.'); ?></li>
				            </a>
						</ul>
				<?php endwhile; endif; wp_reset_query(); ?>
            </div><!-- #content -->
        </div><!-- #container -->
</article>
</div>
</div>



<?php get_footer(); ?>