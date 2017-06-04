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
}
add_action( 'wp_enqueue_scripts', 'w4e_enqueue_styles_and_scripts' );

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

function register_expert_post_type() {
  $labels = array(
		'name'               => _x( 'Experts', 'post type general name', 'work4equity' ),
		'singular_name'      => _x( 'Expert', 'post type singular name', 'work4equity' ),
		'menu_name'          => _x( 'Experts', 'admin menu', 'work4equity' ),
		'name_admin_bar'     => _x( 'Expert', 'add new on admin bar', 'work4equity' ),
		'add_new'            => _x( 'Add New', 'expert', 'work4equity' ),
		'add_new_item'       => __( 'Add New Expert', 'work4equity' ),
		'new_item'           => __( 'New Expert', 'work4equity' ),
		'edit_item'          => __( 'Edit Expert', 'work4equity' ),
		'view_item'          => __( 'View Expert', 'work4equity' ),
		'all_items'          => __( 'All Experts', 'work4equity' ),
		'search_items'       => __( 'Search Experts', 'work4equity' ),
		'parent_item_colon'  => __( 'Parent Experts:', 'work4equity' ),
		'not_found'          => __( 'No experts found.', 'work4equity' ),
		'not_found_in_trash' => __( 'No experts found in Trash.', 'work4equity' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'The registered experts profiles.', 'work4equity' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'experten' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
    'menu_icon'          => 'dashicons-groups',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies'         => [ 'expert_category', 'expert_tag' ],
	);

	register_post_type( 'expert', $args );
}

function register_project_post_type() {
  $labels = array(
		'name'               => _x( 'Projects', 'post type general name', 'work4equity' ),
		'singular_name'      => _x( 'Project', 'post type singular name', 'work4equity' ),
		'menu_name'          => _x( 'Projects', 'admin menu', 'work4equity' ),
		'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'work4equity' ),
		'add_new'            => _x( 'Add New', 'expert', 'work4equity' ),
		'add_new_item'       => __( 'Add New Project', 'work4equity' ),
		'new_item'           => __( 'New Project', 'work4equity' ),
		'edit_item'          => __( 'Edit Project', 'work4equity' ),
		'view_item'          => __( 'View Project', 'work4equity' ),
		'all_items'          => __( 'All Projects', 'work4equity' ),
		'search_items'       => __( 'Search Projects', 'work4equity' ),
		'parent_item_colon'  => __( 'Parent Projects:', 'work4equity' ),
		'not_found'          => __( 'No projects found.', 'work4equity' ),
		'not_found_in_trash' => __( 'No projects found in Trash.', 'work4equity' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'The projects.', 'work4equity' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'projekte' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
    'menu_icon'          => 'dashicons-chart-area',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies'         => [ 'project_category', 'project_tag' ],
	);

	register_post_type( 'project', $args );
}

function register_company_post_type() {
  $labels = array(
		'name'               => _x( 'Companies', 'post type general name', 'work4equity' ),
		'singular_name'      => _x( 'Company', 'post type singular name', 'work4equity' ),
		'menu_name'          => _x( 'Companies', 'admin menu', 'work4equity' ),
		'name_admin_bar'     => _x( 'Company', 'add new on admin bar', 'work4equity' ),
		'add_new'            => _x( 'Add New', 'expert', 'work4equity' ),
		'add_new_item'       => __( 'Add New Company', 'work4equity' ),
		'new_item'           => __( 'New Company', 'work4equity' ),
		'edit_item'          => __( 'Edit Company', 'work4equity' ),
		'view_item'          => __( 'View Company', 'work4equity' ),
		'all_items'          => __( 'All Companies', 'work4equity' ),
		'search_items'       => __( 'Search Companies', 'work4equity' ),
		'parent_item_colon'  => __( 'Parent Companies:', 'work4equity' ),
		'not_found'          => __( 'No companies found.', 'work4equity' ),
		'not_found_in_trash' => __( 'No companies found in Trash.', 'work4equity' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'The registered companies profiles.', 'work4equity' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'projekte' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
    'menu_icon'          => 'dashicons-building',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies'         => [ 'company_category', 'company_tag' ],
	);

	register_post_type( 'company', $args );
}

function register_expert_taxonomies() {
  /**
	 ************************************************************************************
	 ******************************** Expert Categories ******************************
	 ************************************************************************************
	 */
	$labels = [
		'name'              => __( 'Categories', 'ally' ),
		'singular_name'     => __( 'Category', 'ally' ),
		'search_items'      => __( 'Search Categories', 'ally' ),
		'all_items'         => __( 'All Categories', 'ally' ),
		'parent_item'       => __( 'Parent Category', 'ally' ),
		'parent_item_colon' => __( 'Parent Category:', 'ally' ),
		'edit_item'         => __( 'Edit Category', 'ally' ),
		'update_item'       => __( 'Update Category', 'ally' ),
		'add_new_item'      => __( 'Add New Category', 'ally' ),
		'new_item_name'     => __( 'New Category Name', 'ally' ),
		'menu_name'         => __( 'Categories', 'ally' ),
	];

	$args = [
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'expert_category' ),
	];

	register_taxonomy(
		'expert_category', [ 'expert' ], $args
	);

	/**
	 ******************************************************************************
	 ******************************** Expert Tags ******************************
	 ******************************************************************************
	 */
	$labels = [
		'name'                       => __( 'Tags', 'ally' ),
		'singular_name'              => __( 'Tag', 'ally' ),
		'search_items'               => __( 'Search Tags', 'ally' ),
		'popular_items'              => __( 'Popular Tags', 'ally' ),
		'all_items'                  => __( 'All Tags', 'ally' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Tag', 'ally' ),
		'update_item'                => __( 'Update Tag', 'ally' ),
		'add_new_item'               => __( 'Add New Tag', 'ally' ),
		'new_item_name'              => __( 'New Tag Name', 'ally' ),
		'separate_items_with_commas' => __( 'Separate tags with commas', 'ally' ),
		'add_or_remove_items'        => __( 'Add or remove tags', 'ally' ),
		'choose_from_most_used'      => __( 'Choose from the most used tags', 'ally' ),
		'not_found'                  => __( 'No tags found.', 'ally' ),
		'menu_name'                  => __( 'Tags', 'ally' ),
	];

	$args = [
	 'hierarchical'      => false,
	 'labels'            => $labels,
	 'show_ui'           => true,
	 'show_admin_column' => true,
	 'update_count_callback' => '_update_post_term_count',
	 'query_var'         => true,
	 'rewrite'           => array( 'slug' => 'expert_tag' ),
	];

	register_taxonomy(
	 'expert_tag', [ 'expert' ], $args
	);
}

function register_project_taxonomies() {
  /**
	 ************************************************************************************
	 ******************************** Project Categories ******************************
	 ************************************************************************************
	 */
	$labels = [
		'name'              => __( 'Categories', 'ally' ),
		'singular_name'     => __( 'Category', 'ally' ),
		'search_items'      => __( 'Search Categories', 'ally' ),
		'all_items'         => __( 'All Categories', 'ally' ),
		'parent_item'       => __( 'Parent Category', 'ally' ),
		'parent_item_colon' => __( 'Parent Category:', 'ally' ),
		'edit_item'         => __( 'Edit Category', 'ally' ),
		'update_item'       => __( 'Update Category', 'ally' ),
		'add_new_item'      => __( 'Add New Category', 'ally' ),
		'new_item_name'     => __( 'New Category Name', 'ally' ),
		'menu_name'         => __( 'Categories', 'ally' ),
	];

	$args = [
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'project_category' ),
	];

	register_taxonomy(
		'project_category', [ 'project' ], $args
	);

	/**
	 ******************************************************************************
	 ******************************** Project Tags ******************************
	 ******************************************************************************
	 */
	$labels = [
		'name'                       => __( 'Tags', 'ally' ),
		'singular_name'              => __( 'Tag', 'ally' ),
		'search_items'               => __( 'Search Tags', 'ally' ),
		'popular_items'              => __( 'Popular Tags', 'ally' ),
		'all_items'                  => __( 'All Tags', 'ally' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Tag', 'ally' ),
		'update_item'                => __( 'Update Tag', 'ally' ),
		'add_new_item'               => __( 'Add New Tag', 'ally' ),
		'new_item_name'              => __( 'New Tag Name', 'ally' ),
		'separate_items_with_commas' => __( 'Separate tags with commas', 'ally' ),
		'add_or_remove_items'        => __( 'Add or remove tags', 'ally' ),
		'choose_from_most_used'      => __( 'Choose from the most used tags', 'ally' ),
		'not_found'                  => __( 'No tags found.', 'ally' ),
		'menu_name'                  => __( 'Tags', 'ally' ),
	];

	$args = [
	 'hierarchical'      => false,
	 'labels'            => $labels,
	 'show_ui'           => true,
	 'show_admin_column' => true,
	 'update_count_callback' => '_update_post_term_count',
	 'query_var'         => true,
	 'rewrite'           => array( 'slug' => 'project_tag' ),
	];

	register_taxonomy(
	 'project_tag', [ 'project' ], $args
	);
}

function register_company_taxonomies() {
  /**
	 ************************************************************************************
	 ******************************** Company Categories ******************************
	 ************************************************************************************
	 */
	$labels = [
		'name'              => __( 'Categories', 'ally' ),
		'singular_name'     => __( 'Category', 'ally' ),
		'search_items'      => __( 'Search Categories', 'ally' ),
		'all_items'         => __( 'All Categories', 'ally' ),
		'parent_item'       => __( 'Parent Category', 'ally' ),
		'parent_item_colon' => __( 'Parent Category:', 'ally' ),
		'edit_item'         => __( 'Edit Category', 'ally' ),
		'update_item'       => __( 'Update Category', 'ally' ),
		'add_new_item'      => __( 'Add New Category', 'ally' ),
		'new_item_name'     => __( 'New Category Name', 'ally' ),
		'menu_name'         => __( 'Categories', 'ally' ),
	];

	$args = [
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'company_category' ),
	];

	register_taxonomy(
		'company_category', [ 'company' ], $args
	);

	/**
	 ******************************************************************************
	 ******************************** Company Tags ******************************
	 ******************************************************************************
	 */
	$labels = [
		'name'                       => __( 'Tags', 'ally' ),
		'singular_name'              => __( 'Tag', 'ally' ),
		'search_items'               => __( 'Search Tags', 'ally' ),
		'popular_items'              => __( 'Popular Tags', 'ally' ),
		'all_items'                  => __( 'All Tags', 'ally' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Tag', 'ally' ),
		'update_item'                => __( 'Update Tag', 'ally' ),
		'add_new_item'               => __( 'Add New Tag', 'ally' ),
		'new_item_name'              => __( 'New Tag Name', 'ally' ),
		'separate_items_with_commas' => __( 'Separate tags with commas', 'ally' ),
		'add_or_remove_items'        => __( 'Add or remove tags', 'ally' ),
		'choose_from_most_used'      => __( 'Choose from the most used tags', 'ally' ),
		'not_found'                  => __( 'No tags found.', 'ally' ),
		'menu_name'                  => __( 'Tags', 'ally' ),
	];

	$args = [
	 'hierarchical'      => false,
	 'labels'            => $labels,
	 'show_ui'           => true,
	 'show_admin_column' => true,
	 'update_count_callback' => '_update_post_term_count',
	 'query_var'         => true,
	 'rewrite'           => array( 'slug' => 'company_tag' ),
	];

	register_taxonomy(
	 'company_tag', [ 'company' ], $args
	);
}

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

require_once( 'inc/shortcodes.php' );
