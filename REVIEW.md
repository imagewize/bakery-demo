# Review: index.html (2024-11-12)

Widths checked: 390, 768, 1440. Visual pass: done (screenshots in /tmp/html-page-review/).
Brief: README.md.

## Fixed since last review
- none (first review)

## Review notes
1. **Header: Mobile navigation menu overlaps hero content at 390px.** The probe found text-overlap between nav items ("Contact" and the nav CTA "Bestel een taart") and hero text (kicker "Familiebakkerij in Utrecht — sinds 1987" and H1 "Elke ochtend vers, al bijna veertig jaar") when the `<details>` menu is open. At 390px the open mobile menu extends into the hero section and the text layers overlap visually. Fix: Add `z-index: 10` to `.nav-toggle .site-nav` so the open menu appears above the hero content.

2. **Hero: Mobile hero pushes main content below the fold.** At 390px the hero is ~742px tall with its content (kicker, H1, lead, buttons) aligned to the bottom via `justify-content: flex-end`, so the first product section ("Onze taarten") starts below the fold. For a bakery site where users want to see offerings immediately, this delays the primary content. Fix: Change `.hero__content` to `justify-content: center` at mobile, or reduce hero `min-height` for small viewports (e.g., `min(80svh, 50rem)` → `min(70svh, 40rem)`).

## Verify
- None

## Checked and fine
- All brief sections present: header, hero, cakes, workshop, about, order form (name, email, date, cake, message), contact, footer
- Main actions "Bestel een taart" and "Kom langs in de winkel" are visible and prominent
- Tone is warm, copy is plain Dutch as requested
- All images have descriptive alt text
- Form fields have proper `<label>` elements with `for`/`id` associations
- Skip link present for keyboard users
- No horizontal overflow at any width (390, 768, 1440)
- No small tap targets (< 24×24px) or small text (< 12px) detected
- No tall sticky header (header is `position: relative`, not sticky/fixed)
- 768px and 1440px layouts are balanced with consistent grid gaps and column sizing
- Footer has four columns at 1440px matching the brief's structure
- Opening hours, address, phone, email are all present and correctly formatted
- Design tokens use WordPress `--wp--preset--*` names, ready for theme.json conversion
