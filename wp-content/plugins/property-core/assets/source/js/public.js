(function ($) {
	let ajaxurl = script_data?.ajaxurl;

	$.validator.addMethod("customRule", function (value, element) {
		return !value || (value > 0 && value <= 18);
	}, "Введіть коректний поверх від 1 по 18");


	$("#search-form-custom").validate({
		rules: {
			house_floor: {
				customRule: true
			}
		},
		submitHandler: function (form) {
			var $contentWrappre = $(".content-wrapper");
			var $singleContentWrappre = $(".single-content-wrapper");
			var $controlArcive = $(".control-arcive");
			var $newElement = createdBtnLoadMore();
			var isArchive = $contentWrappre.length;
			var formData = new FormData(form);
			formData.append('action', 'get_post');
			formData.append('isArchive', isArchive);

			$.ajax({
				url: ajaxurl,
				type: 'POST',
				data: formData,
				contentType: false,
				processData: false,
				success: function (response) {
					if (response.data != null) {
						if (isArchive) {
							$newElement.attr('data-max-page', response.data.post_count);
							$contentWrappre.empty();
							$controlArcive.empty();
							if(response.data.post_count > 3){
								$controlArcive.append($newElement);
							}
							$contentWrappre.append(response.data.html);
						} else {
							$singleContentWrappre.empty();
							$singleContentWrappre.append(response.data.html);
						}
					}
				},
				error: function (error) {
					console.error(error);
				}
			});
			return false;
		}
	});


	$(document).on("click", ".loadmore.btn", function () {
		var $contentWrappre = $(".content-wrapper");
		var isArchive = $contentWrappre.length;
		var houseNameValue = $(this).data('house-name');
		var houseFloorValue = $(this).data('house-floor');
		var homeTypeValues = $(this).data('home-types').split(',');
		var page = $(this).data('page');

		var formData = new FormData();
		formData.append('action', 'load_more');
		formData.append('page', page);
		formData.append('home-types', homeTypeValues);
		formData.append('house-name', houseNameValue);
		formData.append('house-floor', houseFloorValue);
		formData.append('isArchive', isArchive);

		$.ajax({
			url: ajaxurl,
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			success: function (response) {

				if (response.data != null) {
					if (isArchive) {
						$(".loadmore.btn").data('page', page + 1);
						$contentWrappre.append(response.data.html);
						removeBtnLoadMore(".loadmore.btn");
					} else {

					}
				}

			},
			error: function (error) {
				console.error(error);
			}
		});
		return false;
	})

	function removeBtnLoadMore(btn) {
		var maxPage = $(btn).data('max-page');
		var countElement = $(".row.content-wrapper>div").length;

		if (maxPage <= countElement) {
			$(btn).hide();
		}
	}

	function createdBtnLoadMore() {
		var $newElement = $("<div></div>").addClass("loadmore btn btn-primary").text("Load More").attr("data-page", "1");
		var houseNameValue = $('#house_name').val();
		var houseFloorValue = $('#house_floor').val();
		var homeTypeValues = [];
		$('input[name="home_type[]"]:checked').each(function () {
			homeTypeValues.push($(this).val());
		});
		$newElement.attr('data-house-name', houseNameValue);
		$newElement.attr('data-house-floor', houseFloorValue);
		$newElement.attr('data-home-types', homeTypeValues.join(','));

		return $newElement;
	}


})(jQuery);
