# Prompts

Every prompt used in this demo, in the order they ran, with the agent, the outcome and the commit.
Copy a prompt as-is to repeat a run, or adapt it for a new client. The approach follows
[`architect-demo/PROMPTS.md`](https://github.com/imagewize/architect-demo/blob/main/PROMPTS.md).

Each run starts a fresh Vibe session in this folder with the agent named in its step; every
step shows the exact command, then the prompt to paste:

```bash
cd ~/code/bakery-demo
vibe --agent <agent> --smart-approve
```

| # | Step | Agent | Outcome | Commit |
|---|------|-------|---------|--------|
| 0 | Setup: folder, images, local site, plugins | `wp-frontend-builder` with `demo-project-setup` | Site returns 200 at https://lindeboom-demo.test, Aludra (symlinked working copy) and Contact Form 7 active | – |
| 1 | Build from brief | `wp-frontend-builder` | Not run yet | – |
| 2 | Review the built page | `ux-designer` | Not run yet | – |
| 3 | Apply review notes | `wp-frontend-builder` | Not run yet | – |
| 4 | Convert to a block theme (Mode B, Aviendha + Aludra) | `wp-frontend-builder` | Not run yet | – |
| 5 | Design pass against `index.html` | `wp-frontend-builder` | Not run yet | – |

## 0. Setup

Done with the `demo-project-setup` skill. To repeat it by hand:

**Images.** 21 photos from Unsplash in `images/`, resized to at most 1600px wide with
`scripts/resize-images.sh`, one `images/CREDITS.md` row each. Each was checked by eye on a numbered
contact sheet, and the primary per section was opened at full size; `CREDITS.md` names the subject,
the primary per section, the alternates and the spares. Never invent stock URLs: made-up photo IDs
give broken images, and the theme needs local files anyway.

**Local site.** Laravel Valet, with Aludra and Contact Form 7:

```bash
wp valet new lindeboom-demo --in=/Users/jasperfrumau/code
ln -s /Users/jasperfrumau/code/lindeboom-demo /Users/jasperfrumau/.config/valet/Sites/lindeboom-demo
wp plugin install contact-form-7 --activate --path=/Users/jasperfrumau/code/lindeboom-demo
ln -s /Users/jasperfrumau/code/aludra /Users/jasperfrumau/code/lindeboom-demo/wp-content/plugins/aludra
wp plugin activate aludra --path=/Users/jasperfrumau/code/lindeboom-demo
```

`wp valet new` provisions HTTPS by default (pass `--unsecure` for plain HTTP), so no
`valet secure` is needed: the site runs at `https://lindeboom-demo.test`, login `admin` / `admin`.
Only `/Users/jasperfrumau/.config/valet/Sites` is parked on this machine, so the site folder is
symlinked into it. The `aludra` plugin is a symlink to the working copy in `~/code/aludra`, so a
block fix shows on the next page load — and an edit through the site's plugin folder lands in the
Aludra repository.

**Starter and plugin.** In `~/code/aludra`, run `npm run build --workspaces --if-present` if the
build looks stale. In `~/code/aviendha`, delete any `sentinel-*.log.json` files and check that
`git status` is clean.

## 1. Build from brief

Agent: `wp-frontend-builder`

```bash
cd ~/code/bakery-demo
vibe --agent wp-frontend-builder --smart-approve
```

Then paste this prompt:

```
Build the homepage for Bakkerij Lindeboom, a family bakery in Utrecht, as one self-contained index.html with embedded CSS.

Brief:
- Name and place: Bakkerij Lindeboom, Utrecht, Netherlands (invented business for a demo)
- What they do: family bakery, 12 people, since 1987
- Audience: neighbourhood customers and office caterers
- Main actions: "Order a cake" (Dutch: "Bestel een taart") and "Visit the shop" ("Kom langs in de winkel")
- Tone and language: warm, plain Dutch — all on-screen copy in Dutch
- References: example.com — take the full-bleed photos and the name-only captions; do not copy its name, logo, layout or copy

This is a homepage, not a landing page. Sections: header, hero, cakes, workshop, about, order form (fields: name, email, date, cake, message), contact, footer.

Images: use only the files in images/ (subjects, orientations and uses in images/CREDITS.md), as <img> with width, height, alt text written from the subject in CREDITS.md and loading="lazy" except the hero. Hero: images/tabitha-turner-Ns2aJ5OXKds-unsplash.jpg (croissants and pains au chocolat on a board with a rolling pin, whisk, eggs and butter, top-down, landscape), full-bleed with the text over it. Cake cards: katie-rosario-QNyRp21hb5I (pink drip cake), heather-barnes-WbZesfqwR-A (macarons), deva-williamson-S2jw81lfrG0 (strawberry cupcakes), mockup-graphics-OdE9bKLNhQs (strawberry tart slice); alternates farhan-shaikh-rVOIf6tc5DU (palmiers) and brooke-lark-V4MBq8kue3U (fruit tarts). Workshop: nadya-spetnitskaya-tOYiQxF9-Ys (hands kneading dough), alternate hamideh-jafari-974x2guatCs (sifting flour). About: alan-aprilio-FJyjcrEBsMo (sourdough loaf), alternates mae-mu-BxsGyQwjwaw and angelo-pantazis-2-U0A2tNYhM (bread shelves). Contact: do-nhu--CC1HQ0O8YY (patisserie shop front; crop to the sign and the lit kitchen, the window shows another shop's branding and Vietnamese prices), alternate yeh-xintong-go3DT3PpIw4 (bakery display). Do not use the photos marked spare. No url() backgrounds, no external image URLs.

Minimal questions: state your assumptions at the top of your reply, then build.

Design: load design-system-library and check the Food & Beverage and Retail & E-commerce categories for a fitting system; adapt it, never copy a brand. If none fits, load frontend-design and pick one anchor. No font or colour wishes were given: choose a warm, plain palette that suits a family bakery. Fonts open-licence and available as woff2 (Fontsource or Google Fonts), so the block theme can bundle them. Lock the tokens as --wp--preset--* custom properties. One <section> per future block pattern, marked with HTML comments. Mobile-first, accessible, a hamburger menu under 1024px. Run the no-ai-design-slop gate before you hand off.
```

Why it is written this way:
- **A concrete brief:** a name, an audience and the main actions keep the copy specific.
- **"Not a landing page":** this stops the agent narrowing the page to one conversion goal.
- **References with what to take from each:** a URL alone gives the agent nothing to work with
  when the site cannot be fetched, and naming the traits keeps it from copying the site.
- **Local images only:** no broken or made-up URLs, no `url()` backgrounds for the Cover block to
  untangle, and the same files go into the theme.

Result: _not run yet._

## 2. Review the built page

Agent: `ux-designer`, with the `html-page-review` skill. It writes numbered notes to `REVIEW.md`
and does not edit the page.

```bash
cd ~/code/bakery-demo
vibe --agent ux-designer --smart-approve
```

Then paste this prompt:

```
Load html-page-review and review index.html against the brief in README.md.
```

Result: _not run yet._

## 3. Apply review notes

Agent: `wp-frontend-builder`. Keep each run to a few notes, then compare and commit.

```bash
cd ~/code/bakery-demo
vibe --agent wp-frontend-builder --smart-approve
```

Then paste this prompt:

```
Read index.html and REVIEW.md. Apply review notes 1–3 to index.html. Don't edit REVIEW.md. When done, list per note what you changed.
```

```bash
git diff                                  # compare with the last version
git commit -am "design: <what changed>"   # keep this run
git restore index.html                    # throw this run away
```

Result: _not run yet._

## 4. Convert on Aviendha + Aludra

Agent: `wp-frontend-builder`, with `html-to-block-theme`. Run it on a branch:

```bash
cd ~/code/bakery-demo
git switch -c feat/block-theme
vibe --agent wp-frontend-builder --smart-approve
```

Then paste this prompt:

```
Load html-to-block-theme and work in Mode B (Aviendha fork + Aludra blocks). Read references/forking-a-starter-theme.md, references/composing-with-aludra.md and references/mobile-navigation.md before writing any file.

Create theme-lindeboom/ in this repository as a fork of ~/code/aviendha for Bakkerij Lindeboom and build the homepage as one pattern composed from aludra/* blocks:
- Fork: rsync as the reference describes (no .git, node_modules, vendor or sentinel logs), compare both folder listings, then rename every aviendha identifier to lindeboom. Lineage docs keep naming Aviendha; version 1.0.0. Add sentinel-*.log.json to .gitignore. Run npm and sentinel only inside theme-lindeboom/, never inside ~/code/aviendha.
- Palette: give theme.json only the colour slugs the Aludra blocks read (list them with the grep in composing-with-aludra.md), each with a value taken from index.html's :root. Report the mapping.
- Fonts: bundle the fonts from index.html as woff2 in theme-lindeboom/assets/fonts/ and register them with theme.json fontFace.
- patterns/homepage.php: one pattern mirroring index.html section by section, copy verbatim. For every section, copy the block's markup from ~/code/aludra/patterns/ and change only the content:
  - header: header part from core blocks (navigation overlayMenu mobile)
  - hero: core/cover with the hero photo full-bleed and the text over it (no Aludra block holds a full-bleed photo: aludra/hero-split puts the image beside the text and aludra/hero-banner has no image), listed as a gap
  - cakes: aludra/feature-cards (see section-capabilities.php)
  - workshop: aludra/service-blocks (see section-split.php)
  - about: aludra/about (see section-about.php)
  - order form: aludra/contact-section (see section-contact.php; needs Contact Form 7)
  - contact: aludra/icon-grid (see section-icon-grid.php)
  - footer: footer part from core blocks (footer navigation overlayMenu never)
  Do not hand-build a section with core/group + CSS when an aludra block fits. If none fits, build it from core blocks and list it as a gap.
- Copy the images from images/ into theme-lindeboom/assets/img/ and reference them with get_theme_file_uri().
- Point the front page template at the pattern.
- Design layer, in this order: block style variations first, then theme.json (radius, shadows, buttons, headings, links, eyebrows), then header and footer parts rebuilt from index.html (header navigation overlayMenu mobile, footer navigation never; no WooCommerce mini-cart or account blocks, no "Start a project" button), and only then the remaining gaps in one block at the end of style.css headed "/* Bakkerij Lindeboom design layer */", one comment per rule naming the section. Set blogname to "Bakkerij Lindeboom" with wp option update.
- Site: ~/code/lindeboom-demo (Valet, with Aludra and Contact Form 7). Symlink theme-lindeboom/ to wp-content/themes/lindeboom and activate it. Use --path="/Users/jasperfrumau/code/lindeboom-demo", never ~ after =.
- README.md and readme.txt in the theme state which plugins must be installed; add the dismissible admin notice from ~/code/winespring/inc/plugin-recommendations.php.
- Checks, one command per call: php -l every PHP file; composer install and vendor/bin/phpcs --standard=phpcs.xml . in theme-lindeboom/; sentinel with --url https://lindeboom-demo.test --user admin --pass admin after every pattern change until it passes; the aviendha grep; the aludra block-name check; the rendered front page containing a wp-block-aludra-* wrapper for every block used; screenshots of index.html and the site at 1440px and 390px, compared section by section. Confirm git -C ~/code/aviendha status shows nothing new.
- Report: the section-to-block table (block, source pattern copied, style variation), the gaps, the palette mapping, the design-layer line count, and per section what still differs from index.html.
```

Why it is written this way:
- **Mode B named up front:** without it the agent slides into a core-block conversion
  (architect-demo run 11).
- **Copy markup from Aludra's own patterns:** the blocks are static, so their wrapper must match
  `save()` exactly. Copying a working pattern is the fastest way to pass sentinel.
- **Design layer in the same run:** in architect-demo run 11b the palette was ported but the look
  stayed Aviendha's (pill buttons, shadows, dark bands). Variations, then `theme.json`, then parts,
  then CSS fixes that in order of cost.
- **Header menu named explicitly:** run 11c lost the hamburger menu when it rebuilt the header.
- **Screenshots compared:** sentinel and the block checks pass on a page that looks nothing like
  the source; only a visual comparison shows the difference.

Result: _not run yet._

## 5. Design pass against `index.html`

Agent: `wp-frontend-builder`, on the same branch as 4, so its diff shows only the design changes.
Fill in the numbered list from the differences prompt 4 reported and from your own screenshots,
one point per difference.

```bash
cd ~/code/bakery-demo
git switch feat/block-theme
vibe --agent wp-frontend-builder --smart-approve
```

Then paste this prompt:

```
Load html-to-block-theme. theme-lindeboom/ does not yet match index.html. Do a design pass so https://lindeboom-demo.test matches index.html, without changing which blocks are used except where noted. Screenshot index.html and the site at 1440px and 390px with headless Chrome before and after.

1. <difference and the fix you want>
2. ...

Fix each point with a block style variation or theme.json first; use the design-layer block in style.css only for what is left, with one comment per rule. Run the checks from prompt 4 after every pattern or part change, then re-screenshot and list per point what you changed and what still differs.
```

Result: _not run yet._
