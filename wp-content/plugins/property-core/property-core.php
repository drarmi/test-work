<?php

/**
 * Plugin Name: Rroperty core
 * Description: This plugin adds a custom "Post type" "Taxonomy".
 * Plugin URI: www.linkedin.com/in/artur-drohalchuk-4013b425a
 * Author: Drohalchuk Artur
 * Version: 1.0.0
 * Author URI: www.linkedin.com/in/artur-drohalchuk-4013b425a
 * Text Domain: property-core
* Domain Path: /languages
 */

if (!defined('ABSPATH')) {
	exit;
}

if (!defined('PROPEDTY_CORE_DIR_PATH')) {
	define('PROPEDTY_CORE_DIR_PATH', plugin_dir_path(__FILE__));
}

if (!defined('PROPEDTY_CORE_DIR_URI')) {
	define('PROPEDTY_CORE_DIR_URI', untrailingslashit(plugins_url('/', __FILE__)));
}


require_once PROPEDTY_CORE_DIR_PATH . '/inc/helpers/autoloader.php';

function property_core_plugin_get_instance()
{
	\PROPERTY\Inc\Property_Core::get_instance();
}

property_core_plugin_get_instance();
