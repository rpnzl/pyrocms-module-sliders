# PyroCMS Sliders Module v1.1

## Description

The Sliders module will allow you to easily add [Nivo Sliders](http://nivo.dev7studios.com/) to your current PyroCMS site. This module utilizes the core Files module to manage each slider's images. The Slider widget includes most of the [Nivo Slider's](http://nivo.dev7studios.com/) javascript options, and we'll hopefully see it extended in the future!


## Installation

### The Install

#### Standard Download:

Rename the downloaded folder to `sliders` and drop it into your `addons/shared_addons/modules` directory, then install via the Add-ons section in the control panel!

#### Git Clone:

Navigate to `addons/shared_addons/modules` and then...

	git clone git://github.com/rpnzl/pyrocms-module-sliders.git sliders

#### Then To Add-ons!

When you install this module in the Add-ons section of your control panel, the installer will add a **Sliders Module** folder to your Files Module as a default container for individual slider folders/assets.

### General Settings

You'll find the Sliders module settings under the **Content dropdown** in your control panel. Here you can choose the module's main folder, which will contain folders for each of your sliders. You can also append jQuery if it isn't already included in your public theme.

### Creating A Slider

Head over to the Files module and open up the folder you chose as the Sliders module container (**Sliders Module** by default). Create a new folder within this container and give it a name. Upload your images to the new folder you created, and change their names if you plan to use captions. Drag and drop each file to change their display order.


## Styling

This module includes the collection of themes that are provided with a standard Nivo Slider install - NivoDefault, Orman and Pascal. You can also choose to opt out of using one of these themes and give the slider some custom styling.

Take a look at the Slider widget's [display.php](https://github.com/rpnzl/pyrocms-module-sliders/blob/1.1/develop/widgets/slider/views/display.php) to see how a slider is structured. If you plan to utilize custom CSS, you can access the widget div by class...

	div.widget.slider { padding: 20px; }
	div.widget.slider > div.slider-wrapper { background: #000; }

And specific widget wrappers by their folder id (X)...

	div.widget.slider > div#slider-X-wrapper { background: #000; }


## Important

### A Note On Width

By default, the Slider widget will not be wider than it's parent container. But due to how Nivo Slider operates, the images will still display at their full width, which means they'll be cut off if they're bigger than the slider's display area.

### A Note On Consistency

The Slider widget will adapt it's size to the **FIRST IMAGE** in it's asset folder. If that image is larger than any subsequent images, there will be noticeable gaps in the slider's display. Keep image sizes consistent, and keep smaller images at the front of the image order.

### Module Location

The slider widget currently utilizes a path that points to `YOUR_SITE/addons/shared_addons/modules`. If you'd like to use a different directory instead, you'll have to modify the included Slider widget's run() method.

### Things That Won't Work

* Having two instances of the same slider on the same page.
* Anchor elements in captions.

### Nivo Slider Documentation

You can find that [here](http://nivo.dev7studios.com/support/jquery-plugin-usage/).


## General Info

* Author: Michael Giuliana
* Twitter: [@rpnzldesign](http://www.twitter.com/rpnzl)
* Website: [http://rpnzl.com/](http://rpnzl.com/)

### Special Thanks

* [Dev7studios](http://nivo.dev7studios.com/), who created and maintain the friendly Nivo Slider.