
<?php get_header(); ?>


<div class="contentWrapper mainWrapper">
     <div class="xColumnView">

        <?php get_sidebar(); ?>
        
        <article class="pageContentViewItem pageStyle">
            <h1 class="postHeading"><?php wp_reset_query(); the_title(); ?></h1>
            <?php the_content(); ?>
         </article>
     </div>
 </div>





<?php get_footer(); ?>