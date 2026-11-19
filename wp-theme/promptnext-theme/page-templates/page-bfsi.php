<?php
/**
 * Template Name: BFSI
 * @package PromptNext
 */

get_header(); ?>

<main id="top">

    <!-- ══════ HERO ══════ -->
    <section class="bfsi-hero">
      <div class="bfsi-hero-inner">
        <p class="bfsi-breadcrumb"><a href="<?php echo esc_url(home_url('/industries/')); ?>">Industries</a> <span class="bfsi-sep">&gt;&gt;</span> <span
            class="bfsi-crumb-active">Banking, Financial Services &amp; Insurance</span></p>
        <div class="bfsi-hero-content">
          <h1>Core banking doesn't pause for upgrades. Compliance doesn't pause for transformation. We execute in both, concurrently.</h1>
        </div>
      </div>
    </section>

    <!-- ══════ INDUSTRY CONTEXT ══════ -->
    <section class="bfsi-context">
      <div class="bfsi-context-wrap">
        <div class="bfsi-context-copy">
          <h2>Industry Context</h2>
          <p>Few industries run as many overlapping technology agendas at once: core system modernisation, real-time payments, policy and claims platforms, AI in risk and underwriting. All of it under regulatory supervision.</p>
          <p>The decisions are the easy part. Getting systems operational while transactions keep processing and claims keep moving is where most programmes succeed or fail.</p>
        </div>
        <div class="bfsi-context-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/bfsi-context.png" alt="City street between skyscrapers" />
        </div>
      </div>
    </section>

    <!-- ══════ THREE PILLARS ══════ -->
    <section class="bfsi-pillars">
      <div class="bfsi-pillars-wrap">
        <article class="bfsi-card">
          <span class="bfsi-card-num">01</span>
          <h3>Regulatory Fluency Beyond Awareness</h3>
          <p>First, regulatory fluency, not just regulatory awareness. Knowing the rules matters less than knowing what a regulator actually expects to see, the documentation, the audit trail, the testing record. That only comes from having done it before.</p>
        </article>
        <article class="bfsi-card">
          <span class="bfsi-card-num">02</span>
          <h3>Operational Continuity as a Constraint</h3>
          <p>Second, operational continuity built in, not bolted on. A disruption to live banking or insurance
            operations is not a delay. It is an incident. Every phase of the work has to be designed around the system
            staying up.</p>
        </article>
        <article class="bfsi-card">
          <span class="bfsi-card-num">03</span>
          <h3>Single Point Of Accountability</h3>
          <p>Third, one party accountable for the whole picture. A typical BFSI programme involves the institution, a platform vendor, several integration partners, a cloud provider, and a compliance advisor. When no one holds the whole thing together, that is usually where it breaks.</p>
        </article>
      </div>
    </section>

    <!-- ══════ IN PRACTICE (CARD) ══════ -->
    <section class="bfsi-practice">
      <div class="bfsi-practice-wrap">
        <div class="bfsi-practice-card">
          <h2>What this looks like in practice</h2>
          <p><span class="bfsi-practice-l1">This pattern is drawn from how banking transformation programmes unfold across the industry, not from a named</span> <span class="bfsi-practice-l2">Prompt Next engagement.</span></p>
        </div>
      </div>
    </section>

    <!-- ══════ PROCUREMENT / STORY ══════ -->
    <section class="bfsi-delivery">
      <div class="bfsi-delivery-wrap">
        <h2 class="bfsi-delivery-title">When Scale Outgrows the Delivery Model</h2>
        <div class="bfsi-delivery-grid">
          <p class="bfsi-delivery-col">A large multinational bank initiated a major banking transformation programme and awarded the engagement to a leading technology vendor. As programme complexity became apparent, delivery was distributed across a chain of subcontractors and resource augmentation partners. Each party operated within its defined scope.</p>
          <p class="bfsi-delivery-col">Despite significant investment and multiple testing cycles, the initial phase missed its delivery window. Defects accumulated. Timelines were revised repeatedly. Costs compounded. The technology itself was capable. The delivery model had no one responsible for the distance between contract and a working system.</p>
        </div>
      </div>
    </section>

    <!-- ══════ CTA ══════ -->
    <section class="bfsi-cta">
      <div class="bfsi-cta-wrap">
        <h2>How Prompt Next works in BFSI</h2>
        <p><span class="bfsi-cta-text-l1">We coordinate every party involved in your BFSI programme, from the first planning conversation to final handover. Our specialist </span> <span class="bfsi-cta-text-l2">network brings verified BFSI experience across Asia-Pacific.</span></p>
        <a class="bfsi-cta-btn" href="<?php echo esc_url(home_url('/contact-us/')); ?>">START A CONVERSATION ABOUT YOUR BFSI PROGRAMME</a>
      </div>
    </section>

  </main>

<?php get_footer(); ?>
