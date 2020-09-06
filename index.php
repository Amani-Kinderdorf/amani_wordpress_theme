<?php get_header(); ?>

<div class="contentWrapper mainWrapper">

	<?php if(get_query_var('paged')==0): ?>
		<div class="postTeaserContainer">
			<?php
				$args = array( 'posts_per_page' => 3, 'orderby' => 'date' , 'order' => 'DESC', 'meta_key' => 'post_teaser', 'meta_value' => '1');
				$loop = new WP_Query($args);
				while( $loop->have_posts() ) :  $loop->the_post(); 
			?>
			<a class="postTeaser" style="background-image: url('<?php the_post_thumbnail_url( 'large' ); ?>')" href="<?php the_permalink(); ?>">
				<h3 class="postTeaser__heading"><span class="postTeaser__headingText"><?php the_title(); ?></span></h3>
			</a>
			<?php endwhile; wp_reset_query(); ?>
		</div>
	<?php endif; ?>
	 <div class="xColumnView">
		<?php get_sidebar(); ?>
		<div class="pageContentViewItem pageStyle">
			<?php
				wp_reset_postdata();
				if (have_posts()) :
				$shownTeaserPosts = 0;
				while(have_posts()) : the_post();
					if (get_field('post_teaser') == 1) $shownTeaserPosts++;
					if ($shownTeaserPosts <= 3 && get_field('post_teaser') == 1) continue; //hides already outputted teasered posts
			?>
				
				<?php require('helpers/article_preview.php'); ?>

			<?php endwhile; endif; ?>
			<?php wpbeginner_numeric_posts_nav(); ?>

		</div>
	 </div>
 </div>

<?php get_footer(); ?>
