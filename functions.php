<?php

add_action( 'init', 'create_product' );
add_action( 'init', 'create_segment' );
add_action( 'init', 'create_case' );
add_action( 'init', 'create_technology' );

function create_product() {
  $labels = array(
    'name' => _x('Products', 'post type general name'),
    'singular_name' => _x('Product', 'post type singular name'),
    'add_new' => _x('Add new product', 'product'),
    'add_new_item' => __('Add new product'),
    'edit_item' => __('Edit product'),
    'new_item' => __('New product'),
    'view_item' => __('Show product'),
    'search_items' => __('Search products'),
    'not_found' =>  __('No products found'),
    'not_found_in_trash' => __('No products in trash'),
    'parent_item_colon' => ''
  );

  $supports = array('title');

  register_post_type( 'product',
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports,
	  'menu_position' => 5
    )
  );
}

function create_technology() {
  $labels = array(
    'name' => _x('Technologies', 'post type general name'),
    'singular_name' => _x('Technology', 'post type singular name'),
    'add_new' => _x('Add new Technology', 'Technology'),
    'add_new_item' => __('Add new Technology'),
    'edit_item' => __('Edit Technology'),
    'new_item' => __('New Technology'),
    'view_item' => __('Show Technology'),
    'search_items' => __('Search Technologies'),
    'not_found' =>  __('No Technologies found'),
    'not_found_in_trash' => __('No Technologies in trash'),
    'parent_item_colon' => ''
  );

  $supports = array('title');

  register_post_type( 'technology',
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports,
	  'menu_position' => 5
    )
  );
}

function create_case() {
  $labels = array(
    'name' => _x('Cases', 'post type general name'),
    'singular_name' => _x('Case', 'post type singular name'),
    'add_new' => _x('Add new case', 'case'),
    'add_new_item' => __('Add new case'),
    'edit_item' => __('Edit case'),
    'new_item' => __('New case'),
    'view_item' => __('Show case'),
    'search_items' => __('Search cases'),
    'not_found' =>  __('No cases found'),
    'not_found_in_trash' => __('No cases in trash'),
    'parent_item_colon' => ''
  );

  $supports = array('title');

  register_post_type( 'case',
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports,
	  'menu_position' => 5
    )
  );
}

function create_segment() {
  $labels = array(
    'name' => _x('Segments', 'post type general name'),
    'singular_name' => _x('Segment', 'post type singular name'),
    'add_new' => _x('Add new segment', 'segment'),
    'add_new_item' => __('Add new segment'),
    'edit_item' => __('Edit segment'),
    'new_item' => __('New segment'),
    'view_item' => __('Show segment'),
    'search_items' => __('Search segments'),
    'not_found' =>  __('No segments found'),
    'not_found_in_trash' => __('No segments in trash'),
    'parent_item_colon' => ''
  );

  $supports = array('title');

  register_post_type( 'segment',
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports,
	  'menu_position' => 5
    )
  );
}


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'LED iBond Settings',
		'menu_title'	=> 'LED iBond Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Frontpage',
		'menu_title'	=> 'Frontpage',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Megamenu',
		'menu_title'	=> 'Megamenu',
		'parent_slug'	=> 'theme-general-settings',
	));
    
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Megamenu New',
		'menu_title'	=> 'Megamenu New',
		'parent_slug'	=> 'theme-general-settings',
	));
    
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Strings',
		'menu_title'	=> 'Strings',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	
	
}

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['ldt'] = 'file/cad';
    $mimes['ies'] = 'file';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_image_size( 'frontpageimage', 1800, 1800, false );
add_image_size( 'headerimage', 1800, 600, true );
add_image_size( 'headerimagesmall', 900, 300, true );
add_image_size( 'headerimagemicro', 450, 150, true );
add_image_size( 'galimage', 1280, 720, true );

function my_acf_admin_head() {
	?>
	<style type="text/css">
		.acf-repeater .acf-field[data-name="main_menu_item"] {		
			border-top: .5vw #DD0000 solid;
		}
		
		.acf-repeater .acf-field[data-name="main_menu_item"] .acf-label {		
			font-size: 150%;
		}
		
		.acf-fc-layout-handle {
			border-top: .25vw #990000 solid;
		}
        
        [data-layout="main_menu_item"] .acf-fc-layout-handle {
            	border-top: 1vw #DD0000 solid;
        }
        
        [data-layout="wrapper"] .acf-fc-layout-handle {
            	border-top: 1vw #000000 solid;
        }
        
        
		
	</style>

	
	<?php
}

add_action('acf/input/admin_head', 'my_acf_admin_head');


function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyCxDYWTGylq_CZyIMXpcTqzvc7AzwV1c3A');
}

add_action('acf/init', 'my_acf_init');


function ledibond_scripts() {
  wp_enqueue_script( 'index', get_stylesheet_directory_uri() . '/js/index.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'ledibond_scripts' );

function ledibond_head_hreflang_xdefault($url, $lang_code) {
  if ($lang_code == apply_filters('wpml_default_language', NULL )) {
    echo '<link rel="alternate" hreflang="x-default" href="' . $url . '">'.PHP_EOL;
  }
  return $url;
}
add_filter('wpml_alternate_hreflang', 'ledibond_head_hreflang_xdefault', 10, 2);

function defer_parsing_of_js( $url ) {
  $html = str_replace( "type='text/javascript'", '', $url );
  if ( is_user_logged_in() ) return $html;
  if ( FALSE === strpos( $url, '.js' ) ) return $html;
  if ( strpos( $url, 'jquery.js' ) ) {
    return str_replace( 'defer', '', $html );
  };
  return str_replace( ' src', ' defer src', $html );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );

function ledibond_dequeue_jquery() {    
  if( !is_admin()) {
    wp_deregister_script('jquery');
  }
}
add_action( 'wp_enqueue_scripts', 'ledibond_dequeue_jquery' );