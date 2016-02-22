<?php
/*
Template Name: Redirect
*/?>

<?php 
	$url = get_term_link(get_field('url')[0],'category');
	wp_redirect($url); 
	exit; 
?>
