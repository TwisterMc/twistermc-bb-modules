<?php
/**
 * Plugin Name: TwisterMc BB Modules
 * Plugin URI: https://www.twistermc.com
 * Description: Custom modules to extend BeaverBuilder
 * Version: 0.6.6
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
add_action( 'init', 'fl_load_module_bbtwistermc' );

/**
 * Adds video attributes query strings to embedded YouTube videos
 */
add_filter( 'oembed_result', 'oembed_result', 10, 3 );

function oembed_result( $html, $url, $args ) {
	return str_replace( '?feature=oembed', '?feature=oembed&loop=1&controls=0&showinfo=0&rel=0&enablejsapi=1', $html );
}

/**
 * Adds video attributes query strings to embedded Vimeo videos
 */
add_filter( 'oembed_fetch_url', 'add_video_args', 10, 3 );
function add_video_args( $provider, $url, $args ) {
	if ( strpos( $provider, '//vimeo.com/' ) !== false ) {
		$args     = array(
			'title'       => 0,
			'byline'      => 0,
			'portrait'    => 0,
			'badge'       => 0,
			//'autoplay' => 1,
			'loop'        => 1,
			'transparent' => 0,
		);
		$provider = add_query_arg( $args, $provider );
	}
	return $provider;
}
