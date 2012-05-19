# PyroCMS Sliders Module v1.1.0

## Description

The Sliders module will allow you to easily add [Nivo Sliders](http://nivo.dev7studios.com/) to your current PyroCMS site. This module utilizes the core Files module to manage each slider's images. The Slider widget includes most of the [Nivo Slider's](http://nivo.dev7studios.com/) javascript options, and will hopefully be extended in the future!

## Installation

### The Install

#### Via Standard Download:

Rename the downloaded folder to `sliders` and drop it into your `addons/shared_addons/modules` directory, then install via the Add-ons section in the control panel.

#### Via Git Clone:

Navigate to `addons/shared_addons/modules` and then...

	git clone git://github.com/rpnzl/pyrocms-module-sliders.git sliders

#### Then Install The Add-on

When you install this module in the Add-ons section of your control panel, the installer will add a **Sliders Module** folder to your Files Module as a default container for individual slider folders/assets. If the **Sliders Module** folder already exists the module will use that instead.

#### General Settings

You'll find the Sliders module settings under the **Content** dropdown in your control panel. Here you can choose the module's main folder, which will contain folders for each of your sliders. You can also append jQuery if it isn't already included in your public theme.

## Creating A Slider

Head over to the Files module and open up the folder you chose as the Sliders module container (**Sliders Module** by default). Create a new folder within this container and give it a name. Upload your images to the new folder, and drag and drop each file to change their display order.

![Create a folder for each of your sliders within the module's default folder](http://f.cl.ly/items/2q3w2h1g3q043W3U1W2Q/pyrocms-sliders-module-1.jpg "Create a folder for each of your sliders within the module's default folder")

*Note: The following is how I set up my own sliders, but if you think of something better don't hesitate to share!*

1) Head over to the Widgets Admin section and create a new area, we'll call it "Slider".

![Head over to the Widgets Admin section and create a new area, we'll call it "Slider".](http://f.cl.ly/items/3B1w1Z1x3e101R3u2y3H/pyrocms-sliders-module-2.jpg "Head over to the Widgets Admin section and create a new area, we'll call it 'Slider'.")

2) Return to the Widgets Instances section and drag the Slider widget into your new Slider area.

![Return to the Widgets Instances section and drag the Slider widget into your new Slider area.](http://f.cl.ly/items/0F22113R143e441C1Y0G/pyrocms-sliders-module-3.jpg "Return to the Widgets Instances section and drag the Slider widget into your new Slider area.")

3) Choose your folder, set your options and save the widget.

![Choose your folder, set your options and save the widget.](http://f.cl.ly/items/2B0K2T0U0N3Q2R3D2I2j/pyrocms-sliders-module-4.jpg "Choose your folder, set your options and save the widget.")

4) Copy the widget area's slug tag and paste it into the page you'd like to display the slider on.

![Copy the widget area's slug tag and paste it into the page you'd like to display the slider on.](http://f.cl.ly/items/1r1Y3U2A0U0P0T3b3o0V/pyrocms-sliders-module-5.jpg "Copy the widget area's slug tag and paste it into the page you'd like to display the slider on.")

#### Captions & Links

If you plan to use captions, set the name of each file to the caption you'd like displayed. If you'd like a slider image to be a clickable link, right click the image in the core Files module and choose details, then paste the URL in the description input area.

![To make an image clickable, paste your URL into the image's description field in the core Files module details view.](http://f.cl.ly/items/1r1Y3U2A0U0P0T3b3o0V/pyrocms-sliders-module-6.jpg "To make an image clickable, paste your URL into the image's description field in the core Files module details view.")

#### Widget Options

Here's a list of default values and quick descriptions for the options that are available to customize a Slider widget instance.

* Choose Slider - *N/A* - Choose which folder to use for content.
* Theme - *NivoDefault* - Select a NivoSlider theme, or opt out.
* Captions - *Off* - Display captions, content is taken from each file's name.
* Slider Effect - *Fade* - All NivoSlider effects are available.
* Anim Speed - *500* - In milliseconds, slide transition speed.
* Pause Time - *3000* - In milliseconds, the amount of time between animations.
* Direction Nav - *On* - Display left and right directional arrows.
* Direction Nav Hide - *On* - Show direction arrows on hover only.
* Control Nav - *On* - Display navigation buttons beneath the slider.
* Control Nav Thumbs - *Off* - Use image thumbs as the control navigation, only takes effect when the theme is set to **none**.
* Keyboard Nav - *On* - Control slides with left and right arrows.
* Pause On Hover - *On* - Stop animation while hovering.
* Manual Advance - *Off* - Force manual transitions.
* Slices - *15* - For slice animations, # of slices.
* Box Columns - *8* - For box animations, # of columns.
* Box Rows - *4* - For box animations, # of rows.

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