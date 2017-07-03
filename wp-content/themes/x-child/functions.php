<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to X in this file.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );



// Additional Functions
// =============================================================================

function w4e_enqueue_styles_and_scripts() {
  // wp_enqueue_style( 'w4e-style', get_stylesheet_directory_uri() . '/style.css' );
  // wp_enqueue_style( 'w4e-main-style', get_stylesheet_directory_uri() . '/css/main.css', [ 'w4e-style' ] );

  wp_register_script( 'react-bundle', get_stylesheet_directory_uri() . '/js/dist/react_bundle.js', [], false, true );
  wp_enqueue_script( 'react-bundle' );
}
add_action( 'wp_enqueue_scripts', 'w4e_enqueue_styles_and_scripts' );

require_once('inc/post-types.php');

function add_custom_post_types() {
  // Experts
  register_expert_post_type();

  // Projects
  register_project_post_type();

  // Companies
  register_company_post_type();
}
add_action( 'init', 'add_custom_post_types' );

function add_custom_post_type_taxonomies() {
  // Experts
  register_expert_taxonomies();

  // Projects
  register_project_taxonomies();

  // Companies
  register_company_taxonomies();
}
add_action( 'init', 'add_custom_post_type_taxonomies' );

function add_roles_on_theme_activation() {
  add_role( 'expert', __( 'Expert', 'work4equity' ), array( 'read' => true, 'level_0' => true ) );
  add_role( 'company', __( 'Company', 'work4equity' ), array( 'read' => true, 'level_0' => true ) );
}
add_action( 'after_switch_theme', 'add_roles_on_theme_activation', 10, 2 );

function remove_roles_on_theme_deactivation() {
  remove_role( 'expert' );
  remove_role( 'company' );
}
add_action( 'switch_theme', 'remove_roles_on_theme_deactivation', 10, 2 );

function register_user_menu() {
  register_nav_menu( 'user_menu', __( 'User Menu', 'work4equity' ) );
}
add_action( 'after_setup_theme', 'register_user_menu' );

include_once( 'inc/registration.php' );

function add_user_menu() {
  wp_die('foo');
}
add_action( 'x_masthead', 'add_user_menu' );

function ajax_update_post_meta() {
  $data = $_POST['data'];

  if(empty($data)) {
    echo false;
  } else {
    update_post_meta( $data['post_id'], $data['meta_key'], $data['meta_value'] );

    echo true;
  }

  wp_die();
}
add_action( 'wp_ajax_nopriv_update_post_meta', 'ajax_update_post_meta' );

require_once( 'inc/shortcodes.php' );

require_once( 'inc/image-sizes.php' );
