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
			<article class="articlePreview">
				<?php if (has_post_thumbnail()): ?>
					<div class="articlePreview__image" style="background-image: url('<?php the_post_thumbnail_url( 'large' ); ?>')">
						<a class="articlePreview__imageLink" href="<?php the_permalink();?>"></a>
					</div>
				<?php endif ?>
				<div class="articlePreview__text">
					<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
					<p class="postMeta"><?php echo get_the_date('d. F Y'); ?> | <?php echo get_categorie_simple(get_the_ID()); ?></p>
					<p><?php the_excerpt(); ?></p>
				</div>
			 </article>
			<?php endwhile; endif; ?>
			<?php wpbeginner_numeric_posts_nav(); ?>

		</div>
	 </div>
 </div>

<?php get_footer(); ?>
