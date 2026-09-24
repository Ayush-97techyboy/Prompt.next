# Prompt Next Website

## Overview & Purpose

Prompt Next is a responsive, highly performant static corporate website for enterprise technology execution, transformation rescue, AI deployment, system integration, capability building, and industry-specific delivery.

This repository contains the complete production codebase, modular CSS architecture, WCAG 2.1 AA accessibility implementation, responsive breakpoint optimizations, and sticky glassmorphic navigation header.

---

## 1. Key Engineering & Architecture Accomplishments

### 🌟 Sticky Blurred Header Navigation
- **Glassmorphic Backdrop Blur**: Added intuitive sticky navigation behavior triggered via `interaction.js` when `window.scrollY > 90`.
- **CSS Backdrop Filter**: Applies `position: fixed; top: 0; z-index: 1000; background: rgba(8, 9, 11, 0.75); -webkit-backdrop-filter: blur(16px) saturate(150%); backdrop-filter: blur(16px) saturate(150%); border-bottom: 1px solid var(--line);` with smooth 0.3s transition.
- **Specificity Shielding**: Scoped with `body .site-header.is-stuck, body .wwd-header.is-stuck` `(0, 2, 1)` to prevent page-level CSS overrides across all 15 templates.

### 🎨 Figma Typography & High-Impact Hero Sizing
- **Satoshi Font Migration**: Standardized Fontshare's Satoshi font system (`var(--font-sans)`) across all 15 HTML `<head>` files and CSS variables.
- **Figma Pixel-Perfect Typography Calibration**:
  - **Desktop Baseline (≥1200px / 1440px / 4K)**:
    - Hero Heading (`h1`): `70px` font size, `88px` line height, `700` (Bold), `#FFFFFF`.
    - Hero Description (`p`): `20px` font size, `32px` line height, `400` (Regular), `#B0B0B0`.
    - Section Heading (`h2`): `48px` font size, `88px` line height, `700` (Bold), `#FFFFFF`.
    - Body Copy (`p`): `24px` font size, `32px` line height, `400` (Regular), `#B0B0B0`.
  - **Prominent Mobile & Tablet Hero Scaling**:
    - **Laptop (1024px – 1199px)**: `clamp(48px, 5vw, 58px)` | `line-height: 1.15`
    - **Tablet (768px – 1023px)**: `clamp(40px, 5.5vw, 50px)` | `line-height: 1.15` (Bold, impactful tablet title)
    - **Mobile (≤600px / ≤425px)**: `clamp(34px, 8vw, 42px)` | `line-height: 1.15` (Bold, prominent mobile title)
  - **Hero Title Mismatch Fix**: Resolved span `#mobile-view` font size override in `landing.css`, allowing `From Intent To Outcome` to scale together as a unified heading.

### 📱 What-We-Do Capability Order & Document Justification
- **Strict Content Sequence on Mobile & Tablet (`≤1050px`)**: Used CSS `display: contents;` on `.wwd-capability-copy` to elevate `h2`, `img`, `.wwd-lead`, and `ul` into direct flex siblings, enforcing:
  1. **Title (`h2`)** — `order: 1`
  2. **Image (`.wwd-capability-image`)** — `order: 2` (rounded `16px`, centered, max-height `420px`)
  3. **Description (`.wwd-lead`)** — `order: 3`
  4. **Deliverables List (`ul`)** — `order: 4`
- **100% Width Container Coverage**: Eliminated the `440px` width bottleneck on tablet screens. Text and images span `100%` container width with clean document justification.

### ♿ WCAG 2.1 AA Accessibility & Keyboard Navigation
- **Focus Visible Outlines**: Added explicit `:focus-visible` blue focus rings (`outline: 2px solid #3b82f6; outline-offset: 3px;`) in `reset.css` for tab-key accessibility (WCAG Criteria 2.4.7).
- **Screen Reader Utility Class**: Integrated `.sr-only` visually hidden utility class for accessibility helper text.
- **Skip to Content Link**: Integrated `<a href="#main-content" class="skip-link">Skip to main content</a>` keyboard bypass links in all 15 HTML templates (WCAG Criteria 2.4.1).
- **Keyboard Mobile Drawer Navigation**: Event-delegated `interaction.js` handlers with `Escape` key listener to close active mobile menu and return focus to the menu button.

---

## 2. Blockers Encountered & Logical Resolutions

| Blocker / Technical Issue | Root Cause | Logical Resolution & Fix |
| :--- | :--- | :--- |
| **Sticky Header Styling Overridden on Inner Pages** | Page-specific CSS files defined `.page-name .wwd-header` with absolute positioning and transparent backgrounds `(0, 2, 0)`. | Escalated sticky state in `header.css` to `body .site-header.is-stuck, body .wwd-header.is-stuck` `(0, 2, 1)` with `!important` backdrop blur (`blur(16px) saturate(150%)`). |
| **Hero Title Mismatch on Landing Page Mobile** | `landing.css` contained an old ID selector `#mobile-view { font-size: 60px; }` `(1, 0, 0)` that forced "To Outcome" to stay 60px while "From Intent" scaled to 24px. | Updated `#mobile-view` in `landing.css` to `font-size: inherit !important; line-height: inherit !important; display: block;`. |
| **Incorrect Element Order on What-We-Do Tablet View** | Reversed layout rows (`wwd-reverse`) placed images before text, while normal rows placed images after all copy. | Used `display: contents;` on `.wwd-capability-copy` and explicit `order` properties (1: Title, 2: Image, 3: Description, 4: Bullets) at `≤1050px`. |
| **Text Container Bottleneck at 1024px / 768px** | `.wwd-capability-copy` was capped at `max-width: 440px` on tablet viewports while image below expanded to 100%. | Expanded `.wwd-capability-copy`, `h2`, `.wwd-lead`, and `ul` to `width: 100%; max-width: 100%;` at `≤1050px`. |
| **Hamburger Menu Icon Shifted Left on Homepage** | On `index.html`, when `.nav-links` was set to `display: none` on mobile, `.nav-wrap` had no `justify-content: space-between`, causing the button to sit next to the logo. | Added `margin-left: auto !important; z-index: 100 !important;` to `.menu-button` and `justify-content: space-between !important;` to `.nav-wrap` in `mobile-nav.css`. |

---

## 3. Responsive Breakpoint Matrix

```text
    ┌─────────────────────────────────────────────────────────────┐
    │  4K / Extra Large Desktop (≥1440px)                       │
    │  - Max container width: 1280px / 1440px (centered)          │
    │  - Full 70px/88px typography & multi-column grid layouts    │
    └──────────────────────────────┬──────────────────────────────┘
                                   │
    ┌──────────────────────────────▼──────────────────────────────┐
    │  Laptop / Standard Desktop (1024px – 1439px)                │
    │  - Hero title: clamp(48px, 5vw, 58px); nav link gap: 18px   │
    │  - 2-column grid gaps reduced (92px → 40px)                 │
    └──────────────────────────────┬──────────────────────────────┘
                                   │
    ┌──────────────────────────────▼──────────────────────────────┐
    │  Tablet / iPad Viewports (768px – 1023px)                   │
    │  - Hero title: clamp(40px, 5.5vw, 50px)                     │
    │  - Hamburger navigation menu activates at 960px             │
    │  - What-We-Do order: Title -> Image -> Description          │
    │  - Methodology section switches to vertical centered stack  │
    └──────────────────────────────┬──────────────────────────────┘
                                   │
    ┌──────────────────────────────▼──────────────────────────────┐
    │  Mobile & Phablet Viewports (≤600px / ≤425px)               │
    │  - Hero title: clamp(34px, 8vw, 42px) line-height: 1.15     │
    │  - All grids collapse to single-column flex/grid            │
    │  - Full-width touch buttons & mobile header height: 64px    │
    └─────────────────────────────────────────────────────────────┘
```

---

## 4. Directory & Site Architecture

```text
Prompt.next/
├── index.html                         # Homepage (Landing)
├── interaction.js                     # Mobile menu, sticky header, TOC, & keyboard navigation
├── Pages/
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
│   ├── main.css                       # Master CSS orchestrator (@imports base, layout, components)
│   ├── base/
│   │   ├── reset.css                  # Reset rules, WCAG focus-visible ring, .sr-only, .skip-link
│   │   └── variables.css              # Satoshi font import & design token definitions
│   ├── layout/
│   │   ├── container.css              # Container constraints
│   │   ├── header.css                 # Global desktop & sticky blurred header navigation
│   │   ├── footer.css                 # Global desktop & responsive footer
│   │   └── mobile-nav.css             # Mobile hamburger drawer navigation
│   ├── components/
│   │   ├── buttons.css                # Button design tokens & responsive padding
│   │   ├── badges.css                 # Tag badges & kickers
│   │   └── forms.css                  # Form controls & inputs
│   └── pages/                         # Page-specific stylesheets (about-us.css, landing.css, etc.)
├── assets/                            # Optimized SVGs, images, and logos
├── amplify/                           # AWS Amplify cloud backend configuration & schema
│   ├── auth/resource.ts               # AWS Amplify authentication resource config
│   ├── data/resource.ts               # AWS Amplify data & database resource schema
│   ├── backend.ts                     # AWS Amplify main backend orchestration definition
│   └── tsconfig.json                  # TypeScript compilation config for backend constructs
├── package.json                       # Project manifest, npm scripts, and dependency definitions
└── package-lock.json                  # Locked dependency tree manifest
```

---

## 5. Local Development & Serving

You can run the website locally using standard NPM scripts or built-in HTTP servers:

### Option A: Using NPM Development Server (Recommended)
```bash
# 1. Install project dependencies
npm install

# 2. Start local development server (serves at http://localhost:3000)
npm run dev

# Alternative start script
npm start
```

### Option B: Using Python 3 HTTP Server
```bash
python -m http.server 4173
```
Then navigate to `http://127.0.0.1:4173/`.

---

## 6. Package Configuration & Cloud Backend (AWS Amplify)

The repository integrates Node.js project manifest tools (`package.json`) and **AWS Amplify** Gen 2 backend cloud capabilities:

- **NPM Package Manifest (`package.json`)**:
  - `dev` / `start`: Launches local server (`npx serve . -p 3000`).
  - **Dependencies**: Includes `aws-amplify` (v6.22.0) for client-side cloud connectivity.
  - **DevDependencies**: Integrates `@aws-amplify/backend` (v1.25.1), `@aws-amplify/backend-cli` (v1.10.0), `aws-cdk-lib` (v2.268.0), `constructs`, `esbuild`, `tsx`, and `typescript` (v5.9.3) for full cloud resource compilation.
- **AWS Amplify Backend Architecture (`amplify/`)**:
  - `amplify/backend.ts`: Defines overall Amplify cloud backend stack.
  - `amplify/auth/resource.ts`: Configures user authentication services.
  - `amplify/data/resource.ts`: Configures cloud database & API schemas.

---

## 7. Release & QA Verification

- [x] **Package & Cloud Setup**: `package.json` manifests and AWS Amplify backend infrastructure configured.
- [x] **Font Uniformity**: All 15 HTML pages load Satoshi font.
- [x] **Sticky Blur Header**: `backdrop-filter: blur(16px)` active on scroll across all pages.
- [x] **Figma Alignment**: Heading & paragraph typography verified against Figma specs.
- [x] **Hero Impact**: Prominent 70px desktop, 50px tablet, 42px mobile hero title scaling.
- [x] **What-We-Do Section**: Title -> Image -> Description sequence enforced at `≤1050px`.
- [x] **WCAG 2.1 Compliance**: High-contrast focus rings, `.sr-only` utility, skip links, and `Escape` key menu close active.
- [x] **Zero Broken Links**: All internal navigation links, buttons, and extensionless routes resolve.

---

## License

© Prompt Next Group Pte. Ltd. All rights reserved.
