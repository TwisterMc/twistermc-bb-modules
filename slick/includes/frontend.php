<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file: 
 * 
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 * Example: 
 */

?>

<div class="slickModule_bb">
    <div class="slickWrapper_bb">
        <?php

        if ($settings->photoVideo === 'photo') {
	        $arr = $settings->multiple_photos_field;
	        foreach ( $arr as &$value ) {
		        echo '<li>';
		        echo wp_get_attachment_image( $value, 'large', "", array( "class" => "img-responsive" ) );

		        if ( $settings->showCaptions == 'true' ) {
			        $imageInfo = get_post( $value );
			        echo '<div class="slickPhotoCaption">' . $imageInfo->post_excerpt . '</div>';
		        }

		        echo '</li>';
	        }
        } else {
	        $arr = $settings->multiple_video_field;
	        foreach ( $arr as &$value ) {
		        echo '<li>';
		        echo '<div class="videoWrapper">';
		        $embed_code = wp_oembed_get($value, array('width'=>800));
		        echo $embed_code;
		        echo '</div>';
		        echo '</li>';
	        }
        }
        ?>
    </div>
    <button class="fa fa-pause-circle js-slickModule_bb_Pause slickModule_bb_Pause" aria-hidden="true"><span class="tmc_isVisibilyHidden">Pause</span></button>
</div>

