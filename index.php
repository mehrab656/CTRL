<?php

use Order\CTRL\EndPointList;
use Order\CTRL\OrderCTRL;

/**
 * Plugin Name: CTRL
 */
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	die();
}

if ( ! defined( 'CTRL_PLUGIN_VERSION' ) ) {
	define( 'CTRL_PLUGIN_VERSION', '1.0.0' );
}

if ( ! defined( 'CTRL_PLUGIN_FILE' ) ) {
	define( 'CTRL_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'CTRL_PLUGIN_BASENAME' ) ) {
	define( 'CTRL_PLUGIN_BASENAME', plugin_basename( CTRL_PLUGIN_FILE ) );
}

if ( ! defined( 'CTRL_PLUGIN_PATH' ) ) {
	/** @define "RWP_SM_PLUGIN_PATH" "./" */
	define( 'CTRL_PLUGIN_PATH', plugin_dir_path( CTRL_PLUGIN_FILE ) );
}

if ( ! defined( 'CTRL_PLUGIN_URL' ) ) {
	define( 'CTRL_PLUGIN_URL', plugin_dir_url( CTRL_PLUGIN_FILE ) );
}

if ( ! class_exists( 'Order\CTRL\OrderCTRL', false ) ) {
	require_once CTRL_PLUGIN_PATH . 'OrderCTRL.php';
}


function orderCTRL(){
	OrderCTRL::get_instance();
}

orderCTRL();









