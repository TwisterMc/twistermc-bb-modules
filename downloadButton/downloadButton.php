<?php
/**
 * DownloadButton Class file.
 */

/** Exit early if directly accessed via URL. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class DownloadButton
 */
class DownloadButton extends FLBuilderModule {

	/**
	 * DownloadButton constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Download Button', 'fl-builder' ),
				'description'     => __( 'Displays a button for downloading files.', 'fl-builder' ),
				'category'        => __( 'Advanced Modules', 'fl-builder' ),
				'partial_refresh' => true,
				'dir'             => TMC_BB_DIR . 'downloadButton/',
				'url'             => TMC_BB_URL . 'downloadButton/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
			)
		);
	}

	/**
	 * Register the module and its form settings with Beaver Builder.
	 *
	 * What's implied, but not specifically stated, is that BB handles the instantiation of the object.
	 *
	 * @see    \FLBuilderModel::register_module()
	 *
	 * @action init
	 */
}
	FLBuilder::register_module(
			'DownloadButton',
			array(
				'general' => array(
					'title'    => __( 'General', 'fl-builder' ),
					'sections' => array(
						'general' => array(
							'title'  => __( 'Settings', 'fl-builder' ),
							'fields' => array(
								'pdf_url'   => array(
									'type'        => 'zestsms-pdf',
									'label'       => __( 'PDF', 'fl-builder' ),
									'show_remove' => true,
								),
								'pdf_icon'  => array(
									'type'        => 'icon',
									'label'       => __( 'Icon', 'fl-builder' ),
									'show_remove' => true,
								),
								'pdf_title' => array(
									'type'        => 'text',
									'label'       => __( 'Link Text', 'fl-builder' ),
									'default'     => '',
									'placeholder' => __( 'My Great PDF', 'fl-builder' ),
								),
							),
						),
					),
				),
			)
		);


