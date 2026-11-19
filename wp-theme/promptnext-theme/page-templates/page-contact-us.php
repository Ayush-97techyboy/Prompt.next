<?php
/**
 * Template Name: Contact Us
 * @package PromptNext
 */

get_header(); ?>

<main id="top">
    <!-- Hero Section -->
    <section class="contact-hero" aria-label="Contact Prompt Next">
      <div class="contact-hero-inner">
        <!-- <div class="contact-badge">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/badge-what-icon.png" alt="" class="badge-icon" />
          <span>GET IN TOUCH</span>
        </div> -->
        <h1>Start a conversation.</h1>
        <p>Not a sales call. A strategy conversation. We will ask about your outcome, your environment, and your timeline. We will tell you what we think is realistic, where we have relevant experience, and where we do not. If we are not the right partner, we will say so.</p>
      </div>
    </section>

    <!-- Two-Column Contact Options -->
    <section class="contact-main-section" aria-label="Engagement channels">
      <div class="contact-container contact-cards-grid">
        
        <!-- Left Card: Strategy Call Booking -->
        <article class="contact-card strategy-card">
          <div class="contact-card-header">
            <div class="contact-header-text">
              <h2>Strategy Call</h2>
              <p class="strategy-subtext">
                <span class="strat-line">Book a 30-minute strategy call. No commitment.</span>
                <span class="strat-line">No agenda. Just an honest conversation about</span>
                <span class="strat-line">your programme.</span>
              </p>
            </div>
            <span class="card-tag-badge">Recommended</span>
          </div>

          <!-- Strategy Session Inner Card Frame -->
          <div class="strategy-card-inner">
            <!-- Interactive Date Picker Mockup -->
            <div class="calendar-widget">
              <div class="calendar-top-bar">
                <div class="cal-session-title">
                  <label for="cal-date-picker" class="cal-icon-btn" title="Choose date on calendar">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/Calendar_contact.svg" alt="Calendar date selector" class="cal-header-icon" />
                    <input type="date" id="cal-date-picker" class="cal-native-date-input" aria-label="Select session date" />
                  </label>
                  <span>Book 30 min session</span>
                </div>
                <span class="cal-tz-label">GMT+8 Singapore</span>
              </div>

              <div class="cal-divider"></div>

              <div class="calendar-days-row" role="radiogroup" aria-label="Available Days">
                <!-- Dynamically rendered based on current date -->
              </div>
            </div>

            <!-- Quick Details Form -->
            <form class="contact-form" onsubmit="event.preventDefault(); submitStrategySession(this);">
              <input type="hidden" id="strat-selected-date" name="selected_date" />
              <div class="form-group">
                <label for="strat-name">NAME</label>
                <input type="text" id="strat-name" name="name" placeholder="Your full name" required />
              </div>
              <div class="form-group">
                <label for="strat-company">COMPANY</label>
                <input type="text" id="strat-company" name="company" placeholder="Organisation name" required />
              </div>
              <button type="submit" class="contact-submit-btn">Confirm Strategy Session</button>
            </form>
          </div>
        </article>

        <!-- Right Card: Direct Message Form -->
        <article class="contact-card message-card">
          <div class="contact-card-header">
            <div class="contact-header-text">
              <h2>Message</h2>
              <p>Prefer to write first? Send us a brief message and we will respond within one business day.</p>
            </div>
          </div>

          <form class="contact-form" onsubmit="event.preventDefault(); submitMessageForm(this);">
            <div class="form-group">
              <label for="msg-name">NAME</label>
              <input type="text" id="msg-name" name="name" placeholder="John Doe" required />
            </div>
            <div class="form-group">
              <label for="msg-company">COMPANY</label>
              <input type="text" id="msg-company" name="company" placeholder="Acme Corp" required />
            </div>
            <div class="form-group">
              <label for="msg-email">EMAIL ADDRESS</label>
              <input type="email" id="msg-email" name="email" placeholder="john@acme.com" required />
            </div>
            <div class="form-group">
              <label for="msg-text">MESSAGE (OPTIONAL)</label>
              <textarea id="msg-text" name="message" rows="4" placeholder="Briefly describe your enquiry"></textarea>
            </div>
            <button type="submit" class="contact-submit-btn">Send message</button>
          </form>
        </article>

      </div>
    </section>

    <!-- Bottom Information Strip (Single Card with 4 Items) -->
    <section class="contact-info-strip-section" aria-label="Corporate details">
      <div class="contact-container">
        <div class="contact-info-strip-card">
          
          <!-- Column 1: Email -->
          <div class="contact-info-item">
            <div class="info-icon">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/Mail_contact.svg" alt="Email" width="35" height="35" />
            </div>
            <div class="info-text-group">
              <span class="info-heading">Email</span>
              <a href="mailto:info@promptnext.com.sg" class="info-content-link">info@promptnext.com.sg</a>
            </div>
          </div>

          <!-- Column 2: Registered Address -->
          <div class="contact-info-item">
            <div class="info-icon">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/Location_contact.svg" alt="Address" width="35" height="35" />
            </div>
            <div class="info-text-group">
              <span class="info-heading">Registered Address</span>
              <address class="info-content-address">
                Prompt Next Group Pte Ltd<br />
                21 Tan Quee Lan Street , #02-04,<br />
                Heritage Place, Singapore 188108.
              </address>
            </div>
          </div>

          <!-- Column 3: LinkedIn -->
          <div class="contact-info-item center-align">
            <div class="info-icon">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/Linkedin_contact.svg" alt="LinkedIn" width="35" height="35" />
            </div>
            <div class="info-text-group">
              <a href="https://www.linkedin.com/company/promptnext" target="_blank" rel="noopener noreferrer" class="info-heading info-underlined-link">Linkedin</a>
            </div>
          </div>

          <!-- Column 4: WhatsApp -->
          <div class="contact-info-item center-align">
            <div class="info-icon">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/Correct_PIxalate/Whatsapp_contact.svg" alt="WhatsApp" width="35" height="35" />
            </div>
            <div class="info-text-group">
              <a href="https://api.whatsapp.com/send/?phone=6581639567&text&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="info-heading info-underlined-link">Whatsapp</a>
            </div>
          </div>

        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>
