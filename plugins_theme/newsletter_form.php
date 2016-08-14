<?php
 
/*
Plugin Name: Amani Newsletter Form
Plugin URI: 
Description: [newsletter_form] is the shortcut for our newsletter subscribe form.
Author: Friedrich Weise
Version: 1.0
Author URI: http://weise.io/
*/

/**TODO Change URL**/
define('FORM_ACTION','//lists.amani-kinderdorf.de/subscribe/newsletter');
define('PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('PLUGIN_NAME', "newsletter form");
define ("PLUGIN_VERSION", "1.0");

/**print html content**/
function newsletter_form_get(){
	$form= ' 
 <form method="POST" action="'.FORM_ACTION.'" class="form">
  	<label for="email">E-Mail Adresse</label><input name="email" id="email" required><br>
  	<label for="name">Name (optional) </label><input name="fullname"><br>
  	<input type="submit" name="email-button" value="Anmelden">
  </form>';
	return $form;
}
 
/**add the shortcode for the slider- for use in editor**/
function newsletter_insert($atts, $content=null){
$form= newsletter_form_get();
return $form;
}
add_shortcode('newsletter_form', 'newsletter_insert');

?>