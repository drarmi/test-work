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
		$this->wp_ajax_action('load_more');
	}

	public function get_post()
	{

		if (!isset($_POST['filter_nonce']) || !wp_verify_nonce($_POST['filter_nonce'], 'submit_filter')) {
			wp_send_json_error(__('Invalid security token sent.', 'property-core'));
		}

		$args = array(
			'post_type'      => 'objects',
			'posts_per_page' => 3,
	
		);

		if (!empty($_POST['house_name'])) {
			$args['meta_query'][] = array(
				'key'     => 'home_title',
				'value'   => sanitize_text_field($_POST['house_name']),
				'compare' => 'LIKE'
			);
		}

		if (!empty($_POST['house_floor'])) {
			$args['meta_query'][] = array(
				'key'     => 'home_floor',
				'value'   => intval(sanitize_text_field($_POST['house_floor'])),
				'compare' => '='
			);
		}

		if (!empty($_POST['home_type'])) {
			$home_types = array_map('sanitize_text_field', $_POST['home_type']);
			$args['meta_query'][] = array(
				'key'     => 'home_type',
				'value'   => $home_types,
				'compare' => 'IN'
			);
		}

		$is_archive = intval(sanitize_text_field($_POST['isArchive']));

		$query = new \WP_Query($args);
		$post_count = $query->found_posts;
		
		if ($query->have_posts()) {
			ob_start();
			while ($query->have_posts()) {
				$query->the_post();
				$post_id = get_the_ID();

				if ($is_archive) {
					echo do_shortcode("[archive_card_shortcode id=$post_id]");
				} else {
					echo do_shortcode("[single_card_shortcode id=$post_id]");
				}
			}
			$html = ob_get_clean();
			wp_send_json_success(['html' => $html, 'post_count' => $post_count]);
		} else {
			wp_send_json_error(null);
		}
	}


	public function load_more()
	{

/* 		if (!isset($_POST['filter_nonce']) || !wp_verify_nonce($_POST['filter_nonce'], 'submit_filter')) {
			wp_send_json_error(__('Invalid security token sent.', 'property-core'));
		} */

		$page_no = get_query_var('paged') ? get_query_var('paged') : 1;
		$page_no = !empty($_POST['page']) ? absint($_POST['page']) + 1 : $page_no;
		$args = array(
			'post_type'      => 'objects',
			'posts_per_page' => 3,
			'paged'          => $page_no,
		);

		if (!empty($_POST['house_name'])) {
			$args['meta_query'][] = array(
				'key'     => 'home_title',
				'value'   => sanitize_text_field($_POST['house_name']),
				'compare' => 'LIKE'
			);
		}

		if (!empty($_POST['house_floor'])) {
			$args['meta_query'][] = array(
				'key'     => 'home_floor',
				'value'   => intval(sanitize_text_field($_POST['house_floor'])),
				'compare' => '='
			);
		}

		if (!empty($_POST['home_type'])) {
			$home_types = array_map('sanitize_text_field', $_POST['home_type']);
			$args['meta_query'][] = array(
				'key'     => 'home_type',
				'value'   => $home_types,
				'compare' => 'IN'
			);
		}

		$is_archive = intval(sanitize_text_field($_POST['isArchive']));

		$query = new \WP_Query($args);
		$post_count = $query->found_posts;
		
		if ($query->have_posts()) {
			ob_start();
			while ($query->have_posts()) {
				$query->the_post();
				$post_id = get_the_ID();

				if ($is_archive) {
					echo do_shortcode("[archive_card_shortcode id=$post_id]");
				} else {
					echo do_shortcode("[single_card_shortcode id=$post_id]");
				}
			}
			$html = ob_get_clean();
			wp_send_json_success(['html' => $html, 'post_count' => $post_count]);
		} else {
			wp_send_json_error(null);
		}
	}
}
