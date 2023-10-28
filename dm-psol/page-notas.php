<?php BsWp::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php $new_query = new WP_Query( array(
        'posts_per_page' => 12,
        'post_type'      => 'nota'
    ) ); ?>
    <section class="notas">
        <div class="container">
            <h2>NOTAS</h2>
            <?php if ( $new_query->have_posts() ): ?>
            <div class="row">
                <?php while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
                <div class="col-md-4">
                    <a class="cards" href="<?php the_permalink(); ?>">
                        <div class="card-noticias card-notas">
                            <div class="content-card">
                                <div class="title-news">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                                <div class="excerpt">
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
	</section>

    <?php BsWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>