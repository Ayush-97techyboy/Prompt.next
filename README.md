# Prompt Next Website

## Purpose

Prompt Next is a responsive static corporate website for enterprise
technology execution, transformation rescue, AI deployment, system
integration, capability building, and industry-specific delivery.

This README is the technical handoff document. The companion
[team-lead implementation report](./TEAM-LEAD-IMPLEMENTATION-REPORT.pdf) is
the management summary requested by AMey.

## Current status

### Completed and integrated

- Corporate pages and six industry pages are available as semantic HTML.
- Shared CSS is organized into base, layout, component, and page layers.
- Responsive layouts cover desktop, laptop, tablet, and mobile widths.
- Shared navigation, mobile menu, footer, CTA, form, card, and badge styles
  are wired across the site.
- CTAs and footer links route to the intended extensionless pages.
- The Prompt Next logo is used consistently and is configured as the favicon.
- GitHub Pages directory routing is implemented with `Pages/<slug>/index.html`.
- Open Graph and Twitter/X Card metadata are present for link previews.
- Obsolete conflict artifacts, reference captures, scratch files, and unused
  files identified during cleanup were removed.

### In progress / requires final review

- The Methodology section on the home page is being converted into an
  animated interaction by Ajay. The current visual capture shows overlapping
  labels and duplicate step text; this must be corrected and rechecked at
  desktop and mobile widths before final sign-off.
- Social previews should be checked after deployment because preview services
  cache metadata.

## Contribution and ownership

The repository history contains Ajay's initial baseline and Ayush's later
implementation commits. The ownership below is intentionally separated so
the team lead can distinguish baseline work, implementation, integration, and
remaining work.

### Ajay — baseline and methodology animation

- Created the original repository baseline and initial static site structure.
- Commit: `c59768d` — `Initial commit`.
- Owns the current methodology animation conversion/integration work in
  progress.
- Needs to resolve the duplicate/overlapping labels visible in the current
  methodology capture and confirm responsive behavior.

### Ayush — implementation, integration, and handoff

- Added and integrated the corporate pages, industry pages, and shared
  navigation/footer surfaces.
- Reorganized CSS into the modular architecture documented below.
- Corrected page paths, asset paths, logos, CTA destinations, hero sections,
  tiles, spacing, and responsive behavior.
- Repaired the mobile hamburger behavior and preserved the two-column footer
  layout on narrow screens.
- Reorganized pages into extensionless GitHub Pages directories.
- Added favicon, canonical URL, Open Graph, and Twitter/X Card metadata.
- Performed conflict cleanup, asset/reference cleanup, route checks, and
  documentation/handoff preparation.
- Relevant commits: `0abae72` and `72dcd06`.
- Latest implementation commit: `8df4660` — `feat: finalize website structure and documentation`.
- Latest merged `main` commit: `055c16b` — `merge: integrate website implementation`.

### Shared validation responsibility

Before release, Ayush and Ajay should jointly verify the methodology section,
all responsive breakpoints, route navigation, social previews, and the final
GitHub Pages deployment. The report should be updated if responsibility or
completion status changes.

## Site structure

```text
Prompt.next/
├── index.html                         # Root GitHub Pages redirect
├── nav.js                             # Shared menu and page behavior
├── Pages/
│   ├── home/index.html
│   ├── about-us/index.html
│   ├── bfsi/index.html
│   ├── blog/index.html
│   ├── contact-us/index.html
│   ├── government/index.html
│   ├── healthcare/index.html
│   ├── hospitality/index.html
│   ├── how-we-work/index.html
│   ├── industries/index.html
│   ├── insights/index.html
│   ├── manufacturing/index.html
│   ├── partners/index.html
│   ├── telecommunication/index.html
│   └── what-we-do/index.html
├── css/
│   ├── main.css
│   ├── base/
│   ├── components/
│   ├── layout/
│   └── pages/
├── assets/
├── TEAM-LEAD-IMPLEMENTATION-REPORT.pdf
└── README.md
```

## Extensionless routes

Each route is a directory containing `index.html`, so GitHub Pages serves the
route without exposing the file extension.

| Page | Route |
| --- | --- |
| Home | `/Pages/home/` |
| What We Do | `/Pages/what-we-do/` |
| Industries | `/Pages/industries/` |
| How We Work | `/Pages/how-we-work/` |
| Partners | `/Pages/partners/` |
| Insights | `/Pages/insights/` |
| About Us | `/Pages/about-us/` |
| Contact Us | `/Pages/contact-us/` |
| Blog | `/Pages/blog/` |
| BFSI | `/Pages/bfsi/` |
| Healthcare | `/Pages/healthcare/` |
| Government | `/Pages/government/` |
| Hospitality | `/Pages/hospitality/` |
| Manufacturing | `/Pages/manufacturing/` |
| Telecommunication | `/Pages/telecommunication/` |

The root route `/` redirects to `/Pages/home/`.

## Latest repository state

The completed implementation is merged and pushed to `main`.

```text
055c16b  merge: integrate website implementation
8df4660  feat: finalize website structure and documentation
```

## CSS architecture

Every page loads `css/main.css` before its page-specific stylesheet.

- `css/base/` — reset rules and design variables.
- `css/layout/` — containers, header, footer, and mobile navigation.
- `css/components/` — buttons, badges, and forms.
- `css/pages/` — page-specific layout, imagery, typography, and breakpoints.

Use shared files for reusable behavior and the matching page file for
page-specific changes. Do not reintroduce the removed monolithic `Style.css`
or `css/global.css`.

## Local development

From the repository root:

```bash
python -m http.server 4173
```

Open:

```text
http://127.0.0.1:4173/
http://127.0.0.1:4173/Pages/home/
```

No framework, build step, or package installation is required to serve the
website locally.

## Release checklist

1. Confirm the methodology animation has no overlapping or duplicate labels.
2. Test the animation at approximately 390 px, 768 px, 1024 px, and 1440 px.
3. Test the hamburger menu and footer at mobile and tablet widths.
4. Confirm all CTAs point to the intended page, especially Contact Us.
5. Confirm all CSS, JavaScript, image, and font requests resolve.
6. Confirm `/`, `/Pages/home/`, and representative page routes return HTTP 200.
7. Run `git diff --check` and confirm no unresolved merge entries remain.
8. Deploy to GitHub Pages and refresh social previews using a platform debugger.

## Deployment metadata

The entry pages currently use the GitHub Pages project URL in
`og:url`, `og:image`, and canonical metadata. If the repository URL or custom
domain changes, update those values in the HTML entry pages.

## License

© Prompt Next Group Pte. Ltd. All rights reserved.
