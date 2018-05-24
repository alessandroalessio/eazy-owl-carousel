<?php 
// Add Script to Backend
function eazy_owl_carousel_admin_scripts() {
    wp_enqueue_script( 'eazy-owl-admin', EAZYOWL_PLUGIN_URL . '/admin/assets/admin.js', array(), '1.0', 'all');
}
add_action( 'admin_head', 'eazy_owl_carousel_admin_scripts' );

// Add Style to Backend
function eazy_owl_carousel_admin_styles() {
    wp_enqueue_style( 'eazy-owl-admin', EAZYOWL_PLUGIN_URL . '/admin/assets/admin.css', array(), '1.0', 'all');
}
add_action( 'admin_head', 'eazy_owl_carousel_admin_styles' );