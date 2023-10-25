	<section class="banner-d">
		<div class="container">
		<?php if( have_rows('banner_central', 'option') ): ?>
			<?php while( have_rows('banner_central', 'option') ): the_row(); ?>
			<a href="<?php the_sub_field('link_do_banner'); ?>">
				<img class="only-desktop" src="<?php the_sub_field('banner_desktop'); ?>" alt="Banner principal">
				<img class="only-mobile" src="<?php the_sub_field('banner_mobile'); ?>" alt="Banner principal">
			</a>
			<?php endwhile; ?>
		<?php endif; ?>
		</div>
	</section>