=== Bakkerij Lindeboom WordPress Theme ===
Contributors: Rhand
Tags: full-site-editing, custom-colors, custom-menu, editor-style, featured-images, grid-layout, template-editing, translation-ready, wide-blocks
Requires at least: 6.6
Tested up to: 7.1
Requires PHP: 8.0
Stable tag: 1.0.0
License: GNU General Public License v3.0 (or later)
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Block theme for Bakkerij Lindeboom, a family bakery in Utrecht. The homepage is one pattern composed from Aludra blocks.

== Description ==

Bakkerij Lindeboom is a block theme for a family bakery in Utrecht-Oost: warm cream surfaces, deep warm-brown screen ink, bessenrood accents, Fraunces display headings over Hanken Grotesk body text, and flat photography without borders or shadows. The design is an adaptation of the Savor (Food & Beverage) design system, locked in `theme.json`.

The homepage is one block pattern (`patterns/homepage.php`), composed from [Aludra](https://github.com/imagewize/aludra) blocks, with one gap the plugin does not cover:

* Hero — `core/cover` (no Aludra block holds a full-bleed photo)
* Taarten — `aludra/feature-cards`
* Workshop — `aludra/split-section` + `aludra/service-blocks`
* Over ons — `aludra/about`
* Bestellen — `aludra/contact-section` (with a Contact Form 7 form)
* Contact — `aludra/icon-grid`

This theme is a fork of the Aviendha starter theme (1.18.10); see `CHANGELOG.md` for Aviendha's history up to the fork.

== Required plugins ==

The theme activates without them, but the homepage sections render as empty placeholders. Install and activate both:

* [Aludra](https://github.com/imagewize/aludra) — every `aludra/*` block on the homepage comes from this plugin.
* [Contact Form 7](https://wordpress.org/plugins/contact-form-7/) — the order form inside `aludra/contact-section`.

A dismissible admin notice tells an administrator when either is missing. The order form's markup ships in `assets/forms/bestelformulier.txt` (Contact Form 7 keeps its template in the database, not in the theme) — load it with:

`wp post meta update <form-id> _form --file=assets/forms/bestelformulier.txt`

WooCommerce is optional and only needed for the store templates the theme inherits from Aviendha.

== Installation ==

1. Upload the theme folder to `/wp-content/themes/`, or install via Appearance → Themes → Add New.
2. Activate the theme through the 'Appearance' menu in WordPress.
3. Install and activate the Aludra and Contact Form 7 plugins (see "Required plugins"), and load the order form's markup as described above.
4. The front page renders `templates/front-page.html`, which shows the `lindeboom/homepage` pattern.

== Key Features ==

* Full Site Editing (FSE) block theme
* Homepage as one sentinel-validated pattern composed from Aludra blocks
* Design system via `theme.json`: warm-cream palette on the slugs Aludra's blocks read, Fraunces + Hanken Grotesk bundled as variable woff2 via `fontFace`
* Header with a mobile overlay navigation (`overlayMenu: mobile`), footer navigation that never collapses
* Translation-ready (text domain: `lindeboom`)

== Changelog ==

= 1.0.0 =
* First release as Bakkerij Lindeboom, forked from the Aviendha starter theme.
* Added: the homepage pattern composed from Aludra blocks, with the hero as a `core/cover` (no Aludra block holds a full-bleed photo).
* Added: `templates/front-page.html` rendering the pattern, header and footer parts rebuilt for the bakery.
* Changed: Lindeboom palette and typography in `theme.json`; Fraunces and Hanken Grotesk bundled as woff2; a design layer in `style.css`.
* Changed: every `aviendha`/`Aviendha` identifier renamed to `lindeboom`/`Lindeboom`.

For the starter theme's history up to 1.18.10, see `CHANGELOG.md`.

== Third-Party Libraries ==

= Ionicons (via Blade Icons) =
* License: MIT License
* Source: https://blade-ui-kit.com/blade-icons/ionicon-rose
* License URI: https://github.com/driesvints/blade-icons/blob/main/LICENSE.md
* Used in: `assets/logos/lindeboom-rose-primary.svg` and `assets/logos/lindeboom-rose-outline.svg`
* Purpose: The "rose" icon, recolored, is the theme's logo mark.

The MIT License is GPL-compatible.

= Fraunces =
* License: SIL Open Font License, Version 1.1
* Source: https://fontsource.org/fonts/fraunces
* License URI: https://openfontlicense.org
* Used in: `assets/fonts/fraunces-variable-wght.woff2`
* Purpose: Display font family (headings), self-hosted as a variable-font file.

= Hanken Grotesk =
* License: SIL Open Font License, Version 1.1
* Source: https://fontsource.org/fonts/hanken-grotesk
* License URI: https://openfontlicense.org
* Used in: `assets/fonts/hanken-grotesk-variable-wght.woff2`
* Purpose: Body font family, self-hosted as a variable-font file.

The SIL Open Font License is GPL-compatible.

== Copyright ==

Bakkerij Lindeboom WordPress Theme, (C) 2026 Jasper Frumau
Bakkerij Lindeboom is distributed under the terms of the GNU GPL v3 (or later).

The photography in `assets/img/` is from Unsplash; the makers are credited in `assets/img/CREDITS.md`.
