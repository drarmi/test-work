<?php
$post_id = $args["post_id"];
$home_title = get_field("home_title");
$home_location = get_field("home_location", $post_id);
$home_floor = get_field("home_floor", $post_id);
$home_type = get_field("home_type", $post_id);
$home_type = get_field("home_type", $post_id);
$post_title = get_the_title($post_id);
$content = get_the_content($post_id);
$img_url = return_post_img_url($post_id, 'full')
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