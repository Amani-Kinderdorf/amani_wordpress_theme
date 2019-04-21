<?php get_header(); ?>

<div class="contentWrapper mainWrapper">
	<div class="postTeaserContainer">
		<?php
			$args = array( 'posts_per_page' => 3, 'orderby' => 'date' , 'order' => 'DESC', 'meta_key' => 'post_teaser', 'meta_value' => '1');
			$loop = new WP_Query($args);
			while( $loop->have_posts() ) :  $loop->the_post(); 
		?>
		<div class="postTeaser" style="background-image: url('<?php the_post_thumbnail_url( 'large' ); ?>')">
			<h3 class="postTeaser__heading"><a class="postTeaser__headingText" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		</div>
		<?php endwhile; wp_reset_query(); ?>
	</div>
	 <div class="xColumnView">
		<?php get_sidebar(); ?>
		<div class="pageContentViewItem pageStyle">
			<?php
				$args = array('posts_per_page' => -1, 'orderby' => 'date' , 'order' => 'DESC');
				$shownTeaserPosts = 0;
				$loop = new WP_Query($args);
				while( $loop->have_posts() ) :  $loop->the_post(); 
					if (get_field('post_teaser') == 1) $shownTeaserPosts++;
					if ($shownTeaserPosts <= 3 && get_field('post_teaser') == 1) continue; //hides already outputted teasered posts
			?>
			<article>
				<?php if (has_post_thumbnail()): ?>
					<img src="'<?php the_post_thumbnail_url( 'large' ); ?>" />
				<?php endif ?>
				<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
            	<p class="postMeta"><?php the_date('d. F Y'); ?> | <?php echo get_categorie_simple(get_the_ID()); ?></p>
				<p><?php the_excerpt(); ?></p>
			 </article>
			<?php endwhile; wp_reset_query(); ?>
		</div>
	 </div>
 </div>

<?php get_footer(); ?>
