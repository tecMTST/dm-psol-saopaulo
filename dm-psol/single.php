<?php BsWp::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<main>
		<div class="container">
		
			<h2>
				<?php the_title(); ?>
			</h2>

			<?php if (has_post_thumbnail( $post->ID ) ): ?>
				<div class="thumbnail-post">
					<img src="<?php the_post_thumbnail_url(); ?>" alt="Imagem do post">
					<p><?php the_post_thumbnail_caption(); ?></p>
				</div>
			<?php endif; ?>
			
			<div class="content">
				<?php the_content(); ?>
			</div>
		
		</div>
	</main>
<?php endwhile; ?>

<?php BsWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
