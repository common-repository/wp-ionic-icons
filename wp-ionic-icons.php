<?php
   /*
   Plugin Name: WP Ionic Icons
   Plugin URI: https://wordpress.org/plugins/wp-ionic-icons/
   Description: This plugin allows you to easily embed Ionicons to your website using HTML or built-in shortcode handlers. Shortcode sample: [wpion icon="headr"]
   Version: 2.1
   Author: Zayed Baloch
   Author URI: https://twitter.com/zayedbaloch
   License: GPL2
   */

defined('ABSPATH') or die("No script kiddies please!");
define( 'ZB_WPIONIC_VERSION',   '2.1' );
define( 'ZB_WPION_URL', plugins_url( '', __FILE__ ) );
define( 'ZB_WPIONIC_TEXTDOMAIN',  'wp_ionicons' );

function zb_wp_ionic_icons() {
  load_plugin_textdomain( ZB_WPIONIC_TEXTDOMAIN );
}
add_action( 'init', 'zb_wp_ionic_icons' );

function wp_ionicons_style() {
  
  wp_enqueue_script( 'wpionicons-ionicons-esm-js', ZB_WPION_URL . '/wpionicons/ionicons/ionicons.esm.js', array( 'jquery' ), ZB_WPIONIC_VERSION, true );
  wp_enqueue_script( 'wpionicons-ionicons-js', ZB_WPION_URL . '/wpionicons/ionicons/ionicons.js', array( 'jquery' ), ZB_WPIONIC_VERSION, true );
}
add_action('wp_enqueue_scripts', 'wp_ionicons_style');

function wp_ion_shortcode( $atts ) {
  extract( shortcode_atts( array( 'icon' => 'home', 'size' => '', 'color' => '' ), $atts ) );
  if ( $size ) { $size = 'class="wpion-' . $size . '" '; } else{ $size = ''; }
  if ( $color ) { $color = ' style="color: ' . $color . '"'; } else{ $color = ''; }

  return '<ion-icon name="'.str_replace('ion-','',$icon).'" ' . $size . $color . '></ion-icon>';
  //return '<i class="icon ion-'.str_replace('ion-','',$icon).'"></i>';
}

add_shortcode( 'wpion', 'wp_ion_shortcode' );
add_filter('wp_nav_menu_items', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');
add_filter('widget_title', 'do_shortcode');

function wpion_add_shortcode_to_title( $title ){
  return do_shortcode($title);
}
add_filter( 'the_title', 'wpion_add_shortcode_to_title' );

// Enqueue Style
function wpionicons_enqueue_script() {
  wp_enqueue_style( 'wpionicons-fontsize', ZB_WPION_URL . '/wpion.css', array(), ZB_WPIONIC_VERSION );
}
add_action( 'wp_enqueue_scripts', 'wpionicons_enqueue_script');

// ADMIN STYLE ENQUEUE
function wpionicons_style_admin() {
  wp_enqueue_style('wpionicons-style-admin', ZB_WPION_URL.'/style.css', array(), ZB_WPIONIC_VERSION);
}

add_action('admin_enqueue_scripts', 'wpionicons_style_admin');

// MEC BUTTON FOR CLASSIC BUILDER

function wpionicons_add_mce_button() {
  if ( !current_user_can( 'edit_posts' ) &&  !current_user_can( 'edit_pages' ) ) {
    return;
  }
 if ( 'true' == get_user_option( 'rich_editing' ) ) {
   add_filter( 'mce_external_plugins', 'wpionicons_add_tinymce_plugin' );
   add_filter( 'mce_buttons', 'wpionicons_register_mce_button' );
 }
}
add_action('admin_head', 'wpionicons_add_mce_button');

function wpionicons_register_mce_button( $buttons ) {
  array_push( $buttons, 'shortcode_wp_ionicons_insert_zb' );
  return $buttons;
}


function wpionicons_add_tinymce_plugin( $plugin_array ) {
  $plugin_array['shortcode_wp_ionicons_insert_zb'] = ZB_WPION_URL .'/script.js';
  return $plugin_array;
}