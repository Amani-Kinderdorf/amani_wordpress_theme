
<?php
//sidebar for posts
if( is_archive() || is_category() ||  is_single() || is_home() || is_page_template('archive_template.php')): ?>
            <aside class="sideBarViewItem sideBarPageTree">
                <li id="aktuelle-berichte" class="page_item page_item_has_children">
                    <a class="sideBarPageTreeHeading" 
                        onclick="
                        this.nextElementSibling.classList.toggle('sideBarPageTreeItems--visible');
                        this.parentNode.nextElementSibling.classList.toggle('sideBarPageTreeItems--visible');
                        this.classList.toggle('sideBarPageTreeHeading--visible');">
                        Aktuelle Berichte
                        <span class="showMoreButton"></span>
                    </a>
                    <ul class="children sideBarPageTreeItems">
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
                <li class="page_item page_item_has_children <?php if(is_page_template('archive_template.php')) echo 'current_page_item'; ?> sideBarPageTreeItems">
                    <a href="<?php echo getArchiveLink() ?>">Archiv</a>
                    <ul class="children">
                        <li class="cat-item"><a href="<?php echo getArchiveLink() ?>">alle Kategorien</a></li>
                        <?php wp_list_categories('title_li='); ?>
                    </ul>
                </li>
        </aside>
<?php

else:
    //sidebar for pages
    // use wp_list_pages to display parent and all child pages
    //get top level parent
    $parent = array_reverse(get_post_ancestors($post->ID));
    global $pages;
    if(count($parent)>0) $parent = $parent[0];
    $parent = get_page($parent)->ID;
    $args=array('child_of' => $parent);
    $pages = get_pages($args); 
        if ($pages && count($pages)>0) { ?>
            <aside class="sideBarViewItem sideBarPageTree">
                <li class="page_item page_item_has_children">
                    <a class="sideBarPageTreeHeading" 
                        onclick="this.nextElementSibling.classList.toggle('sideBarPageTreeItems--visible'); this.classList.toggle('sideBarPageTreeHeading--visible');">
                        <?php echo get_the_title($parent); ?>
                        <span class="showMoreButton"></span>
                    </a>
                    <ul class="children sideBarPageTreeItems">
                    <?php
                    $args=array(
                    'title_li' => '',
                    'child_of' =>  $parent
                    );
                    wp_list_pages($args);
                    wp_reset_query();
                    ?>
                    </ul></li>
            </aside>
       <?php
  }
endif;
?> 