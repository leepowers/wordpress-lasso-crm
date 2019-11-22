<?php

/**
 * General hooks for plugin.
 * For setting up WordPress actions, filters that are plugin related.
 */
class lassocrm_hooks {

	/**
	 * Bind to actions and filters
	 */
	public function bind() {
		// Enqueue the very first CSS and JavaScript (such as a CSS reset)
		add_action("wp_enqueue_scripts", array(&$this, "ui_resources_first"), 1);
		// Enqueue the very last CSS and JavaScript (such as any CSS to override)
		add_action("wp_enqueue_scripts", array(&$this, "ui_resources_last"), PHP_INT_MAX - LASSOCRM_UI_PRECEDENCE);
		// Enqueue admin dashboard scripts and styles last
		add_action("admin_enqueue_scripts", array(&$this, "ui_admin_last"), PHP_INT_MAX - LASSOCRM_UI_PRECEDENCE);
		// Test AJAX action for lead test
		add_action("wp_ajax_lassocrm_test_lead", array(&$this, "ajax_lassocrm_test_lead"));
		add_action("wp_ajax_nopriv_lassocrm_test_lead", array(&$this, "ajax_lassocrm_test_lead"));
	}

	/**
	 * Setup first UI resources (CSS, JavaScript)
	 * - Enqueue jQuery
	 */
	public function ui_resources_first() {
		wp_enqueue_script("jquery");
	}

	/**
	 * Setup final UI resources (CSS, JavaScript)
	 * - Enqueue CSS overrides last (main plugin styles)
	 */
	public function ui_resources_last() {
		// Plugin scripts and styles
		wp_enqueue_style("lassocrm", LASSOCRM_URL_CSS . "/plugin.css", array(), LASSOCRM_VERSION);
		wp_enqueue_script("lassocrm", LASSOCRM_URL_JS . "/plugin.js", array("jquery"), LASSOCRM_VERSION, true);
		wp_localize_script("lassocrm", "ajaxurl", admin_url("admin-ajax.php"));
	}

	/**
	 * Setup final UI resources for admin dashboard. 
	 */
	public function ui_admin_last($hook = "") {
		wp_enqueue_style("lassocrm", LASSOCRM_URL_CSS . "/plugin.admin.css", array(), LASSOCRM_VERSION);
		wp_enqueue_script("lassocrm", LASSOCRM_URL_JS . "/plugin.admin.js", array("jquery"), LASSOCRM_VERSION, true);
	}

	/**
	 * Test AJAX call for sending a lead
	 * Uses admin_email as the test email
	 */
	public function ajax_lassocrm_test_lead() {
		$lead = new lassocrm_lead(array(
			"firstName" => "Lasso",
			"lastName" => "Test",
			"emails" => array(
				array(
					"email" => get_option("admin_email"),
					"type" => "Home",
					"primary" => true,
				),
			),
		));
		lassocrm_api::submit_lead($lead, true);
		die;
	}

}