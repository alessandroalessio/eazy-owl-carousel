<?php

/**
 * eazy_owl_carousel_assets()
 * Add assets in frontend
 *
 * @return void
 */
function eazy_owl_carousel_assets() {
    if ( !is_admin() ) {
        wp_enqueue_style( 'eazy-owl', EAZYOWL_PLUGIN_URL.'/frontend/owl-carousel2/dist/assets/owl.carousel.min.css' );
        wp_enqueue_style( 'eazy-owl-theme', EAZYOWL_PLUGIN_URL.'/frontend/owl-carousel2/dist/assets/owl.theme.default.min.css' );
        wp_enqueue_script( 'eazy-owl-carousel', EAZYOWL_PLUGIN_URL . '/frontend/owl-carousel2/dist/owl.carousel.js', array( 'jquery' ) );
        wp_add_inline_script( 'eazy-owl-carousel', 'jQuery(document).ready(function(){
            jQuery(".eazy-owl-carousel").each(function (index) {
                var items_n = jQuery(this).data("items");
                var margin = jQuery(this).data("margin");
                var loop = jQuery(this).data("loop");
                var nav = jQuery(this).data("nav");
                var dots = jQuery(this).data("dots");
                var autoplay = jQuery(this).data("autoplay");
                var autoplaySpeed = jQuery(this).data("autoplaySpeed");

                jQuery(this).owlCarousel({ 
                    items: items_n,
                    margin: margin,
                    loop: loop,
                    nav: nav,
                    dots: dots,
                    autoplay: autoplay,
                    autoplaySpeed: autoplaySpeed
                });
            });
        });' );
    }
}

add_action( 'wp_enqueue_scripts', 'eazy_owl_carousel_assets' );