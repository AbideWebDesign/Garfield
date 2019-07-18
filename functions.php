<?php 
/*
 * Theme update checker
 *
 * @since Garfield 1.0
 */
require WP_CONTENT_DIR . '/plugins/plugin-update-checker-master/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/AbideWebDesign/Garfield',
	__FILE__,
	'Garfield'
);

$myUpdateChecker->setBranch('master'); 

/*
 * Setup style sheets
 *
 * @since Garfield 1.0
 */
function garfield_theme_enqueue_styles() {
    
	$parent_style = 'csdschools';
	$child_theme = wp_get_theme();
	$parent_theme_version = $child_theme->parent();
	
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', '', $parent_theme_version->version );
	wp_enqueue_style( 'Garfield-style',
	    get_stylesheet_directory_uri() . '/style.css',
	    array( $parent_style ),
	    wp_get_theme()->get('Version')
	);

}
add_action( 'wp_enqueue_scripts', 'Garfield_theme_enqueue_styles' );