<?php

add_image_size('landing_slideshow', 1100, 2000);
add_image_size('child_preview',260,260);

add_action( 'init', 'create_post_type_child' );
add_theme_support( 'menus' );

function create_post_type_child() {
  register_post_type( 'child',
    array(
      'labels' => array(
        'name'                => __( 'Kinder' ),       
        'singular_name'       => __( 'Kind' ),
        'menu_name'           => __( 'Kinder', 'amani_theme' ),
        'all_items'           => __( 'Alle Kinder', 'amani_theme' ),
        'add_new_item'        => __( 'Kind erstellen', 'amani_theme' ),
        'add_new'             => __( 'Kind erstellen', 'amani_theme' ),
        'edit_item'           => __( 'Kind bearbeiten', 'amani_theme' ),
        'update_item'         => __( 'Kind ändern', 'amani_theme' ),
        'search_items'        => __( 'Nach Kindern suchen', 'amani_theme' ),
        'not_found'           => __( 'Kein Kind gefunden', 'amani_theme' ),
		),
      'public' => true,
      'has_archive' => false,     
      'hierarchical' => false,
      'menu_position' => 4,
      'capability_type' => 'post',
      'menu_icon' => 'dashicons-universal-access',
      'supports' => array('title','editor'),
    )
  );
}

//disable highlighning in main menu for 404 and search
function modify_css_class($css_class, $page) {
	if (is_404() || is_search()) {
		foreach ($css_class as $k=>$v) {
			if ($v=='current_page_parent') unset($css_class[$k]);
		}
	}
	return $css_class;
}
add_filter('nav_menu_css_class','modify_css_class',10,2);

function getArchiveLink() {
	$args = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'archive_template.php'
];
	$pages = get_posts($args);
	if(count($pages)==0) echo "error. please create the page using the template archive_template.php";
	return get_permalink($pages[0]);
}

function get_categorie_simple($id) {
	$result = "";
	foreach(wp_get_post_categories(get_the_ID()) as $c)
	{
		$cat = get_category($c);
		$result = $result.'<a href="'.get_category_link($c).'">'.$cat->name.'</a>';
	}

	if(strlen($result)==0)$result = "Keine Kategorie";
	return $result;
}




//gallery overwrite
add_filter('post_gallery', 'my_post_gallery', 10, 2);
function my_post_gallery($output, $attr) {
    global $post;
    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }
    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => 'rand'));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }
    if (empty($attachments)) return '';
    $output .= "<div id=\"slideShowContent\">\n";
    foreach ($attachments as $id => $attachment) {
        $img = wp_get_attachment_image_src($id, 'landing_slideshow');
        $output .= '<div class="contentDiv" style="background-image:url('.$img[0].')"><h3>'.get_post($id)->post_excerpt.'</h3></div>';
    }
    $output .= "</div>\n";

    return $output;
}

//import theme plugins
add_action('after_setup_theme', 'load_plugins');
//load plugin
function load_plugins() {
	if (!function_exists('newsletter_form_get')) {
		include_once(TEMPLATEPATH.'/plugins_theme/newsletter_form.php');
	}
}


















	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable($locale_file) )
	    require_once($locale_file);

	// Get the page number
	function get_page_number() {
	    if ( get_query_var('paged') ) {
	        print ' | ' . __( 'Page ' , 'hbd-theme') . get_query_var('paged');
	    }
	} // end get_page_number

	// Custom callback to list comments in the hbd-theme style
	function custom_comments($comment, $args, $depth) {
	  $GLOBALS['comment'] = $comment;
	    $GLOBALS['comment_depth'] = $depth;
	  ?>
	    <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
	        <div class="comment-author vcard"><?php commenter_link() ?></div>
	        <div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'hbd-theme'),
	                    get_comment_date(),
	                    get_comment_time(),
	                    '#comment-' . get_comment_ID() );
	                    edit_comment_link(__('Edit', 'hbd-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
	  <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'hbd-theme') ?>
	          <div class="comment-content">
	            <?php comment_text() ?>
	        </div>
	        <?php // echo the comment reply link
	            if($args['type'] == 'all' || get_comment_type() == 'comment') :
	                comment_reply_link(array_merge($args, array(
	                    'reply_text' => __('Reply','hbd-theme'),
	                    'login_text' => __('Log in to reply.','hbd-theme'),
	                    'depth' => $depth,
	                    'before' => '<div class="comment-reply-link">',
	                    'after' => '</div>'
	                )));
	            endif;
	        ?>
	<?php } // end custom_comments
	
	// Custom callback to list pings
	function custom_pings($comment, $args, $depth) {
	       $GLOBALS['comment'] = $comment;
	        ?>
	            <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
	                <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'hbd-theme'),
	                        get_comment_author_link(),
	                        get_comment_date(),
	                        get_comment_time() );
	                        edit_comment_link(__('Edit', 'hbd-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
	    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'hbd-theme') ?>
	            <div class="comment-content">
	                <?php comment_text() ?>
	            </div>
	<?php } // end custom_pings
	
	// Produces an avatar image with the hCard-compliant photo class
	function commenter_link() {
	    $commenter = get_comment_author_link();
	    if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
	        $commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
	    } else {
	        $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
	    }
	    $avatar_email = get_comment_author_email();
	    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
	    echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
	} // end commenter_link
	
	// For category lists on category archives: Returns other categories except the current one (redundant)
	function cats_meow($glue) {
	    $current_cat = single_cat_title( '', false );
	    $separator = "\n";
	    $cats = explode( $separator, get_the_category_list($separator) );
	    foreach ( $cats as $i => $str ) {
	        if ( strstr( $str, ">$current_cat<" ) ) {
	            unset($cats[$i]);
	            break;
	        }
	    }
	    if ( empty($cats) )
	        return false;

	    return trim(join( $glue, $cats ));
	} // end cats_meow
	
	// For tag lists on tag archives: Returns other tags except the current one (redundant)
	function tag_ur_it($glue) {
	    $current_tag = single_tag_title( '', '',  false );
	    $separator = "\n";
	    $tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
	    foreach ( $tags as $i => $str ) {
	        if ( strstr( $str, ">$current_tag<" ) ) {
	            unset($tags[$i]);
	            break;
	        }
	    }
	    if ( empty($tags) )
	        return false;

	    return trim(join( $glue, $tags ));
	} // end tag_ur_it
	


	// update_option( 'sidebars_widgets', NULL );
	
	// Check for static widgets in widget-ready areas
	function is_sidebar_active( $index ){
	  global $wp_registered_sidebars;

	  $widgetcolums = wp_get_sidebars_widgets();

	  if ($widgetcolcdums[$index]) return true;

	    return false;
	} // end is_sidebar_active

	//////////////////////////////////////////////////////////////////


?>