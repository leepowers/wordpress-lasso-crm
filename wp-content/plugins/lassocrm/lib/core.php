<?php

require_once LASSOCRM_LIB . "/hooks.php";
require_once LASSOCRM_LIB . "/shortcodes.php";
require_once LASSOCRM_LIB . "/templates.php";
require_once LASSOCRM_LIB . "/api.php";
require_once LASSOCRM_LIB . "/lead.php";


/**
 * Core plugin functionality
 */
class lassocrm_core {

	/**
	 * Single/global instance of lassocrm_core
	 */
	static public $instance = null;

	/**
	 * Retrieve the singleton instance
	 */
	static public function &instance() {
		if (is_null(self::$instance)) {
			self::$instance = new lassocrm_core;
		}
		return self::$instance;
	}

	/**
	 * Plugin hooks accessor
	 * @var lassocrm_hooks
	 */
	public $hooks = null;

	/**
	 * Template mangement accessor
	 * @var lassocrm_templates
	 */
	public $templates = null;

	/**
	 * Shortcodes mangement accessor
	 * @var lassocrm_templates
	 */
	public $shortcodes = null;

	/**
	 * Constructor.
	 * Initialize other 
	 */
	function __construct() {
		$this->hooks = new lassocrm_hooks;
		$this->templates = new lassocrm_templates;
		$this->shortcodes = new lassocrm_shortcodes;
	}
	
	/**
	 * Bootstrap / startup the theme
	 */
	public function bootstrap() {
		// Bind actions and filters
		$this->hooks->bind();
		$this->shortcodes->bind();
	}

	/**
	 * Check if current user is a site admin
	 */
	public function is_admin() {
		return current_user_can('administrator');
	}

	/**
	 * Check if current user is an editor
	 */
	public function is_editor() {
		return current_user_can('editor') || current_user_can('administrator');
	}

}
