<?php

/*
Site config
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

 
function nombreSitio() {
    return '';
}
function emailNotificaciones() {
    return 'dsebaortiz@gmail.com';
}

function add_scripts(){
	//Agregar CSS
	wp_enqueue_style('iconmoon-css', get_template_directory_uri() . "/fonts/icomoon/style.css");
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . "/css/bootstrap.min.css");
	wp_enqueue_style('magnific-css', get_template_directory_uri() . "/css/magnific-popup.css");
	wp_enqueue_style('jqueryui-css', get_template_directory_uri() . "/css/jquery-ui.css");
	wp_enqueue_style('owl-css', get_template_directory_uri() . "/css/owl.carousel.min.css");
	wp_enqueue_style('owltheme-css', get_template_directory_uri() . "/css/owl.theme.default.min.css");
	wp_enqueue_style('mainstyle-css', get_template_directory_uri() . "/css/style.css");
	//wp_enqueue_style('custom-css', get_template_directory_uri() . "/css/estilo.css");
	

	//Agregar Javascript
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js');
		wp_enqueue_script('jquery');
	}

    wp_enqueue_script('jqui-js', get_template_directory_uri() . "/js/jquery-ui.js");
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . "/js/bootstrap.min.js");
    wp_enqueue_script('owl-js', get_template_directory_uri() . "/js/owl.carousel.min.js");
    wp_enqueue_script('magnific-js', get_template_directory_uri() . "/js/jquery.magnific-popup.min.js");
    wp_enqueue_script('aos-js', get_template_directory_uri() . "/js/aos.js");
    wp_enqueue_script('main-js', get_template_directory_uri() . "/js/main.js");
}
add_action( 'wp_enqueue_scripts', 'add_scripts' );

add_action('wp_head', 'my_ajaxurl');
function my_ajaxurl() {
   echo '<script type="text/javascript">var ajaxurl = "' . admin_url('admin-ajax.php') . '";</script>';
}


/* 
    Add post thumbnail
*/
add_theme_support('post-thumbnails', array('post','page'));


/* 
    Custom nav menu
*/
function register_my_menus() {
  register_nav_menus(
    array(
      'menu' => 'Menu Principal',
    )
  );
}
add_theme_support( 'menus' );
add_action( 'init', 'register_my_menus' );


/*
	Disable Admin Bar
*/
function disable_admin_bar() {
    if ( ! current_user_can('delete_users') ) {
        add_filter('show_admin_bar', '__return_false');
    }
    //add_filter('show_admin_bar', '__return_false');
}

/*
	Function to facility emails notifications in WP
*/
function sendNotification($subject,$content,$email){
	$thebody = '<!doctype html><html><head><meta name="viewport" content="width=device-width"> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> <title>{{subject}}</title> <style media="all" type="text/css"> @media all{.btn-primary table td:hover{background-color: #34495e !important;}.btn-primary a:hover{background-color: #34495e !important; border-color: #34495e !important;}}@media all{.btn-secondary a:hover{border-color: #34495e !important; color: #34495e !important;}}@media only screen and (max-width: 620px){table[class=body] h1{font-size: 28px !important; margin-bottom: 10px !important;}table[class=body] h2{font-size: 22px !important; margin-bottom: 10px !important;}table[class=body] h3{font-size: 16px !important; margin-bottom: 10px !important;}table[class=body] p, table[class=body] ul, table[class=body] ol, table[class=body] td, table[class=body] span, table[class=body] a{font-size: 16px !important;}table[class=body] .wrapper, table[class=body] .article{padding: 10px !important;}table[class=body] .content{padding: 0 !important;}table[class=body] .container{padding: 0 !important; width: 100% !important;}table[class=body] .header{margin-bottom: 10px !important;}table[class=body] .main{border-left-width: 0 !important; border-radius: 0 !important; border-right-width: 0 !important;}table[class=body] .btn table{width: 100% !important;}table[class=body] .btn a{width: 100% !important;}table[class=body] .img-responsive{height: auto !important; max-width: 100% !important; width: auto !important;}table[class=body] .alert td{border-radius: 0 !important; padding: 10px !important;}table[class=body] .span-2, table[class=body] .span-3{max-width: none !important; width: 100% !important;}table[class=body] .receipt{width: 100% !important;}}@media all{.ExternalClass{width: 100%;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}.apple-link a{color: inherit !important; font-family: inherit !important; font-size: inherit !important; font-weight: inherit !important; line-height: inherit !important; text-decoration: none !important;}}</style> </head> <body class="" style="font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #f6f6f6; margin: 0; padding: 0;"> <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;" width="100%" bgcolor="#f6f6f6"> <tr> <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td><td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto !important; max-width: 580px; padding: 10px; width: 580px;" width="580" valign="top"> <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;"> <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;"></span> <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #fff; border-radius: 3px;" width="100%"> <tr> <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top"> <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%"> <tr> <td style="font-family: sans-serif; font-size: 15px; vertical-align: top;" valign="top"> <span style="letter-spacing:4px;font-weight:700;color:#999999">{{site}}</span> </td></tr><tr> <td height="30"></td></tr><tr> <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top"> <p style="font-family: sans-serif; font-size: 16px; font-weight: bold; margin: 0; Margin-bottom: 15px;">{{subject}}</p><br>{{content}}<br></td></tr></table> </td></tr></table> <div class="footer" style="clear: both; padding-top: 10px; text-align: center; width: 100%;"> <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%"> </table> </div></div></td><td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td></tr></table> </body></html>';

    $tpl = str_replace('{{content}}', $content, $thebody);
    $tpl = str_replace('{{subject}}', $subject, $tpl);
    $tpl = str_replace('{{site}}', nombreSitio(), $tpl);

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: '.nombreSitio().' <no-reply@marbar.com.ar>' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    $sent = wp_mail($email, $subject, $tpl, $headers);
    if($sent){
    	return $sent;
    } else {
    	return false;
    }  
}

/*
*
*
* url de la imagen de gravatar
*
*
*/
function get_the_avatar_url($get_avatar){
    preg_match('#src=["|\'](.+)["|\']#Uuis', $get_avatar, $matches);
    return $matches[1];
}


/*
	Define Logged User Data
*/

$theuser = wp_get_current_user();

function after_body() {
	global $message;
	if(isset($message)){?>
		<div class="alert alertbox rounded alert-<?php echo $message[0];?> alert-dismissable fade show">
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <?php echo $message[1];?>
	    </div>

	    <?php if(isset($message[2]) && $message[2] != ''){?>
			<script type="text/javascript">
               $(document).ready(function() {
                  setTimeout("window.location.href = '<?php echo $message[2];?>'",3000);
               });
            </script>
        <?php }
	}
}
add_action('after_body_open_tag', 'after_body');


/* 
Google Analytics
*/
add_action('wp_footer', 'ga');
function ga() { ?>
<?php }
?>