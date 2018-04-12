<?php
/**
 * Plugin Name: TwisterMc BB Modules
 * Plugin URI: https://www.twistermc.com
 * Description: Custom modules to extend BeaverBuilder
 * Version: 0.6.5
 * Author: TwisterMc
 * Author URI: http://www.twistermc.com
 */
define( 'TMC_BB_DIR', plugin_dir_path( __FILE__ ) );
define( 'TMC_BB_URL', plugins_url( '/', __FILE__ ) );

/**
 * Custom modules
 */
function fl_load_module_bbtwistermc() {
	if ( class_exists( 'FLBuilder' ) ) {
	    require_once 'slick/slick.php';
	    require_once 'fullImage/fullImage.php';
	}
}
add_action( 'init', 'fl_load_module_bbtwistermc');

/* ---------------------------------------------------------------------
Enqueue Vimeo Helper Script
TODO: This should only be included if we have Vimeo modules
------------------------------------------------------------------------ */
function bbtwistermc_video_field_helper() {
		wp_enqueue_script( 'vimeo-helper', '//f.vimeocdn.com/js/froogaloop2.min.js', array(), '3', true );
}
add_action( 'wp_enqueue_scripts', 'bbtwistermc_video_field_helper' );

/**
 * Adds video attributes query strings to embedded YouTube videos
 */
add_filter('oembed_result','oembed_result', 10, 3);

function oembed_result($html, $url, $args) {
	return str_replace("?feature=oembed", "?feature=oembed&loop=1&controls=0&showinfo=0&rel=0&enablejsapi=1", $html);
}

/**
 * Adds video attributes query strings to embedded Vimeo videos
 */
add_filter('oembed_fetch_url','add_video_args',10,3);
function add_video_args($provider, $url, $args) {
	if ( strpos($provider, '//vimeo.com/') !== false ) {
		$args = array(
			'title' => 0,
			'byline' => 0,
			'portrait' => 0,
			'badge' => 0,
			//'autoplay' => 1,
			'loop' => 1,
			'transparent' => 0
		);
		$provider = add_query_arg( $args, $provider );
	}
	return $provider;
}