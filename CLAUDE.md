# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Contao 5.7 CMS website for Sealflex (sealing products company). Backend is PHP 8.4/Symfony via Contao; frontend assets
are built with Vite 8.x. Local dev uses DDEV (Docker) at `sealflex-c57.ddev.site`.

## Commands

### Frontend

```bash
npm run sass    # watch SCSS and compile to CSS (development)
npm run build   # production build via Vite
```

### Backend / CMS

```bash
ddev start                                                    # start local environment
ddev exec composer install                                    # install PHP dependencies
ddev exec vendor/bin/contao-console cache:clear              # required after DCA or config changes
ddev exec vendor/bin/contao-console contao:migrate           # run pending migrations
```

There is no test suite. Linting: Stylelint (SCSS) and Prettier.

## Architecture

### Frontend Theme

Source: `files/custom/theme/src/` → built to `files/custom/theme/dist/`.

CSS follows **ITCSS** with explicit `@layer` ordering declared in `main.scss`:
`settings → generic → base → layout → contao → components → utilities → overrides → projects → themes`

Folders are numbered to match: `00-settings/`, `20-base/`, `50-components/`, etc.

Vite path aliases: `@css`, `@js`, `@fonts`, `@images` → respective `src/` subdirectories.

**New CSS custom properties** must be declared in `files/custom/theme/src/css/00-settings/` — Stylelint (
`.stylelintrc.custom-props.json`) will error on undeclared properties.

Naming: BEM for custom components; Contao-generated class names used as-is.

### Templates

All Twig/HTML5 templates are in `templates/`. They override Contao core templates for pages, content elements,
navigation, modules, and forms. Naming mirrors Contao conventions (`ce_*.html5`, `mod_*.html.twig`, `nav_*.html5`,
`fe_page.html.twig`).

**Custom RSCE elements** (`templates/custom/`) always come in pairs:

- `rsce_<name>.html.twig` — Twig template
- `rsce_<name>_config.php` — field configuration for the Contao backend editor

### Contao Configuration

- `contao/dca/` — extends Contao backend tables (`tl_content`, `tl_module`, `tl_page`, `tl_article`, `tl_news`) using
  `$GLOBALS['TL_DCA']` merge patterns
- `contao/languages/de/` + `en/` — translations for DCA labels
- `config/config.yaml` — Contao extensions, image size definitions for responsive srcsets

### JavaScript Modules

`files/custom/theme/src/javascripts/main.js` is the Vite entry point and imports all modules. Key modules:

- `a11y-font-size.js`, `a11y-high-contrast.js`, `a11y-reduced-motion.js` — accessibility toggles
- `megamenu-navigation.js` — mega menu dropdown
- `header-sticky.js` — sticky header
- `parallax-image.js` — scroll parallax
- `open-cookiebar.js`, `delete-cookies.js` — cookie consent
- `counter.js`, `scrolltotop.js` — UI utilities

### Key Composer Extensions

- `agenturkopfnuss/contao-element-group-flex` and `-grid` — custom content element groups
- `madeyourday/contao-rocksolid-custom-elements` — RSCE (custom backend element editor)
- `oveleon/contao-cookiebar` — cookie consent bar
- `terminal42/contao-node` — node/wrapper elements

## Key Conventions

- Prettier uses **tab width 4**.
- Use `@use` (not `@import`) for SCSS modules.
- RSCE templates and their `_config.php` must stay in sync — the config defines all editable fields.
- DCA files extend (never replace) Contao table definitions; always use array merge patterns.
- Clear the Contao cache after any DCA or `config/` change: `ddev exec vendor/bin/contao-console cache:clear`

# SCSS-Dokumentation

SCSS-Dateien werden mit Datei-Header, Abschnittskommentaren und Inline-Kommentaren dokumentiert.
Der Header enthält Pflichtfelder für Layer, Tokens (verwendet / definiert / überschrieben), BEM-Blöcke und RSCE-Templates.
Überschriebene Tokens werden via Python-Skript geprüft und mit Inline-Kommentar begründet.

Für die vollständigen Konventionen und das Override-Analyse-Skript: `/scss-dokumentieren`

## SCSS Token-Architektur (3 Ebenen)

1. **Primitive Tokens** (`_s-tokens-primitives.scss`) – Rohwerte:
   `--clr-red-500`, `--fs-700`, `--space-500`, `--radius-md`, etc.
2. **Semantic Tokens** (`_s-tokens-semantic.scss`) – Zweck-gebundene Aliase:
   `--button-background-primary`, `--font-size-heading-lg-min`, etc.
3. **Project Tokens** (`_s-tokens-project.scss`) – Projektspezifische Overrides:
   `--brand-color-primary`, `--alternating-split-gap`, etc.

**CSS @layer-Reihenfolge:** `settings` → `generic` → `base` → `layout` → `extensions` → `components` → `utilities` → `overrides` → `projects` → `themes`

**Datei-Präfixe:** `_s-` Settings, `_g-` Generic, `_b-` Base, `_l-` Layout, `_e-` Contao/Extensions, `_c-` Components, `_u-` Utilities, `_o-` Overrides, `_p-` Projects, `_t-` Themes
