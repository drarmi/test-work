<?php

namespace PROPERTY_THEME\Inc;

use PROPERTY_THEME\Inc\Traits\Singleton;

class Assets {
	use Singleton;

	protected function __construct() {
		$this->setup_hooks();
	}
	

	protected function setup_hooks() {
		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
	}

	public function register_styles() {
		// Register styles.
		wp_register_style( 'bootstrap-css', PROPERTY_DIR_URI . '/assets/library/bootstrap/bootstrap.min.css', [], false, 'all' );

		wp_register_style( 'main-css', PROPERTY_DIR_URI . '/assets/css/main.css', ['bootstrap-css'], filemtime( PROPERTY_DIR_PATH . '/assets/css/main.css' ), 'all' );

		// Enqueue Styles.
		wp_enqueue_style( 'bootstrap-css' );
		wp_enqueue_style( 'main-css' );

	}

	public function register_scripts() {
		// Register scripts.
		wp_register_script( 'main-js', PROPERTY_DIR_URI . '/assets/js/main.js', ['jquery'], filemtime( PROPERTY_DIR_PATH . '/assets/js/main.js' ), true );

		wp_register_script( 'bootstrap-js', PROPERTY_DIR_URI . '/assets/library/bootstrap/bootstrap.min.js', ['jquery'], false, true );

		// Enqueue Scripts.
		wp_enqueue_script( 'main-js' );
		wp_enqueue_script( 'bootstrap-js' );


		wp_localize_script( 'main-js', 'siteConfig', [
			'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
		] );
	}
}
