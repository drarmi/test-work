<?php
get_header();

?>
<div id="primary">
	<main id="main" class="site-main my-5" role="main">
		<div class="container">
			<div class="row">
				<section class="col-lg-8 col-md-8 col-sm-12">
					<div class="row">
						<?php
						global $wp_query;

						if ($wp_query->have_posts()) :
							while ($wp_query->have_posts()) : $wp_query->the_post();
								$post_id = get_the_ID();
								
								get_template_part('template-parts/archive/card', get_post_format(), array(
									'post_id' => $post_id,
								));
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

		</div>
	</main>
</div>

<?php

get_footer();
