<?php
$post_id = $args["post_id"];
$post_title = get_the_title($post_id);
$excerpt = get_the_excerpt($post_id);
$link = get_permalink($post_id);
$img_url = return_post_img_url($post_id, 'middle')
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