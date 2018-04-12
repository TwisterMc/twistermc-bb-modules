<?php

/**
 * @class BBSlickSlider
 */
class BBSlickSlider extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Slick', 'fl-builder'),
            'description'   => __('Slick Slider for BeaverBuilder', 'fl-builder'),
            'category'		=> __('Advanced Modules', 'fl-builder'),
            'dir'           => TMC_BB_DIR . 'slick/',
            'url'           => TMC_BB_URL . 'slick/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
        /** 
         * Use these methods to enqueue css and js already
         * registered or to register and enqueue your own.
         */
        // Already registered
        $this->add_css('font-awesome');
        $this->add_js('jquery-bxslider');
        
        // Register and enqueue your own
        $this->add_css( 'slick-slider-css-cdn', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css', array(), '' );
        $this->add_js( 'slick-slider-js-cdn', TMC_BB_URL . '/slick/js/slick.js', array('jquery'), '', false );

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
FLBuilder::register_module('BBSlickSlider', array(
    'general'       => array( // Tab
        'title'         => __('Media', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Media Settings', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
	                'photoVideo'   => array(
		                'type'          => 'select',
		                'label'         => __('Type of Media', 'fl-builder'),
		                'default'       => 'photo',
		                'options'       => array(
			                'photo'      => __('Photo', 'fl-builder'),
			                'video'      => __('Video - YouTube/Vimeo *Beta*', 'fl-builder')
		                ),
		                'toggle'        => array(
			                'photo'      => array(
				                'fields'        => array( 'multiple_photos_field','showCaptions','oneSlide','forceImageSize','fade' ),
			                ),
			                'video'      => array(
				                'fields'        => array( 'multiple_video_field' ),
			                ),
		                )
	                ),
                    'multiple_photos_field'     => array(
                        'type'          => 'multiple-photos',
                        'label'         => __('Photos', 'fl-builder'),
                    ),
                    'showCaptions'   => array(
                        'type'          => 'select',
                        'label'         => __('Show Captions', 'fl-builder'),
                        'default'       => 'false',
                        'options'       => array(
                            'true'      => __('Yes', 'fl-builder'),
                            'false'      => __('No', 'fl-builder')
                        )
                    ),
                    'oneSlide'   => array(
                        'type'          => 'select',
                        'label'         => __('Show # Slides', 'fl-builder'),
                        'options'       => array(
                            'true'      => __('One', 'fl-builder'),
                            'false'      => __('Multiple', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'false'      => array(
                                'sections'      => array( 'multiplePhotoSettings' ),
                            ),
                            'true'      => array(
                                'fields'      => array( 'adaptiveHeight','forceImageSize' ),
                            ),
                        )
                    ),
                    'forceImageSize'   => array(
                        'type'          => 'select',
                        'label'         => __('Force Images to Full Width', 'fl-builder'),
                        'default'       => 'false',
                        'options'       => array(
                            'true'      => __('Yes', 'fl-builder'),
                            'false'      => __('No', 'fl-builder')
                        )
                    ),
	                'multiple_video_field' => array(
		                'type'          => 'text',
		                'label'         => __( 'Video URL', 'fl-builder' ),
		                'multiple'      => true,
	                ),
                )
            ),
            'multiplePhotoSettings'       => array( // Section
                'title'         => 'Multiple Photo Settings', // Section Title
                'fields'        => array( // Section Fields
                    'centerMode'   => array(
                        'type'          => 'select',
                        'label'         => __('Center Mode', 'fl-builder'),
                        'default'       => 'false',
                        'options'       => array(
                            'true'      => __('Yes', 'fl-builder'),
                            'false'      => __('No', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'false'      => array(
                                'fields'        => array( 'slidesToScroll' ),
                            ),
                        )
                    ),
                    'variableWidth'   => array(
                        'type'          => 'select',
                        'label'         => __('Variable Width', 'fl-builder'),
                        'default'       => 'false',
                        'options'       => array(
                            'true'      => __('Yes', 'fl-builder'),
                            'false'      => __('No', 'fl-builder')
                        )
                    ),
                    'slidesToShow'   => array(
                        'type'          => 'text',
                        'label'         => __('Slides to Show', 'fl-builder'),
                        'default'       => '1',
                    ),
                    'slidesToScroll'   => array(
                        'type'          => 'text',
                        'label'         => __('Slides to Scroll', 'fl-builder'),
                        'default'       => '1'
                    ),
                )
            )
        )
    ),
    'toggle'       => array( // Tab
        'title'         => __('Controls', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Slideshow Controls', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'autoPlay'   => array(
                        'type'          => 'select',
                        'label'         => __('Auto Play', 'fl-builder'),
                        'default'       => 'false',
                        'options'       => array(
                            'true'      => __('Yes', 'fl-builder'),
                            'false'      => __('No', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'true'      => array(
                                'fields'        => array( 'autoPlaySpeed' ),
                            ),
                        )
                    ),
                    'autoPlaySpeed'   => array(
                        'type'          => 'text',
                        'label'         => __('Auto Play Speed', 'fl-builder'),
                        'default'       => '3000',
                        'description'   => 'milliseconds'
                    ),
                    'arrows'   => array(
                        'type'          => 'select',
                        'label'         => __('Show Arrows', 'fl-builder'),
                        'default'       => 'true',
                        'options'       => array(
                            'true'      => __('Yes', 'fl-builder'),
                            'false'      => __('No', 'fl-builder')
                        )
                    ),
                    'pauseOnHover'   => array(
                        'type'          => 'select',
                        'label'         => __('Pause on Hover', 'fl-builder'),
                        'default'       => 'true',
                        'options'       => array(
                            'true'      => __('Yes', 'fl-builder'),
                            'false'      => __('No', 'fl-builder')
                        )
                    ),
                    'dots'   => array(
                        'type'          => 'select',
                        'label'         => __('Show Dots', 'fl-builder'),
                        'default'       => 'true',
                        'options'       => array(
                            'true'      => __('Yes', 'fl-builder'),
                            'false'      => __('No', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'true'      => array(
                                'fields'        => array( 'pauseOnDotsHover' ),
                            ),
                        )
                    ),
                    'pauseOnDotsHover'   => array(
                        'type'          => 'select',
                        'label'         => __('Pause on Dots Hover', 'fl-builder'),
                        'default'       => 'true',
                        'options'       => array(
                            'true'      => __('Yes', 'fl-builder'),
                            'false'      => __('No', 'fl-builder')
                        )
                    ),
                )
            ),
        )
    ),
    'design'      => array( // Tab
        'title'         => __('Design', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Tweak the Design', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'arrowSize'   => array(
                        'type'          => 'text',
                        'label'         => __('Arrow Size', 'fl-builder'),
                        'default'       => '20',
                        'description'   => 'pixels',
                    ),
                    'arrowColor'   => array(
                        'type'          => 'color',
                        'label'         => __('Arrow Color', 'fl-builder'),
                        'default'       => 'ffffff'
                    ),
                    'arrowBackgroundColor'   => array(
                        'type'          => 'color',
                        'label'         => __('Arrow Background Color', 'fl-builder'),
                        'default'       => '333333',
                        'show_reset'    => true
                    ),
                    'arrowHoverColor'   => array(
                        'type'          => 'color',
                        'label'         => __('Arrow Hover Color', 'fl-builder'),
                        'default'       => 'ffffff',
                    ),
                    'arrowHoverBackgroundColor'   => array(
                        'type'          => 'color',
                        'label'         => __('Arrow Hover Background Color', 'fl-builder'),
                        'default'       => '689BCA',
                        'show_reset'    => true
                    ),
                    'dotSize'   => array(
                        'type'          => 'text',
                        'label'         => __('Dot Size', 'fl-builder'),
                        'default'       => '14',
                        'description'   => 'pixels',
                    ),
                    'dotColor'   => array(
                        'type'          => 'color',
                        'label'         => __('Dot Color', 'fl-builder'),
                        'default'       => '000000',
                    ),
                    'dotBackgroundColor'   => array(
                        'type'          => 'color',
                        'label'         => __('Dot Background Color', 'fl-builder'),
                        'show_reset'    => true
                    ),
                    'dotActiveColor'   => array(
                        'type'          => 'color',
                        'label'         => __('Dot Active Color', 'fl-builder'),
                        'default'       => 'ffffff',
                    ),
                    'dotActiveBackgroundColor'   => array(
                        'type'          => 'color',
                        'label'         => __('Dot Active Background Color', 'fl-builder'),
                        'default'       => '333333',
                        'show_reset'    => true
                    ),
                    'dotHoverColor'   => array(
                        'type'          => 'color',
                        'label'         => __('Dot Hover Color', 'fl-builder'),
                        'default'       => 'ffffff',
                    ),
                    'dotHoverBackgroundColor'   => array(
                        'type'          => 'color',
                        'label'         => __('Dot Hover Background Color', 'fl-builder'),
                        'default'       => '689BCA',
                        'show_reset'    => true
                    )
                )
            ),
        )
    ),
    'multiple'      => array( // Tab
        'title'         => __('Settings', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Overall Settings', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'adaptiveHeight'   => array(
                        'type'          => 'select',
                        'label'         => __('Adaptive Height', 'fl-builder'),
                        'default'       => 'false',
                        'options'       => array(
                            'true'      => __('Yes', 'fl-builder'),
                            'false'      => __('No', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'false'      => array(
                                'fields'        => array( 'fixedHeightSize' ),
                            ),
                        )
                    ),
                    'fixedHeightSize'   => array(
                        'type'          => 'text',
                        'label'         => __('Fixed Height Size', 'fl-builder'),
                        'default'       => '500',
                        'description'   => 'pixels',
                    ),
                    'fade'   => array(
                        'type'          => 'select',
                        'label'         => __('Fade', 'fl-builder'),
                        'default'       => 'false',
                        'options'       => array(
                            'true'      => __('Yes', 'fl-builder'),
                            'false'      => __('No', 'fl-builder')
                        )
                    ),
                    'infinite'   => array(
                        'type'          => 'select',
                        'label'         => __('Infinite Loop', 'fl-builder'),
                        'default'       => 'true',
                        'options'       => array(
                            'true'      => __('Yes', 'fl-builder'),
                            'false'      => __('No', 'fl-builder')
                        )
                    ),
                    'verticalCarousel'   => array(
                        'type'          => 'select',
                        'label'         => __('Scroll', 'fl-builder'),
                        'default'       => 'false',
                        'options'       => array(
                            'true'      => __('Vertical', 'fl-builder'),
                            'false'      => __('Horizontal', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'false'      => array(
                                'fields'        => array( 'fade' ),
                            ),
                        )
                    ),
                )
            ),
        )
    ),
));