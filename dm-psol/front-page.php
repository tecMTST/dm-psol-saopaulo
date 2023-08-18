<?php BsWp::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="wrapper">
	<section>
		<h1>VEREADORES</h1>
		<?php 
			$args = array(
				'post_type' => 'vereadores',
				'posts_per_page' => -1,
				'orderby' => 'title',
				'order' => 'ASC'
			);
			$vereadores = new WP_Query($args);
			
			if ($vereadores->have_posts()) {
				while ($vereadores->have_posts()) {
					$vereadores->the_post();
					?>
					<div class="vereador">
						<h2><?php the_title(); ?></h2>
						<?php the_post_thumbnail(); ?>
					</div>
					<?php
				}
			}
		?>
	</section>
</div>

<?php BsWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>
