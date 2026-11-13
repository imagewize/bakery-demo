<p align="center">
  <img src="assets/logos/lindeboom-rose-primary.svg" alt="Bakkerij Lindeboom Logo" width="128" height="128">
</p>
<div align="center">
<h1>Bakkerij Lindeboom</h1>
</div>
<div align="center">

Block theme for Bakkerij Lindeboom, a family bakery in Utrecht — a fork of the [Aviendha](https://github.com/imagewize/aviendha) starter theme.

</div>

## Description

**Bakkerij Lindeboom** is a WordPress block theme for a family bakery in Utrecht-Oost: warm cream surfaces, deep warm-brown screen ink, bessenrood accents, Fraunces display type over Hanken Grotesk body text, flat photography without borders or shadows. The design is an adaptation of the Savor (Food & Beverage) design system, locked in `theme.json`.

The homepage is one pattern (`patterns/homepage.php`) composed from **Aludra** blocks, with one gap the plugin does not cover:

| Section | Block |
|---|---|
| Hero | `core/cover` (no Aludra block holds a full-bleed photo) |
| Taarten | `aludra/feature-cards` |
| Workshop | `aludra/split-section` + `aludra/service-blocks` |
| Over ons | `aludra/about` |
| Bestellen | `aludra/contact-section` (Contact Form 7 form) |
| Contact | `aludra/icon-grid` |

## Required plugins

The theme activates without them, but the homepage sections render as empty placeholders — install and activate both:

- **[Aludra](https://github.com/imagewize/aludra)** — provides every `aludra/*` block on the homepage (and the mega-menu blocks, whose `menu` template part area this theme registers).
- **[Contact Form 7](https://wordpress.org/plugins/contact-form-7/)** — the order form inside `aludra/contact-section`.

A dismissible admin notice tells an administrator when either is missing (`inc/plugin-recommendations.php`).

The order form's markup lives in `assets/forms/bestelformulier.txt`, because Contact Form 7 keeps its form template in the database. After creating a form, load it with:

```bash
wp post meta update <form-id> _form --file=assets/forms/bestelformulier.txt
```

and put the form's ID in `patterns/homepage.php` (`[contact-form-7 id="…" …]`).

WooCommerce is optional; only the store templates need it.

## Lineage

Forked from the **Aviendha** starter theme 1.18.10 (see `CHANGELOG.md` for its history). Every `aviendha`/`Aviendha` identifier was renamed; the starter's structure — `theme.json` as the design system, WooCommerce block templates, style variations in `styles/`, no runtime dependencies — is inherited as-is.

## Structure

```
lindeboom/
├── style.css          # Theme header + the Bakkerij Lindeboom design layer (at the end)
├── theme.json          # Palette, typography, spacing, layout
├── functions.php       # Theme setup, menu area, WooCommerce hooks, plugin notice
├── inc/                # plugin-recommendations.php (dismissible admin notice)
├── patterns/           # homepage.php — the homepage as one pattern (sentinel-validated)
├── templates/          # FSE templates, incl. front-page.html rendering the pattern
├── parts/              # header.html, footer.html (rebuilt for the bakery)
├── styles/             # Style variations
├── assets/
│   ├── fonts/          # Fraunces + Hanken Grotesk variable woff2 (OFL, bundled)
│   ├── img/            # Unsplash photography (credits in CREDITS.md) + form copy
│   ├── forms/          # bestelformulier.txt — the Contact Form 7 template
│   ├── logos/          # Rose mark (SVG, recolored)
│   └── css/            # WooCommerce override stylesheet (conditional)
└── languages/          # Translations (text domain: lindeboom)
```

## Development

```bash
composer install
composer run lint       # php-parallel-lint syntax check
composer run wpcs:scan  # PHPCS against phpcs.xml, WordPress standard
composer run wpcs:fix   # PHPCBF auto-fix

npm install             # once; wp-pattern-sentinel harness
npm run setup           # playwright chromium, once
npx sentinel --log --url=https://<site>.test --user=<user> --pass=<pass> patterns/
```

No JS build step — the theme ships no bundled JavaScript.

## License

GNU GPL v3 (or later). See `LICENSE.md`. Font licences: Fraunces and Hanken Grotesk are SIL OFL.
