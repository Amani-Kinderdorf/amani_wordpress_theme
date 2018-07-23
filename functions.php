<?php

//require validations
require_once('helpers/form_validations.php');

//disable emoji script
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//custom image sizes
add_image_size('landing_slideshow', 1100, 2000);
add_image_size('article_full_width', 700, 2000);
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


// set editor role for contact-form-cfdb-7 plugin
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'contact-form-cfdb7/contact-form-cfdb-7.php' ) ) {
	// Add custom capability
	$role = get_role( 'editor' );
	if(!$role->has_cap('cfdb7_access')){
		$role->add_cap( 'cfdb7_access' );
	}
}

//disable toolbar for alls users
show_admin_bar(false);
add_filter('show_admin_bar', '__return_false');


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
function get_page_number() {
	if ( get_query_var('paged') ) {
		print ' | ' . __( 'Page ' , 'hbd-theme') . get_query_var('paged');
	}
} // end get_page_number


//hide Custom Field
define( 'ACF_LITE', false );
//register Custom Fields using PHP
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_kinder',
		'title' => 'Kinder',
		'fields' => array (
			array (
				'key' => 'field_55f92d74c4d78',
				'label' => 'Bild',
				'name' => 'bild',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'id',
				'preview_size' => 'medium',
				'library' => 'uploadedTo',
			),
			array (
				'key' => 'field_55f92e247f141',
				'label' => 'Kinderdorf',
				'name' => 'kinderdorf',
				'type' => 'page_link',
				'required' => 1,
				'post_type' => array (
					0 => 'page',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'child',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_redirect',
		'title' => 'Redirect',
		'fields' => array (
			array (
				'key' => 'field_56aa449b3c8a0',
				'label' => 'Redirect Page',
				'instructions' => 'Leitet auf Archiv der ausgewählten Kategorie weiter.',
				'name' => 'url',
				'type' => 'taxonomy',
				'required' => 0,
				'taxonomy' => 'category',
				'field_type' => 'checkbox',
				'allow_null' => 0,
				'load_save_terms' => 1,
				'return_format' => 'id',
				'multiple' => 0,
			),
			array (
				'key' => 'field_56aa449b3c8a1',
				'label' => 'Redirect Link',
				'instructions' => 'Überschreibt die Auswahl der Kategorie. Leitet auf externe Seite weiter.',
				'name' => 'url_link',
				'type' => 'text',
				'required' => 0,
				'allow_null' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template_redirect.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'send-trackbacks',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_startseite',
		'title' => 'Startseite',
		'fields' => array (
			array (
				'key' => 'field_558d69a00d955',
				'label' => 'Slideshow',
				'name' => 'slideshow',
				'type' => 'wysiwyg',
				'instructions' => 'Einfügen der Standard Wordpress Slideshow.',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_558d7545e6ebc',
				'label' => 'Anzahl der Neuigkeiten',
				'name' => 'news_item_count',
				'type' => 'number',
				'required' => 1,
				'default_value' => 4,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 0,
				'max' => '',
				'step' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'landing_page.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'custom_fields',
				2 => 'comments',
				3 => 'slug',
				4 => 'author',
				5 => 'featured_image',
				6 => 'categories',
				7 => 'tags',
				8 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}

?>
