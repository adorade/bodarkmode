# Dark Mode for Prestashop back office

![BackOffice Dark Mode][1]

[![version](https://img.shields.io/badge/version-1.3.0-green)][2]
[![MIT license](https://img.shields.io/github/license/adorade/bodarkmode)][3]
[![Dark Reader Badge](https://img.shields.io/badge/Dark_Reader-4.9.134-blue?logo=git)][4]
[![PrestaShop](https://img.shields.io/badge/PrestaShop-8--9-blue?logo=prestashop)][5]
[![GitHub Downloads (all assets, all releases)](https://img.shields.io/github/downloads/adorade/bodarkmode/total)][6]

A PrestaShop module that allows you to enable dark mode support on all interfaces of the administration panel in order to give a rest to your eyes or those of your customers, using [Dark Reader][4].

## Features

- Dynamic dark mode for your PrestaShop admin panel.
- Uses the Dark Reader engine for high-quality, customizable dark themes.
- Supports Shadow DOM, adopted style sheets, and dynamic CSS overrides.
- Handles CSS imports, variables, and inline styles.
- Includes fallback and user-agent style overrides for maximum compatibility.

## How It Works

- Injects Dark Reader scripts and styles into your back office's pages.
- Dynamically modifies CSS to apply dark mode, including handling of CSS variables and custom properties.

## Installation

1. Copy the `bodarkmode` folder to your PrestaShop `modules/` directory.
2. Install the module from the PrestaShop admin panel.

## How to Use

1. **Find Toggle**: After installation, refresh the admin page to see the **Toggle Dark Mode** button in the sidebar under Dashboard.
2. **Enable Dark Mode**: Toggle the dark mode button to activate.
3. **Enjoy**: The dark theme will be applied automatically to all admin pages.

## Development

Tested on PrestaShop 8 and 9. Should work with 1.7 too.
This module makes use of the following Javascript library [Dark Reader][7] `MIT License`

- Main logic is in [`views/js/darkreader.js`][8].
- Styles and templates are in the `views/` subfolders.

You can update `darkreader` script files via a CDN such as:
- [unpkg][9] (uncompressed)
- [jsDelivr][10] (minified)

> DO NOT USE `.mjs` files, ONLY `.js`.

## Themes

The default Dark Reader theme is configured in `views/js/back.js`. To change the current palette, edit the `DARK_READER_THEME` object.

Available presets:

| Color Scheme | Background | Text |
|--------------|------------|------|
| Default | '#181a1b' | '#e8e6e3' |
| Dracula | '#282b36' | '#e8e6e3' |
| Nord | '#2e3440' | '#eceff4' |
| Custom | '#0b0e14' | '#e6ebf2' |

### Change the default theme

Open the file and update these values:

```js
const DARK_READER_THEME = {
    brightness: 100,
    contrast: 90,
    grayscale: 0,
    sepia: 0,
    darkSchemeBackgroundColor: '#2e3440',
    darkSchemeTextColor: '#eceff4',
    darkColorScheme: 'Nord',
};
```

Replace `'#2e3440'`, `'#eceff4'`, and `'Nord'` with any of the preset values above or with your own colors.

### Create a custom theme

For a fully custom look, set:

```js
darkColorScheme: 'Custom',
darkSchemeBackgroundColor: '#0b0e14',
darkSchemeTextColor: '#e6ebf2',
```

Then refresh the PrestaShop back office to apply the new palette. You can also change other Dark Reader options such as `brightness`, `contrast`, `grayscale`, and `sepia` to fine-tune the look.

### Fix charts and canvas elements

The `DARK_READER_FIXES` config is used for CSS exceptions that keep charts, canvases, and similar SVG/chart widgets readable when dark mode is enabled.

```js
const DARK_READER_FIXES = {
    invert: [],
    css: 'canvas, svg.chart, .chart, [class*="chart"], [id*="chart"] { background: #e8e6e3 !important; }',
    ignoreInlineStyle: ['canvas', 'svg', '.chart', '[class*="chart"]', '[id*="chart"]'],
    ignoreImageAnalysis: ['canvas', 'svg', '.chart', '[class*="chart"]', '[id*="chart"]'],
};
```

If a chart or graph still looks too dark, add its selector here or adjust the `css` rule to match your backend styling.

## To Do

- create a configuration form to change default values

## Credits

- [Dark Reader][4] for the core dark mode engine.

## License

This module includes code from Dark Reader, which is licensed under the MIT License.
Bodarkmode module is licensed under [MIT][11].  
Copyright (c) 2025-26 [Adorade][12]

## Thanks for use

Hopefully, this module is useful to you.

[1]: assets/screenshot.webp
[2]: boodarkmode.php
[3]: https://mit-license.org
[4]: https://github.com/darkreader/darkreader
[5]: https://github.com/PrestaShop/PrestaShop/releases
[6]: https://github.com/adorade/bodarkmode/releases
[7]: https://www.npmjs.com/package/darkreader
[8]: views/js/darkreader.js
[9]: https://unpkg.com/darkreader
[10]: https://www.jsdelivr.com/package/npm/darkreader
[11]: LICENSE
[12]: https://github.com/adorade
