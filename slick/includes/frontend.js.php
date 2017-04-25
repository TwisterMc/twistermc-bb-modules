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
console.log('Module ID: <?php echo $id; ?>');
console.log('Text: <?php echo $settings->oneSlide; ?>');

(function($){


var $slickSlider_bb = $('.slickWrapper_bb');
var $slickSlider_bb_pauseButton = $( '.js-slickModule_bb_Pause' );
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

    $slickSlider_bb.slick({
        autoplay: $slickSlider_bb_autoplay,
        autoplaySpeed: $slickSlider_bb_autoplaySpeed,
        arrows: $slickSlider_bb_arrows,
        dots: $slickSlider_bb_dots,
        pauseOnHover: $slickSlider_bb_pauseOnHover,
        pauseOnDotsHover: $slickSlider_bb_pauseOnDotsHover,
        fade: $slickSlider_bb_fade,
        infinite: $slickSlider_bb_infinite,
        nextArrow: '<button class="fa fa-angle-right slick-arrow slick-next" aria-hidden="true"><span class="tmc_isVisibilyHidden">Next</span></button>',
        prevArrow: '<button class="fa fa-angle-left slick-arrow slick-prev" aria-hidden="true"><span class="tmc_isVisibilyHidden">Previous</span></button>',
    });

    if ($slickSlider_bb_oneSlide == true) {
        $slickSlider_bb.slick("slickSetOption", "adaptiveHeight", $slickSlider_bb_adaptiveHeight, false);
    }

    if ($slickSlider_bb_oneSlide == false) {
        $slickSlider_bb.slick("slickSetOption", "slidesToShow", $slickSlider_bb_slidesToShow, false);
        $slickSlider_bb.slick("slickSetOption", "slidesToScroll", $slickSlider_bb_slidesToScroll, false);
        $slickSlider_bb.slick("slickSetOption", "variableWidth", $slickSlider_bb_variableWidth, false);
        $slickSlider_bb.slick("slickSetOption", "centerMode", $slickSlider_bb_centerMode, false);
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

})(jQuery);