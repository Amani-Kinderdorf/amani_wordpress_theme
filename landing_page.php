<?php
/*
Template Name: Startseite
*/?>

<?php get_header(); ?>

<div class="contentWrapper mainWrapper">
	<?php the_post(); ?>
	<?php the_field('slideshow'); ?>
	<article class="pageStyle">
		<div class="xColumnView landingPageText">
			<div class="twoColumnViewItem">
				<?php the_content(); ?>
			</div>
			<div class="twoColumnViewItem">
				<h1 class="newsHeading">Neuigkeiten</h1>
				<div>
				<?php 
				//custom loop for news
				$args = array( 'posts_per_page' => get_field('news_item_count'), 'orderby' => 'date' , 'order'   => 'DESC');
				$loop = new WP_Query($args);
 				while( $loop->have_posts() ) : 
				$loop->the_post(); ?>
				<div class="newsPreview">
					<p class="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></p><p class="date"><?php echo get_the_date('d. F');?></p>
				</div><?php	
   				endwhile;
   				wp_reset_query();
				?>
				</div>
			</div>
		</div> 
	</article>
</div> 


<?php get_footer(); ?>