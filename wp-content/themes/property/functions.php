<?php

if ( ! defined( 'PROPERTY_DIR_PATH' ) ) {
	define( 'PROPERTY_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'PROPERTY_DIR_URI' ) ) {
	define( 'PROPERTY_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once PROPERTY_DIR_PATH . '/inc/helpers/autoloader.php';

require_once PROPERTY_DIR_PATH . '/inc/helpers/helpers-function.php';

function property_get_theme_instance() {
	\PROPERTY_THEME\Inc\PROPERTY_THEME::get_instance();
}

property_get_theme_instance();



