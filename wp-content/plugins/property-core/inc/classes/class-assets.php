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
/* 		// Register styles.
		wp_register_style('postype-rore-css',  PROPEDTY_CORE_DIR_URI . '/assets/dist/css/public.min.css', [], rand(), 'all');

		// Enqueue Styles.
		wp_enqueue_style('postype-rore-css');
 */
	}

	public function register_script()
	{
/* 		// Register scripts.
		wp_register_script('postype-rore-js',  PROPEDTY_CORE_DIR_URI . '/assets/dist/js/public.min.js', ['jquery'], filemtime(PROPEDTY_CORE_DIR_PATH . '/assets/dist/js/public.min.js'), true);
		// Enqueue Scripts.
		wp_enqueue_script('postype-rore-js'); */
	}
}
