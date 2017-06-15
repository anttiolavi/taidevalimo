<?php

// Clean unnecessary CSS crap from page head
function cleanupPageHead() {
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wp_shortlink_wp_head');

  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);

  add_filter('the_generator', '__return_false');

  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
}

add_action('after_setup_theme', 'cleanupPageHead');

// Add support for featured image
add_theme_support( 'post-thumbnails' );

// Add support for custom background images
$customBackgroundArgs = array(
  'default-color' => 'ffffff',
  'default-image' => '',
  'default-repeat' => '',
  'default-position-x' => '',
  'default-attachment' => '',
  'wp-head-callback' => '_custom_background_cb',
  'admin-head-callback' => '',
  'admin-preview-callback' => ''
);

add_theme_support( 'custom-background', $customBackgroundArgs);

// Add scripts
function addScripts() {
  wp_enqueue_script( 'scripts-js', get_theme_file_uri('/js/scripts.js'), array(), '1.01', true);
}

add_action('wp_enqueue_scripts', 'addScripts');

function addGoogleMapsScript() {
  if (is_page('Yhteys')) {
    echo '<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTRVAzaATViryGcA2eMTFSmaw9cPHcGw4&callback=generateMap"></script>';
  }
}

add_action( 'wp_footer', 'addGoogleMapsScript', 10 );

add_filter('meta_content', 'wptexturize');
add_filter('meta_content', 'convert_smilies');
add_filter('meta_content', 'convert_chars');
add_filter('meta_content', 'wpautop');
add_filter('meta_content', 'shortcode_unautop');
add_filter('meta_content', 'prepend_attachment');
