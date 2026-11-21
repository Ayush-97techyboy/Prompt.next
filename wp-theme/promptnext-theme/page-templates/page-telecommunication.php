<?php
/**
 * Template Name: Telecommunications
 * @package PromptNext
 */

get_header(); ?>

<main id="top">

    <!-- ══════ HERO ══════ -->
    <section class="telecom-hero">
      <div class="telecom-hero-inner">
        <p class="telecom-breadcrumb"><a href="<?php echo esc_url(home_url('/industries/')); ?>">Industries</a> <span class="telecom-sep">&gt;&gt;</span> <span class="telecom-crumb-active">Telecommunications</span></p>
        <div class="telecom-hero-content">
          <h1><?php echo esc_html(promptnext_get_text('telecommunication_hero_h1', 'Next-generation telecom infrastructures engineered for 5G low-latency routing and carrier-grade billing.')); ?></h1>
        </div>
      </div>
    </section>

    <!-- ══════ INDUSTRY CONTEXT ══════ -->
    <section class="telecom-context">
      <div class="telecom-context-wrap">
        <div class="telecom-context-copy">
          <h2>Industry Context</h2>
          <p>Telecom operators across Asia-Pacific are running the most complex technology agendas in the region. Legacy infrastructure that was never designed for modern data demands. Customer platforms that need to scale without friction. And AI and automation being layered onto networks built decades before either existed. The work is not straightforward. The environment does not allow for a clean start.</p>
        </div>
        <div class="telecom-context-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/telecom-context.png" alt="Telecommunications tower infrastructure" />
        </div>
      </div>
    </section>

    <!-- ══════ THREE PILLARS ══════ -->
    <section class="telecom-pillars">
      <div class="telecom-pillars-wrap">
        <article class="telecom-card">
          <span class="telecom-card-num">01</span>
          <h3>No downtime</h3>
          <p>Telecom systems are layers of technology built over decades. Modernisation means working within that reality, not designing around it.</p>
        </article>
        <article class="telecom-card">
          <span class="telecom-card-num">02</span>
          <h3>Telecom modernisation</h3>
          <p>Telecom programmes are often won on the strength of a proposal. What shows up to execute, the team, the expertise, and the pace, has to match what was promised.</p>
        </article>
        <article class="telecom-card">
          <span class="telecom-card-num">03</span>
          <h3>Zero Distribution Operations</h3>
          <p>Any disruption in a telecom environment is immediately felt by the people using the network. Every phase of execution is designed around that constraint.</p>
        </article>
      </div>
    </section>

    <!-- ══════ IN PRACTICE (CARD) ══════ -->
    <section class="telecom-practice">
      <div class="telecom-practice-wrap">
        <div class="telecom-practice-card">
          <h2>What this looks like in practice</h2>
          <p>This pattern is drawn from how telecommunications technology programmes unfold across the industry, not from a named Prompt Next engagement.</p>
        </div>
      </div>
    </section>

    <!-- ══════ COMMITMENT / CASE STUDY ══════ -->
    <section class="telecom-commitment">
      <div class="telecom-commitment-wrap">
        <h2 class="telecom-commitment-title">When Delivery Does Not Match the Commitment</h2>
        <div class="telecom-commitment-grid">
          <p class="telecom-commitment-col">A major telecommunications company awarded a large-scale network modernisation and customer platform programme to a global technology services firm. The proposal presented deep expertise, dedicated leadership, and a structured delivery approach. What arrived at execution stage was a materially different team, more junior, less specialised, and supported by subcontracted resource with limited familiarity with the client's existing infrastructure.</p>
          <p class="telecom-commitment-col">This is a structural feature of how large delivery organisations operate, not an isolated lapse. Senior expertise wins engagements. Execution is resourced differently. By the time the gap becomes apparent, the contract is signed and the cost of changing direction is significant.</p>
        </div>
      </div>
    </section>

    <!-- ══════ CTA ══════ -->
    <section class="telecom-cta">
      <div class="telecom-cta-wrap">
        <h2>How Prompt Next works in Telecommunications</h2>
        <p>We coordinate every party involved in your telecom programme, from the first planning conversation to final handover. Our work is built around one constraint above all others: the network stays up throughout.</p>
        <a class="telecom-cta-btn" href="<?php echo esc_url(home_url('/contact-us/')); ?>">START A CONVERSATION ABOUT YOUR TELECOM PROGRAMME</a>
      </div>
    </section>

  </main>

<?php get_footer(); ?>
