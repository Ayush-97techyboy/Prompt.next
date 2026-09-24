// Mobile Menu Toggle & Navigation Behavior
document.addEventListener('DOMContentLoaded', () => {
  // Event Delegation for Mobile Menu Button & Outside Clicks
  document.addEventListener('click', (e) => {
    const menuBtn = e.target.closest('.menu-button');
    const activeNavLinks = document.querySelector('.wwd-nav-links.nav-active, .nav-links.nav-active');

    // 1. Menu Button Clicked (or child span clicked)
    if (menuBtn) {
      e.preventDefault();
      e.stopPropagation();
      const headerEl = menuBtn.closest('.site-header, .wwd-header, header');
      const navLinks = headerEl ? headerEl.querySelector('.wwd-nav-links, .nav-links') : document.querySelector('.wwd-nav-links, .nav-links');
      if (navLinks) {
        const isExpanded = navLinks.classList.toggle('nav-active');
        menuBtn.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
        menuBtn.classList.toggle('menu-active', isExpanded);
      }
      return;
    }

    // 2. Clicked on a Navigation Link inside active drawer
    const navLinkClick = e.target.closest('.wwd-nav-links a, .nav-links a');
    if (navLinkClick && activeNavLinks) {
      activeNavLinks.classList.remove('nav-active');
      const allMenuBtns = document.querySelectorAll('.menu-button');
      allMenuBtns.forEach(btn => {
        btn.setAttribute('aria-expanded', 'false');
        btn.classList.remove('menu-active');
      });
      return;
    }

    // 3. Clicked outside active drawer menu
    if (activeNavLinks && !activeNavLinks.contains(e.target)) {
      activeNavLinks.classList.remove('nav-active');
      const allMenuBtns = document.querySelectorAll('.menu-button');
      allMenuBtns.forEach(btn => {
        btn.setAttribute('aria-expanded', 'false');
        btn.classList.remove('menu-active');
      });
    }
  });

  // Close mobile nav on Escape key (WCAG Keyboard Navigation)
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      const activeNavLinks = document.querySelector('.wwd-nav-links.nav-active, .nav-links.nav-active');
      if (activeNavLinks) {
        activeNavLinks.classList.remove('nav-active');
        const activeBtn = document.querySelector('.menu-button.menu-active') || document.querySelector('.menu-button');
        if (activeBtn) {
          activeBtn.setAttribute('aria-expanded', 'false');
          activeBtn.classList.remove('menu-active');
          activeBtn.focus();
        }
      }
    }
  });

  // Sticky header: pin to top only after scrolling past the hero edge
  const headers = document.querySelectorAll('.site-header, .wwd-header');
  function updateStickyHeader() {
    const stuck = window.scrollY > 90;
    headers.forEach(header => header.classList.toggle('is-stuck', stuck));
  }
  window.addEventListener('scroll', updateStickyHeader, { passive: true });
  updateStickyHeader();

  // Dynamic TOC active state management
  const tocLinks = document.querySelectorAll('.blog-toc-list a');
  const sections = document.querySelectorAll('.blog-content-section');

  // Function to update active TOC link based on scroll position
  function updateActiveToc() {
    let currentSection = '';

    sections.forEach(section => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.offsetHeight;
      if (scrollY >= sectionTop - 200) {
        currentSection = section.getAttribute('id');
      }
    });

    tocLinks.forEach(link => {
      link.classList.remove('active-toc');
      if (link.getAttribute('href') === `#${currentSection}`) {
        link.classList.add('active-toc');
      }
    });
  }

  // Update active state on scroll
  window.addEventListener('scroll', updateActiveToc);

  // Update active state on click
  tocLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      tocLinks.forEach(l => l.classList.remove('active-toc'));
      this.classList.add('active-toc');
    });
  });

  // Initial call to set active state
  updateActiveToc();
});


// Function for Methodology Section: Scroll-Based Active Step Activation
document.addEventListener("DOMContentLoaded", function () {
  const card = document.querySelector(".method-card");
  const steps = document.querySelectorAll(".method-step");
  if (!card) return;

  function updateMethodologyOnScroll() {
    const isMobile = window.innerWidth <= 800;

    if (isMobile && steps.length > 0) {
      // Mobile / Vertical layout: Find step closest to viewport center
      const viewportCenter = window.innerHeight * 0.45;
      let activeIdx = 1;
      let minDistance = Infinity;

      steps.forEach((step, index) => {
        const rect = step.getBoundingClientRect();
        const stepCenter = rect.top + rect.height / 2;
        const dist = Math.abs(stepCenter - viewportCenter);

        if (dist < minDistance && rect.top < window.innerHeight * 0.85 && rect.bottom > 0) {
          minDistance = dist;
          activeIdx = index + 1;
        }
      });

      steps.forEach((step, index) => {
        step.classList.toggle('is-active', (index + 1) <= activeIdx);
      });

      card.className = card.className.replace(/\bstep-\d+-active\b/g, '').trim();
      card.classList.add(`step-${activeIdx}-active`);
    } else {
      // Desktop / Tablet layout: Map scroll position cleanly as card travels across screen
      const rect = card.getBoundingClientRect();
      const cardTop = rect.top;
      const viewportHeight = window.innerHeight;

      // Start step 1 when card top is at 75% of viewport height (card comfortably in view)
      // End step 5 when card top reaches 15% of viewport height
      const startPos = viewportHeight * 0.75;
      const endPos = viewportHeight * 0.15;

      if (rect.top <= viewportHeight && rect.bottom >= 0) {
        if (cardTop > startPos) {
          // Card is just entering screen: lock to step 1 (1 of 5)
          card.className = card.className.replace(/\bstep-\d+-active\b/g, '').trim();
          card.classList.add('step-1-active');
        } else {
          let progress = (startPos - cardTop) / (startPos - endPos);
          progress = Math.max(0, Math.min(1, progress));

          let stepIdx = Math.floor(progress * 4.99) + 1;
          stepIdx = Math.max(1, Math.min(5, stepIdx));

          card.className = card.className.replace(/\bstep-\d+-active\b/g, '').trim();
          card.classList.add(`step-${stepIdx}-active`);
        }
      }
    }
  }

  window.addEventListener("scroll", updateMethodologyOnScroll, { passive: true });
  window.addEventListener("resize", updateMethodologyOnScroll, { passive: true });
  updateMethodologyOnScroll();
});

