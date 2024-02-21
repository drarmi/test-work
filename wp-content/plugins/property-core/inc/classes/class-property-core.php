<?php

namespace PROPERTY\Inc;

use PROPERTY\Inc\Traits\Singleton;

final class Property_Core
{
	use Singleton;

	public function __construct()
	{
		Assets::get_instance();
		Ajax::get_instance();
		Register_Post_Types::get_instance();
		Register_Taxonomies::get_instance();
		Shortcode::get_instance();
		Sidebars::get_instance();
		Filter_Widget::get_instance();
		Shortcode::get_instance();

		$this->setup_hooks();
	}


	protected function setup_hooks()
	{

	}

}
