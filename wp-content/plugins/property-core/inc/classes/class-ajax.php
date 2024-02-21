<?php
namespace PROPERTY\Inc;

use PROPERTY\Inc\Traits\Singleton;

class Ajax
{
	use Singleton;

	public function __construct()
	{
		$this->setup_ajax_handlers();
	}

	public function wp_ajax_action($action)
	{
		add_action('wp_ajax_' . $action, [$this, $action]);
		add_action('wp_ajax_nopriv_' . $action, [$this, $action]);
	}

	public function setup_ajax_handlers()
	{
		$this->wp_ajax_action('get_post');

	}
	
	public function get_post()
	{
		if (!wp_verify_nonce($_POST['filter_nonce'], 'submit_filter')) {
			wp_send_json_error(__('Invalid security token sent.', 'search-page-domain'));
			wp_die('0', 400);
		}

		$args = array(
			'post_type' => 'objects',
			'posts_per_page' => -1 
		);

		if (!empty($_POST['house_name'])) {
			$args['meta_query'][] = array(
				'key' => 'home_title',
				'value' => sanitize_text_field($_POST['house_name']),
				'compare' => 'LIKE'
			);
		}

		if (!empty($_POST['house_floor'])) {
			$args['meta_query'][] = array(
				'key' => 'home_floor',
				'value' => intval(sanitize_text_field($_POST['house_floor'])),
				'compare' => '='
			);
		}

		if (!empty($_POST['home_type'])) {
			$args['meta_query'][] = array(
				'key' => 'home_type',
				'value' => sanitize_text_field($_POST['home_type']),
				'compare' => '='
			);
		}


		$query = new WP_Query($args);

		if ($query->have_posts()) :

		endif;

		wp_reset_postdata($query);


		
		


	}
}

