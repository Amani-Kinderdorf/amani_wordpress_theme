<?php
/*
Template Name: Archive
*/?>
<?php get_header(); ?>
 

<div class="contentWrapper mainWrapper">
     <div class="xColumnView">
        <?php get_sidebar(); ?>
        <article class="pageContentViewItem pageStyle">


        <div id="container">
            <div id="content">
				<h1>Archiv</h1>

				<?php
					$args = array( 'posts_per_page' => -1,
                    'orderby' => 'date' ,
                    'order' => 'DESC');
					$loop = new WP_Query($args);
					$lastOutputMonth = 0;
					$lastOutputYear = 0;
	 				while( $loop->have_posts() ) :  $loop->the_post();

	 				if(get_the_date('n')!=$lastOutputMonth || get_the_date('Y') != $lastOutputYear) {
						echo '<h2 class="archiveNewMonth">'.get_the_date('F Y').'</h2>';
						$lastOutputMonth = get_the_date('n');
						$lastOutputYear = get_the_date('Y');
					}
	 				 ?>
	
				        <ul id="post-<?php the_ID(); ?>" class="archiveItem">
				        <a href="<?php the_permalink(); ?>">
				            <li class="archiveTitle"><?php the_title(); ?></li>
				            <li class="archiveDate"><?php echo get_the_date('d. F'); ?></li>
				         </a>
						</ul>

				<?php endwhile; ?>            
               
 
            </div><!-- #content -->
        </div><!-- #container -->
</article>
</div>
</div>



<?php get_footer(); ?>