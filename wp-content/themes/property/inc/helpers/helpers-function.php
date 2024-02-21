<?php

function return_post_img_url($post_id = null, $img_size = 'full')
{
	if ($post_id !== null && $post_id !== '') {
		$post_id = intval($post_id);
	} else {
		$post_id = get_the_ID();
	}

	if (!has_post_thumbnail($post_id)) {
		return null;
	}
	$image_id = get_post_thumbnail_id($post_id);
	$image_url = wp_get_attachment_image_src($image_id, $img_size);
	if ($image_url) {
		return $image_url[0];
	} else {
		return null;
	}
}
