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

  // Dynamic TOC active state management (flicker-free click & smooth scrollspy)
  const tocLinks = document.querySelectorAll('.blog-toc-list a');
  const sections = document.querySelectorAll('.blog-content-section');
  let isClickScrolling = false;
  let scrollLockTimer = null;

  // Function to update active TOC link based on scroll position
  function updateActiveToc() {
    if (isClickScrolling) return; // Prevent scrollspy flickering during click-initiated scroll
    if (!sections.length || !tocLinks.length) return;

    let currentSection = '';
    const scrollPosition = window.scrollY;
    const headerOffset = 130;

    // If near the bottom of page, activate the last section
    if ((window.innerHeight + scrollPosition) >= (document.documentElement.scrollHeight - 60)) {
      currentSection = sections[sections.length - 1].getAttribute('id');
    } else {
      sections.forEach(section => {
        const top = section.getBoundingClientRect().top + scrollPosition;
        if (scrollPosition >= top - headerOffset) {
          currentSection = section.getAttribute('id');
        }
      });
    }

    if (!currentSection && sections.length > 0) {
      currentSection = sections[0].getAttribute('id');
    }

    tocLinks.forEach(link => {
      const isMatch = link.getAttribute('href') === `#${currentSection}`;
      link.classList.toggle('active-toc', isMatch);
    });
  }

  // Update active state on scroll (passive for high performance)
  window.addEventListener('scroll', updateActiveToc, { passive: true });

  // Update active state on click with smooth scroll & scroll lock to prevent intermediate flickering
  tocLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      const targetId = this.getAttribute('href');
      if (!targetId || !targetId.startsWith('#')) return;

      const targetSection = document.querySelector(targetId);
      if (!targetSection) return;

      e.preventDefault();

      // 1. Immediately lock active state to the clicked item
      tocLinks.forEach(l => l.classList.remove('active-toc'));
      this.classList.add('active-toc');

      // 2. Lock scrollspy updates while animating to destination
      isClickScrolling = true;
      clearTimeout(scrollLockTimer);

      // 3. Smooth scroll with sticky header compensation
      const headerOffset = 110;
      const targetTop = targetSection.getBoundingClientRect().top + window.scrollY - headerOffset;

      window.scrollTo({
        top: Math.max(0, targetTop),
        behavior: 'smooth'
      });

      if (history.pushState) {
        history.pushState(null, null, targetId);
      }

      // 4. Release lock once smooth scrolling completes
      const unlock = () => {
        isClickScrolling = false;
        window.removeEventListener('scrollend', unlock);
      };

      if ('onscrollend' in window) {
        window.addEventListener('scrollend', unlock, { once: true });
      }

      // Fallback timer to guarantee lock is released
      scrollLockTimer = setTimeout(() => {
        isClickScrolling = false;
      }, 700);
    });
  });

  // Initial call to set active state
  updateActiveToc();
});


// Function for Methodology Section: Scroll-Based Active Step Activation (with Reverse Deactivation)
document.addEventListener("DOMContentLoaded", function () {
  const card = document.querySelector(".method-card");
  const steps = document.querySelectorAll(".method-step");
  if (!card) return;

  function updateMethodologyOnScroll() {
    const isMobile = window.innerWidth <= 800;

    if (isMobile && steps.length > 0) {
      // Mobile / Vertical layout: Each step activates as its focal point enters view
      const cardRect = card.getBoundingClientRect();
      const focalThreshold = window.innerHeight * 0.60;
      let activeIdx = 0;

      if (cardRect.top > window.innerHeight) {
        // Entire card is below the viewport / user scrolled up past section
        activeIdx = 0;
      } else if (cardRect.bottom < 0) {
        // Entire card is above the viewport (scrolled past downward)
        activeIdx = steps.length;
      } else {
        // In viewport: step is active if its top has crossed into the focal threshold
        steps.forEach((step, index) => {
          const rect = step.getBoundingClientRect();
          if (rect.top <= focalThreshold) {
            activeIdx = Math.max(activeIdx, index + 1);
          }
        });
      }

      // Toggle individual step active states (all previous steps stay active up to activeIdx)
      steps.forEach((step, index) => {
        step.classList.toggle('is-active', activeIdx > 0 && (index + 1) <= activeIdx);
      });

      // Update card level class for pill and overall progression
      card.className = card.className.replace(/\bstep-\d+-active\b/g, '').trim();
      if (activeIdx > 0) {
        card.classList.add(`step-${activeIdx}-active`);
      }
    } else {
      // Desktop / Tablet layout: Map scroll position cleanly as card travels across screen
      const rect = card.getBoundingClientRect();
      const cardTop = rect.top;
      const viewportHeight = window.innerHeight;

      // Start step 1 when card top reaches 75% of viewport height (card entering viewport)
      // End step 5 when card top reaches 15% of viewport height
      const startPos = viewportHeight * 0.75;
      const endPos = viewportHeight * 0.15;

      if (rect.top > viewportHeight || cardTop > startPos) {
        // Card is below focal activation point / user scrolled up in reverse: ALL nodes inactive
        card.className = card.className.replace(/\bstep-\d+-active\b/g, '').trim();
      } else if (rect.bottom < 0) {
        // Scrolled past the section completely: keep all active
        card.className = card.className.replace(/\bstep-\d+-active\b/g, '').trim();
        card.classList.add('step-5-active');
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

  window.addEventListener("scroll", updateMethodologyOnScroll, { passive: true });
  window.addEventListener("resize", updateMethodologyOnScroll, { passive: true });
  updateMethodologyOnScroll();
});

