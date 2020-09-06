<article class="articlePreview">
	<?php if (has_post_thumbnail()): ?>
		<div class="articlePreview__image" style="background-image: url('<?php the_post_thumbnail_url( 'large' ); ?>')">
			<a class="articlePreview__imageLink" href="<?php the_permalink();?>"></a>
		</div>
	<?php endif ?>
	<div class="articlePreview__text">
		<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
		<p class="postMeta"><?php echo get_the_date('d. F Y'); ?>
		<?php if (has_category()): ?>
			| <?php echo get_categorie_simple(get_the_ID()); ?>
		<?php elseif (get_post_type() == 'page'): ?>
			| Seite
		<?php endif; ?>
		</p>
		<p><?php the_excerpt(); ?></p>
	</div>
 </article>
