<?php BsWp::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="wrapper">
	<section class="topo-carrossel">
		<div class="wrapper">
			<div class="swiper">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<a href="#"><img src="<?php echo get_template_directory_uri() ?>/img/banners.png" alt=""></a>
					</div>
					<div class="swiper-slide">
						<a href="#"><img src="<?php echo get_template_directory_uri() ?>/img/banner-2.png" alt=""></a>
					</div>
					<div class="swiper-slide">
						<a href="#"><img src="<?php echo get_template_directory_uri() ?>/img/banner-3.png" alt=""></a>
					</div>
				</div>
				<!-- If we need pagination -->
				<div class="swiper-pagination"></div>
				<!-- If we need navigation buttons -->
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
		</div>
	</section>
	<section class="noticias">
		
	</section>
		<h2>NOTÍCIAS</h2>
	<section>
		<h2>VEREADORES</h2>
		<div class="vereadores">
			<?php 
				$args = array(
					'post_type' => 'vereadores',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order' => 'ASC'
				);
				$vereadores = new WP_Query($args);
				
				if ($vereadores->have_posts()) {
						$counter = 0;
						while ($vereadores->have_posts()) {
								$vereadores->the_post();
								$counter++;
								if ($counter % 3 == 1) {
										echo '<div class="vereadores-linha">';
								}
								?>
								<div class="vereador">
										<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
								</div>
								<?php
								if ($counter % 3 == 0) {
										echo '</div>';
								}
						}
						if ($counter % 3 != 0) {
								echo '</div>';
						}
				}
			?>
		</div>
	</section>
</div>

<?php BsWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>
