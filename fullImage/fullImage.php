<?php

/**
 * @class BBFullImage
 */
class BBFullImage extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Full Image', 'fl-builder'),
            'description'   => __('Full Width Image', 'fl-builder'),
            'category'		=> __('Advanced Modules', 'fl-builder'),
            'dir'           => TMC_BB_DIR . 'fullImage/',
            'url'           => TMC_BB_URL . 'fullImage/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));

        /**
         * Use these methods to enqueue css and js already
         * registered or to register and enqueue your own.
         */
        // Already registered
        $this->add_css('font-awesome');
    }

    /**
     * Use this method to work with settings data before
     * it is saved. You must return the settings object.
     *
     * @method update
     * @param $settings {object}
     */
    public function update($settings)
    {
        $settings->textarea_field .= ' - this text was appended in the update method.';

        return $settings;
    }

    /**
     * This method will be called by the builder
     * right before the module is deleted.
     *
     * @method delete
     */
    public function delete()
    {

    }

    /**
     * Add additional methods to this class for use in the
     * other module files such as preview.php, frontend.php
     * and frontend.css.php.
     *
     *
     * @method example_method
     */
    public function example_method()
    {

    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBFullImage', array(
    'general'       => array( // Tab
        'title'         => __('Full Image', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Photo Settings', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'photo_field'     => array(
                        'type'          => 'photo',
                        'label'         => __('Photo', 'fl-builder'),
                    ),
                    'forceImageSize'   => array(
                        'type'          => 'select',
                        'label'         => __('Force Image to Full Width', 'fl-builder'),
                        'default'       => 'true',
                        'options'       => array(
                            'true'      => __('Yes', 'fl-builder'),
                            'false'      => __('No', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'false'      => array(
                                'fields'      => array( 'imageAlign' ),
                            ),
                        )
                    ),
                    'imageAlign'   => array(
                        'type'          => 'select',
                        'label'         => __('Image Align', 'fl-builder'),
                        'default'       => 'left',
                        'options'       => array(
                            'left'      => __('Left', 'fl-builder'),
                            'center'      => __('Center', 'fl-builder'),
                            'right'      => __('Right', 'fl-builder')
                        )
                    ),
                    'showCaption'   => array(
                        'type'          => 'select',
                        'label'         => __('Show Caption', 'fl-builder'),
                        'default'       => 'false',
                        'options'       => array(
                            'true'      => __('Yes', 'fl-builder'),
                            'false'      => __('No', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'true'      => array(
                                'sections'      => array( 'captionStyle' ),
                            ),
                        )
                    ),
                )
            ),
            'captionStyle'       => array( // Section
                'title'         => __('Caption Style', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'captionSize'   => array(
                        'type'          => 'text',
                        'size'          => 3,
                        'label'         => __('Caption Text Size', 'fl-builder'),
                        'default'       => 14,
                        'description'   => 'px'
                    ),
                    'captionAlign'   => array(
                        'type'          => 'select',
                        'label'         => __('Text Align', 'fl-builder'),
                        'default'       => 'center',
                        'options'       => array(
                            'left'      => __('Left', 'fl-builder'),
                            'center'      => __('Center', 'fl-builder'),
                            'right'      => __('Right', 'fl-builder')
                        )
                    ),
                    'captionColor'   => array(
                        'type'          => 'color',
                        'label'         => __('Caption Text Color', 'fl-builder'),
                        'default'       => 'ffffff'
                    ),
                    'captionBackgroundColor'   => array(
                        'type'          => 'color',
                        'label'         => __('Caption Background Color', 'fl-builder'),
                        'default'       => '333333',
                        'show_reset'    => true
                    ),
                    'captionPadding'   => array(
                        'type'          => 'text',
                        'size'          => 3,
                        'label'         => __('Caption Padding', 'fl-builder'),
                        'default'       => 5,
                        'description'   => 'px'
                    ),
                )
            )
        )
    ),
));