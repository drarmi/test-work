<?php

namespace PROPERTY\Inc;

use PROPERTY\Inc\Traits\Singleton;

class Assets
{
	use Singleton;

	protected function __construct()
	{
		$this->setup_hooks();
	}

	protected function setup_hooks()
	{

		add_action('wp_enqueue_scripts', array($this, 'register_style'));
		add_action('wp_enqueue_scripts', array($this, 'register_script'));
	}

	public function register_style()
	{
		// Register styles.
		wp_register_style('postype-style',  PROPEDTY_CORE_DIR_URI . '/assets/source/css/public.css', [], rand(), 'all');

		// Enqueue Styles.
		wp_enqueue_style('postype-style');
	}

	public function register_script()
	{
		// Register scripts.
		wp_register_script('postype-script',  PROPEDTY_CORE_DIR_URI . '/assets/source/js/public.js', ['jquery', 'validate'], filemtime(PROPEDTY_CORE_DIR_PATH . '/assets/source/js/public.js'), true);
		// Enqueue Scripts.
		$data = array(
			"ajaxurl" => admin_url("admin-ajax.php"),
		);

		wp_register_script('validate',  PROPEDTY_CORE_DIR_URI . '/assets/source/library/validate/jquery.validate.js', ['jquery'], '1.19.5', true);
	
		wp_localize_script("postype-script", "script_data", $data);

		wp_enqueue_script('validate');
		wp_enqueue_script('postype-script');
	}
}
