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
		require_once 'downloadButton/downloadButton.php';
		require_once 'youtube-videos/class-youtube-videos.php';
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

// Forked from Badabing and https://github.com/ZestSMS/BB-PDF-field

define( 'BBEXTRA_FIELDS_VERSION' , '1.1' );
define( 'BBEXTRA_FIELDS_DIR', plugin_dir_path( __FILE__ ) );
define( 'BBEXTRA_FIELDS_URL', plugins_url( '/', __FILE__ ) );

function BBEXTRA_extra_fields() {

	if ( class_exists( 'FLBuilder' ) ) {
		require_once ( 'pdf-select/pdf_select.php' );
	}
}

add_action( 'init', 'BBEXTRA_extra_fields' );

// Create a dummy class so we can do a quick test when loading custom modules
// if ( ! class_exists ( bbExtraFields ) ) { return; }
class bbExtraFields { }
