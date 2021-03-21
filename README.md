# Outermost

[![License](https://img.shields.io/badge/license-GPL--2.0%2B-green.svg)](https://github.com/ndiego/outermost/blob/master/LICENSE.txt)

⚠️  **This theme is not intended for use on a production site.**

Outermost is an experimental Full-Site Editing (FSE) WordPress theme. It is being developed by me, Nick Diego, as the base theme for all of my projects. This gives me the opportunity to continually test all of the exciting changes and new features that are coming with FSE in a live environment.

**To view the theme live, check out my [personal blog](https://nickdiego.com/).**

Feel free to test the theme out yourself, but remember, this is all experimental. Things will likely break with new versions of WordPress/Gutenberg. I will be continually updating the theme to keep up with all the changes, but use with caution.

## Features

* Support for a Documentation custom post type and corresponding templates.
* Custom page/post templates. Currently there are two, Freeform and Landing.
* [Trailwind](https://tailwindcss.com/)-like utility classes to easily manage top and bottom margin until this functionality is added to all Core blocks in Gutenberg.
* A handful of block patterns and styles (more to come).
* Includes the Roboto Google font.

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

### 0.2.3 - 2021-03-21

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
