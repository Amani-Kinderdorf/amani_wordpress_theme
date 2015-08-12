<?php get_header(); ?>
<?php the_post(); ?>

 <div class="contentWrapper mainWrapper">
     <div class="xColumnView">
         <aside class="sideBarViewItem sideBarPageTree">
<?php 
// use wp_list_pages to display parent and all child pages all generations (a tree with parent)
$parent = 6;


$args=array('child_of' => $parent);
$pages = get_pages($args);  
if ($pages) {
  $pageids = array();
  foreach ($pages as $page) {
    $pageids[]= $page->ID;
  }

  $args=array(
    'title_li' => '',
    'include' =>  $parent . ',' . implode(",", $pageids)
  );
  wp_list_pages($args);
}
wp_reset_query();
?>
         </aside>
         <article class="pageContentViewItem pageStyle">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
         </article>
     </div>
      

 </div>
<?php get_footer(); ?>