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

.slickModule_bb button,
.slickModule_bb button:hover,
.slickModule_bb button:active,
.slick-active button,
.slick-active button:focus,
.slick-active button:active {
    border: none;
}

.fl-node-<?php echo $id; ?> .slick-arrow,
.fl-node-<?php echo $id; ?> .slickModule_bb_Pause {
    <?php if ($settings->arrowBackgroundColor != '') {  ?>background: #<?php echo $settings->arrowBackgroundColor; ?>;<?php } else { ?> background: transparent; <? } ?>
    color: #<?php echo $settings->arrowColor; ?>;
}

.fl-node-<?php echo $id; ?> .slick-arrow:before,
.fl-node-<?php echo $id; ?> .slickModule_bb_Pause:before {
    font-size: <?php echo $settings->arrowSize; ?>px;
}

.fl-node-<?php echo $id; ?> .slick-arrow:hover,
.fl-node-<?php echo $id; ?> .slickModule_bb_Pause:hover {
    <?php if ($settings->arrowHoverBackgroundColor != '') {  ?>background: #<?php echo $settings->arrowHoverBackgroundColor; ?>;<?php } else { ?> background: transparent; <? } ?>
    color: #<?php echo $settings->arrowHoverColor; ?>;
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

.fl-node-<?php echo $id; ?> .slick-dots button {
    <?php if ($settings->dotBackgroundColor != '') {  ?>background: #<?php echo $settings->dotBackgroundColor; ?>;<?php } else { ?> background: transparent; <? } ?>
    color: #<?php echo $settings->dotColor; ?>;
    font-size: <?php echo $settings->dotSize; ?>px;

}

.fl-node-<?php echo $id; ?> .slick-dots button:hover {
    <?php if ($settings->dotHoverBackgroundColor != '') {  ?>background: #<?php echo $settings->dotHoverBackgroundColor; ?>;<?php } else { ?> background: transparent; <? } ?>
    color: #<?php echo $settings->dotHoverColor; ?>;
}

.fl-node-<?php echo $id; ?> .slick-active button {
    <?php if ($settings->dotActiveBackgroundColor != '') {  ?>background: #<?php echo $settings->dotActiveBackgroundColor; ?>;<?php } else { ?> background: transparent; <? } ?>
    color: #<?php echo $settings->dotActiveColor; ?>;
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
    top: 40%;
    z-index: 10;
}

.slick-arrow.slick-prev {
    left: 10px;
}

.slick-arrow.slick-next {
    right: 10px;
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