<?php
/**
 * Template Name: Hospitality
 * @package PromptNext
 */

get_header(); ?>

<main id="top">

    <!-- ══════ HERO ══════ -->
    <section class="hosp-hero" aria-label="Guest experience is the product. The technology behind it is fragmented, complex, and mostly invisible. We keep it that way">
      <div class="hosp-hero-inner">
        <p class="hosp-breadcrumb"><a href="<?php echo esc_url(home_url('/industries/')); ?>">Industries</a> <span class="hosp-sep">&gt;&gt;</span> <span class="hosp-crumb-active">Hospitality</span></p>
        <div class="hosp-hero-content">
          <h1>Guest experience is the product. The technology behind it is fragmented, complex, and mostly invisible. We keep it that way</h1>
        </div>
      </div>
    </section>

    <!-- ══════ INDUSTRY CONTEXT ══════ -->
    <section class="hosp-context">
      <div class="hosp-context-wrap">
        <div class="hosp-context-copy">
          <h2>Industry Context</h2>
          <p>Hospitality groups today operate across multiple properties, often with different systems inherited through growth and acquisition. Each property may run its own combination of booking, property management, guest experience, and operational tools. The technology was never standardised. The guest experience still has to be.</p>
        </div>
        <div class="hosp-context-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/Background+Border+Shadow (4).png" alt="Modern hospitality architectural space" />
        </div>
      </div>
    </section>

    <!-- ══════ THREE PILLARS ══════ -->
    <section class="hosp-pillars">
      <div class="hosp-pillars-wrap">
        <article class="hosp-card">
          <span class="hosp-card-num">01</span>
          <h3>Estate Integration</h3>
          <p>A typical hospitality operation runs a property management system, a booking engine, a guest experience platform, and operational tools from several vendors. Execution has to account for all of them working together, not each in isolation.</p>
        </article>
        <article class="hosp-card">
          <span class="hosp-card-num">02</span>
          <h3>Continuous Operations</h3>
          <p>A hotel does not close for a system migration. Deployments have to be designed around continuous guest-facing operations, since there is no quiet period to schedule around.</p>
        </article>
        <article class="hosp-card">
          <span class="hosp-card-num">03</span>
          <h3>Seamless Experience</h3>
          <p>Whatever changes behind the scenes, the guest experience should never reflect it. Integration complexity stays invisible to the people it ultimately serves.</p>
        </article>
      </div>
    </section>

    <!-- ══════ IN PRACTICE (CARD) ══════ -->
    <section class="hosp-practice">
      <div class="hosp-practice-wrap">
        <div class="hosp-practice-card">
          <h2>What this looks like in practice</h2>
          <p><span class="hosp-practice-l1">This pattern is drawn from how hospitality technology programmes unfold across the industry, not from a named</span> <span class="hosp-practice-l2">Prompt Next engagement.</span></p>
        </div>
      </div>
    </section>

    <!-- ══════ WHEN EVERY PROPERTY RUNS ITS OWN VERSION ══════ -->
    <section class="hosp-narrative">
      <div class="hosp-narrative-wrap">
        <h2 class="hosp-narrative-title">When Every Property Runs Its Own Version</h2>
        <div class="hosp-narrative-grid">
          <p class="hosp-narrative-col">A hospitality group with multiple properties across the region had grown through a mix of new builds and acquisitions. Each property had inherited or chosen its own combination of property management, booking, and guest experience systems. A group-wide modernisation programme to bring everything onto one standard kept stalling, because what looked like one programme was actually as many starting points as there were properties.</p>
          <p class="hosp-narrative-col">This is a common starting point for hospitality groups, not an unusual one. The execution challenge is not picking the right target platform. It is sequencing a path from several different starting points to one common standard, without disrupting operations at any single property along the way.</p>
        </div>
      </div>
    </section>

    <!-- ══════ CTA ══════ -->
    <section class="hosp-cta">
      <div class="hosp-cta-wrap">
        <h2>How Prompt Next works in Hospitality</h2>
        <p><span class="hosp-cta-text-l1">We coordinate every party involved in your hospitality programme, from the first planning conversation to final handover. Integrating a fragmented </span> <span class="hosp-cta-text-l2">technology estate, keeping operations running across every property, and making sure the guest experience stays seamless throughout.</span></p>
        <a class="hosp-cta-btn" href="<?php echo esc_url(home_url('/contact-us/')); ?>">START A CONVERSATION ABOUT YOUR HOSPITALITY PROGRAMME</a>
      </div>
    </section>

  </main>

<?php get_footer(); ?>
