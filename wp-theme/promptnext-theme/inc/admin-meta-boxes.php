<?php
/**
 * Prompt Next - Native WordPress Meta Boxes for 100% Reliable Page Editing
 *
 * Provides dedicated editing fields directly on the WordPress Edit Page screen.
 * Requires ZERO third-party plugins. Works in all WordPress installations.
 *
 * @package PromptNext
 */

if (!defined('ABSPATH')) {
    exit;
}

// 1. Fallback get_field() if ACF plugin is inactive
if (!function_exists('get_field')) {
    function get_field($selector, $post_id = false, $format_value = true) {
        if (!$post_id) {
            $post_id = get_the_ID();
        }
        if (!$post_id) {
            return '';
        }
        return get_post_meta($post_id, $selector, true);
    }
}

/**
 * Universal helper to get page copy with default fallback
 */
function promptnext_get_text($key, $default = '') {
    $val = '';
    if (function_exists('get_field')) {
        $val = get_field($key);
    }
    if (empty($val) && $val !== '0') {
        $val = get_post_meta(get_the_ID(), $key, true);
    }
    return (!empty($val) || $val === '0') ? $val : $default;
}

/**
 * Register Native Meta Box for Pages
 */
function promptnext_add_native_meta_boxes() {
    add_meta_box(
        'promptnext_page_content_box',
        __('Prompt Next - Page Content & Text Editor', 'promptnext'),
        'promptnext_render_native_meta_box',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'promptnext_add_native_meta_boxes');

/**
 * Get field configurations per page
 */
function promptnext_get_page_field_configs($post) {
    $slug = $post->post_name;
    $id = $post->ID;

    // Home Page
    if ($id == 9 || $slug === 'home' || is_front_page()) {
        return array(
            'group_title' => 'Home Page Content',
            'fields' => array(
                'home_hero_title' => array('label' => 'Hero Headline', 'type' => 'text', 'default' => 'From Intent To Outcome'),
                'home_hero_sub' => array('label' => 'Hero Description', 'type' => 'textarea', 'default' => 'We run complex technology programmes for enterprises, coordinating every party from decision to live production.'),
                'home_stat1_num' => array('label' => 'Stat 1 Number', 'type' => 'text', 'default' => '$2.3T'),
                'home_stat1_text' => array('label' => 'Stat 1 Text', 'type' => 'text', 'default' => 'Lost to failed technology programmes globally, every year.'),
                'home_stat2_num' => array('label' => 'Stat 2 Number', 'type' => 'text', 'default' => '70%'),
                'home_stat2_text' => array('label' => 'Stat 2 Text', 'type' => 'text', 'default' => 'Enterprise technology programmes fail to meet original objectives.'),
                'home_stat3_num' => array('label' => 'Stat 3 Number', 'type' => 'text', 'default' => '52%'),
                'home_stat3_text' => array('label' => 'Stat 3 Text', 'type' => 'text', 'default' => 'AI initiatives in regulated industries never reach production.'),
                'home_stat4_num' => array('label' => 'Stat 4 Number', 'type' => 'text', 'default' => '$1.4T'),
                'home_stat4_text' => array('label' => 'Stat 4 Text', 'type' => 'text', 'default' => 'APAC ICT spending in 2025, growing at 5.8% annually.'),
                'home_strat_title' => array('label' => 'Strategy Title', 'type' => 'text', 'default' => 'THE STRATEGY IS CLEAR. THE EXECUTION IS NOT.'),
                'home_strat_p1' => array('label' => 'Strategy Paragraph 1', 'type' => 'textarea', 'default' => 'Technology programs rarely fail because the code doesn\'t work; they fail on execution. Once the architecture is approved and budgets are released, the real operational trauma begins. Unforeseen regulations, integration friction, and compressed timelines inevitably stall the final mile.'),
                'home_partner_title' => array('label' => 'Partner Section Title', 'type' => 'text', 'default' => 'WE COORDINATE THE TEAM. YOU GET ONE POINT OF CONTACT.'),
                'home_partner_desc' => array('label' => 'Partner Description', 'type' => 'textarea', 'default' => 'Prompt Next does not carry every capability in-house, and we do not pretend to. We coordinate a vetted network of partner firms across cloud and infrastructure, enterprise software, data integration, regulatory compliance, and AI deployment, alongside your internal teams and existing vendors. You manage one relationship. We hold accountability for the outcome of all of it, with shared responsibility agreed on day one.')
            )
        );
    }

    // About Us
    if ($id == 10 || $slug === 'about-us') {
        return array(
            'group_title' => 'About Us Content',
            'fields' => array(
                'about_hero_headline' => array('label' => 'Hero Headline', 'type' => 'text', 'default' => 'We exist because intent without execution is just planning.'),
                'about_company_eyebrow' => array('label' => 'The Company Eyebrow', 'type' => 'text', 'default' => 'THE COMPANY'),
                'about_vision_text' => array('label' => 'Vision Statement', 'type' => 'textarea', 'default' => 'A world where technology execution is no longer the bottleneck to business growth.'),
                'about_mission_text' => array('label' => 'Mission Statement', 'type' => 'textarea', 'default' => 'Make world-class technology execution accessible to every enterprise, from first deployment to scaled infrastructure.')
            )
        );
    }

    // What We Do
    if ($id == 11 || $slug === 'what-we-do') {
        return array(
            'group_title' => 'What We Do Content',
            'fields' => array(
                'wwd_hero_title' => array('label' => 'Hero Headline', 'type' => 'text', 'default' => 'Five capabilities. One delivery accountability.'),
                'wwd_hero_description' => array('label' => 'Hero Description', 'type' => 'textarea', 'default' => 'We do not offer generic consulting. We take operational accountability for five critical technology execution capabilities, deployed through our vetted partner network.'),
                'wwd_tech_execution_title' => array('label' => 'Tech Execution Title', 'type' => 'text', 'default' => 'WHAT TECHNOLOGY EXECUTION LOOKS LIKE IN PRACTICE'),
                'wwd_tech_execution_lead' => array('label' => 'Tech Execution Lead Text', 'type' => 'textarea', 'default' => 'Strategy without execution is just overhead. We bridge the critical gap between architecture diagrams and operational reality, taking responsibility for the end-to-end outcome.')
            )
        );
    }

    // How We Work
    if ($id == 12 || $slug === 'how-we-work') {
        return array(
            'group_title' => 'How We Work Content',
            'fields' => array(
                'hww_hero_title' => array('label' => 'Hero Headline', 'type' => 'text', 'default' => 'A delivery model built around accountability, not billable hours.'),
                'hww_hero_desc' => array('label' => 'Hero Description', 'type' => 'textarea', 'default' => 'We do not deploy armies of junior analysts. We deploy small, senior, accountable teams that integrate with yours and own the outcome through to production.'),
                'hww_stages_title' => array('label' => 'Stages Title', 'type' => 'text', 'default' => 'FOUR STAGES. ZERO GAP BETWEEN STRATEGY AND EXECUTION.'),
                'hww_stages_desc' => array('label' => 'Stages Description', 'type' => 'textarea', 'default' => 'Our engagement model is designed to create certainty at each stage before moving to the next. No scope surprises. No accountability hand-offs.')
            )
        );
    }

    // Industries
    if ($id == 13 || $slug === 'industries') {
        return array(
            'group_title' => 'Industries Overview Content',
            'fields' => array(
                'industries_hero_title' => array('label' => 'Hero Headline', 'type' => 'text', 'default' => 'Execution capability where failure carries real cost.'),
                'industries_hero_desc' => array('label' => 'Hero Description', 'type' => 'textarea', 'default' => 'We work in sectors where technology is deeply tied to operations, regulation, and customer trust. Here is where we focus and what we deliver.')
            )
        );
    }

    // Contact Us
    if ($id == 21 || $slug === 'contact-us') {
        return array(
            'group_title' => 'Contact Us Content',
            'fields' => array(
                'contact_hero_title' => array('label' => 'Hero Headline', 'type' => 'text', 'default' => 'Start with an honest assessment of what it takes to deliver.'),
                'contact_hero_desc' => array('label' => 'Hero Description', 'type' => 'textarea', 'default' => 'Tell us about your programme, your timeline, and where you see execution risk. We will give you a direct, candid response on how we can help.')
            )
        );
    }

    // Industry Sub-pages (BFSI, Healthcare, Government, Hospitality, Manufacturing, Telecom)
    $sub_industries = array(
        'bfsi' => array('title' => 'BFSI Sector', 'default_h1' => "Core banking doesn't pause for upgrades. Compliance doesn't pause for transformation. We execute inside the operating envelope."),
        'healthcare' => array('title' => 'Healthcare Sector', 'default_h1' => 'Connected healthcare delivery where patient data integrity and clinical availability are non-negotiable.'),
        'government' => array('title' => 'Government Sector', 'default_h1' => 'Public sector transformation where security, sovereign cloud compliance, and scale meet strict accountability.'),
        'hospitality' => array('title' => 'Hospitality Sector', 'default_h1' => 'Real-time booking and guest intelligence architectures engineered for zero-downtime peak demand.'),
        'manufacturing' => array('title' => 'Manufacturing Sector', 'default_h1' => 'Smart manufacturing architectures connecting legacy OT environments with real-time AI analytics.'),
        'telecommunication' => array('title' => 'Telecommunication Sector', 'default_h1' => 'Next-generation telecom infrastructures engineered for 5G low-latency routing and carrier-grade billing.')
    );

    if (isset($sub_industries[$slug])) {
        $info = $sub_industries[$slug];
        return array(
            'group_title' => $info['title'],
            'fields' => array(
                $slug . '_hero_h1' => array('label' => 'Hero Headline', 'type' => 'textarea', 'default' => $info['default_h1'])
            )
        );
    }

    return null;
}

/**
 * Render Meta Box HTML
 */
function promptnext_render_native_meta_box($post) {
    wp_nonce_field('promptnext_save_meta', 'promptnext_meta_nonce');

    $config = promptnext_get_page_field_configs($post);
    if (!$config) {
        echo '<p style="color: #666;">' . esc_html__('This page does not require custom section fields.', 'promptnext') . '</p>';
        return;
    }

    echo '<div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 18px 24px; margin-bottom: 20px;">';
    echo '<p style="margin: 0 0 6px 0; font-size: 14px; font-weight: 600; color: #0f172a;">' . esc_html__('Prompt Next Live Page Editor', 'promptnext') . '</p>';
    echo '<p style="margin: 0; font-size: 13px; color: #475569;">' . esc_html__('Edit any text below and click the blue "Update" button on the right. Your edits will update immediately on the live website while keeping the 4K responsive layout 100% protected.', 'promptnext') . '</p>';
    echo '</div>';

    echo '<table class="form-table" role="presentation">';
    foreach ($config['fields'] as $name => $field) {
        $saved = get_post_meta($post->ID, $name, true);
        $val = ($saved !== '' && $saved !== false) ? $saved : $field['default'];

        echo '<tr>';
        echo '<th scope="row" style="width: 220px; font-weight: 600;"><label for="' . esc_attr($name) . '">' . esc_html($field['label']) . '</label></th>';
        echo '<td>';
        if ($field['type'] === 'textarea') {
            echo '<textarea id="' . esc_attr($name) . '" name="' . esc_attr($name) . '" rows="3" class="large-text code" style="width: 100%; border-radius: 4px; font-family: inherit; font-size: 14px; line-height: 1.5;">' . esc_textarea($val) . '</textarea>';
        } else {
            echo '<input type="text" id="' . esc_attr($name) . '" name="' . esc_attr($name) . '" value="' . esc_attr($val) . '" class="large-text" style="width: 100%; border-radius: 4px; font-family: inherit; font-size: 14px; padding: 6px 10px;" />';
        }
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
}

/**
 * Save Meta Box Fields on Post Update
 */
function promptnext_save_native_meta_boxes($post_id) {
    if (!isset($_POST['promptnext_meta_nonce']) || !wp_verify_nonce($_POST['promptnext_meta_nonce'], 'promptnext_save_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_page', $post_id)) {
        return;
    }

    $post = get_post($post_id);
    if (!$post || $post->post_type !== 'page') {
        return;
    }

    $config = promptnext_get_page_field_configs($post);
    if (!$config) {
        return;
    }

    foreach ($config['fields'] as $name => $field) {
        if (isset($_POST[$name])) {
            $val = wp_unslash($_POST[$name]);
            update_post_meta($post_id, $name, $val);
        }
    }
}
add_action('save_post', 'promptnext_save_native_meta_boxes');
