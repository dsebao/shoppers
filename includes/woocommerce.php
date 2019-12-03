<?php


add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

add_theme_support('post-thumbnails', array('post','page','product'));

/**
 * Remove Woocommerce Select2 - Woocommerce 3.2.1+
 */
function woo_dequeue_select2() {
    if ( class_exists( 'woocommerce' ) ) {
        wp_dequeue_style( 'select2' );
        wp_deregister_style( 'select2' );

        wp_dequeue_script( 'selectWoo');
        wp_deregister_script('selectWoo');
    } 
}
add_action( 'wp_enqueue_scripts', 'woo_dequeue_select2', 100 );

//Agregar el estilo de bootstrap 4 a todos los inputs
function lv2_add_bootstrap_input_classes( $args, $key, $value = null ) {

	/* This is not meant to be here, but it serves as a reference
	of what is possible to be changed.

	$defaults = array(
		'type'			  => 'text',
		'label'			 => '',
		'description'	   => '',
		'placeholder'	   => '',
		'maxlength'		 => false,
		'required'		  => false,
		'id'				=> $key,
		'class'			 => array(),
		'label_class'	   => array(),
		'input_class'	   => array(),
		'return'			=> false,
		'options'		   => array(),
		'custom_attributes' => array(),
		'validate'		  => array(),
		'default'		   => '',
	); */

	// Start field type switch case
	switch ( $args['type'] ) {
		case "select" :  /* Targets all select input type elements, except the country and state select input types */
			$args['class'][] = 'form-group'; // Add a class to the field's html element wrapper - woocommerce input types (fields) are often wrapped within a <p></p> tag
			$args['input_class'] = array('form-control', 'input-lg'); // Add a class to the form input itself
			//$args['custom_attributes']['data-plugin'] = 'select2';
			$args['label_class'] = array('control-label');
			$args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  ); // Add custom data attributes to the form input itself
		break;

		case 'country_select' : /* By default WooCommerce will populate a select with the country names - $args defined for this specific input type targets only the country select element */
			$args['class'][] = 'form-group single-country';
			$args['label_class'] = array('control-label');
		break;

		case "state" : /* By default WooCommerce will populate a select with state names - $args defined for this specific input type targets only the country select element */
			$args['class'][] = 'form-group'; // Add class to the field's html element wrapper
			$args['input_class'] = array('form-control', 'input-lg'); // add class to the form input itself
			//$args['custom_attributes']['data-plugin'] = 'select2';
			$args['label_class'] = array('control-label');
			$args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  );
		break;

		case "password" :
		case "text" :
		case "email" :
		case "tel" :
		case "number" :
			$args['class'][] = 'form-group';
			//$args['input_class'][] = 'form-control input-lg'; // will return an array of classes, the same as bellow
			$args['input_class'] = array('form-control', 'input-lg');
			$args['label_class'] = array('control-label');
		break;

		case 'textarea' :
			$args['input_class'] = array('form-control', 'input-lg');
			$args['label_class'] = array('control-label');
		break;

		case 'checkbox' :
		break;

		case 'radio' :
		break;

		default :
			$args['class'][] = 'form-group';
			$args['input_class'] = array('form-control', 'input-lg');
			$args['label_class'] = array('control-label');
		break;
	}
	return $args;
}
add_filter('woocommerce_form_field_args','lv2_add_bootstrap_input_classes',10,3);




add_filter( 'woocommerce_breadcrumb_defaults', 'inft_woocommerce_breadcrumbs' );
function inft_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '<span class="mx-2 mb-0">&#47;</span>',
            'wrap_before' => '<div class="bg-light py-3"><div class="container"><nav class="woocommerce-breadcrumb mb-0" itemprop="breadcrumb">',
            'wrap_after'  => '</nav></div></div>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );


remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'inft_woocommerce_titulo_lista', 10 );
function inft_woocommerce_titulo_lista() {
	echo '<h3 class="woocommerce-loop-product__title text-dark h3">' . get_the_title() . '</h3>';
}

//add_filter( 'woocommerce_enqueue_styles', '__return_false' );



