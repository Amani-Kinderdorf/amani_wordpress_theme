<?php
/*
Template Name: Startseite
*/?>

<?php get_header(); ?>

<div class="contentWrapper mainWrapper">
	<header>
		<a class="logoItem" href="<?php echo home_url(); ?>">
			<img class="logoImage" src="<?php bloginfo('template_url')?>/img/logo.svg" alt="logo" onerror="this.src='<?php bloginfo('template_url')?>/img/logo_full.png'"/>
		</a>

		<h4 class="logoDescription"><?php bloginfo('description'); ?></h4>
	</header>
	<?php the_post(); ?>
	<?php echo wp_kses_post( get_field('slideshow') ); ?>
	<article class="pageStyle">
		<div class="xColumnView landingPageText">
			<div class="twoColumnViewItem">
				<?php the_content(); ?>
			</div>
			<div class="twoColumnViewItem">
				<h1>Neuigkeiten</h1>
				<div>
				<?php 
				//custom loop for news
				$args = array( 'posts_per_page' => get_field('news_item_count'), 'orderby' => 'date' , 'order'   => 'DESC');
				$loop = new WP_Query($args);
				while( $loop->have_posts() ) : 
				$loop->the_post(); ?>
				<div class="newsPreview">
					<span class="date"><?php echo get_the_date('d. F');?></span>
					<a class="title" href="<?php the_permalink(); ?>"><?php the_title();?></a>
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
