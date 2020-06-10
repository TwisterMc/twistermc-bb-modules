<?php
/**
 * DownloadButton "frontend HTML" file.
 *
 * Used by Beaver Builder to generate the markup output.
 * The following variables are made available as globals in this template partial by Beaver Builder...
 *
 * @see \DownloadButton
 * @see \FLBuilderModule
 *
 * @var \DownloadButton $module   An instance of the module class.
 * @var string      $id       The module's node ID ( i.e. $module->node ).
 * @var stdClass    $settings The module's settings ( i.e. $module->settings ).
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

$pdf_title = 'PDF';
if ( $settings->pdf_title ) {
	$pdf_title = $settings->pdf_title;
}

$pdf_url = wp_get_attachment_url( $settings->pdf_url );

?>

<a href="<?php echo esc_url( $pdf_url ); ?>" class="fl-button mix-flexbox" download>
	<?php if ( $settings->pdf_icon ) { ?>
		<div class="fl-icon-wrap"><span class="fl-icon"><i class="<?php echo $settings->pdf_icon; ?>" aria-hidden="true"></i></span></div>
	<?php } ?>
	<span class="fl-button-text">
	<?php echo esc_html( $pdf_title ); ?>
	</span>
</a>
