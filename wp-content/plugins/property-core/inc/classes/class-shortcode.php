<?php

namespace PROPERTY\Inc;

use PROPERTY\Inc\Traits\Singleton;

class Shortcode
{

	use Singleton;

	protected function __construct()
	{
		$this->setup_hooks();
	}

	protected function setup_hooks()
	{
		/**
		 * Usage echo do_shortcode('[filter_shortcode]');
		 */
		add_shortcode('filter_shortcode', [$this, 'filter_object']);
	}
	public function filter_object()
	{
		ob_start();

		require_once PROPEDTY_CORE_DIR_PATH . 'template-parts/filter.php';

		$html_form = ob_get_clean();
		return $html_form;
	}
}
