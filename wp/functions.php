<?php

function wp_the_content($str) {
	echo apply_filters('the_content', $str);
}

function gpm($pid, $cf) {
    return get_post_meta($pid, $cf, true);
}
/* ======================================================================= */
// Custom Menus
/* ======================================================================= */
function h5bs_register_menus() {
	register_nav_menus(array(
		'primary'   => __('Primary Navigation'),
		'secondary' => __('Secondary Navigation'),
		'tertiary'  => __('Tertiary Navigation')
	));
}

add_action( 'init', 'h5bs_register_menus' );


function h5bs_primary_nav() {
	wp_nav_menu(array( 
		'container'       => false,                        // remove nav container
		'menu'            => 'Primary Nav',                // nav name
		'menu_id'         => 'nav-main',                   // custom id
		'menu_class'      => 'main-nav',                  // custom class
		'theme_location'  => 'primary',                    // where it's located in the theme
		'before'          => '',                           // before the menu
		'after'           => '',                           // after the menu
		'link_before'     => '',                           // before each link
		'link_after'      => '',                           // after each link
		'depth'           => 0,                            // set to 1 to disable dropdowns
		'fallback_cb'     => 'h5bs_primary_nav_fallback'   // fallback function
	));
}


function h5bs_primary_nav_fallback() {
	wp_page_menu(array(
		'menu_class'  => 'nav group',
		'include'     => '',
		'exclude'     => '',
		'link_before' => '',
		'link_after'  => '',
		'show_home'   => true
	));
}



/* ======================================================================= */
// Image Thumbnails
/* ======================================================================= */
add_theme_support( 'post-thumbnails' );

/* ======================================================================= */
// Remove junk from head
/* ======================================================================= */

function h5bs_remove_junk() {
	// Really Simple Discovery
	remove_action( 'wp_head', 'rsd_link' );
	// Windows Live Writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// WP Version
	remove_action( 'wp_head', 'wp_generator' );
}

add_action( 'init', 'h5bs_remove_junk' );
/* ======================================================================= */
// enable excerpt for pages
/* ======================================================================= */
//add_action( 'init', 'my_add_excerpts_to_pages' );
//function my_add_excerpts_to_pages() {
//add_post_type_support( 'page', 'excerpt' );
//}

/* ======================================================================= */
// Enqueue Global Scripts
/* ======================================================================= */
function h5bs_enqueue_scripts() {
//	wp_deregister_script( 'jquery' );
//	wp_register_script( 'jquery', get_template_directory_uri() . '/lib/js/jquery.js', array(), '2.1.1', true );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/lib/js/modernizr.js', array(), '2.1', false );
	wp_register_script( 'skrollr', get_template_directory_uri() . '/lib/js/skrollr.js', array( 'jquery' ), '2.1', true );
    wp_register_script( 'flexslider', get_template_directory_uri() . '/lib/js/jquery.flexslider.js', array( 'jquery' ), '2.1', true );
    wp_register_script( 'smoothscrooll', get_template_directory_uri() . '/lib/js/jquery.smooth-scroll.min.js', array( 'jquery' ), '2.1', true );
	wp_register_script( 'script', get_template_directory_uri() . '/lib/js/scripts.js', array( 'jquery' ), '2.1', true );

	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'skrollr' );
    wp_enqueue_script( 'flexslider' );
    wp_enqueue_script( 'smoothscrooll' );
	wp_enqueue_script( 'script' );
}

add_action( 'wp_enqueue_scripts', 'h5bs_enqueue_scripts' );
/* Load Script for Uploading */
/*=======================================================================*/
function enqueue_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	//wp_enqueue_script('datepickr', get_bloginfo('template_url') . '/lib/js/datepickr.min.js', array(), '1.0', true);
	wp_enqueue_script('custom-admin-script', get_bloginfo('template_url') . '/lib/js/custom-admin-script.js', array('jquery', 'thickbox', 'media-upload'), '1.0', true);
}
add_action('admin_print_scripts', 'enqueue_admin_scripts');;
/* Stylesheet for Admin only */
/*=======================================================================*/
function enqueue_admin_style() {
	wp_enqueue_style('thickbox', get_bloginfo('siteurl') . 'wp-includes/js/thickbox/thickbox.css', false, false, 'screen');	
	wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/lib/css/custom-admin-style.css', false, false, 'screen');
}
add_action('admin_print_styles', 'enqueue_admin_style');
/* ======================================================================= */
// Sidebars & Widgetizes Areas
/* ======================================================================= */
function h5bs_register_sidebars() {
	register_sidebar(array(
		'id'            => 'sidebar1',
		'name'          => 'Sidebar 1',
		'description'   => 'The first (primary) sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
    register_sidebar(array(
        'id'            => 'page-sidebar',
        'name'          => 'Page Widget Area',
        'description'   => 'Widgetarea for inner pages.',
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title">',
        'after_title'   => '</div>',
    ));

}


add_action( 'widgets_init', 'h5bs_register_sidebars' );

/* ======================================================================= */
// dynamic classes and body IDs
/* ======================================================================= */
function dynamicClass() {

    global $post;
    $page_slug = $post->post_name;

    if (!empty($post->post_parent)) {
        $parent = get_post($post->post_parent);
        $parent_slug = $parent->post_name;
        $class = "$parent_slug $page_slug";
    } else {
        $class = "$page_slug";
    }

    return $class;
}

function pageID() {
    global $post;
    return $post->post_name;
}

function dynamicBody() {

    $dynamic_class = dynamicClass();
    $page_id = pageID();
    $classes = get_body_class(false);
    $default_classes = implode(" ", $classes);

    if (is_front_page()) {
        echo 'id="home" class="' . $default_classes . '"';
    } elseif (is_home()) {
        // echo 'id="blog"';
        echo 'id="blog" class="interior ' . $dynamic_class . ' ' . $default_classes . '"';
    } elseif (is_single()) {
        echo 'id="blog" class="interior ' . $dynamic_class . ' ' . $default_classes . '"';
    } elseif (is_archive()) {
        //echo 'id="blog" class="archive"';
        echo 'id="blog" class="interior ' . $dynamic_class . ' ' . $default_classes . '"';
    } elseif (is_search()) {
        //echo 'id="search"';
        echo 'id="search" class="interior ' . $dynamic_class . ' ' . $default_classes . '"';
    } else {
        echo 'id="' . $page_id . '" class="interior ' . $dynamic_class . ' ' . $default_classes . '"';
    }
}
/* ======================================================================= */
/** https://github.com/blineberry/Improved-HTML5-WordPress-Captions **/
// Removes inline styling from wp-caption and changes to HTML5 figure/figcaption
/* ======================================================================= */

add_filter( 'img_caption_shortcode', 'h5bs_img_caption_shortcode_filter', 10, 3 );

function h5bs_img_caption_shortcode_filter($val, $attr, $content = null) {
	extract(shortcode_atts(array(
		'id'      => '',
		'align'   => '',
		'width'   => '',
		'caption' => ''
	), $attr));
	
	if ( 1 > (int) $width || empty($caption) )
		return $val;

	return '<figure id="' . $id . '" class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . 'px;">'
	. do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $caption . '</figcaption></figure>';
}

/* ======================================================================= */
/* User Photos CPT */
/* ======================================================================= */

add_action('init', 'register_userphotos');
function register_userphotos() {
    $labels = array(
        'name' => _x('User Photos', 'post type general name'),
        'singular_name' => _x('User Photo', 'post type singular name'),
        'add_new' => _x('Add New', 'User Photo'),
        'add_new_item' => __('User Photo'),
        'all_items' => __('All User Photos'),
        'edit_item' => __('Edit User Photo'),
        'new_item' => __('New User Photo'),
        'view_item' => __('View User Photo'),
        'search_items' => __('Search Removal User Photo'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'menu_icon' =>  get_stylesheet_directory_uri() . '/images/user-photos.png',
        'rewrite' => array('slug'=> 'userphoto'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail')
    );
    register_post_type( 'userphoto' , $args );

    flush_rewrite_rules( true );
}
/* ======================================================================= */
/* Client Options Page */
/* ======================================================================= */
require_once( 'lib/inc/client-options.php' );
add_action( 'admin_menu', 'h5bs_client_options' );

function lds_word_count($text, $words) {
    $res="";
    $text=split(" ", strip_tags(html_entity_decode($text)));
    for($i=0; $i<$words; $i++) {
        $res.=$text[$i]." ";
    }
    if(count($text)>$words) {
        $res.= "...";
    }
    return $res/*.$r_more*/;
}
