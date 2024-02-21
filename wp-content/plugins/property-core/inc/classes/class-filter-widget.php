<?php

namespace PROPERTY\Inc;

use WP_Widget;

use PROPERTY\Inc\Traits\Singleton;

class Filter_Widget extends WP_Widget
{

	use Singleton;

	public function __construct()
	{
		parent::__construct(
			'filter_widget',
			'Custom filter',
			['description' => __('Custom filter', 'property-core'),]
		);
	}

	public function widget($args, $instance)
	{
		echo $args['before_widget'];
		require_once PROPEDTY_CORE_DIR_PATH . 'template-parts/filter.php';
		echo $args['after_widget'];
	}
}
