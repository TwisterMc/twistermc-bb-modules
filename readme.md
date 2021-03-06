# TwisterMc's Beaver Builder Modules

This is a free plugin for Beaver Builder that I'll be adding my custom modules to.

## Modules
### Slick Slider
Integrating [Slick Slider](https://kenwheeler.github.io/slick/). Allows you to add photo or video sliders with lots of options.

### Full Image
Forces an image to fill 100% of the width. Even if needs to be scaled up.

### Download Button
Allows you to select a PDF from the media library and make it available for users to download.

### YouTube
YouTube module that just accepts a YouTube url and embeds the video on the page. Easy for clients.

## TODO
- [ ] Update Vimeo helper script to be enqueued only if needed. / Half done, only shows with video sliders now.
- [x] Break out Photo vs Video settings so we can properly hide/show settings
- [ ] Add a field to put text on videos
- [ ] Double check the slick scripts so we can avoid setting conflicts between video and photo slideshows.
- [ ] Make it possible to have videos AND photos in one slideshow.
- [ ] Maybe add a WYSIWYG field for creating content on slides.
- [ ] Either use the internal or external Vimeo helper script and remove the other one.
- [ ] Have Rich review everything always because he's wicked smart.

## Release Notes

### Version 0.6.8
* Added a Download module for selecting a PDF from the media library and making it available for users to download.
* Added a YouTube module that just accepts a YouTube url and embeds the video on the page. Easy for clients.
* ReadMe Updates.

### Version 0.6.7
* Fixing major issues with when adding the Slick module to the page the first time.
* Adding defaults for most all Slick module settings.
* Fixing issues that prevented some Slick settings from showing.

### Version 0.6.6
* Separated the photo and video module settings so we don't have rogue settings. Well, mostly.
* Updated some code to be closer to WordPress coding standards.

### Version 0.6.5
* Much more video cleanup
* Properly enqueued Vimeo helper script
* Added auto play
* Added setting for auto play
* Removed un-necessary code
* Renamed functions

### Version 0.6.4
* Initial support for video slides.

### Version 0.6.3
* Fixing focus states for prev/next buttons and play/pause.

### Version 0.6.2
* Fixing embarrassing PHP errors.

### Version 0.6.1
* Added a link option to the full width image module.

### Version 0.6
* Added a new module for full width images.
* Adding up/down arrows for vertical carousels.

### Version 0.5
* Added vertical carousel mode.
* Re-worked the carousel inits to ensure the right number of dots show when scrolling by more than 1.
* Hiding the slidesToScroll setting if centerMode was true.

### Version 0.4
* Added the ability to style the arrows and dots.

### Version 0.3
* Pulling in the slick.js locally.
* Updating slick.js with a fix for [issue 1207](https://github.com/kenwheeler/slick/issues/1207)
* Updating the carousels to be self contained so that we can put multiple on one page.

### Version 0.2
Reorganization of the settings panel and hiding/showing fields as needed.

### Version 0.1
First! The code is very rough and it's not ready for prime time. Slick is integrated and working with a bunch of options. This is the starting point, more to come.
