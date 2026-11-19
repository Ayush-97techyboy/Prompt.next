<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/Promt_Next_Logo.svg" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <a href="#main-content" class="skip-link"><?php esc_html_e('Skip to main content', 'promptnext'); ?></a>

  <?php if (is_front_page()) : ?>
  <!-- Homepage Site Header -->
  <header class="site-header">
    <div class="container nav-wrap">
      <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Prompt Next home', 'promptnext'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/Promt_Next_Logo.svg" alt="Prompt Next" class="nav-logo" />
      </a>
      <nav class="nav-links" aria-label="<?php esc_attr_e('Primary navigation', 'promptnext'); ?>">
        <a href="<?php echo esc_url(home_url('/what-we-do/')); ?>">What We Do</a>
        <a href="<?php echo esc_url(home_url('/industries/')); ?>">Industries</a>
        <a href="<?php echo esc_url(home_url('/how-we-work/')); ?>">How We Work</a>
        <a href="<?php echo esc_url(home_url('/about-us/')); ?>">About Us</a>
        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact Us</a>
      </nav>
      <a class="button button-small" href="<?php echo esc_url(home_url('/contact-us/')); ?>">START A CONVERSATION</a>
      <button class="menu-button" aria-label="<?php esc_attr_e('Open menu', 'promptnext'); ?>"><span></span><span></span><span></span></button>
    </div>
  </header>
  <?php else : ?>
  <!-- Subpage WWD Header -->
  <header class="wwd-header">
    <div class="wwd-nav">
      <a class="wwd-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Prompt Next home', 'promptnext'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/Promt_Next_Logo.svg" alt="Prompt Next" class="nav-logo" />
      </a>
      <nav class="wwd-nav-links" aria-label="<?php esc_attr_e('Primary navigation', 'promptnext'); ?>">
        <a href="<?php echo esc_url(home_url('/what-we-do/')); ?>" <?php echo (is_page('what-we-do') || is_page_template('page-templates/page-what-we-do.php')) ? 'aria-current="page"' : ''; ?>>What We Do</a>
        <a href="<?php echo esc_url(home_url('/industries/')); ?>" <?php echo (is_page('industries') || is_page_template('page-templates/page-industries.php')) ? 'aria-current="page"' : ''; ?>>Industries</a>
        <a href="<?php echo esc_url(home_url('/how-we-work/')); ?>" <?php echo (is_page('how-we-work') || is_page_template('page-templates/page-how-we-work.php')) ? 'aria-current="page"' : ''; ?>>How We Work</a>
        <a href="<?php echo esc_url(home_url('/about-us/')); ?>" <?php echo (is_page('about-us') || is_page_template('page-templates/page-about-us.php')) ? 'aria-current="page"' : ''; ?>>About Us</a>
        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" <?php echo (is_page('contact-us') || is_page_template('page-templates/page-contact-us.php')) ? 'aria-current="page"' : ''; ?>>Contact Us</a>
      </nav>
      <a class="wwd-top-button" href="<?php echo esc_url(home_url('/contact-us/')); ?>">START A CONVERSATION</a>
      <button class="menu-button" aria-label="<?php esc_attr_e('Open menu', 'promptnext'); ?>"><span></span><span></span><span></span></button>
    </div>
  </header>
  <?php endif; ?>
