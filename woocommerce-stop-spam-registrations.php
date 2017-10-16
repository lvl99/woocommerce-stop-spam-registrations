<?php
/**
 * Plugin Name: LVL99 WooCommerce Stop Spam Registrations
 * Plugin URI: https://github.com/lvl99/woocommerce-stop-spam-registrations
 * Description: Stop (or reduce) spam registrations via WooCommerce
 * Version: 0.1.0
 * Author: Matt Scheurich
 * Author URI: https://lvl99.com
 *
 * Text Domain: lvl99-wcssr
 */

// Cannot be accessed directly
if ( ! defined( 'ABSPATH' ) )
{
  exit;
}

if ( ! function_exists('lvl99_wc_ssr') )
{
  define( 'LVL99_WC_SSR', '0.1.0' );
  define( 'LVL99_WC_SSR_PATH', __DIR__ );
  require_once( LVL99_WC_SSR_PATH . '/classes/class.plugin.php' );

  // Global function to retrieve the plugin instance
  function lvl99_wc_ssr ()
  {
    global $lvl99_wc_ssr;

    // Initialise if not already available
    if ( empty( $lvl99_wc_ssr ) )
    {
      $lvl99_wc_ssr = new \LVL99\WCSSR\Plugin();
    }

    return $lvl99_wc_ssr;
  }

  // Add the action
  add_action( 'plugins_loaded', 'lvl99_wc_ssr' );
}
