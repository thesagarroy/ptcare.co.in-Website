<?php
/**
 * functions.php — PT Healthcare WordPress Theme
 * Enqueues all external CSS/JS assets needed by the theme.
 */

function ptcare_enqueue_assets() {

    // 1. Tailwind CSS CDN
    wp_enqueue_script(
        'tailwindcss',
        'https://cdn.tailwindcss.com',
        [],
        null,
        false
    );

    // 2. Tailwind Config (color tokens, fonts) — inline after Tailwind loads
    wp_add_inline_script('tailwindcss', '
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bipraj:  "#b1e7ff",
                        bislaim: "#01d2b6",
                        ptdark:  "#1e293b",
                        ptred:   "#dc2626"
                    },
                    fontFamily: {
                        sans:    ["Inter", "system-ui", "sans-serif"],
                        heading: ["Montserrat", "system-ui", "sans-serif"]
                    }
                }
            }
        }
    ');

    // 3. Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@700;800;900&display=swap',
        [],
        null
    );

    // 4. Font Awesome 6
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        [],
        '6.4.0'
    );

    // 5. Swiper CSS
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css',
        [],
        '10'
    );

    // 6. Swiper JS
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js',
        [],
        '10',
        true   // Load in footer
    );

    // 7. Theme main stylesheet (style.css)
    wp_enqueue_style(
        'ptcare-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'ptcare_enqueue_assets');


/**
 * Theme setup — add post thumbnails, nav menus, title tag support.
 */
function ptcare_setup() {
    // Let WordPress manage <title> tag
    add_theme_support('title-tag');

    // Featured images
    add_theme_support('post-thumbnails');

    // Register a navigation menu location
    register_nav_menus([
        'primary' => __('Primary Navigation', 'ptcare'),
    ]);
}
add_action('after_setup_theme', 'ptcare_setup');
