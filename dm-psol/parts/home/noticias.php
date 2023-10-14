    <section class="noticias">
        <div class="container">
            <h2>NOTÍCIAS</h2>
            <?php if ( have_posts() ): ?>
            <?php $i = 0; ?>
            <div class="row">
                <?php while ( have_posts() && $i < 4 ) : the_post(); ?>
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
	</section>