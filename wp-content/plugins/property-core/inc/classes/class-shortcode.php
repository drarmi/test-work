<?php

namespace PROPERTY\Inc;

use PROPERTY\Inc\Traits\Singleton;

class Shortcode
{

	use Singleton;

	protected function __construct()
	{
		$this->setup_hooks();
	}

	protected function setup_hooks()
	{
		/**
		 * Usage echo do_shortcode('[filter_shortcode]');
		 */
		add_shortcode('filter_shortcode', [$this, 'filter_object']);

		/**
		 * Usage echo do_shortcode("[archive_card_shortcode id=$post_id]");
		 */
		add_shortcode('archive_card_shortcode', [$this, 'archive_card']);


		/**
		 * Usage echo do_shortcode("[single_card_shortcode id=$post_id]");
		 */
		add_shortcode('single_card_shortcode', [$this, 'single_card']);
	}
	public function filter_object()
	{
		ob_start();

		require_once PROPEDTY_CORE_DIR_PATH . 'template-parts/filter.php';

		$html_form = ob_get_clean();
		return $html_form;
	}


	public function archive_card($atts)
	{
		$atts = shortcode_atts(array(
			'id' => 0,
		), $atts);

		ob_start();

		$post_id = $atts['id'];
		$post_title = get_the_title($post_id);
		$excerpt = get_the_excerpt($post_id);
		$link = get_permalink($post_id);
		$img_url = "";
		if (function_exists("return_post_img_url")) {
			$img_url = return_post_img_url($post_id, 'middle');
		}

?>

		<div class="col-lg-4 col-md-6 col-sm-12">
			<h4><?php echo esc_html($post_title) ?></h4>
			<div>
				<img src="<?php echo esc_url($img_url) ?>" alt="">
			</div>
			<div>
				<?php echo wp_kses_post($excerpt) ?>
			</div>
			<div>
				<a href="<?php echo esc_url($link) ?>" class="btn btn-primary"><?php esc_html_e("Читать далее", "property") ?></a>
			</div>
		</div>
	<?php
		$html_form = ob_get_clean();
		return $html_form;
	}



	public function single_card($atts)
	{
		$atts = shortcode_atts(array(
			'id' => 0,
		), $atts);

		ob_start();

		$post_id = $atts['id'];

		$home_title = get_field("home_title");
		$home_location = get_field("home_location", $post_id);
		$home_floor = get_field("home_floor", $post_id);
		$home_type = get_field("home_type", $post_id);
		$home_type = get_field("home_type", $post_id);
		$post_title = get_the_title($post_id);
		$content = get_the_content($post_id);

		if (function_exists("return_post_img_url")) {
			$img_url = return_post_img_url($post_id, 'full');
		}

	?>
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h1>
				<?php echo esc_html($post_title); ?>
			</h1>
			<div class="row">
				<div class="col-lg-8 col-md-6 col-sm-12">
					<div>
						<img src="<?php echo esc_url($img_url) ?>" alt="">
					</div>
					<?php echo wp_kses_post($content); ?>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<p><?php printf(__('Название дома: %s', 'property'), esc_html($home_title)); ?></p>
					<p><?php printf(__('Местонахождение: %s', 'property'), esc_html($home_location)); ?></p>
					<p><?php printf(__('Количество этажей: %s', 'property'), esc_html($home_floor)); ?></p>
					<p><?php printf(__('Тип строения: %s', 'property'), esc_html($home_type)); ?></p>
				</div>
			</div>

		</div>
<?php
		$html_form = ob_get_clean();
		return $html_form;
	}
}
