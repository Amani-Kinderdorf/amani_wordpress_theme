<?php get_header(); ?>
 

<div class="contentWrapper mainWrapper">
	<div class="xColumnView">
		<?php get_sidebar(); ?>
		<div class="pageContentViewItem pageStyle">
			<h1>Berichte - <span><?php single_cat_title() ?></span></h1>
			<?php
				wp_reset_postdata();
				if (have_posts()) :
				while(have_posts()) : the_post();
			?>
			<article class="articlePreview">
				<?php if (has_post_thumbnail()): ?>
					<div class="articlePreview__image" style="background-image: url('<?php the_post_thumbnail_url( 'large' ); ?>')">
						<a class="articlePreview__imageLink" href="<?php the_permalink();?>"></a>
					</div>
				<?php endif ?>
				<div class="articlePreview__text">
					<p class="postMeta"><?php echo get_the_date('d. F Y'); ?> | <?php echo get_categorie_simple(get_the_ID()); ?></p>
					<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
					<p><?php the_excerpt(); ?></p>
				</div>
			 </article>
			<?php endwhile; endif; ?>
			<?php wpbeginner_numeric_posts_nav(); ?>

		</div>
	</div>
</div>



<?php get_footer(); ?>
