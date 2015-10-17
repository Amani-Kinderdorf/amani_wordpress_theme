<?php
/*
Template Name: All Childs
*/?>

<?php get_header(); ?>
<?php the_post(); ?>

 <div class="contentWrapper mainWrapper">

     <div class="xColumnView">

        <?php get_sidebar(); ?>

        <article class="pageContentViewItem <?php if(count($pages)==0) echo " oneColumnViewItem "; ?>pageStyle">
            <h1>Unsere Kinder</h1>
            <?php the_content(); ?>

            <?php 
				//custom loop for child
                $currentPage = get_permalink( $post->ID );
				$args = array(  'posts_per_page' => -1,
                                'orderby' => 'date' ,
                                'order' => 'DESC',
                                'post_type' => 'child');

				$loop = new WP_Query($args);
 				while( $loop->have_posts() ) : 
				$loop->the_post(); 
                if(strcmp(get_field('kinderdorf'),$currentPage)==0):
                ?>
        			<div class="singleChild">
        				<div class="childPreview_image" style="background-image:url('<?php echo wp_get_attachment_image_src(get_field('bild'),'full')[0];?>');"></div>
        				<div class="childPreview_text">
        					<p class="title"><?php the_title();?></p>
        					<?php the_content(); ?>
        				</div>
        			</div>
				<?php	
                endif;
   				endwhile;
   				wp_reset_query();
				?>


         </article>
     </div>
      

 </div>
<?php get_footer(); ?>