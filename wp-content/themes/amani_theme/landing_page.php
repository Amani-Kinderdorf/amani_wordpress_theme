<?php
/*
Template Name: Startseite
*/?>





<?php get_header(); ?>

<div class="contentWrapper mainWrapper">
	<?php the_post(); ?>
	<img src="<?php bloginfo('template_url') ?>/img/placeholder.png" style="width:100%;"/>
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
					<p class="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></p><p class="date"><?php echo get_the_date();?></p>
				</div><?php	
   				endwhile;
   				wp_reset_query();
				?>
				</div>
				<h1 class="bottomHeading">Unsere Kinder</h1>
				<p>[TODO] Hier kommt dann das Kinderfoto hin. Dafür brauchen wir erst noch den Post Type!!!</p>
			</div>
		</div> 
	</article>
</div> 
<?php get_footer(); ?>