<?php
/**
 * Plugin Name: TwisterMc BB Modules
 * Plugin URI: https://www.twistermc.com
 * Description: Custom modules to extend BeaverBuilder
 * Version: 0.6.3
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

/**
 * Custom fields
 */
function fl_my_custom_field( $name, $value, $field ) {
    echo '<input type="text" class="text text-full" name="' . $name . '" value="' . $value . '" />';
}
add_action( 'fl_builder_control_my-custom-field', 'fl_my_custom_field', 1, 3 );

/**
 * Custom field styles and scripts
 */
function fl_my_custom_field_assets() {
    if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
        wp_enqueue_style( 'my-custom-fields', TMC_BB_URL . 'assets/css/fields.css', array(), '' );
        wp_enqueue_script( 'my-custom-fields', TMC_BB_URL . 'assets/js/fields.js', array(), '', true );
    }
}
add_action( 'wp_enqueue_scripts', 'fl_my_custom_field_assets' );