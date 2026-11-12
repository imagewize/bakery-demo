# Bakkerij Lindeboom demo

The homepage for Bakkerij Lindeboom (invented), a family bakery in Utrecht: an HTML/CSS prototype and then a WordPress block theme in Mode B, Aviendha + Aludra. Built with the `wp-frontend-builder` Vibe agent from
[wp-vibe-toolbox](https://github.com/imagewize/wp-vibe-toolbox): first an HTML/CSS prototype
(`index.html`), then a block theme (`theme-lindeboom/`). The prompts for each run are in
[PROMPTS.md](PROMPTS.md).

## Brief

- Name and place: Bakkerij Lindeboom, Utrecht, Netherlands (invented business for a demo)
- What they do: family bakery, 12 people, since 1987
- Audience: neighbourhood customers and office caterers
- Main actions: "Order a cake" and "Visit the shop"
- Tone and language: warm, plain Dutch (on-screen copy in Dutch)
- Sections: header, hero, cakes, workshop, about, order form (name, email, date, cake, message), contact, footer
- References: example.com — take the full-bleed photos and the name-only captions; do not copy its name, logo, layout or copy
- Visuals: own photos in `images/` (downloaded by the user; credits in `images/CREDITS.md`)
- Build mode: Mode B, Aviendha fork + Aludra blocks
- Local site: `lindeboom-demo`, theme slug `lindeboom`

## Layout

```
bakery-demo/
├── images/              # Photos + CREDITS.md
├── index.html           # HTML/CSS prototype (prompt 1)
├── REVIEW.md            # Review notes from ux-designer (prompt 2)
├── theme-lindeboom/     # Block theme (prompt 4)
└── PROMPTS.md           # Every prompt, in order, with outcome and commit
```

Local site: `https://lindeboom-demo.test` (Laravel Valet), with Aludra and Contact Form 7.
