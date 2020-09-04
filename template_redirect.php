<?php
/*
Template Name: Redirect
*/

	$url = get_term_link(get_field('url')[0],'category');
	if(get_field('url_link')) $url = get_field('url_link');
	wp_redirect($url); 
	exit; 
?>
