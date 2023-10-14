    <section class="vereadores">
        <div class="container">
        <h2 style="text-align:center">VEREADORES DO PSOL SÃO PAULO</h2>
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
        </div>
	</section>