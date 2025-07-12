# Dark Mode for Prestashop BackOffice

![BackOffice Dark Mode][1]

[![version](https://img.shields.io/badge/version-1.0.0-green)][2]
[![MIT license](https://img.shields.io/github/license/adorade/bodarkmode)][3]
[![Dark Reader Badge](https://img.shields.io/badge/Dark_Reader-4.9.109-blue?logo=git)][4]
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

## Credits

- [Dark Reader][4] for the core dark mode engine.

## License

This module includes code from Dark Reader, which is licensed under the MIT License.
Bodarkmode module is licensed under [MIT][11].  
Copyright (c) 2025 [Adorade][12]

## Thanks for use

Hopefully, this module is useful to you.

[1]: assets/screenshoot.webp
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
