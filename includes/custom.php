<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_theme_support( 'widgets' );

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => 'Sidebar Tienda',
        'id' => 'sidebar-tienda',
        'before_widget' => '<div class="border p-4 rounded mb-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="mb-3 h6 text-uppercase text-black d-block">',
		'after_title'   => '</h3>',
    ));
}
