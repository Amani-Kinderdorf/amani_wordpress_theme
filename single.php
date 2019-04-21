<?php get_header(); ?>

<div class="contentWrapper mainWrapper">
     <div class="xColumnView">
        <?php get_sidebar(); ?>
        <article class="pageContentViewItem pageStyle">
            <div class="postHeader">
            	<p class="postMeta"><?php the_date('d. F Y'); ?> | <?php echo get_categorie_simple(get_the_ID()); ?></p>
            	<h1 class="postHeading"><?php wp_reset_query(); the_title(); ?></h1>
            <?php the_content(); ?>
         </article>
     </div>
 </div>

<?php get_footer(); ?>
