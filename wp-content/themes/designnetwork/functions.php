<?php
require_once('modal/class.Base.php');
require_once('modal/class.Project.php');
require_once(STYLESHEETPATH . '/includes/wordpress-tweaks.php');
// Load custom visual composer templates
apex_loadVCTemplates();
$designWidth = 1600;
$apexAdjustStylesheet = 'understrap-theme';

add_action( 'wp_enqueue_scripts', 'rk_enqueue_styles');
function rk_enqueue_styles() {
    wp_enqueue_style( 'understrap-theme', get_stylesheet_directory_uri() . '/css/child-theme.css?' . filemtime(get_stylesheet_directory() . '/css/child-theme.css'));
    wp_enqueue_style( 'google_font_roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,700');
    wp_enqueue_style( 'google_font_cabin', 'https://fonts.googleapis.com/css?family=Cabin:400,700');
    wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/node_modules/slick-carousel/slick/slick.css');
    wp_enqueue_script( 'masonry', get_stylesheet_directory_uri() . '/node_modules/masonry-layout/dist/masonry.pkgd.js');
    wp_enqueue_script('understap-theme-js', get_stylesheet_directory_uri() . '/js/theme.js?' . filemtime(get_stylesheet_directory() . '/js/theme.js'), array('jquery'));
    wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/node_modules/slick-carousel/slick/slick.js');
}
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_filter( 'vc_load_default_templates', 'bfe_vc_load_default_templates' ); // Hook in

add_image_size( 'feature-image-size', 767, 511, true);

function bfe_vc_load_default_template( $data ) {
    return array();
}
function getProjects() {
    $projects = Array();
    $posts_array = get_posts([
        'post_type' => 'project',
        'post_status' => 'publish',
        'numberposts' => -1,
        'order' => 'asc'
    ]);
    foreach ($posts_array as $post) {
        $project = new Project($post);
        $projects[] = $project;
    }
    return $projects;
}
/*
function dn_get_post_type($type, $orderby = 'post_date') {
    $args = array(
        'post_type' => $type,
        'post_status' => 'publish',
        'orderby' => $orderby,
        'order' => 'ASC'
    );
    $result = array();
    $result = new WP_Query($args);


    return $result;
}

function dn_get_custom_field($id, $fieldIn, $prefix = 'wpcf-') {
    $field = $prefix;
    $field .= $fieldIn;
    $details = get_post_meta($id);
    return $details[$field][0];
}

function dn_get_image_id($guid) {
    global $wpdb;
    $sql = 'SELECT ID FROM wp_posts WHERE guid = "' . $guid . '"';
    $result = $wpdb->get_results($sql);

    return $result[0]->ID;
}
function dn_is_category($postid) {
    global $wpdb;
    $sql = 'SELECT count(ID) as category FROM wp_posts WHERE ID = ' . $postid . ' AND post_type = "project-category"';
    $result = $wpdb->get_results($sql);

    return $result[0]->category;
}
*/
