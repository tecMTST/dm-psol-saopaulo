<?php BsWp::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="content">
	<?php while ( have_posts() ) : the_post(); ?>
	
		<div class="container">
			<h2>
				<?php the_title(); ?>
			</h2>
			<?php the_content(); ?>
		</div>

	<?php endwhile; ?>
</div>

<?php BsWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
