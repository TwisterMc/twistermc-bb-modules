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

<?php if ($settings->forceImageSize == 'true') { ?>
.fl-node-<?php echo $id; ?> .tm_bb_fullImage img {
    width: 100%;
    height: auto;
}
<?php } else { ?>
.fl-node-<?php echo $id; ?> .tm_bb_fullImage {
    text-align: <?php echo $settings->imageAlign; ?>;
}
<?php } ?>

<?php if ($settings->showCaption == 'true') {
    if ($settings->captionBackgroundColor == '') {
        $backgroundColor = 'transparent';
    } else {
        $backgroundColor = '#' . $settings->captionBackgroundColor;
    }

    if ($settings->captionPadding == '') {
        $captionPadding = '0';
    } else {
        $captionPadding = $settings->captionPadding;
    }

    ?>
.fl-node-<?php echo $id; ?> .tm_bb_fullImage_caption {
    padding: <?php echo $captionPadding ?>px;
    background: <?php echo $backgroundColor; ?>;
    text-align: <?php echo $settings->captionAlign; ?>;
    color: #<?php echo $settings->captionColor; ?>;
    font-size: <?php echo $settings->captionSize; ?>px;
}
<?php } ?>