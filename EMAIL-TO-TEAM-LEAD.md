# Email draft to AMey

**Subject:** Prompt Next website update

Hi AMey,

As discussed, here is a brief pointwise update on the Prompt Next website work completed this week:

- Work split:
  - Ajay set up the initial repository and website baseline.
  - He is currently working on converting the Methodology section on the home page into an animated interaction.
  - I focused on the broader implementation and integration across the site.

- Key work completed by me:
  - Page structure and site-wide layout setup
  - Modular CSS implementation
  - Responsive layout corrections
  - Navigation and footer updates
  - CTA links and page linking improvements
  - Hero sections and tile alignment
  - Asset cleanup and path standardization
  - GitHub Pages routing setup
  - Favicon and social sharing metadata updates

- Current status:
  - Most of the main pages and responsive corrections are now in place.
  - Pages are organized under extensionless routes such as `Pages/home/`, `Pages/industries/`, and `Pages/contact-us/`.
  - Footer links were updated so the Services links open the relevant sections on What We Do, and the Industries links open their dedicated industry pages.

- Remaining item to finalize:
  - The Methodology animation still needs final review.
  - In the latest capture, some labels overlap and the step text appears more than once.
  - Ajay and I need to fix this and test it across desktop, tablet, and mobile widths before sign-off.

- Main implementation challenges:
  - Inconsistent old CSS and asset paths
  - Leftover merge-conflict state
  - Hero images that already contained text
  - Different scaling behavior across monitor sizes
  - Limitations of extensionless routing on GitHub Pages

- How these were addressed:
  - Reorganized the CSS structure
  - Standardized asset and path references
  - Used directory-based `index.html` routes
  - Reviewed pages through a local static server for validation

- Supporting documentation prepared:
  - `README.md` — technical project handoff and contribution overview
  - `TEAM-LEAD-IMPLEMENTATION-REPORT.pdf` — summary of work, blockers, and remaining actions

- Suggested next steps:
  1. Ajay completes the Methodology animation and fixes overlapping labels.
  2. We run final responsive and navigation checks together.
  3. The site is deployed through GitHub Pages.
  4. Social link previews are refreshed and checked after deployment.

Please let me know if you would like any part of the work broken down further by page or by contributor.

Regards,  
Ayush
