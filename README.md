# svgi plugin for Craft CMS

Take the contents of a SVG file and inject it inline in a template

## Installation

To install svgi, follow these steps:

1. Download & unzip the file and place the `svgi` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/joepagan/svgi.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3. Install plugin in the Craft Control Panel under Settings > Plugins
4. The plugin folder should be named `svgi` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

svgi works on Craft 2.4.x and Craft 2.5.x.

## svgi Overview

So you may want to get the contents of an SVG and inject it into your html for animating or styling with css...

## Configuring svgi

You can change the directory of where the plugin will look under the `admin/svgi/settings` page.

## Using svgi

Standard use: 

`{{ craft.svgi.inject('file') }}`

This will look in `public/../frontend/svgs` for `file.svg`

You could pass the file extension if you wish, though if not, the plugin will look for an svg extension:

`{{ craft.svgi.inject('file.svg') }}`

A 2nd param can be passed for a specific path for an individual svg. This path is relative to the public directory:

`{{ craft.svgi.inject('file', '/resources/images/icons/file.svg') }}`

A 3rd param (boolean) can be passed if you wish for the plugin to delete the first line of the file, sometimes SVGs can add an xml line which is not required.

`{{ craft.svgi.inject('file', '/resources/images/icons/file.svg', true) }}`
