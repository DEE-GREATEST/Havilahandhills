<?php

function load_stylesheets() {

wp_register_style('bootstrap', get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css', array(), 1.0, 'all');
wp_enqueue_style('bootstrap');
wp_register_style('font-awesome', get_template_directory_uri() . '/lib/font-awesome/css/font-awesome.min.css', array(), 1.0, 'all');
wp_enqueue_style('font-awesome');
wp_register_style('owlcarousel', get_template_directory_uri() . '/lib/owl-carousel/assets/owl.carousel.min.css', array(), 1.0, 'all');
wp_enqueue_style('owlcarousel');
wp_register_style('customstyle', get_template_directory_uri() . '/css/style.css', array(), 1.0, 'all');
wp_enqueue_style('customstyle');


}
add_action('wp_enqueue_scripts', 'load_stylesheets');

// load scripts

function add_scripts() {

wp_register_script('jquery', get_template_directory_uri() . '/lib/jquery/jquery.min.js', array(), 1, 1, 1);
wp_enqueue_script('jquery');
wp_register_script('jquery-migrate', get_template_directory_uri() . '/lib/jquery/jquery-migrate.min.js', array(), 1, 1, 1);
wp_enqueue_script('jquery-migrate');
wp_register_script('bootstrap', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.bundle.min.js', array(), 1, 1, 1);
wp_enqueue_script('bootstrap');
wp_register_script('owlcarousel', get_template_directory_uri() . '/lib/owl-carousel/owl.carousel.min.js', array(), 1, 1, 1);
wp_enqueue_script('owlcarousel');
wp_register_script('scripts', get_template_directory_uri() . '/js/main.js', array(), 1, 1, 1);
wp_enqueue_script('scripts');


}
add_action('wp_enqueue_scripts', 'add_scripts');

require_once('wp-bootstrap-navwalker.php');
//Menu Active State 
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
      $classes[] = 'menu-active';
    }
    return $classes;
  }
  add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);


  // menu active state for custom post type single page	
	function add_current_nav_class($classes, $item) {
		
		// Getting the current post details
		global $post;
		
		// Getting the post type of the current post
		$current_post_type = get_post_type_object(get_post_type($post->ID));
    $current_post_type_slug = $current_post_type->rewrite['slug'];
    

	
			
		// Getting the URL of the menu item
		$menu_slug = strtolower(trim($item->url));
		
		// If the menu item URL contains the current post types slug add the current-menu-item class
		if (strpos($menu_slug,$current_post_type_slug) !== false) {
		
		   $classes[] = 'menu-active';
		
		}
		
		// Return the corrected set of classes to be added to the menu item
		return $classes;
	
  }
  add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );


  //CUSTOM POST TYPE FOR SERVICES
function custom_services_post_type() {
 
  // Set UI labels for Custom Post Type
      $labels = array(
          'name'                =>  'Services',
          'singular_name'       =>  'Service',
          'parent_item_colon'   =>  'Parent Service',
          'all_items'           =>  'All Services',
          'view_item'           =>  'View Service',
          'add_new_item'        =>  'Add New Service',
          'add_new'             =>  'Add New',
          'edit_item'           =>  'Edit Service',
          'new_item'            =>  'New Service',
          'search_items'        =>  'Search Service',
          'not_found'           =>  'Not Found',
          'not_found_in_trash'  =>  'Not found in Trash',
      );

           
// Set other options for Custom Post Type
 
$args = array(
  // 'label'               => __( 'sessions'),//removed TwentyThirteen
  'description'         => __( 'Havila&hills Services' ),
  'labels'              => $labels,
  // Features this CPT supports in Post Editor
  'supports'            => array( 
            'title', 
            'editor', 
            'excerpt', 
            'author', 
            'thumbnail', 
            'comments', 
            'revisions', 
            'custom-fields', 
  ),
 
  /* A hierarchical CPT is like Pages and can have
  * Parent and child items. A non-hierarchical CPT
  * is like Posts.
  */ 
  'hierarchical'        => false, // change from true to false
  'public'              => true,
  'show_ui'             => true,
  'show_in_menu'        => true,
  'show_in_nav_menus'   => true,
  'show_in_admin_bar'   => true,
  'menu_position'       => 5,
  'can_export'          => true,
  'has_archive'         => true,
  'exclude_from_search' => false,
  'publicly_queryable'  => true,
  'show_in_rest'        => true, // new added
  'capability_type'     => 'post', // change page to post
  'query_var'           =>  true,
  'rewrite'             =>  true,

  // You can associate this CPT with a taxonomy or custom taxonomy. 
  // 'taxonomies'          => array('category', 'post_tag' ), // change sessions to post_tag
  'menu_position'       => 5,

);

// Registering your Custom Post Type
register_post_type('services', $args);

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action('init', 'custom_services_post_type');
  


//hook into the init action and call create_book_taxonomies when it fires

//create a custom taxonomy name it topics for your posts

function create_services_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

$labels = array(
'name' => 'Type',
'singular_name' => 'Type',
'search_items' =>  'Search Type',
'all_items' =>  'All Type',
'parent_item' => 'Parent Type',
'parent_item_colon' => 'Parent Type:',
'edit_item' =>   'Edit Type', 
'update_item' => 'Update Type',
'add_new_item' =>  'Add New Type',
'new_item_name' => 'New Type Name',
'menu_name' => 'Type',
);    

// Now register the taxonomy   

$args = array (
'hierarchical' => true,
'labels' => $labels,
'show_ui' => true,
'show_admin_column' => true,
'query_var' => true,
'rewrite' => array( 'slug' => 'type' ),
);
register_taxonomy('type', array('services'), $args); 
}
add_action( 'init', 'create_services_hierarchical_taxonomy');






//CUSTOM POST TYPE FOR PROJECTS
function custom_projects_post_type() {
 
  // Set UI labels for Custom Post Type
      $labels = array(
          'name'                =>  'Projects',
          'singular_name'       =>  'Project',
          'parent_item_colon'   =>  'Parent Project',
          'all_items'           =>  'All Projects',
          'view_item'           =>  'View Project',
          'add_new_item'        =>  'Add New Project',
          'add_new'             =>  'Add New',
          'edit_item'           =>  'Edit Project',
          'new_item'            =>  'New Project',
          'search_items'        =>  'Search Project',
          'not_found'           =>  'Not Found',
          'not_found_in_trash'  =>  'Not found in Trash',
      );

           
// Set other options for Custom Post Type
 
$args = array(
  // 'label'               => __( 'sessions'),//removed TwentyThirteen
  'description'         => __( 'Havila&hills Projects' ),
  'labels'              => $labels,
  // Features this CPT supports in Post Editor
  'supports'            => array( 
            'title', 
            'editor', 
            'excerpt', 
            'author', 
            'thumbnail', 
            'comments', 
            'revisions', 
            'custom-fields', 
  ),
 
  /* A hierarchical CPT is like Pages and can have
  * Parent and child items. A non-hierarchical CPT
  * is like Posts.
  */ 
  'hierarchical'        => false, // change from true to false
  'public'              => true,
  'show_ui'             => true,
  'show_in_menu'        => true,
  'show_in_nav_menus'   => true,
  'show_in_admin_bar'   => true,
  'menu_position'       => 5,
  'can_export'          => true,
  'has_archive'         => true,
  'exclude_from_search' => false,
  'publicly_queryable'  => true,
  'show_in_rest'        => true, // new added
  'capability_type'     => 'post', // change page to post
  'query_var'           =>  true,
  'rewrite'             =>  true,

  // You can associate this CPT with a taxonomy or custom taxonomy. 
  // 'taxonomies'          => array('category', 'post_tag' ), // change sessions to post_tag
  'menu_position'       => 5,

);

// Registering your Custom Post Type
register_post_type('projects', $args);

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action('init', 'custom_projects_post_type');
  


//hook into the init action and call create_book_taxonomies when it fires

//create a custom taxonomy name it topics for your posts

function create_projects_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

$labels = array(
'name' => 'Project Category',
'singular_name' => 'Project Category',
'search_items' =>  'Search Project Category',
'all_items' =>  'All Project Category',
'parent_item' => 'Parent Project Category',
'parent_item_colon' => 'Parent Project Category:',
'edit_item' =>   'Edit Project Category', 
'update_item' => 'Update Project Category',
'add_new_item' =>  'Add New Project Category',
'new_item_name' => 'New Project Category Name',
'menu_name' => 'Project Category',
);    

// Now register the taxonomy   

$args = array (
'hierarchical' => true,
'labels' => $labels,
'show_ui' => true,
'show_admin_column' => true,
'query_var' => true,
'rewrite' => array( 'slug' => 'type' ),
);
register_taxonomy('project category', array('projects'), $args); 
}
add_action( 'init', 'create_projects_hierarchical_taxonomy');






//CUSTOM POST TYPE FOR COMPANIES
function custom_companies_post_type() {
 
  // Set UI labels for Custom Post Type
      $labels = array(
          'name'                =>  'Companies',
          'singular_name'       =>  'Company',
          'parent_item_colon'   =>  'Parent Company',
          'all_items'           =>  'All Companies',
          'view_item'           =>  'View Company',
          'add_new_item'        =>  'Add New Company',
          'add_new'             =>  'Add New',
          'edit_item'           =>  'Edit Company',
          'new_item'            =>  'New Company',
          'search_items'        =>  'Search Company',
          'not_found'           =>  'Not Found',
          'not_found_in_trash'  =>  'Not found in Trash',
      );

           
// Set other options for Custom Post Type
 
$args = array(
  // 'label'               => __( 'sessions'),//removed TwentyThirteen
  'description'         => __( 'Havila&hills Companies' ),
  'labels'              => $labels,
  // Features this CPT supports in Post Editor
  'supports'            => array( 
            'title', 
            'editor', 
            'excerpt', 
            'author', 
            'thumbnail', 
            'comments', 
            'revisions', 
            'custom-fields', 
  ),
 
  /* A hierarchical CPT is like Pages and can have
  * Parent and child items. A non-hierarchical CPT
  * is like Posts.
  */ 
  'hierarchical'        => false, // change from true to false
  'public'              => true,
  'show_ui'             => true,
  'show_in_menu'        => true,
  'show_in_nav_menus'   => true,
  'show_in_admin_bar'   => true,
  'menu_position'       => 5,
  'can_export'          => true,
  'has_archive'         => true,
  'exclude_from_search' => false,
  'publicly_queryable'  => true,
  'show_in_rest'        => true, // new added
  'capability_type'     => 'post', // change page to post
  'query_var'           =>  true,
  'rewrite'             =>  true,

  // You can associate this CPT with a taxonomy or custom taxonomy. 
  // 'taxonomies'          => array('category', 'post_tag' ), // change sessions to post_tag
  'menu_position'       => 5,

);

// Registering your Custom Post Type
register_post_type('companies', $args);

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action('init', 'custom_companies_post_type');
  


//hook into the init action and call create_book_taxonomies when it fires

//create a custom taxonomy name it topics for your posts

function create_companies_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

$labels = array(
'name' => 'Companies Name',
'singular_name' => 'Companies Name',
'search_items' =>  'Search Companies Name',
'all_items' =>  'All Companies Name',
'parent_item' => 'Parent Companies Name',
'parent_item_colon' => 'Parent Companies Name:',
'edit_item' =>   'Edit Companies Name', 
'update_item' => 'Update Companies Name',
'add_new_item' =>  'Add New Companies Name',
'new_item_name' => 'New Companies Name Name',
'menu_name' => 'Companies Name',
);    

// Now register the taxonomy   

$args = array (
'hierarchical' => true,
'labels' => $labels,
'show_ui' => true,
'show_admin_column' => true,
'query_var' => true,
'rewrite' => array( 'slug' => 'type' ),
);
register_taxonomy('Companies Name', array('companies'), $args); 
}
add_action( 'init', 'create_companies_hierarchical_taxonomy');







//CUSTOM POST TYPE FOR UPDATE
function custom_update_post_type() {
 
  // Set UI labels for Custom Post Type
      $labels = array(
          'name'                =>  'Update',
          'singular_name'       =>  'Update',
          'parent_item_colon'   =>  'Parent Update',
          'all_items'           =>  'All Update',
          'view_item'           =>  'View Update',
          'add_new_item'        =>  'Add New Update',
          'add_new'             =>  'Add New',
          'edit_item'           =>  'Edit Update',
          'new_item'            =>  'New Update',
          'search_items'        =>  'Search Update',
          'not_found'           =>  'Not Found',
          'not_found_in_trash'  =>  'Not found in Trash',
      );

           
// Set other options for Custom Post Type
 
$args = array(
  // 'label'               => __( 'sessions'),//removed TwentyThirteen
  'description'         => __( 'Havila&hills Update' ),
  'labels'              => $labels,
  // Features this CPT supports in Post Editor
  'supports'            => array( 
            'title', 
            'editor', 
            'excerpt', 
            'author', 
            'thumbnail', 
            'comments', 
            'revisions', 
            'custom-fields', 
  ),
 
  /* A hierarchical CPT is like Pages and can have
  * Parent and child items. A non-hierarchical CPT
  * is like Posts.
  */ 
  'hierarchical'        => false, // change from true to false
  'public'              => true,
  'show_ui'             => true,
  'show_in_menu'        => true,
  'show_in_nav_menus'   => true,
  'show_in_admin_bar'   => true,
  'menu_position'       => 5,
  'can_export'          => true,
  'has_archive'         => true,
  'exclude_from_search' => false,
  'publicly_queryable'  => true,
  'show_in_rest'        => true, // new added
  'capability_type'     => 'post', // change page to post
  'query_var'           =>  true,
  'rewrite'             =>  true,

  // You can associate this CPT with a taxonomy or custom taxonomy. 
  // 'taxonomies'          => array('category', 'post_tag' ), // change sessions to post_tag
  'menu_position'       => 5,

);

// Registering your Custom Post Type
register_post_type('update', $args);

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action('init', 'custom_update_post_type');
  


//hook into the init action and call create_book_taxonomies when it fires

//create a custom taxonomy name it topics for your posts

function create_update_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

$labels = array(
'name' => 'News',
'singular_name' => 'News',
'search_items' =>  'Search News',
'all_items' =>  'All News',
'parent_item' => 'Parent News',
'parent_item_colon' => 'Parent News:',
'edit_item' =>   'Edit News', 
'update_item' => 'Update News',
'add_new_item' =>  'Add New News',
'new_item_name' => 'New News Name',
'menu_name' => 'News',
);    

// Now register the taxonomy   

$args = array (
'hierarchical' => true,
'labels' => $labels,
'show_ui' => true,
'show_admin_column' => true,
'query_var' => true,
'rewrite' => array( 'slug' => 'type' ),
);
register_taxonomy('news', array('update'), $args); 
}
add_action( 'init', 'create_update_hierarchical_taxonomy');



// add menu support

 add_theme_support('menus');

// register menus

register_nav_menus(

    array(
            'top-menu' => __('Top Menu', 'theme'),
  
        )

    );

    add_theme_support ( 'post-thumbnails' );


    ?>