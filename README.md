# PyroCMS Sliders Module

* Author: Michael Giuliana
* Twitter: [@rpnzldesign](http://www.twitter.com/rpnzl)
* Website: [http://rpnzl.com/](http://rpnzl.com/)
* Version: 1.1

## Description

This module will allow you to easily add Nivo Sliders to your current PyroCMS website. This module utilizes the core Files module to manage images. The Slider widget includes most of the Nivo Slider's javascript options, and we'll hopefully see it extended in the future!

## Installation

Rename the **pyrocms-module-sliders** folder -> **sliders** and drop it into your **addons/shared_addons/modules** directory, then install via the Addons section in the control panel!

When you click install, along with creating the necessary tables, the installer will add a *Sliders Module* folder to your Files Module. This will be the default container to hold asset folders for each of the sliders you create.

## Important

The slider widget currently utilizes a path that points to the **addons/shared_addons/modules** directory. If you'd like to use the **addons/default/modules** directory instead, you'll have to modify the included slider widget's run() method.

The widget must be contained in the page::body, or else the template append won't fire.