
<?php
//sidebar for posts
if( is_archive() || is_category() ||  is_single() || is_home() || is_page_template('archive_template.php')): ?>
			<aside class="sideBarViewItem sideBarPageTree">
				<li class="page_item page_item_has_children <?php if(is_home()) echo 'current_page_item'; ?>">
					<a class="hiddenMobile" href="<?php echo get_post_type_archive_link('post'); ?>">Alle Kategorien</a>
					<div class="sideBarPageTreeHeading visibleMobile">
						<a href="<?php echo get_post_type_archive_link('post'); ?>">Alle Kategorien</a>
						<span class="showMoreButton" onclick="
						this.parentNode.nextElementSibling.classList.toggle('sideBarPageTreeItems--visible');
						this.parentNode.classList.toggle('sideBarPageTreeHeading--visible');">
							Kategorie wählen
							<span class="showMoreIcon"></span>
						</span>
					</div>
					<ul class="children sideBarPageTreeItems">
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
	$parenActiveClass = '';
	if($post->ID == $parent)  $parenActiveClass = 'current_page_item_parent';
		if ($pages && count($pages)>0) { ?>
			<aside class="sideBarViewItem sideBarPageTree">
				<li class="page_item page_item_has_children">
					<a  class="sideBarPageTreeHeading <?php echo $parenActiveClass; ?> hiddenMobile" 
						href="<?php echo get_permalink($parent); ?>">
						<?php echo get_the_title($parent); ?>
					</a>
					<a  class="sideBarPageTreeHeading <?php echo $parenActiveClass; ?> visibleMobile" 
						onclick="return toggleMobileMenu(this);">
						<span class="showMoreButton">Unterseiten<span class="showMoreIcon"></span></span>
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
