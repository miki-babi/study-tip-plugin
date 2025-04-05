<?php
/**
 * Plugin Name: Study Tip plugin
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
//submenu 
function wporg_options_page_html() {
	// // check user capabilities
	// if ( ! current_user_can( 'manage_options' ) ) {
	// 	return;
	// }
	// ?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			<?php
			// output security fields for the registered setting "wporg_options"
			settings_fields( 'wporg_options' );
			// output setting sections and their fields
			// (sections are registered for "wporg", each field is registered to a specific section)
			do_settings_sections( 'wporg' );
			// output save settings button
			submit_button( __( 'Save Settings', 'textdomain' ) );
			?>
		</form>
	</div>
	<?php
}
add_action( 'admin_menu', 'wporg_options_page' );
function wporg_options_page() {
    add_menu_page(
        'WPOrg',
        'WPOrg Options',
        'manage_options',
        plugin_dir_path(__FILE__) . 'templates/view.php',
        null,
        plugin_dir_url(__FILE__) . 'images/icon.png',
        20
    );
}
function handle_study_tip_submission() {
    if (
        isset($_POST['tip']) &&
        isset($_POST['study_tip_nonce']) &&
        wp_verify_nonce($_POST['study_tip_nonce'], 'study_tip_submit_action')
    ) {
        // safe to handle the data
        $tip = sanitize_text_field($_POST['tip']);
        var_dump($tip);
    }
    
}
// add_action('admin_notices', 'handle_study_tip_submission');
add_action('wp_enqueue_scripts', 'study_tip_enqueue_styles');