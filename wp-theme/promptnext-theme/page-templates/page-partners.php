<?php
/**
 * Template Name: Partners
 * @package PromptNext
 */

get_header(); ?>

<main id="top">
    <!-- Hero Section -->
    <section class="partners-hero" aria-label="Partnership Network">
      <div class="partners-hero-inner">
        <h1>Prompt Next partners with leading technology<br />specialists to deliver the outcomes our clients mandate.</h1>
      </div>
    </section>

    <!-- Five Partner Categories Section -->
    <section class="partners-categories-section" aria-label="Partner Categories">
      <div class="container">
        <h2 class="partners-section-title">Five Partner Categories</h2>
        
        <div class="partners-categories-grid">
          <!-- Card 1: Cloud and Infrastructure -->
          <article class="partners-cat-card">
            <div class="partners-cat-icon">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/partners_pg_icons/cloud_infrastructure.svg" alt="Cloud and Infrastructure" />
            </div>
            <h3>Cloud and Infrastructure</h3>
            <p>Partners with deep experience deploying AWS, Azure, and GCP into regulated environments, where compliance shapes the architecture from day one, not after the fact.</p>
          </article>

          <!-- Card 2: Enterprise Software -->
          <article class="partners-cat-card">
            <div class="partners-cat-icon">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/partners_pg_icons/enterprise_software.svg" alt="Enterprise Software" />
            </div>
            <h3>Enterprise Software</h3>
            <p>Certified implementation partners for core banking, insurance, and enterprise platforms, plus the integration specialists who connect them to what you already run.</p>
          </article>

          <!-- Card 3: Data and Integration -->
          <article class="partners-cat-card">
            <div class="partners-cat-icon">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/partners_pg_icons/data_integration.svg" alt="Data and Integration" />
            </div>
            <h3>Data and Integration</h3>
            <p>Engineers who build the API and middleware layer that holds up under production load, not just in a demo environment.</p>
          </article>

          <!-- Card 4: Regulatory and Compliance -->
          <article class="partners-cat-card">
            <div class="partners-cat-icon">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/partners_pg_icons/regulatory_compliance.svg" alt="Regulatory and Compliance" />
            </div>
            <h3>Regulatory and Compliance</h3>
            <p>Advisors with direct experience across Asia-Pacific's regulatory frameworks, brought in when a programme's compliance requirements go beyond general best practice.</p>
          </article>

          <!-- Card 5: AI and Automation -->
          <article class="partners-cat-card">
            <div class="partners-cat-icon">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/partners_pg_icons/ai_automation.svg" alt="AI and Automation" />
            </div>
            <h3>AI and Automation</h3>
            <p>Partners focused on production AI, not proof-of-concept. Deploying models that hold up to audit, not a pilot that impressed a steering committee.</p>
          </article>
        </div>

        <!-- Partner Brand Cards -->
        <div class="partners-logo-grid" aria-label="Technology Partners">
          <div class="partners-logo-card">
            <span class="partner-brand-text">Google</span>
          </div>
          <div class="partners-logo-card">
            <span class="partner-brand-text">Google</span>
          </div>
          <div class="partners-logo-card">
            <span class="partner-brand-text">Google</span>
          </div>
          <div class="partners-logo-card">
            <span class="partner-brand-text">Google</span>
          </div>
        </div>

        <!-- How Partners Are Vetted Section -->
        <div class="partners-vetted-card">
          <div class="partners-vetted-copy">
            <span class="partners-kicker">HOW PARTNERS ARE VETTED</span>
            <h2>A network is only as good as what stands behind it.</h2>
            <p>We don't add a partner because they're available. Every partner in the network has documented experience delivering your type of work, in your type of environment, before. We verify that directly. And once a partner is in a programme, accountability for the outcome stays with Prompt Next, with shared responsibility agreed on day one.</p>
          </div>
          <div class="partners-vetted-visual">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partners-vetted.png" alt="Collaborative technical review session" />
          </div>
        </div>

        <!-- Become a Partner Callout Card -->
        <div class="partners-join-card">
          <div class="partners-pill-badge">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/partners_pg_icons/become_partner.svg" alt="Handshake" />
            <span>Become a Partner</span>
          </div>
          <h2>If you’ve done this work, we’d like to talk.</h2>
          <p>We are selectively building this network. If your organisation has documented <br> implementation experience in complex industries across Asia-Pacific, we want to hear from you</p>
          <a class="partners-apply-btn" href="<?php echo esc_url(home_url('/contact-us/')); ?>">APPLY TO JOIN THE NETWORK</a>
        </div>
      </div>
    </section>

    <!-- Have a Programme Coordination CTA -->
    <section class="partners-cta-section" aria-label="Coordination call to action">
      <div class="container narrow">
        <h2>Have a programme that needs this kind of<br />coordination?</h2>
        <a class="hww-strategy-button" href="<?php echo esc_url(home_url('/contact-us/')); ?>">START A CONVERSATION</a>
      </div>
    </section>
  </main>

<?php get_footer(); ?>
