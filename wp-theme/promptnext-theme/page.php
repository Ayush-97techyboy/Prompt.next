<?php
/**
 * Main Template File (Fallback)
 *
 * @package PromptNext
 */

get_header(); ?>

<main id="main-content" class="container" style="padding: 120px 24px 80px; min-height: 60vh;">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h1><?php the_title(); ?></h1>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; else : ?>
    <p><?php esc_html_e('No content found.', 'promptnext'); ?></p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
