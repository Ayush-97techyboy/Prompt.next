document.addEventListener('DOMContentLoaded', () => {
  const menuButtons = document.querySelectorAll('.menu-button');
  
  menuButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      const navLinks = document.querySelector('.wwd-nav-links, .nav-links');
      if (navLinks) {
        navLinks.classList.toggle('nav-active');
        const isExpanded = navLinks.classList.contains('nav-active');
        btn.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
      }
    });
  });

  // Close mobile nav when clicking outside
  document.addEventListener('click', (e) => {
    const navLinks = document.querySelector('.wwd-nav-links, .nav-links');
    const menuBtn = document.querySelector('.menu-button');
    if (navLinks && navLinks.classList.contains('nav-active')) {
      if (!navLinks.contains(e.target) && (!menuBtn || !menuBtn.contains(e.target))) {
        navLinks.classList.remove('nav-active');
        if (menuBtn) menuBtn.setAttribute('aria-expanded', 'false');
      }
    }
  });

  // Close mobile nav when a link is clicked
  const links = document.querySelectorAll('.wwd-nav-links a, .nav-links a');
  links.forEach(link => {
    link.addEventListener('click', () => {
      const navLinks = document.querySelector('.wwd-nav-links, .nav-links');
      const menuBtn = document.querySelector('.menu-button');
      if (navLinks) {
        navLinks.classList.remove('nav-active');
        if (menuBtn) menuBtn.setAttribute('aria-expanded', 'false');
      }
    });
  });

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
    link.addEventListener('click', function(e) {
      tocLinks.forEach(l => l.classList.remove('active-toc'));
      this.classList.add('active-toc');
    });
  });

  // Initial call to set active state
  updateActiveToc();
});
