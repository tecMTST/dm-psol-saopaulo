<?php BsWp::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section class="noticias">
        <div class="container">
            <h2>PUBLICAÇÕES</h2>
            <?php $new_query = new WP_Query( array(
                'posts_per_page' => 4,
                'post_type'      => 'post'
            ) ); ?>
            <?php if (  $new_query->have_posts() ): ?>
            <?php $i = 0; ?>
            <div class="row">
                <?php while (  $new_query->have_posts() ) :  $new_query->the_post(); ?>
                <div class="col-md-6 col-lg-3">
                    <a class="cards" href="<?php the_permalink(); ?>">
                        <div class="card-noticias">
                            <div class="thumbnail-noticias" style="background:url(<?php the_post_thumbnail_url(); ?>);background-size:cover;background-position:center;">
                            </div>
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
                
                <?php $i++; ?>
                <?php endwhile; ?>
            </div>
            
            <?php endif; ?>
           
        </div>
        <?php wp_pagenavi( array( 'type' => 'multipart' ) ); ?>
	</section>

<?php BsWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>
