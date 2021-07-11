# Outermost

[![License](https://img.shields.io/badge/license-GPL--2.0%2B-green.svg)](https://github.com/ndiego/outermost/blob/master/LICENSE.txt)

⚠️  **This theme is not intended for use on a production site.**

Outermost is an experimental Full-Site Editing (FSE) WordPress theme. It is being developed by me, Nick Diego, as the base theme for all of my projects. This gives me the opportunity to continually test all of the exciting changes and new features that are coming with FSE in a live environment.

**To view the theme live, check out my [personal blog](https://nickdiego.com/).**

Feel free to test the theme out yourself, but remember, this is all experimental. Things will likely break with new versions of WordPress/Gutenberg. I will be continually updating the theme to keep up with all the changes, but use with caution.

## Features

* Support for an Articles custom post type and corresponding templates.
* Custom page/post templates. Currently there are two, Freeform and Landing.
* [Trailwind](https://tailwindcss.com/)-like utility classes to easily manage top and bottom margin until this functionality is added to all Core blocks in Gutenberg.
* A handful of block patterns and styles (more to come).

## Issues

Given that FSE is still very much in development, there are a number of issues with this theme that hopefully will be addressed as time progresses. The notable issues are detailed below.

* The Navigation block does not have mobile styling yet, so it is a bit rough. I would like to see a mobile option that adds a "hamburger" icon on mobile in the future, or something similar.
* The spacing (margin & padding) control on Core blocks is desperately needed and is currently managed using the utility classes noted in the Features section above. This is not ideal and hopefully we will get full spacing control in all Core blocks. This will allow for "true" FSE.
* There is currently no easy way to edit custom post types in the Site Editor. This should change relatively soon, but just an FYI.
* This theme experiments with sidebar layouts, but there are many ways of approaching this, and the implementation is not ideal. Being able to add columns at the post/page level is great, but there is also a need for a more dynamic sidebar on all post/pages as you would find with Widget Areas in standard WordPress.
* There currently is not an Archive Title or Archive Description block. This is desperately needed, as there is no way to create a dynamic archive page with a category/tag specific title/description. You have to manually create create an archive template for each one in the Site Editor, or resort to a more generic title like "Archive". Same is true for Search Archives. This begs the question of whether template should actually be .html files or .php files, follow along here: https://github.com/WordPress/gutenberg/issues/27144.

## Installation

This theme currently integrates with the [GitHub Updater](https://github.com/afragen/github-updater) plugin to provide automatic updates with each official release. Ultimately, this theme may be made available on WordPress.org, but it is still **way** too experimental and buggy for general distribution.

#### Outermost

1. Download the [latest release](https://github.com/ndiego/outermost/releases/latest).
2. Go to the **Appearance → Themes → Add New** screen and click the **Upload Theme** button.
3. Upload the zipped release directly.
4. Go to the Themes screen and click **Activate**.

#### GitHub Updater
1. Install and activate the GitHub Updater plugin using the [installation instructions](https://github.com/afragen/github-updater/wiki/Installation#upload).
2. Follow the [General Usage](https://github.com/afragen/github-updater/wiki/General-Usage) instructions to add a personal access token (optional).

## Changelog

### 0.4.2 - 2021-07-11

##### Added

* Added additional styling for Easy Digital Downloads to make it look a little better.

### 0.4.1 - 2021-07-09

##### Added

* Added additional styling for SimpleToc to make it look a little better.

##### Fixed

* Fixed subnav styling. 

##### Fixed

* Fixed navigation menu margin which caused it to be non-functional.

### 0.4.0 - 2021-07-09

##### Added

* Added styling support for SimpleToc and Outermost EDD Utilities.

##### Changed

* Updated theme.json to be compatible with all the new features in Gutenberg 11.0+.
* Substantial overhaul of all templates to be more dynamic and enhance reliance on theme.json.
* Changed all query-loop blocks to post-template blocks for Gutenberg 11.0+ compatibility.
* Changed all post-tags block to post-terms blocks.

##### Removed

* Remove the Roboto Google font.

### 0.3.1 - 2021-06-06

##### Added

* Added more EDD styling throughout.

### 0.3.0 - 2021-06-06

##### Added

* Added the the Account template for improved EDD support.
* Added EDD email templates.
* Added EDD styling throughout.
* Added styling for tables and fieldsets.
* Added Termageddon styling.

##### Fixed

* Fixed the missing footer to the Landing Page template.

### 0.2.9 - 2021-05-21

##### Fixed

* Converted post-hierarcical-terms blocks to post-terms blocks due to Gutenberg change.
* Updated styling the broke due to Gutenberg changes.

### 0.2.8 - 2021-05-04

##### Fixed

* Fixed layout of footer template part on the index.html template.

### 0.2.7 - 2021-05-04

##### Changed

* Changed the layout for the index.html to be consistent with the archive.html template.

### 0.2.6 - 2021-05-02

##### Changed

* Changed default heading sizes.

##### Fixed

* Link styling and sizing for the site logo.
* Post title styling for the custom homepage grid layout.

### 0.2.5 - 2021-05-01

##### Added

* Added Article Categories block variation to the navigation link block.
* Added Material Icons Outlined support.

##### Changed

* Updated all templates to be compatible with Gutenberg 10.3+.
* Articles are now included in search queries.
* Changed link styling to be much simpler.

##### Removed

* Removed all template parts except for main-navigation.html and footer.html.

### 0.2.4 - 2021-03-21

##### Fixed

* Fixed error in image block styling.

## Changelog

### 0.2.3 - 2021-03-21

##### Added

* Condensed list block variation.

##### Changed

* Improved vertical spacing on image blocks in the post/page content area.

##### Fixed

* Paragraph styles for the  EDD Free Downloads modal.

### 0.2.2 - 2021-03-21

##### Added

* Custom styling for the EDD Free Downloads modal to be consistent with theme styles.

##### Fixed

* Editor styles for un-ordered lists.

##### Changed

* Updated list styles.

### 0.2.1 - 2021-03-21

##### Changed

* Updated list styles.

### 0.2.0 - 2021-03-07

##### Added

* Support for Material UI icons
* Added utility classes for Material UI icons
* Added utility classes for alternative link styles
* Added utility classes for opacity

##### Changed

* Change article-category to knowledge-base-category
* Site logo is now restricted to 250px with CSS. Fixes a rendering issue in FSE.

##### Fixed

* Margin styling for sidebars so it does not impact additional columns blocks.
* Cover blocks were not respecting the rounded utility classes, so fixed that.
* Fixed error with incorrect file reference for block variations
