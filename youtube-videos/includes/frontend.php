<?php
/**
 * YouTubeVideos "frontend HTML" file.
 *
 * Used by Beaver Builder to generate the markup output.
 * The following variables are made available as globals in this template partial by Beaver Builder...
 *
 * @see \YouTubeVideos
 * @see \FLBuilderModule
 *
 * @var \YouTubeVideos $module   An instance of the module class.
 * @var string      $id       The module's node ID ( i.e. $module->node ).
 * @var stdClass    $settings The module's settings ( i.e. $module->settings ).
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

$embed_code = wp_oembed_get( esc_url( $settings->youtube_url ) );

echo $embed_code;
