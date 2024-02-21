<?php
namespace PROPERTY\Inc;

use PROPERTY\Inc\Traits\Singleton;

class Sidebars {

	use Singleton;

	protected function __construct() {
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		add_action( 'widgets_init', [ $this, 'register_sidebars' ] );
		add_action( 'widgets_init', [ $this, 'register_widget' ] );

	}

	public function register_sidebars() {

		register_sidebar(
			[
				'name'          => esc_html__( 'Sidebar', 'property-core' ),
				'id'            => 'sidebar-1',
				'description'   => '',
				'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);

	}

	public function register_widget() {
		register_widget( 'PROPERTY\Inc\Filter_Widget' );
	}

}
