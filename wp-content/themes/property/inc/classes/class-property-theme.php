<?php

namespace PROPERTY_THEME\Inc;

use PROPERTY_THEME\Inc\Traits\Singleton;

class PROPERTY_THEME
{
	use Singleton;

	protected function __construct()
	{
		Assets::get_instance();
		Menus::get_instance();

		$this->setup_hooks();
	}

	protected function setup_hooks()
	{
		add_action('after_setup_theme', [$this, 'setup_theme']);
	}

	public function setup_theme()
	{
		add_theme_support('title-tag');

		add_theme_support(
			'custom-logo',
			[
				'header-text' => [
					'site-title',
					'site-description',
				],
				'height'      => 100,
				'width'       => 400,
				'flex-height' => true,
				'flex-width'  => true,
			]
		);

		add_theme_support('post-thumbnails');

		add_theme_support('post-formats', array('aside', 'gallery'));

		add_image_size('featured-thumbnail', 350, 233, true);

		add_theme_support('customize-selective-refresh-widgets');

		add_theme_support('automatic-feed-links');

		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			]
		);
	}
}
