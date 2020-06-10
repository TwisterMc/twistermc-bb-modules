<?php
/**
 * YouTubeVideos Class file.
 */

/** Exit early if directly accessed via URL. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class YouTubeVideos
 */
class YouTubeVideos extends FLBuilderModule {

	/**
	 * YouTubeVideos constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'YouTube Video', 'fl-builder' ),
				'description'     => __( 'Displays YouTube Videos.', 'fl-builder' ),
				'category'        => __( 'Advanced', 'fl-builder' ),
				'partial_refresh' => true,
				'dir'             => TMC_BB_DIR . 'youtube-videos/',
				'url'             => TMC_BB_URL . 'youtube-videos/',
			)
		);
	}
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
		FLBuilder::register_module(
			'YouTubeVideos',
			array(
				'general' => array(
					'title'    => __( 'General', 'fl-builder' ),
					'sections' => array(
						'general' => array(
							'title'  => __( 'General', 'fl-builder' ),
							'fields' => array(
								'youtube_url' => array(
									'type'        => 'text',
									'label'       => __( 'YouTube URL', 'fl-builder' ),
									'default'     => '',
									'placeholder' => 'https://www.youtube.com/watch?v=ScMzIvxBSi4',
									'help'        => __( 'The URL to the YouTube video that should display.', 'fl-builder' ),
								),
							),
						),
					),
				),
			)
		);


