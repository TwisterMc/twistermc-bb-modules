/**
 * This file should contain frontend JavaScript that
 * will be applied to individual module instances.
 *
 * You have access to three variables in this file:
 *
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
 *
 * Example:
 */

(function($){

var $slickSlider_bb = $(".fl-node-<?php echo $id; ?> .slickWrapper_bb");
var $slickSlider_bb_pauseButton = $(".fl-node-<?php echo $id; ?> .js-slickModule_bb_Pause");
var $slickSlider_bb_autoplay = <?php echo $settings->autoPlay; ?>;
var $slickSlider_bb_autoplaySpeed = <?php echo $settings->autoPlaySpeed; ?>;
var $slickSlider_bb_adaptiveHeight = <?php echo $settings->adaptiveHeight; ?>;
var $slickSlider_bb_arrows = <?php echo $settings->arrows; ?>;
var $slickSlider_bb_dots = <?php echo $settings->dots; ?>;
var $slickSlider_bb_pauseOnHover = <?php echo $settings->pauseOnHover; ?>;
var $slickSlider_bb_pauseOnDotsHover = <?php echo $settings->pauseOnDotsHover; ?>;
var $slickSlider_bb_variableWidth = <?php echo $settings->variableWidth; ?>;
var $slickSlider_bb_centerMode = <?php echo $settings->centerMode; ?>;
var $slickSlider_bb_fade = <?php echo $settings->fade; ?>;
var $slickSlider_bb_infinite = <?php echo $settings->infinite; ?>;
var $slickSlider_bb_slidesToShow = <?php echo $settings->slidesToShow; ?>;
var $slickSlider_bb_slidesToScroll = <?php echo $settings->slidesToScroll; ?>;
var $slickSlider_bb_oneSlide = <?php echo $settings->oneSlide; ?>;
var $slickSlider_bb_verticalCarousel = <?php echo $settings->verticalCarousel; ?>;

    <?php if ($settings->photoVideo === 'video' && $settings->autoplay_videos === 'true' && !FLBuilderModel::is_builder_active()) { ?>
        $slickSlider_bb.on('init', function(event, slick){
            var srcVideo = $("iframe", slick.$slides[0])[0].src;
            isYouTubeVideo = srcVideo.includes('youtube');
            isVimeoVideo = srcVideo.includes('vimeo');

            function callback(isYouTubeVideo,isVimeoVideo){
                // YouTube
                if (isYouTubeVideo == true) {
                    $("iframe", slick.$slides[0])[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
                }

                // Vimeo
                if (isVimeoVideo == true) {
                    var iframe = $("iframe", slick.$slides[0])[0];
                    var player = $f(iframe);
                    player.api('play');
                }

            }
             /* Attempt to auto play the first slide video. */
            setTimeout(function() {
                callback(isYouTubeVideo,isVimeoVideo);
            }, 5000);
        });
    <?php } ?>

    /* we have to setup the slider based on the number of slides we're showing and scrolling */
    if ($slickSlider_bb_oneSlide == true) {
        $slickSlider_bb.slick({
            autoplay: $slickSlider_bb_autoplay,
            autoplaySpeed: $slickSlider_bb_autoplaySpeed,
            arrows: $slickSlider_bb_arrows,
            dots: $slickSlider_bb_dots,
            pauseOnHover: $slickSlider_bb_pauseOnHover,
            pauseOnDotsHover: $slickSlider_bb_pauseOnDotsHover,
            vertical: $slickSlider_bb_verticalCarousel,
            infinite: $slickSlider_bb_infinite,
            adaptiveHeight: $slickSlider_bb_adaptiveHeight
        });
    } else {
        $slickSlider_bb.slick({
            autoplay: $slickSlider_bb_autoplay,
            autoplaySpeed: $slickSlider_bb_autoplaySpeed,
            arrows: $slickSlider_bb_arrows,
            dots: $slickSlider_bb_dots,
            pauseOnHover: $slickSlider_bb_pauseOnHover,
            pauseOnDotsHover: $slickSlider_bb_pauseOnDotsHover,
            vertical: $slickSlider_bb_verticalCarousel,
            infinite: $slickSlider_bb_infinite,
            slidesToShow: $slickSlider_bb_slidesToShow,
            slidesToScroll: $slickSlider_bb_slidesToScroll,
            variableWidth: $slickSlider_bb_variableWidth,
            centerMode: $slickSlider_bb_centerMode
        });
    }

    $ss_nextArrow = '<button class="fa fa-chevron-right slick-arrow slick-next" aria-hidden="true"><span class="tmc_isVisibilyHidden">Next</span></button>';
    $ss_prevArrow = '<button class="fa fa-chevron-left slick-arrow slick-prev" aria-hidden="true"><span class="tmc_isVisibilyHidden">Previous</span></button>';
    $ss_downArrow = '<button class="fa fa-chevron-down slick-arrow slick-next" aria-hidden="true"><span class="tmc_isVisibilyHidden">Next</span></button>';
    $ss_upArrow = '<button class="fa fa-chevron-up slick-arrow slick-prev" aria-hidden="true"><span class="tmc_isVisibilyHidden">Previous</span></button>';


    /* only use fade setting when using a horizontal carousel */
    if ($slickSlider_bb_verticalCarousel == false) {
        $slickSlider_bb.slick("slickSetOption", "fade", $slickSlider_bb_fade, false);
        $slickSlider_bb.slick("slickSetOption", "nextArrow", $ss_nextArrow, true);
        $slickSlider_bb.slick("slickSetOption", "prevArrow", $ss_prevArrow, true);
    } else {
        $slickSlider_bb.slick("slickSetOption", "nextArrow", $ss_downArrow, true);
        $slickSlider_bb.slick("slickSetOption", "prevArrow", $ss_upArrow, true);
    }

    if ($slickSlider_bb_autoplay === false) {
        $slickSlider_bb_pauseButton.addClass('paused');
        $slickSlider_bb_pauseButton.addClass('fa-play-circle');
        $slickSlider_bb_pauseButton.removeClass('fa-pause-circle');
    }

    $slickSlider_bb_pauseButton.on( "click", function() {
        if ($slickSlider_bb_pauseButton.hasClass('paused')) {
            $slickSlider_bb_pauseButton.removeClass('paused');
            $slickSlider_bb_pauseButton.removeClass('fa-play-circle');
            $slickSlider_bb_pauseButton.addClass('fa-pause-circle');
            $slickSlider_bb.slick('slickPlay');
        } else {
            $slickSlider_bb_pauseButton.addClass('paused');
            $slickSlider_bb_pauseButton.addClass('fa-play-circle');
            $slickSlider_bb_pauseButton.removeClass('fa-pause-circle');
            $slickSlider_bb.slick('slickPause');
        }

    });

    <?php if ($settings->photoVideo === 'video') { ?>
    /* ---------------------------------------------------------------------
     Pause videos when changing slides
     Author: Thomas McMahon
     ------------------------------------------------------------------------ */
    $slickSlider_bb.on('beforeChange', function(event, slick, currentSlide, nextSlide){
        $('iframe').each(function(){
            var srcVideo = $(this)[0].src;
            isYouTubeVideo = srcVideo.includes('youtube');
            isVimeoVideo = srcVideo.includes('vimeo');

            // YouTube
            if (isYouTubeVideo == true) {
                $(this)[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
            }

            // Vimeo
            if (isVimeoVideo == true) {
                var iframe = $(this)[0];
                var player = $f(iframe);
                player.api('pause');
            }
        });
    });

    /* ---------------------------------------------------------------------
     Auto play current slide video
     Author: Thomas McMahon
     ------------------------------------------------------------------------ */
    <?php if ($settings->autoplay_videos === 'true') { ?>
    $slickSlider_bb.on('afterChange', function(event, slick, currentSlide, nextSlide){
        var srcVideo = $("iframe", slick.$slides[currentSlide])[0].src;
        isYouTubeVideo = srcVideo.includes('youtube');
        isVimeoVideo = srcVideo.includes('vimeo');

        // YouTube
        if (isYouTubeVideo == true) {
            $("iframe", slick.$slides[currentSlide])[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
        }

        // Vimeo
        if (isVimeoVideo == true) {
            var iframe = $("iframe", slick.$slides[currentSlide])[0];
            var player = $f(iframe);
            player.api('play');
        }

    });
    <?php } ?>
    <?php } ?>


})(jQuery);
