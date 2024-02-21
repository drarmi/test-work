<form id="search-form-custom">
	<div class="mb-3">
		<label for="house_name" class="form-label"><?php esc_html_e("Название дома", "property-core") ?></label>
		<input type="text" class="form-control" id="house_name" name="house_name">
	</div>
	<div class="mb-3">
		<label for="house_floor" class="form-label"><?php esc_html_e("Этаж", "property-core") ?></label>
		<input type="number" class="form-control" id="house_floor" name="house_floor">
	</div>

	<div class="mb-3 form-check">
		<input type="checkbox" class="form-check-input" id="type_check1" name="home_type[]" value="panel">
		<label class="form-check-label" for="type_check1"><?php esc_html_e("Панель", "property-core") ?></label>
	</div>
	<div class="mb-3 form-check">
		<input type="checkbox" class="form-check-input" id="type_check2" name="home_type[]" value="brick">
		<label class="form-check-label" for="type_check2"><?php esc_html_e("Кирпич", "property-core") ?></label>
	</div>
	<div class="mb-3 form-check">
		<input type="checkbox" class="form-check-input" id="type_check3" name="home_type[]" value="block">
		<label class="form-check-label" for="type_check3"><?php esc_html_e("Пеноблок", "property-core") ?></label>
	</div>
	<?php
	wp_nonce_field('submit_filter', 'filter_nonce');
	?>

	<button type="submit" class="btn btn-primary"><?php esc_html_e("Поиск", "property-core") ?></button>
</form>
