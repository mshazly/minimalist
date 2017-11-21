<?php
//removing overhead stylesheets
// function child_remove_parent_function() {
// remove_action('wp_print_scripts', 'dtheme_print_inline_style' );
// }
// add_action( 'wp_loaded', 'child_remove_parent_function' );
//
// //add selective required stylesheets
// function wpdocs_theme_name_scripts() {
//     wp_enqueue_style( 'detheme_default', get_template_directory_uri() . '/style.css' );
//     wp_enqueue_style( 'detheme_extention', get_template_directory_uri() . '/css/detheme.css' );
//     wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
//     wp_enqueue_style( 'noshor', get_stylesheet_uri() );
//     //wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
// }
// add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

//removing WP starch
//jQuery
function wpdocs_dequeue_script() {
   wp_dequeue_script( 'jquery' );
   wp_dequeue_script( 'jquery-migrate' );
}
add_action( 'wp_print_scripts', 'wpdocs_dequeue_script', 100 );
//emoji :/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//minimalist assets
function minimalist_scripts() {
        wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.css', '0.9' );
        wp_enqueue_script('jquery-cdn', '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', NULL, '3.2.1', FALSE);
        wp_enqueue_script('popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', NULL, '1.12.7', TRUE);
        wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', NULL, '0.9', TRUE);
        wp_localize_script( 'scripts-js', 'global_var', array('ajax_url' => admin_url( 'admin-ajax.php' ), 'template_dir' => get_template_directory_uri(), 'site_url'=>get_bloginfo('url')));
}
add_action( 'wp_enqueue_scripts', 'minimalist_scripts' );

//TGMPA
require('tgm-plugins.php');

//CUSTOMIZER
require('customizer.php');
add_theme_support( 'customize-selective-refresh-widgets' );
add_theme_support( 'custom-logo' );

//RTL css
function RTL_css() {
echo"<style>

            body{
                text-align: right;
            }
            section, row, .container #main div, p, h1, h2, h3, h4, h5, h6 {
                direction: rtl;
                text-align: right;
                font-family: 'Conv_NotoKufiArabic-Bold';
            }
            p{
                font-family: 'Conv_NotoNaskhArabic-Regular';
            }
            div.container{
                direction: ltr;
            }
            #cssmenu>ul>li, .logo {
                float: right;
            }

            @font-face {
             font-family: 'Conv_NotoKufiArabic-Bold';
            	src: url('fonts/NotoKufiArabic-Bold.eot');
            	src: local('☺'), url('".get_template_directory_uri()."/fonts/NotoKufiArabic-Bold.woff') format('woff'), url('".get_template_directory_uri()."/fonts/NotoKufiArabic-Bold.ttf') format('truetype'), url('".get_template_directory_uri()."/fonts/NotoKufiArabic-Bold.svg') format('svg');
            	font-weight: normal;
            	font-style: normal;
            }
            @font-face {
            	font-family: 'Conv_NotoNaskhArabic-Regular';
            	src: url('fonts/NotoNaskhArabic-Regular.eot');
            	src: local('☺'), url('".get_template_directory_uri()."/fonts/NotoNaskhArabic-Regular.woff') format('woff'), url('".get_template_directory_uri()."/fonts/NotoNaskhArabic-Regular.ttf') format('truetype'), url('".get_template_directory_uri()."/fonts/NotoNaskhArabic-Regular.svg') format('svg');
            	font-weight: normal;
            	font-style: normal;
            }
        </style>";

}

(get_theme_mod('lang_dir') == 'rtl')? add_action('wp_head', 'RTL_css') : NULL;





//register menu to admin panel
function minimalist_menu() {
  register_nav_menu('minimalist-menu',__( 'Minimalist Menu' ));
}
add_action( 'init', 'minimalist_menu' );


//custom minimalist_navigation
function minimalist_navigation(){

 $theme_locations = get_nav_menu_locations();
 $menu_items = wp_get_nav_menu_items($theme_locations['minimalist-menu']);
   $menu_html = '<ul>';
 foreach($menu_items as $menu_item):
   ( get_permalink() == $menu_item->url )? $active = 'class="active"' : $active = NULL;
   $menu_html .=  '<li '.$active.'><a href="'.$menu_item->url.'">'.$menu_item->title.'</a></li>';

 endforeach;
  $menu_html .= '</ul>';

 return $menu_html;
}

?>
