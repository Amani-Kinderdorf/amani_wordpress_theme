
<?php
//sidebar for posts
if( is_archive() || is_category() ||  is_single() || is_home() || is_page_template('archive_template.php')): ?>
            <aside class="sideBarViewItem sideBarPageTree">

            <li class="page_item page_item_has_children">
                <a href="<?php echo get_permalink( get_option('page_for_posts' ) );?>">Aktuelle Berichte</a>
                <ul class="children">
                    <?php 
                    //custom loop for news
                    $current = get_the_title();
                    $args = array( 'posts_per_page' => get_option('posts_per_page'), 'orderby' => 'date' , 'order'   => 'DESC');
                    $loop = new WP_Query($args);
                        while( $loop->have_posts() ) : 
                            $loop->the_post(); 
                            if(strcmp($current,get_the_title())==0 && is_category()==false) $current_item = "current_page_item";
                            else $current_item = "";?>
                    <li class="page_item <?php echo $current_item; ?>">
                        <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                    </li><?php  
                        endwhile;
                        wp_reset_query();
                    ?>
                </ul>
            </li>
            <li class="page_item page_item_has_children <?php if(is_page_template('archive_template.php')) echo 'current_page_item'; ?>">
                <a href="<?php echo getArchiveLink() ?>">Archiv</a>
                <ul class="children">
                    <?php wp_list_categories('title_li='); ?>
                    <li class="cat-item"><a href="<?php echo getArchiveLink() ?>">alle Kategorien</a></li>
                </ul>
            </li>

        </aside>
<?php

else:
    //sidebar for pages
    // use wp_list_pages to display parent and all child pages all generations (a tree with parent)
    //get top level parent
    $parent = array_reverse(get_post_ancestors($post->ID));
    global $pages;
    if(count($parent)>0) $parent = $parent[0];
    $parent = get_page($parent)->ID;

    $args=array('child_of' => $parent);
    $pages = get_pages($args); 
            if ($pages && count($pages)>0) { ?>
                <aside class="sideBarViewItem sideBarPageTree">
            <?php
            $pageids = array();
            foreach ($pages as $page) {
                $pageids[]= $page->ID;
            }
            $args=array(
            'title_li' => '',
            'include' =>  $parent . ',' . implode(",", $pageids)
            );
            wp_list_pages($args);
            wp_reset_query();
      ?>
                </aside>
       <?php
  }
endif;
?> 
