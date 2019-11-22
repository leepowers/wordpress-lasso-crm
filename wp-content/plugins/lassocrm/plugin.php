<?php
/**
 * Plugin Name: Lasso CRM Integration
 * Plugin URI: http://leepowers.co/
 * Description: Tools and API for integrating with Lasso CRM
 * Version: 0.0.1
 * Author: Lee Powers
 * Author URI: http://leepowers.co/
 * Text Domain: lassocrm
 */


/**
 * Write to PHP error log
 */
function lassocrm_log() {
	$args = func_get_args();
	foreach ($args as $arg) {
		$msg = print_r($arg, true);
		error_log($msg);
	}
}

/**
 * Dump debug messages to front-end
 */
function lassocrm_dump() {
	$args = func_get_args();
	foreach ($args as $arg) {
		printf("<pre>\n%s\n</pre>\n", var_export($arg, true));
	}
}

/**
 * Main code control for plugin
 */
require_once "constants.php";
require_once LASSOCRM_LIB . "/core.php";
lassocrm_core::instance()->bootstrap();

