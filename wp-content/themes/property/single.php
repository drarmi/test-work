<?php
get_header();

?>
<div id="primary">
	<main id="main" class="site-main mt-5" role="main">
		<div class="container">
			<div class="row">
				<section class="col-lg-8 col-md-8 col-sm-12">
					<div class="row">
						<?php
						if (have_posts()) :
							while (have_posts()) : the_post();
								$post_id = get_the_ID();
								get_template_part('template-parts/objects/objects', get_post_format(), array(
									'post_id' => $post_id,
								));
							endwhile;
						endif;
						?>
					</div>
				</section>
				<section class="col-lg-4 col-md-4 col-sm-12">
					<?php echo do_shortcode('[filter_shortcode]'); ?>
				</section>
			</div>

		</div>
	</main>
</div>

<?php

get_footer();
