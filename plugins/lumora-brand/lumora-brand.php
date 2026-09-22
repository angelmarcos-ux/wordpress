<?php
/**
 * Plugin Name: LUMORA Brand
 * Description: LUMORA design system - typography, colours, navigation and bespoke styling for the landing experience.
 * Version: 1.0.0
 * Author: LUMORA Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'LUMORA_URL', plugin_dir_url( __FILE__ ) );
define( 'LUMORA_PATH', plugin_dir_path( __FILE__ ) );

function lumora_brand_assets() {
    wp_enqueue_style(
        'lumora-brand',
        LUMORA_URL . 'assets/lumora.css',
        array( 'elementor-frontend', 'hello-elementor' ),
        '1.0.0'
    );
    wp_enqueue_script(
        'lumora-brand',
        LUMORA_URL . 'assets/lumora.js',
        array(),
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'lumora_brand_assets' );