# Scroll-To-Top-Button-Lightweight-WordPress-Plugin

A **lightweight**, **dependency-minimal** WordPress plugin that adds a customizable scroll-to-top button to your site. Future-proof design with a clear roadmap for advanced features (e.g. animation presets, accessibility improvements, and WP Customizer integration).

---

## 🚀 Features

- **Effortless integration**: works out of the box with zero configuration.
- **Lightweight CSS & JS**: under 5 KB combined.
- **Customizable**: override styles via your theme or child theme.
- **Graceful fallback**: no button displayed if JavaScript is disabled.
- **Extensible**: easy hooks for advanced customization.

---

## 📦 Installation

1. **Download** the plugin:
   ```bash
   git clone https://github.com/shuvosa/Scroll-To-Top-Button-Lightweight-WordPress-Plugin.git
Upload the scroll-to-top-button folder to /wp-content/plugins/

Activate the plugin via Plugins > Installed Plugins in your WordPress dashboard.

⚙️ Usage
The plugin automatically injects the button. To customize:

1. Change the Icon/Label
  ```bash
<?php
add_filter( 'stt_button_html', function() {
    // Use a custom SVG icon or text
    return '<button class="scroll-to-top" aria-label="Back to Top">🔝</button>';
} );
```
2. Override Styles in Your Theme
Create a file at your-theme/assets/css/scroll-to-top.css and enqueue it after the plugin’s CSS:
  ```bash
.scroll-to-top {
    background-color: #ff6f61;
    width: 50px;
    height: 50px;
    font-size: 24px;
}

add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'theme-scroll-to-top', get_stylesheet_directory_uri() . '/assets/css/scroll-to-top.css', [], '1.0' );
}, 20 );
```
3. Adjust Scroll Speed
  ```bash
add_filter( 'stt_scroll_duration', function( $duration ) {
    return 1200; // milliseconds
} );
```
🗺️ Roadmap
v1.1.0: Animation presets (fade, slide, zoom)

v1.2.0: Customizer controls for live-preview

v1.3.0: ARIA & WCAG enhancements for accessibility

v2.0.0: Gutenberg block + shortcode

📝 Changelog
markdown

### 1.0.0 (2025-07-09)
- Initial release with basic scroll-to-top functionality
🤝 Contributing
Fork the repo

Create your feature branch: git checkout -b feature/my-feature

Commit your changes: git commit -m 'Add awesome feature'

Push to the branch: git push origin feature/my-feature

Open a Pull Request

📄 License
MIT License 

⚙️ Example Integration

// In your theme's functions.php


// 1. Change button HTML
```bash
add_filter( 'stt_button_html', function() {
    return '<button class="scroll-to-top" aria-label="Go Up">⬆️</button>';
} );
```

// 2. Enqueue custom style

```bash
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'custom-stt', get_stylesheet_directory_uri() . '/css/custom-scroll.css', [], '1.0' );
}, 20 );
```
// 3. Speed up scroll duration
```bash
add_filter( 'stt_scroll_duration', fn( $d ) => 500 );
```
Forward-thinking note: As modern browsers adopt CSS scroll-behavior, version 1.1 will detect native support and fall back to our JS only when needed, ensuring optimal performance and future compatibility.
