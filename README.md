# Prompt Next CSS Structure

## What was done

- Split the former `Style.css` monolith into one global stylesheet and one stylesheet per page family.
- Kept the landing-page rules in `css/global.css` so the existing cascade and visual behavior remain unchanged.
- Moved page-scoped rules into `css/pages/`:
  - `what-we-do.css`
  - `industries.css`
  - `government.css`
  - `healthcare.css`
  - `hospitality.css`
  - `manufacturing.css`
  - `telecom.css`
  - `bfsi.css`
- Updated all HTML pages to load `css/global.css` plus the appropriate page stylesheet.
- Both `Telecommunication.html` and `Telecommunications.html` use the shared `telecom.css` file.
- Rebased image and font URLs for the new CSS directory depth.
- Removed CSS comments and unnecessary whitespace from the generated files while preserving selectors, media queries, and declarations.
- Retained `Style.css` as a compatibility entry point that imports the new files for any external or legacy reference.

## Directory layout

```text
css/
  global.css
  pages/
    bfsi.css
    government.css
    healthcare.css
    hospitality.css
    industries.css
    manufacturing.css
    telecom.css
    what-we-do.css
```

## Maintenance

When editing shared landing styles, update `css/global.css`. When editing an individual page, update its matching file in `css/pages/`. Keep asset references relative to the stylesheet location: global CSS uses `../assets/`, and page CSS uses `../../assets/`.

No build step is required; the pages remain static HTML and can be opened directly in a browser.

## Responsive updates

- Audited all nine populated pages at `1440px`, `1024px`, `768px`, and `390px` widths.
- Added a shared medium-screen navigation breakpoint at `1100px` so desktop navigation collapses before it can overflow.
- Kept the responsive hamburger control and navigation layout CSS-only; no JavaScript is used.
- Removed tablet-only `nowrap` overflow from the Landing page and What We Do content layouts.
- Confirmed no horizontal overflow at the tested viewport sizes.

## Asset cleanup

Removed seven unreferenced images from `assets/`: the five `crop_*` files, `method-panel.png`, and `what-hero-no-nav-final3.png`. All remaining images, icons, and font files are referenced by an HTML page or stylesheet.
