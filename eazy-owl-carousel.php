<?php 
/*
Plugin Name: Eazy OWL Carousel
Plugin URI: http://www.eazythemes.com
Description: Create Slider with OWL Carousel
Version: 1.0
Author: Alessandro Alessio
Author URI: http://www.eazythemes.com
*/

define('EAZYOWL_PLUGIN_URL', plugins_url().'/eazy-owl-carousel' );

/**
 * Init CMB2
 */
require_once( __DIR__ . '/admin/cmb2/init.php' );

/**
 * Init Administration extend
 */
require_once( __DIR__ . '/admin/init.php' );

/**
 * Styles and script Administration
 */
require_once( __DIR__ . '/admin/scripts.php' );

/**
 * Shortcode for Carousel
 */
require_once( __DIR__ . '/frontend/shortcode.php' );

/**
 * Styles and script Frontend
 */
require_once( __DIR__ . '/frontend/scripts.php' );