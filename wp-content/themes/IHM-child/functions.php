<?php

/*=============================================
Enque Scripts 
=============================================*/

function IHM_load_files() {

    // Custom Scripts
    wp_register_script('human_scripts', get_stylesheet_directory_uri() . '/js/IHM_scripts.js', '','', true);
    wp_enqueue_script( 'human_scripts');

    // Fancybox
    wp_register_script('IHM_fancybox_js', get_stylesheet_directory_uri() . '/fancybox/jquery.fancybox.js', '','', true);
    wp_enqueue_script('IHM_fancybox_js');

    wp_register_style('IHM_fancybox_css', get_stylesheet_directory_uri() . '/fancybox/jquery.fancybox.css','','','');
    wp_enqueue_style('IHM_fancybox_css');

}

add_action( 'wp_enqueue_scripts', 'IHM_load_files' );

/*=============================================
Overwrite custom post types created by Bridge theme
=============================================*/

require_once( get_stylesheet_directory() . '/includes/qode-custom-post-types.php' );

/*=============================================
Add Custom Class to Menu Items Link
=============================================*/

function add_menuclass($ulclass) {
return preg_replace('/<a rel="IHM_popup"/', '<a class="IHM_popup"', $ulclass, 1);
}
add_filter('wp_nav_menu','add_menuclass');

/*=============================================
Custom Login Screen
=============================================*/

// Change the login logo URL

function my_loginURL() {
    return 'http://welcome.us';
}
add_filter('login_headerurl', 'my_loginURL');

// Enque the login specific stylesheet for design customizations

function my_logincustomCSSfile() {
    wp_enqueue_style('login-styles', get_stylesheet_directory_uri() . '/login/login_styles.css');
}
add_action('login_enqueue_scripts', 'my_logincustomCSSfile');


/*=============================================
Add Body class for single post categories
=============================================*/

add_filter('body_class','add_category_to_single', 10 , 2);
function add_category_to_single($classes, $class) {
    if (is_single() ) {
        global $post;
        foreach((get_the_category($post->ID)) as $category) {
            echo $category->cat_name . ' ';
            // add category slug to the $classes array
            $classes[] = 'category-'.$category->slug;
        }
    }
    // return the $classes array
    return $classes;
}

/*=============================================
Change label mailchimp form
=============================================*/

function alter_mailchimp_field_labels( $label ) {

        switch ( $label ) {
            default :
                echo $label;
            break;

            case 'Email Address': // text of the existing label
                echo 'Email'; // new email label text
            break;
        }
    }
add_filter( 'yikes_mc_field_label' , 'alter_mailchimp_field_labels' );

/*=============================================
Filter Yoast Meta Priority
=============================================*/

add_filter( 'wpseo_metabox_prio', function() { return 'low';});