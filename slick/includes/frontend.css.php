/**
 * This file should contain frontend styles that 
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

<?php $module->example_method(); ?>

.tmc_isVisibilyHidden {
    width: 1px;
    height: 1px;
    margin: -1px;
    padding: 0;
    border: 0;
    position: absolute;
    clip: rect(0 0 0 0);
    overflow: hidden;
}

/* ---------------------------------------------------------------------
Slick
------------------------------------------------------------------------ */

.slickModule_bb {
    position: relative;
}

.slickModule_bb button:hover,
.slick-active button,
.slick-active button:focus {
    background-color: #333;
}

/* ---------------------------------------------------------------------
Dots
------------------------------------------------------------------------ */

.slick-dots {
    text-align: center;
}

.slick-dots li {
    display: inline-block;
    padding: 5px 5px;
}

.slick-dots button {
    border-radius: 50px;
}

/* ---------------------------------------------------------------------
Play/Pause
------------------------------------------------------------------------ */

.slickModule_bb_Pause,
.slickModule_bb_Pause:active {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 10;
}

/* ---------------------------------------------------------------------
Arrows
------------------------------------------------------------------------ */

.slick-arrow,
.slick-arrow:active {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 10;
}

.slick-arrow.slick-next {
    left: 50px;
}

<?php if ($settings->forceImageSize == 'true' && $settings->oneSlide == 'false') { ?>
/* ---------------------------------------------------------------------
Force Image Size
------------------------------------------------------------------------ */
.fl-node-<?php echo $id; ?> .slick-slide img {
    width: 100%;
    height: auto;
}
<?php } ?>

<?php if ($settings->showCaptions == 'true') { ?>
/* ---------------------------------------------------------------------
Photo Captions
------------------------------------------------------------------------ */
.fl-node-<?php echo $id; ?> .slickPhotoCaption {
    background-color: #000;
    padding: 10px;
    text-align: center;
    color: #fff;
}
<?php } ?>

<?php if ($settings->adaptiveHeight == 'false') { ?>
/* ---------------------------------------------------------------------
Fixed Height Size
------------------------------------------------------------------------ */
.fl-node-<?php echo $id; ?> .slick-slide {
    height: <?php echo $settings->fixedHeightSize; ?>px;
}

.fl-node-<?php echo $id; ?> .slick-slide img {
    max-height: 100%;
}
<?php } ?>