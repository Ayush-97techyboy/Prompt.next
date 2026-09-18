# Prompt Next — Corporate Website

> **From Intent To Outcome** — Prompt Next runs complex technology programmes for enterprises, coordinating every party from decision to live production.

This repository contains the static front-end source code for the **Prompt Next** corporate website, built entirely with **HTML5** and **CSS3** — no JavaScript frameworks, no build tools, no server required.

---

## Table of Contents

- [Overview](#overview)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Pages](#pages)
- [CSS Architecture](#css-architecture)
- [Getting Started](#getting-started)
- [Responsive Design](#responsive-design)
- [Assets & Fonts](#assets--fonts)
- [Contributing](#contributing)
- [License](#license)

---

## Overview

Prompt Next is a technology-execution firm serving six key industries: **BFSI**, **Telecommunications**, **Healthcare**, **Government & Public Sector**, **Manufacturing**, and **Hospitality**. The website communicates the company's capabilities, methodology, industry expertise, insights, and partner ecosystem through a series of well-structured static pages.

---

## Tech Stack

| Layer      | Technology                  |
| ---------- | --------------------------- |
| Markup     | HTML5 (semantic elements)   |
| Styling    | CSS3 (Flexbox, Grid, media queries) |
| Typography | Custom fonts via `@font-face`; Inter (Google Fonts on select pages) |
| Build      | None — static files, open directly in any browser |

---

## Project Structure

```text
Prompt Next/
│
├── LandingPage.html            # Home / main entry point
├── WhatWeDo.html               # Services & capabilities
├── HowWeWork.html              # Methodology & process
├── Industries.html             # Industry overview hub
│
├── BFSI.html                   # Banking, Financial Services & Insurance
├── Healthcare.html             # Healthcare industry page
├── Government.html             # Government & Public Sector
├── Hospitality.html            # Hospitality industry page
├── Manufacturing.html          # Manufacturing industry page
├── Telecommunication.html      # Telecom industry page
├── Telecommunications.html     # Telecom (alternate entry)
│
├── Style.css                   # Legacy compatibility entry point
│
├── css/
│   ├── global.css              # Shared site-wide styles (header, footer, hero, utilities)
│   └── pages/
│       ├── what-we-do.css
│       ├── industries.css
│       ├── bfsi.css
│       ├── government.css
│       ├── healthcare.css
│       ├── hospitality.css
│       ├── manufacturing.css
│       └── telecom.css
│
├── assets/
│   ├── fonts/                  # Self-hosted typefaces
│   ├── logo.png                # Brand logo
│   ├── hero-bg.png             # Landing page hero background
│   ├── Card.png                # Methodology process card
│   ├── article-*.png           # Insight article thumbnails
│   ├── icon-*.png              # Industry icons
│   ├── *-hero.png              # Industry hero images
│   └── ...                     # Other UI assets and icons
│
└── README.md                   # ← You are here
```

---

## Pages

| File | Description |
| ---- | ----------- |
| `LandingPage.html` | Hero section, company statistics, capabilities grid, industry overview, methodology card, partner ecosystem, insights, and CTA |
| `WhatWeDo.html` | Detailed breakdown of the five core capabilities |
| `HowWeWork.html` | Step-by-step methodology and engagement process |
| `Industries.html` | Industry hub linking to individual sector pages |
| `BFSI.html` | Banking, Financial Services & Insurance deep-dive |
| `Telecommunication.html` | Telecommunications deep-dive |
| `Healthcare.html` | Healthcare deep-dive |
| `Government.html` | Government & Public Sector deep-dive |
| `Manufacturing.html` | Manufacturing deep-dive |
| `Hospitality.html` | Hospitality deep-dive |

---

## CSS Architecture

The styling was originally a single `Style.css` monolith. It has since been refactored into a modular structure:

1. **`css/global.css`** — Contains all shared/site-wide rules: navigation bar, footer, hero section, typography, buttons, utility classes, and responsive breakpoints.
2. **`css/pages/*.css`** — Each page (or page family) has its own scoped stylesheet loaded alongside `global.css`.
3. **`Style.css`** — Retained as a legacy compatibility entry point that imports the new files.

### Loading pattern

Every HTML page loads stylesheets in this order:

```html
<link rel="stylesheet" href="css/global.css" />
<link rel="stylesheet" href="css/pages/<page-name>.css" />
```

### Maintenance rules

- **Shared styles** → edit `css/global.css`
- **Page-specific styles** → edit the matching file in `css/pages/`
- **Asset paths** → global CSS uses `../assets/`; page CSS uses `../../assets/`

---

## Getting Started

No build step, package manager, or server is needed.

1. **Clone the repository**
   ```bash
   git clone https://github.com/Ayush-97techyboy/Prompt.next.git
   ```
2. **Open in browser**
   - Open `LandingPage.html` directly in any modern browser (Chrome, Firefox, Safari, Edge).
3. **Edit**
   - Use any text editor or IDE (VS Code recommended).
   - Changes are reflected immediately on page refresh.

---

## Responsive Design

The site has been audited and optimised at four viewport widths:

| Breakpoint | Target |
| ---------- | ------ |
| **1440 px** | Desktop / large monitors |
| **1024 px** | Small laptops / landscape tablets |
| **768 px** | Tablets (portrait) |
| **390 px** | Mobile phones |

Key responsive features:

- **CSS-only hamburger menu** — navigation collapses at `≤ 1100 px` with no JavaScript.
- **Fluid grid layouts** — capability cards, industry cards, and article grids reflow from multi-column to single-column.
- **No horizontal overflow** — verified at all tested viewport widths.

---

## Assets & Fonts

- All images and icons live in `assets/`.
- Custom fonts are self-hosted under `assets/fonts/` and loaded via `@font-face` declarations in `global.css`.
- Some pages additionally load the **Inter** typeface from Google Fonts for supplementary weights.
- Unreferenced images have been cleaned up; every file in `assets/` is referenced by at least one HTML page or stylesheet.

---

## Contributing

1. Create a feature branch from `main`.
2. Make your changes following the existing CSS architecture (global vs. page-scoped).
3. Test at all four responsive breakpoints before submitting.
4. Open a pull request with a clear description of the changes.

---

## License

© Prompt Next Group Pte. Ltd. All rights reserved.
