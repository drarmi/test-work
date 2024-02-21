<?php

namespace PROPERTY\Inc;

use PROPERTY\Inc\Traits\Singleton;

class Register_Taxonomies
{
	use Singleton;

	protected function __construct()
	{
		$this->setup_hooks();
	}

	protected function setup_hooks()
	{
		add_action('init', [$this, 'create_district_taxonomy']);
	}

	public function create_district_taxonomy()
	{
		$labels = [
			'name'                       => _x('Райони', 'загальне ім\'я таксономії', 'property-core'),
			'singular_name'              => _x('Район', 'taxonomy singular name', 'property-core'),
			'search_items'               => __('Пошук районів', 'property-core'),
			'all_items'                  => __('Всі райони', 'property-core'),
			'parent_item'                => __('Батьківський район', 'property-core'),
			'parent_item_colon'          => __('Батьківський район:', 'property-core'),
			'edit_item'                  => __('Редагувати район', 'property-core'),
			'update_item'                => __('Оновити район', 'property-core'),
			'add_new_item'               => __('Додати новий район', 'property-core'),
			'new_item_name'              => __('Назва нового району', 'property-core'),
			'menu_name'                  => __('Район', 'property-core'),
		];
		$args   = [
			'labels'                     => $labels,
			'description'                => __('Таксономія Районів', 'property-core'),
			'hierarchical'               => true,
			'public'                     => true,
			'publicly_queryable'         => true,
			'show_ui'                    => true,
			'show_in_menu'               => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_quick_edit'         => true,
			'show_admin_column'          => true,
			'show_in_rest'               => true,
		];

		register_taxonomy('district', ['objects'], $args);
	}
}
