<?php
get_header();

?>
<div id="primary">
	<main id="main" class="site-main my-5" role="main">
		<div class="container">
			<div class="row">
				<section class="col-lg-8 col-md-8 col-sm-12">
					<div class="row content-wrapper">
						<?php
						global $wp_query;

						if ($wp_query->have_posts()) :
							while ($wp_query->have_posts()) : $wp_query->the_post();
								$post_id = get_the_ID();
								echo do_shortcode("[archive_card_shortcode id=$post_id]");
							endwhile;
						endif;
						?>
					</div>
				</section>
				<section class="col-lg-4 col-md-4 col-sm-12">
					<?php if (is_active_sidebar('sidebar-1')) { ?>
						<aside>
							<?php dynamic_sidebar('sidebar-1'); ?>
						</aside>
					<?php } ?>
				</section>
			</div>
			<div class="row control-arcive">
				<?php custom_pagination(); ?>
			</div>

		</div>
	</main>
</div>

<?php

get_footer();
