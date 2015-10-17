<?php get_header(); ?>
<?php the_post(); ?>

 <div class="contentWrapper mainWrapper">
     <div class="xColumnView">
        
        <?php get_sidebar(); ?>

         <article class="pageContentViewItem <?php if(count($pages)==0) echo " oneColumnViewItem "; ?>pageStyle">
            <h1><?php wp_reset_query(); the_title(); ?></h1>

            <?php the_content(); ?>
         </article>
     </div>
      

 </div>
<?php get_footer(); ?>