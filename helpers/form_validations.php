<?php
add_filter( 'wpcf7_validate_text*', 'custom_text_filter', 20, 2 );
add_filter( 'wpcf7_validate_text', 'custom_text_filter', 20, 2 );

// source: https://stackoverflow.com/a/23471740
// source: https://stackoverflow.com/a/15920158
$validations = [
	'betrag' => [
		'reg' => '^(\d+((\.|,)\d{2})?)$', 
		'message' => 'Bei der Betragseingabe nur Zahlen eingeben, oder ein Komma zur Abtrennung der Cents (z.B. 12 oder 12,00).'
	],
	'iban' => [
		'reg' => '^DE\d{2}\s?([0-9a-zA-Z]{4}\s?){4}[0-9a-zA-Z]{2}$',
		'message' => 'Die eingegebene IBAN enthält einen Fehler.'
	],
	'bic' => [
		'reg' => '/^[a-z]{6}[0-9a-z]{2}([0-9a-z]{3})?\z/i',
		'message' => 'Die eingegebene BIC enthält einen Fehler.'
	]
];

function custom_text_filter( $result, $tag ) {
	foreach ($validations as $key => $validation) {
		//key exists
		if($key == $tag->name) {
			//check regex pattern
			if(!preg_match($validation['reg'], $_POST[$key], $matches)) {
				$result->invalidate($tag, $validation['message'];
			}
		}
	}
	return $result;
}

?>
