<?php
/*
Plugin Name: Scroll to Top
Plugin URI: https://www.example.com/
Description: Adds a "scroll to top" button to your site.
Version: 1.0
Author: Your Name
Author URI: https://www.example.com/
*/

// Add the necessary JavaScript and CSS
function scroll_to_top_scripts() {
  wp_enqueue_script( 'scroll-to-top', plugin_dir_url( __FILE__ ) . 'scroll-to-top.js', array('jquery'), '1.0.0', true );
  wp_enqueue_style( 'scroll-to-top', plugin_dir_url( __FILE__ ) . 'scroll-to-top.css', array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'scroll_to_top_scripts' );


//Enqueue font awesome to wordpress website

  add_action( 'wp_enqueue_scripts', 'add_font_awesome' );

function add_font_awesome() {
wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css

' );
}

// Add the "scroll to top" button to the site
function scroll_to_top_button() {
  echo '<a href="#" class="scroll-to-top"><i class="fa fa-chevron-up"> </i></a>';
}
add_action( 'wp_footer', 'scroll_to_top_button' );

// Add the settings page
function scroll_to_top_settings_page() {
  add_options_page(
    'Scroll to Top Settings',
    'Scroll to Top',
    'manage_options',
    'scroll-to-top-settings',
    'scroll_to_top_settings_page_callback'
  );
}
add_action('admin_menu', 'scroll_to_top_settings_page');

// Create the settings page content
function scroll_to_top_settings_page_callback() {
  ?>
  <div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <form method="post" action="options.php">
      <?php settings_fields('scroll_to_top_options'); ?>
      <?php do_settings_sections('scroll_to_top_options'); ?>
      <?php submit_button(); ?>
    </form>
  </div>
  <?php
}


// Add the settings fields
function scroll_to_top_settings() {
  add_settings_section(
    'scroll_to_top_section',
    'Button Settings',
    'scroll_to_top_section_callback',
    'scroll_to_top_options'
  );

  add_settings_field(
    'scroll_to_top_background_color',
    'Background Color',
    'scroll_to_top_background_color_callback',
    'scroll_to_top_options',
    'scroll_to_top_section'
  );

  add_settings_field(
    'scroll_to_top_border_radius',
    'Border Radius',
    'scroll_to_top_border_radius_callback',
    'scroll_to_top_options',
    'scroll_to_top_section'
  );

  register_setting('scroll_to_top_options', 'scroll_to_top_background_color');
  register_setting('scroll_to_top_options', 'scroll_to_top_border_radius');
}
add_action('admin_init', 'scroll_to_top_settings');

// Callback functions for the settings fields
function scroll_to_top_section_callback() {
  echo '<p>Customize the appearance of the "scroll to top" button.</p>';
}

function scroll_to_top_background_color_callback() {
  $background_color = get_option('scroll_to_top_background_color', '#0073aa');
  echo '<input type="text" name="scroll_to_top_background_color" value="' . esc_attr($background_color) . '">';
}

function scroll_to_top_border_radius_callback() {
  $border_radius = get_option('scroll_to_top_border_radius', '50%');
  echo '<input type="text" name="scroll_to_top_border_radius" value="' . esc_attr($border_radius) . '">';
}

// settings CSS Customization
function sstt_theme_color_cus(){
  ?>
  <style>
    .scroll-to-top  {
    background-color: <?php print  get_option("scroll_to_top_background_color"); ?>;
    border-radius: <?php print  get_option("scroll_to_top_border_radius"); ?>;
  }
  </style>
  <?php 
}
add_action('wp_head', 'sstt_theme_color_cus');


?>

