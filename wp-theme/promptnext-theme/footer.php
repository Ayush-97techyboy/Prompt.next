  <?php if (is_front_page()) : ?>
  <!-- Homepage Footer -->
  <footer class="site-footer">
    <div class="footer-grid">
      <div><a class="brand" href="<?php echo esc_url(home_url('/')); ?>"> <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/Promt_Next_Logo.svg" alt="Prompt Next" class="nav-logo" /></a></div>
      <div><b>Company</b><a href="<?php echo esc_url(home_url('/what-we-do/')); ?>">What we do</a><a href="<?php echo esc_url(home_url('/how-we-work/')); ?>">How we work</a><a href="<?php echo esc_url(home_url('/partners/')); ?>">Partners</a><a href="<?php echo esc_url(home_url('/about-us/')); ?>">About Us</a><a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact Us</a></div>
      <div><b>Services</b><a href="<?php echo esc_url(home_url('/what-we-do/#technology-execution')); ?>">Technology Execution</a><a href="<?php echo esc_url(home_url('/what-we-do/#ai-production-deployment')); ?>">AI Deployment</a><a href="<?php echo esc_url(home_url('/what-we-do/#system-integration')); ?>">System Integration</a><a href="<?php echo esc_url(home_url('/what-we-do/#capability-upskilling')); ?>">Capability Building</a></div>
      <div><b>Industries</b><a href="<?php echo esc_url(home_url('/bfsi/')); ?>">Banking, Financial Services &amp; Insurance</a><a href="<?php echo esc_url(home_url('/healthcare/')); ?>">Healthcare</a><a href="<?php echo esc_url(home_url('/telecommunication/')); ?>">Telecommunications</a><a href="<?php echo esc_url(home_url('/government/')); ?>">Government and Public Sector</a><a href="<?php echo esc_url(home_url('/hospitality/')); ?>">Hospitality</a><a href="<?php echo esc_url(home_url('/manufacturing/')); ?>">Manufacturing</a></div>
      <div><b>Resources</b><a href="<?php echo esc_url(home_url('/insights/')); ?>">Insights</a></div>
    </div>
    <div class="footer-bottom"><span>© Prompt Next Group Pte. Ltd</span><span><a href="#top">Privacy Policy</a><a href="#top">Terms of Service</a><a href="#top">Security</a></span></div>
  </footer>
  <?php else : ?>
  <!-- Subpage Footer -->
  <footer class="wwd-footer">
    <div class="wwd-footer-grid">
      <div><a class="wwd-brand" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/Promt_Next_Logo.svg" alt="Prompt Next" class="nav-logo" /></a></div>
      <div><b>Company</b><a href="<?php echo esc_url(home_url('/what-we-do/')); ?>">What we do</a><a href="<?php echo esc_url(home_url('/how-we-work/')); ?>">How we work</a><a href="<?php echo esc_url(home_url('/partners/')); ?>">Partners</a><a href="<?php echo esc_url(home_url('/about-us/')); ?>">About Us</a><a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact Us</a></div>
      <div><b>Services</b><a href="<?php echo esc_url(home_url('/what-we-do/#technology-execution')); ?>">Technology Execution</a><a href="<?php echo esc_url(home_url('/what-we-do/#ai-production-deployment')); ?>">AI Deployment</a><a href="<?php echo esc_url(home_url('/what-we-do/#system-integration')); ?>">System Integration</a><a href="<?php echo esc_url(home_url('/what-we-do/#capability-upskilling')); ?>">Capability Building</a></div>
      <div><b>Industries</b><a href="<?php echo esc_url(home_url('/bfsi/')); ?>">Banking, Financial Services &amp; Insurance</a><a href="<?php echo esc_url(home_url('/healthcare/')); ?>">Healthcare</a><a href="<?php echo esc_url(home_url('/telecommunication/')); ?>">Telecommunications</a><a href="<?php echo esc_url(home_url('/government/')); ?>">Government and Public Sector</a><a href="<?php echo esc_url(home_url('/hospitality/')); ?>">Hospitality</a><a href="<?php echo esc_url(home_url('/manufacturing/')); ?>">Manufacturing</a></div>
      <div><b>Resources</b><a href="<?php echo esc_url(home_url('/insights/')); ?>">Insights</a></div>
    </div>
    <div class="wwd-footer-bottom"><span>© Prompt Next Group Pte. Ltd</span><span><a href="#top">Privacy Policy</a><a href="#top">Terms of Service</a><a href="#top">Security</a></span></div>
  </footer>
  <?php endif; ?>

  <?php wp_footer(); ?>
</body>
</html>
