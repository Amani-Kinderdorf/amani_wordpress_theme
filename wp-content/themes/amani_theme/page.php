<?php get_header(); ?>
<?php the_post(); ?>

 <div class="contentWrapper mainWrapper">
     <div class="xColumnView">
         <?php 
            // use wp_list_pages to display parent and all child pages all generations (a tree with parent)

            //get top level parent
            $parent = array_reverse(get_post_ancestors($post->ID));
            $parent = get_page($parent[0])->ID;
            $args=array('child_of' => $parent);
            $pages = get_pages($args);  

            if ($pages && count($pages)>0) {
                  ?>
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
              ?>
               </aside>
               <?php
            }

            ?>
        
         <article class="pageContentViewItem <?php if(count($pages)==0) echo " oneColumnViewItem "; ?>pageStyle">
            <h1><?php wp_reset_query(); the_title(); ?></h1>

            <?php the_content(); ?>
         </article>
     </div>
      

 </div>
<?php get_footer(); ?>