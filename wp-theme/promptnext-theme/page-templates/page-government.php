<?php
/**
 * Template Name: Government
 * @package PromptNext
 */

get_header(); ?>

<main id="top">

    <!-- ══════ HERO ══════ -->
    <section class="gov-hero"
      aria-label="Digital public services that work for every citizen. Delivered within the constraints that only government programmes carry.">
      <div class="gov-hero-inner">
        <p class="gov-breadcrumb"><a href="<?php echo esc_url(home_url('/industries/')); ?>">Industries</a> <span class="gov-sep">&gt;&gt;</span> <span
            class="gov-crumb-active">Government and Public Sector</span></p>
        <div class="gov-hero-content">
          <h1>Digital public services that work for every citizen. Delivered within the constraints that only government programmes carry.</h1>
        </div>
      </div>
    </section>

    <!-- ══════ INDUSTRY CONTEXT ══════ -->
    <section class="gov-context">
      <div class="gov-context-wrap">
        <div class="gov-context-copy">
          <h2>Industry Context</h2>
          <p>Government technology programmes operate under a level of public scrutiny that private sector programmes do not.Decisions about systems, data, and AI are subject to regulatory oversight, public accountability frameworks, and freedom of information requirements that change how every phase of execution has to be designed. Getting it right the first time is not just a commercial imperative. It is a public one.</p>
        </div>
        <div class="gov-context-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/Background+Border+Shadow (3).png" alt="Glass government building" />
        </div>
      </div>
    </section>

    <!-- ══════ THREE PILLARS ══════ -->
    <section class="gov-pillars">
      <div class="gov-pillars-wrap">
        <article class="gov-card">
          <span class="gov-card-num">01</span>
          <h3>Public Accountability</h3>
          <p>Public accountability built into the design. A public sector system is held to a different standard of transparency than a private one. That scrutiny has to be designed in from the start, not added afterward.</p>
        </article>
        <article class="gov-card">
          <span class="gov-card-num">02</span>
          <h3>Service Continuity</h3>
          <p>Citizen-facing systems cannot go dark. Deployments and migrations have to be planned around uninterrupted public service availability.</p>
        </article>
        <article class="gov-card">
          <span class="gov-card-num">03</span>
          <h3>Responsible AI</h3>
          <p>Where AI enters a government system, the safeguards around it, transparency, oversight, explainability, are as much a part of the execution as the AI itself.</p>
        </article>
      </div>
    </section>

    <!-- ══════ IN PRACTICE (CARD) ══════ -->
    <section class="gov-practice">
      <div class="gov-practice-wrap">
        <div class="gov-practice-card">
          <h2>What this looks like in practice</h2>
          <p><span class="gov-practice-l1">This pattern is drawn from how public sector technology programmes unfold across the industry, not from a named</span><span class="gov-practice-l2">Prompt Next engagement.</span></p>
        </div>
      </div>
    </section>

    <!-- ══════ PROCUREMENT ══════ -->
    <section class="gov-procurement">
      <div class="gov-procurement-wrap">
        <h2 class="gov-procurement-title">When Technology Moves Faster Than Procurement</h2>
        <div class="gov-procurement-grid">
          <p class="gov-procurement-col">A public sector agency ran a multi-year procurement process for a citizen-facing digital service. By the time the contract was signed and execution began, parts of the original technical specification were already dated, the underlying platforms had moved on, and citizen expectations, shaped by consumer apps, had shifted again.</p>
          <p class="gov-procurement-col">This is a structural feature of public sector technology cycles, not a planning failure. Procurement timelines that protect fairness and transparency often run longer than private sector cycles. The partner that succeeds is the one who can absorb a changed starting point without treating it as a crisis, or as grounds to renegotiate the entire scope.</p>
        </div>
      </div>
    </section>

    <!-- ══════ CTA ══════ -->
    <section class="gov-cta">
      <div class="gov-cta-wrap">
        <h2><span class="gov-cta-heading-l1">How Prompt Next works in Government </span><span class="gov-cta-heading-l2">and Public Sector</span></h2>
        <p><span class="gov-cta-text-l1">We coordinate every party involved in your public sector programme, from the first planning conversation to final handover. Public scrutiny, service </span><span class="gov-cta-text-l2">continuity, and responsible AI are built into how we work from day one, not treated as requirements to satisfy at the end.</span></p>
        <a class="gov-cta-btn" href="<?php echo esc_url(home_url('/contact-us/')); ?>">START A CONVERSATION ABOUT YOUR PUBLIC SECTOR PROGRAMME</a>
      </div>
    </section>

  </main>

<?php get_footer(); ?>
