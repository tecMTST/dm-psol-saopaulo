    <section class="noticias">
        <div class="container">
            <a href="/noticias"><h2>ÚLTIMAS PUBLICAÇÕES</h2></a>
            <?php $new_query = new WP_Query( array(
                'posts_per_page' => 9999,
                'post_type'      => 'post'
            ) ); ?>
            
            
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php if (  $new_query->have_posts() ): ?>
                    <?php $i = 0; ?>
                    <?php while (  $new_query->have_posts() ) :  $new_query->the_post(); ?>
                    <div class="swiper-slide">
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
                    <?php endif; ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
            
        </div>
	</section>