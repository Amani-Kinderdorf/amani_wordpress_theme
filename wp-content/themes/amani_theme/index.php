
<?php get_header(); ?>


<div class="contentWrapper mainWrapper">
     <div class="xColumnView">
        <aside class="sideBarViewItem sideBarPageTree">

        	<li class="page_item page_item_has_children current_page_item">
        		<a href="#">Aktuelle Berichte</a>
                <ul class="children">
                    <?php 
                    //custom loop for news
                    $current = get_the_title();
                    $args = array( 'posts_per_page' => get_field('news_item_count'), 'orderby' => 'date' , 'order'   => 'DESC');
                    $loop = new WP_Query($args);
                        while( $loop->have_posts() ) : 
                            $loop->the_post(); 
                            if(strcmp($current,get_the_title())==0) $current_item = "current_page_item";
                            else $current_item = "";?>
                    <li class="page_item <?php echo $current_item; ?>">
                        <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                    </li><?php  
                        endwhile;
                        wp_reset_query();
                    ?>
                </ul>
			</li>
        	<li class="page_item page_item_has_children">
        		<a href="#">Archiv</a>
        		<ul class="children">
        		</ul>
			</li>

        </aside>
        <article class="pageContentViewItem <?php if(count($pages)==0) echo " oneColumnViewItem "; ?>pageStyle">
            <h1><?php wp_reset_query(); the_title(); ?></h1>
            <?php the_content(); ?>
         </article>
     </div>
 </div>





<?php get_footer(); ?>