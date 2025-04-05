<?php
/**
 * Plugin Name: Study Tip
 * Plugin URI: https://example.com/study-tip
 * Description: A simple WordPress plugin to provide study tips.
 * Version: 1.0.0
 * Author: Mikiyas
 * Author URI: https://example.com
 * License: GPL2
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Add a shortcode to display a random study tip.
function study_tip_shortcode() {
    $tips = [
        "Take regular breaks to stay focused.",
        "Organize your study space for better concentration.",
        "Use active recall to reinforce learning.",
        "Teach someone else to solidify your understanding.",
        "Set specific goals for each study session."
    ];

    $random_tip = $tips[array_rand($tips)];
    return "<div class='study-tip'><strong>Study Tip:</strong> $random_tip</div>";
}
add_shortcode('study_tip', 'study_tip_shortcode');

// Enqueue plugin styles.
function study_tip_enqueue_styles() {
    wp_enqueue_style('study-tip-style', plugin_dir_url(__FILE__) . 'assets/style.css');
}
add_action('wp_enqueue_scripts', 'study_tip_enqueue_styles');