<?php
/**
 * Template Name: Industries
 * @package PromptNext
 */

get_header(); ?>

<main id="top">
    <section class="industries-hero" aria-label="Same standard. Different starting point.">
      <img class="industries-hero-img" src="<?php echo get_template_directory_uri(); ?>/assets/industries-hero.png" alt="" />
      <div class="industries-hero-inner">
        <h1>Same standard. Different starting point.</h1>
        <p>Prompt Next works with organisations across the full size spectrum, startups, SMEs, mid-size businesses, and large enterprises. What changes is the shape of the engagement. What does not change is the standard we hold ourselves to.</p>
      </div>
    </section>

    <section class="industries-list" aria-label="Industries we serve">
      <div class="industries-grid">
        <article class="industries-card" id="banking">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/industries_pg_icons/bfsi.svg" alt="" />
          <h2>Banking, Financial Services &amp; Insurance</h2>
          <p>Core banking upgrades. AI that catches fraud and risk. Built to pass compliance.</p>
          <div class="industries-card-bottom"><a href="<?php echo esc_url(home_url('/bfsi/')); ?>">Explore BFSI <span>→</span></a></div>
        </article>
        <article class="industries-card" id="telecommunications">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/industries_pg_icons/telecommunications.svg" alt="" />
          <h2>Telecommunications</h2>
          <p>Network modernisation and customer platforms that scale without dropping a connection.</p>
          <div class="industries-card-bottom"><a href="<?php echo esc_url(home_url('/telecommunication/')); ?>">Explore Telecom <span>→</span></a></div>
        </article>
        <article class="industries-card" id="healthcare">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/industries_pg_icons/healthcare.svg" alt="" />
          <h2>Healthcare</h2>
          <p>Clinical systems and patient data platforms that keep working when it matters most.</p>
          <div class="industries-card-bottom"><a href="<?php echo esc_url(home_url('/healthcare/')); ?>">Explore Healthcare <span>→</span></a></div>
        </article>
        <article class="industries-card" id="government">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/industries_pg_icons/government_public_sector.svg" alt="" />
          <h2>Government and Public Sector</h2>
          <p>Digital infrastructure that makes public services easier to reach. AI adopted with the safeguards public trust requires.</p>
          <div class="industries-card-bottom"><a href="<?php echo esc_url(home_url('/government/')); ?>">Explore Government <span>→</span></a></div>
        </article>
        <article class="industries-card" id="manufacturing">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/industries_pg_icons/manufacturing.svg" alt="" />
          <h2>Manufacturing</h2>
          <p>Plant systems and data modernised without stopping the production line.</p>
          <div class="industries-card-bottom"><a href="<?php echo esc_url(home_url('/manufacturing/')); ?>">Explore Manufacturing <span>→</span></a></div>
        </article>
        <article class="industries-card" id="hospitality">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/industries_pg_icons/hospitality.svg" alt="" />
          <h2>Hospitality</h2>
          <p>Guest and operations systems that work together, not around each other.</p>
          <div class="industries-card-bottom"><a href="<?php echo esc_url(home_url('/hospitality/')); ?>">Explore Hospitality <span>→</span></a></div>
        </article>
      </div>
    </section>
  </main>

<?php get_footer(); ?>
