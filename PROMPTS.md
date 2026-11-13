# Prompts

Every prompt used in this demo, in the order they ran, with the agent, the outcome and the commit.
Copy a prompt as-is to repeat a run, or adapt it for a new client. The approach follows
[`architect-demo/PROMPTS.md`](https://github.com/imagewize/architect-demo/blob/main/PROMPTS.md).

Each run starts a fresh Vibe session in this folder with the agent named in its step; every
step shows the exact command, then the prompt to paste:

```bash
cd ~/code/bakery-demo
vibe --agent <agent>
```

| # | Step | Agent | Outcome | Commit |
|---|------|-------|---------|--------|
| 0 | Setup: folder, images, local site, plugins | `wp-frontend-builder` with `demo-project-setup` | Site returns 200 at https://lindeboom-demo.test, Aludra (symlinked working copy) and Contact Form 7 active; photos and credits added in a follow-up run, credits corrected after a check by eye | `482ed82`, `5f43091`, `c97e29e`, `5a0195c` |
| 1 | Build from brief | `wp-frontend-builder` | `index.html` with Savor adapted, Dutch copy, the photos from `CREDITS.md`, contrast and widths measured; visual check not done by the agent (GLM-5.3 has no image support), see notes under 1 | `4a56809` |
| 2 | Review the built page | `ux-designer` | Two notes on Mistral Medium 3.5, visual pass done; note 1 real (open menu under the hero), note 2 adjusted; missed the macarons link | `c0c5059` |
| 3 | Apply review notes | `ux-designer` (by mistake) | Note 1, a softened note 2 and the macarons link applied, checked at 390px | `c5af28f` |
| 4 | Convert to a block theme (Mode B, Aviendha + Aludra) | `wp-frontend-builder` | `theme-lindeboom/` forked from Aviendha, homepage pattern on six Aludra blocks plus a core Cover hero, active on the local site; draft PR #1 | `60f881c` |
| 5 | Design pass against `index.html` | `wp-frontend-builder` | In progress: first pass committed as `wip` (5a); 5b stopped after 11 minutes without an edit; 5c fixed button hover and the mobile menu colour | `9964aa4` |

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

**Model:** a fast coding model such as GLM is fine for the build. GLM has no image support in
Vibe (no `supports_images = true` in `~/.vibe/config.toml`), so it checks the page by measuring,
not by looking. Look at the result yourself, or let stage 2 do it.

```bash
cd ~/code/bakery-demo
vibe --agent wp-frontend-builder
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

Result (`4a56809`, GLM-5.3 in Vibe 3.1.2): one self-contained `index.html` of about 940 lines,
sections header, hero, taarten, workshop, over ons, bestelformulier, contact and footer, each
marked as a future pattern.
- **Design system:** Savor (Food & Beverage, fetched from the pinned upstream commit because Food &
  Beverage specs are not vendored). The agent read Graza, The Drake Hotel and Floema first and
  turned them down. Adapted: maroon ink to warm brown (`#3b2415`), Savor's display and grotesk
  faces to Fraunces and Hanken Grotesk (both OFL, on Fontsource for the theme; loaded from Google
  Fonts in the prototype), no typewriter faces, no flour-yellow accent. Tokens as
  `--wp--preset--color/font-family/font-size/spacing--*`, radii as `--lindeboom--radius--*`.
- **Photos:** only the primaries from `images/CREDITS.md`. The contact photo is cropped with
  `object-position: 50% 18%` so the Vietnamese menu stays out of frame.
- **Measured, not looked at:** every text and background pair at 5:1 or more; the hero text over
  the photo sampled pixel by pixel at 375, 800 and 1280px, worst case 5.6–6.4:1; a one-row 72px
  header, the hamburger below 1024px with 44px tap targets, no horizontal overflow at 375, 640, 800,
  1023, 1024 and 1280px; all 8 images load. The header CTA shows from 640px.
- **The slop gate found one real defect:** the hero text sat at the top of the photo, over the
  weakest part of the dark overlay. Fixed with bottom alignment, as in Savor, and a stronger
  gradient, then measured again.
- **Checked by eye afterwards, outside the session:** screenshots at 375/390 and 1440px through an
  iframe at the exact width. The page is right at phone width (hamburger, wrapped headline, stacked
  buttons), and the hero and the first two cake photos (drip cake, macarons) match their credits;
  the rest of the page was not looked at yet.

What went wrong:
- **No image support.** GLM-5.3 has no `supports_images = true` in `~/.vibe/config.toml`, so the
  agent could not see its screenshots ("came through as a raw image payload, too large to
  process"). It relied on measurements, which is the right fallback, but no visual pass happened
  in the session. Use `/model mistral-medium-3.5` for checks by eye (toolbox 1.18.0 now says so).
- **Browser extension.** The Real Browser extension was disconnected at first; once connected it
  could not resize the window and swallowed return values. The agent then wrote a DevTools-protocol
  script in `/tmp` for the width checks. That script did set exact widths, which a plain
  `--window-size=375` screenshot does not on macOS (headless Chrome will not go below 500px); the
  toolbox now uses `html-page-review/frame.html` for this.
- **Shell rules.** It piped `ls` into `head` and `tail`, and its `rm` cleanup of the test PNGs in
  `/tmp` was blocked by the guard.
- **Copy:** every cake card links "Bestel deze taart", also the macarons card, which is not a cake.
  Left for the review.

## 2. Review the built page

Agent: `ux-designer`, with the `html-page-review` skill. It writes numbered notes to `REVIEW.md`
and does not edit the page.

**Model:** this stage is a look, so it needs image support. Start the agent, run
`/model mistral-medium-3.5` (or another model with `supports_images = true`), then paste the
prompt. Vibe asks to read `probe.html` and `frame.html` from the toolbox, outside this folder:
"Allow for remainder of this session" is fine. A good run measures with the probe and takes one
screenshot per width through `frame.html`, and reports "Visual pass: done". "Not done" means the
model could not see the screenshots: switch model and run it again. If it calls Chrome with
`--window-size=390` directly, stop it.

```bash
cd ~/code/bakery-demo
vibe --agent ux-designer
```

Then paste this prompt:

```
Load html-page-review and review index.html against the brief in README.md.
```

Result (`c0c5059`, Mistral Medium 3.5 after `/model`): two notes in `REVIEW.md`. The run did what
the skill asks: the probe at 390, 768 and 1440px, one screenshot per width through `frame.html`
(600, 800 and 1460px windows) and "Visual pass: done". It also read `~/.vibe/config.toml` to check
image support. Vibe asked once to read `probe.html` and `frame.html` from the toolbox.
1. **Open mobile menu overlaps the hero at 390px.** Real: with the `<details>` menu open, the hero
   kicker, headline and button painted over the menu links, because `.site-header` was
   `position: relative` without a `z-index`. Confirmed with a separate screenshot of the open menu.
   The suggested fix (`z-index` on `.nav-toggle .site-nav`) was replaced by `z-index: 10` on
   `.site-header`.
2. **Hero pushes the content below the fold on phones.** A judgement call against the brief: the
   full-bleed hero and its bottom-aligned text are on purpose (Savor, and the hero contrast was
   measured for that position). The suggested fix, centring the text, was not taken; only the
   phone hero height was lowered so the cakes peek in.

Missed: "Bestel deze taart" on the macarons card. The review was dated 2024-11-12 instead of
2026-11-12.

## 3. Apply review notes

Agent: `wp-frontend-builder`. Keep each run to a few notes, then compare and commit.

**Model:** a fast coding model such as GLM for the edits. To check them by eye, run
`/model mistral-medium-3.5` at the end of the session and ask for screenshots at 390 and 1440px
through `html-page-review/frame.html`.

```bash
cd ~/code/bakery-demo
vibe --agent wp-frontend-builder
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

Result (`c5af28f`, GLM-5.3). The prompt used:

```
Read index.html and REVIEW.md. Apply review note 1 (put z-index: 10 on .site-header so the open mobile menu sits above the hero). For note 2, keep the hero text bottom-aligned and only lower the hero min-height at phone width so the first cake section peeks in. Also change the macarons card link from "Bestel deze taart" to "Bestel macarons". Don't edit REVIEW.md. When done, list per note what you changed.
```

- `.site-header` gets `z-index: 10`: the open menu now sits on its own panel above the hero.
- `.hero` is `min(70svh, 40rem)` on phones and `min(88svh, 50rem)` from 40rem up; the text stays
  bottom-aligned and "Onze taarten" shows on a 390×844 screen.
- The macarons card links "Bestel macarons".

Checked by eye at 390px, outside the session, through `frame.html` (closed and open menu).

What went wrong: the run used the stage 2 session, so it ran as `ux-designer` (switched back to
GLM with `/model`) instead of `wp-frontend-builder`. `ux-designer` is told never to edit the page
under review, and it lacks the builder's rules (one command per call, the mobile check,
`frame.html` screenshots). The three edits were small and came out right, but start this stage
with `vibe --agent wp-frontend-builder`.

## 4. Convert on Aviendha + Aludra

Agent: `wp-frontend-builder`, with `html-to-block-theme`.

**Model:** Mistral Large 4: a full conversion needs its 1M context, and its image support lets it
compare the screenshots of `index.html` and the site section by section. Ask for that comparison
before you accept the report. On a text-only model, "what still differs" comes from measurements
only, however confident the report sounds: switch with `/model` for the comparison.

Run it on a branch:

```bash
cd ~/code/bakery-demo
git switch -c feat/block-theme
vibe --agent wp-frontend-builder
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
- Checks, one command per call: php -l every PHP file; composer install and vendor/bin/phpcs --standard=phpcs.xml . in theme-lindeboom/; sentinel with --url https://lindeboom-demo.test --user admin --pass admin after every pattern change until it passes; the aviendha grep; the aludra block-name check; the rendered front page containing a wp-block-aludra-* wrapper for every block used; screenshots of index.html and the site at 1440px and 390px, compared section by section (390px through html-page-review/frame.html, which shows the page in an iframe at the exact width; never --window-size=390, headless Chrome on macOS stops at 500px). Confirm git -C ~/code/aviendha status shows nothing new.
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

Result (`60f881c`, Mistral Large 4): `theme-lindeboom/` as a fork of Aviendha, symlinked into
`~/code/lindeboom-demo/wp-content/themes/lindeboom` and active at https://lindeboom-demo.test.
- **Homepage pattern:** `patterns/homepage.php` uses `aludra/feature-cards` (cakes),
  `aludra/service-blocks` and `aludra/split-section` (workshop), `aludra/about`,
  `aludra/contact-section` with the Contact Form 7 shortcode (order form) and `aludra/icon-grid`
  (contact). The hero is a core Cover block, the gap the prompt expected.
- **Fonts and images:** Fraunces and Hanken Grotesk as variable woff2 in `assets/fonts/`, the
  photos and `CREDITS.md` in `assets/img/`.
- **Palette:** the Aludra slugs take their values from `index.html`. The names do not line up one to
  one: the design's berry red `--tertiary` (`#9c3524`) is the theme's `primary`, and the design's
  cream button colour `--primary` (`#efe1c3`) sits on `styles.elements.button`, with `#e3d2ac` as
  `primary-accent` and `custom.color.cream-hover`. Keep this in mind when a prompt names a colour.
- **Design layer:** started in the same run, at the end of `style.css` under
  "Bakkerij Lindeboom design layer".
- The theme carries Aviendha's WooCommerce templates and `styles/twilight.json`; neither is used
  by the demo.

The section-by-section report from the run was not kept, so stage 5 starts from fresh
screenshots.

## 5. Design pass against `index.html`

Agent: `wp-frontend-builder`, on the same branch as 4, so its diff shows only the design changes.
Fill in the numbered list from the differences prompt 4 reported and from your own screenshots,
one point per difference.

**Model:** the model with image support from stage 4 (Mistral Large 4), for the fixes and the
before and after comparison.

```bash
cd ~/code/bakery-demo
git switch feat/block-theme
vibe --agent wp-frontend-builder
```

Then paste this prompt:

```
Load html-to-block-theme. theme-lindeboom/ does not yet match index.html. Do a design pass so https://lindeboom-demo.test matches index.html, without changing which blocks are used except where noted. Screenshot index.html and the site at 1440px and 390px with headless Chrome before and after (390px through html-page-review/frame.html, which shows the page in an iframe at the exact width; never --window-size=390, headless Chrome on macOS stops at 500px).

1. <difference and the fix you want>
2. ...

Fix each point with a block style variation or theme.json first; use the design-layer block in style.css only for what is left, with one comment per rule. Run the checks from prompt 4 after every pattern or part change, then re-screenshot and list per point what you changed and what still differs.
```

### 5a. First pass

Result (`9964aa4`, committed as `wip`): `homepage.php` and the design layer in `style.css`
reworked, five contact icons added in `assets/icons/`, the order form text updated. The design
layer is now about 800 lines.

Checked afterwards, outside the session, by reading the hover rules that match each element on the
live site and hovering the header button:
- **Primary buttons did not change on hover.** In `theme.json`, `styles.elements.button[":hover"]`
  had `"background": "#E3D2AC"` at the top level, which WordPress ignores; it belongs under
  `"color": {"background": ...}`. Hovered, the header button stayed `rgb(239, 225, 195)`.
- The design's 150ms `background-color` transition on buttons was missing.
- Correct: the inverse hero button (to `#2a1608`), links in the nav, cake cards, contact and footer
  (to berry red), the form submit (to `#e3d2ac`), and the cake cards without Aludra's hover lift.
- The only console error is a missing `favicon.ico` (404).

### 5b. Hover states and remaining differences

Same start command, Mistral Large 4 (high). The prompt used:

```
Load html-to-block-theme. Continue the stage 5 design pass: theme-lindeboom/ must match index.html, including hover and focus states. Screenshot index.html and https://lindeboom-demo.test at 1440px and 390px before and after (390px through html-page-review/frame.html; never --window-size=390).

1. Button hover does nothing: in theme.json styles.elements.button[":hover"], "background" sits at the top level and is ignored. Move it to "color": {"background": "var(--wp--preset--color--primary-accent)"} (#E3D2AC, design --primary-hover) and keep the text colour contrast. Verify by hovering the header CTA and both hero buttons and reading the computed background.
2. Add the design's button transition (background-color 150ms ease) through theme.json or, if that's not possible, one design-layer rule; keep the prefers-reduced-motion override.
3. Hover-check every other interactive element against index.html (nav links desktop and the open mobile menu, cake card links, contact links, footer links, form submit, skip link and :focus-visible rings incl. the cream ring on the hero) and fix any that differ, theme.json first, design layer last.
4. Compare the rest of the page section by section with the screenshots and list what still differs; fix only what's clearly off, report the rest.

Run the checks from prompt 4 after any pattern or part change (php -l, phpcs, sentinel, aludra wrapper check). End with a per-point list of what changed and what still differs.
```

Result: stopped after about 11 minutes, no file in `theme-lindeboom/` changed, todo list at 0/9,
around ten approval prompts. The session started before toolbox PRs #77 and #78, so it had no
named command for slicing screenshots or checking hover states, and improvised each one:
- `python3 -c "import PIL"`, then a `python3` heredoc to slice the screenshots
- a `for` loop with `convert … "${f%.png}.jpg"`, then a second loop to scale the slices down,
  because a 1440px-wide image did not come through inline
- `node --version` and websocket probes, then `/tmp/shots/cdp.mjs`, a DevTools script to hover over
  elements, written and run twice before it was told to stop
- after "understood, CSS only", another `python3` heredoc to parse the page's CSS
- from its own CDP script, "the mobile menu does not open": wrong. Checked in a real browser at
  390px, the menu opens with all four links.

That browser check found a real bug instead: the open mobile menu is brown, because the design
layer paints it `var(--wp--preset--color--secondary)`, the design's name for `#f5ebd9`, while the
theme's `secondary` is `#755D43`. Menu text contrast 2.35:1 (12.26:1 with the theme's `tertiary`).
The links are also right-aligned (`text-align` in a flex container), and the design's
"Bestel een taart" button in the panel is missing.

Lessons, now in the toolbox (`wp-vibe-toolbox` #77, #78):
- One `magick … -crop … -resize 1100x … %02d.jpg` command slices, scales and converts.
- Hover and focus come from the CSS (`curl … | grep -o ':hover[^}]*}'`, `grep` on `index.html`
  and `style.css`), never a DevTools script.
- Hover colours in `theme.json` go under `color`.
- The prompt was too open: before screenshots and a full comparison ahead of any edit invited the
  exploring. Known fixes go in as a list of exact edits, checked afterwards.

### 5c. Exact edits, checked afterwards

A fresh session (toolbox with #77 and #78), Mistral Large 4. The prompt used:

```
Load html-to-block-theme. Make these edits in theme-lindeboom/ first, then check. No screenshots before editing, no python3, node, heredocs, loops or CDP scripts.

1. theme.json styles.elements.button[":hover"]: move "background" under "color": {"background": "var(--wp--preset--color--primary-accent)"}, keep text contrast.
2. theme.json or one design-layer rule: buttons get transition: background-color 150ms ease (keep the reduced-motion override).
3. style.css ~1952 (open mobile menu): background var(--wp--preset--color--secondary) → tertiary. Theme secondary is #755D43, design secondary #f5ebd9 = theme tertiary.
4. Open mobile menu links left-aligned like .nav-toggle .site-nav in index.html (align-items: flex-start on the open .wp-block-navigation__container).
5. Check every var(--wp--preset--color--*) in the "Bakkerij Lindeboom design layer" block against theme.json values, not names (design tertiary = theme primary, design secondary = theme tertiary); fix any that point at the wrong colour.

Then check, one command each: php -l on changed PHP, vendor/bin/phpcs --standard=phpcs.xml . in theme-lindeboom/, and
curl -s https://lindeboom-demo.test/ | grep -o 'wp-element-button:hover[^}]*}'
(must show background-color). Report per point what you changed. I check hover and the mobile menu in the browser myself.
```

Left for a later run: the "Bestel een taart" button in the mobile panel, and a section-by-section
comparison with screenshots.

Result (Mistral Large 4, Vibe 3.1.2, toolbox with #77 and #78, `awk` removed from the
allowlist): no approval prompts, all allowlisted `grep`, `sed -n` and `wc` calls, and edits 1–4
within a few minutes, against 11 minutes without an edit in 5b. It reported point 5 as findings
first and asked before running the checks.
- `theme.json`: the button `:hover` background sits under `color`. The served CSS shows
  `.wp-block-button__link:hover{background-color: var(--wp--preset--color--primary-accent);…}`.
- `style.css`: `transition: background-color 150ms ease` on `.wp-block-button__link`, with
  `transition: none` added to the reduced-motion block.
- `style.css`: the open mobile menu is painted `tertiary` (`#F5EBD9`) instead of `secondary`, and
  its links get `align-items: flex-start`.
- Point 5: all 38 `var(--wp--preset--color--*)` uses in the design layer listed with the source
  rule they port; the menu background was the only one pointing at the wrong colour.
- Checks: `php -l` and `phpcs` clean, the curl hover rule shows `background-color`.

Checked by hand afterwards, outside the session, in a browser: hovering the header button at
1440px turns it from `#efe1c3` to `#e3d2ac`; at 390px the open menu is cream with the links on the
left. Two findings:
- **Cache:** the first look still showed the brown menu. `style.css` is enqueued with the theme
  version (`?ver=1.0.0`, `functions.php:83`), which an edit does not change, so the browser kept
  the old file. `woocommerce.css` right below uses `filemtime()`. Reload with Cmd+Shift+R, or
  version `style.css` the same way.
- **New difference:** the menu links now start at x = 0, against the screen edge; the design's
  panel has a 1.25rem side gutter.
