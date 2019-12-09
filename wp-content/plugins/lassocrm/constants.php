<?php

/**
 * Plugin constants.
 * Pluggable
 */

if (!defined("LASSOCRM_API_URL")) {
	/**
	 * Endpoint for Lasso API
	 * @var string
	 */
	define("LASSOCRM_API_URL", "https://api.lassocrm.com/registrants");
	#define("LASSOCRM_API_URL", "https://app.lassocrm.com/registrant_signup/test");
}

if (!defined("LASSOCRM_API_KEY")) {
	/**
	 * UID for Lasso API
	 * @var string
	 */
	define("LASSOCRM_API_KEY", "");
}

if (!defined("LASSOCRM_API_CLIENT_ID")) {
	/**
	 * ClientID for Lasso API
	 * @var string
	 */
	define("LASSOCRM_API_CLIENT_ID", "");
}

if (!defined("LASSOCRM_API_PROJECT_ID")) {
	/**
	 * ProjectID for Lasso API
	 * @var string
	 */
	define("LASSOCRM_API_PROJECT_ID", "");
}

if (!defined("LASSOCRM_API_UID")) {
	/**
	 * UID for Lasso API
	 * @var string
	 */
	define("LASSOCRM_API_UID", "");
}

if (!defined("LASSOCRM_VERSION")) {
	/**
	 * Current plugin version
	 * @var string
	 */
	define("LASSOCRM_VERSION", "0.0.1");
}

if (!defined("LASSOCRM_SLUG")) {
	/**
	 * Plugin slug
	 * @var string
	 */
	define("LASSOCRM_SLUG", "lassocrm");
}

if (!defined("LASSOCRM_UI_PRECEDENCE")) {
	/**
	 * Set importance, precedence of this plugin's UI resources (JavaScript, CSS), 
	 * relative to others. Lower numbers are loaded first.
	 * Used during script/style enqueue - this number is subtracted fro PHP_INT_MAX
	 * Use to ensure plugin styles are loaded after everything else, so they can cascade (override) any other 
	 * parent plugin or plugin styles
	 * @var string
	 */
	define("LASSOCRM_UI_PRECEDENCE", 99999);
}

if (!defined("LASSOCRM_DIR")) {
	/**
	 * Absolute path to plugin directory
	 * @var string
	 */
	define("LASSOCRM_DIR", untrailingslashit(__DIR__));
}

if (!defined("LASSOCRM_LIB")) {
	/**
	 * Absolute path to plugin library directory
	 * @var string
	 */
	define("LASSOCRM_LIB", LASSOCRM_DIR . "/lib");
}

if (!defined("LASSOCRM_TEMPLATE_DIR")) {
	/**
	 * Absolute path to additional templates
	 * @var string
	 */
	define("LASSOCRM_TEMPLATE_DIR", LASSOCRM_DIR . "/templates");
}

if (!defined("LASSOCRM_URL")) {
	/**
	 * Absolute URL to plugin directory
	 * @var string
	 */
	define("LASSOCRM_URL", plugins_url("", __FILE__));
}

if (!defined("LASSOCRM_URL_CSS")) {
	/**
	 * Absolute URL to plugin CSS directory
	 * @var string
	 */
	define("LASSOCRM_URL_CSS", LASSOCRM_URL . "/ui/css");
}

if (!defined("LASSOCRM_URL_JS")) {
	/**
	 * Absolute URL to plugin Javascript directory
	 * @var string
	 */
	define("LASSOCRM_URL_JS", LASSOCRM_URL . "/ui/js");
}

if (!defined("LASSOCRM_URL_IMG")) {
	/**
	 * Absolute URL to plugin images directory
	 * @var string
	 */
	define("LASSOCRM_URL_IMG", LASSOCRM_URL . "/ui/img");
}

