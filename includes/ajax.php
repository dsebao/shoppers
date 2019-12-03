<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


function sendform(){
	wp_die();
}
add_action('wp_ajax_sendform', 'sendform');
add_action('wp_ajax_nopriv_panelactions', 'panelactions');
?>