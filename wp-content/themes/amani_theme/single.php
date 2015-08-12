<?php get_header(); ?>
<?php the_post(); ?>

 <div class="contentWrapper mainWrapper">
     <div class="xColumnView">
         <aside class="sideBarViewItem">
         <ul><li>TODO - Parent Page Link</li></ul>
            <?php 
                if($post->post_parent)
                    $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
                else
                    $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
                if ($children) { ?>
                <ul>
                <?php echo $children; ?>
                </ul>
                <?php } 
            ?>
         </aside>
         <article class="pageContentViewItem pageStyle">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
         </article>
     </div>
      

 </div>
<?php get_footer(); ?>