<?php

namespace PROPERTY\Inc;

use PROPERTY\Inc\Traits\Singleton;

class Register_Post_Types {
	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'init', [ $this, 'create_object_cpt' ], 0 );

	}

	public function create_object_cpt() {
		$labels = [
			'name'                  => _x( 'Объекты', 'Общее название типа записи', 'property-core' ),
			'singular_name'         => _x( 'Объект', 'Единственное название типа записи', 'property-core' ),
			'menu_name'             => _x( 'Объекты', 'Текст в административном меню', 'property-core' ),
			'name_admin_bar'        => _x( 'Объект', 'Добавить новый на панели инструментов', 'property-core' ),
			'archives'              => __( 'Архивы объектов', 'property-core' ),
			'attributes'            => __( 'Атрибуты объектов', 'property-core' ),
			'parent_item_colon'     => __( 'Родительский объект:', 'property-core' ),
			'all_items'             => __( 'Все объекты', 'property-core' ),
			'add_new_item'          => __( 'Добавить новый объект', 'property-core' ),
			'add_new'               => __( 'Добавить', 'property-core' ),
			'new_item'              => __( 'Новый объект', 'property-core' ),
			'edit_item'             => __( 'Редактировать объект', 'property-core' ),
			'update_item'           => __( 'Обновить объект', 'property-core' ),
			'view_item'             => __( 'Просмотреть объект', 'property-core' ),
			'view_items'            => __( 'Просмотреть объекты', 'property-core' ),
			'search_items'          => __( 'Поиск объекта', 'property-core' ),
			'not_found'             => __( 'Не найдено', 'property-core' ),
			'not_found_in_trash'    => __( 'Не найдено в корзине', 'property-core' ),
			'featured_image'        => __( 'Изображение объекта', 'property-core' ),
			'set_featured_image'    => __( 'Выбрать изображение', 'property-core' ),
			'remove_featured_image' => __( 'Удалить изображение', 'property-core' ),
			'use_featured_image'    => __( 'Использовать как изображение объекта', 'property-core' ),
			'insert_into_item'      => __( 'Вставить в объект', 'property-core' ),
			'uploaded_to_this_item' => __( 'Загружено для этого объекта', 'property-core' ),
			'items_list'            => __( 'Список объектов', 'property-core' ),
			'items_list_navigation' => __( 'Навигация по списку объектов', 'property-core' ),
			'filter_items_list'     => __( 'Фильтровать список объектов', 'property-core' ),
		];
		
		$args   = [
			'label'               => __( 'Объекты', 'property-core' ),
			'description'         => __( 'Объекты', 'property-core' ),
			'labels'              => $labels,
			'menu_icon'           => 'dashicons-welcome-widgets-menus',
			'supports'            => [
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'revisions',
				'author',
				'comments',
				'trackbacks',
				'page-attributes',
				'custom-fields',
			],
			'taxonomies'          => [],
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'hierarchical'        => false,
			'exclude_from_search' => false,
			'show_in_rest'        => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		];
	
		register_post_type( 'objects', $args );
	}
}
