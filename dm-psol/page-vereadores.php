<?php
/** 
 * * Template Name: Vereadores 
 * 
 * 
 * @package dm-psol 
*/

BsWp::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<main class="container">
		<div class="text-center vereadores-title">
			<?php
			$vereadores_page = get_page_by_path('vereadores-sp');
			if ($vereadores_page) {
				$vereadores_content = $vereadores_page->post_content;
				echo apply_filters('the_content', $vereadores_content);
			}
			?>
		</div>
	<section class="vereadores-linha ver container">
		<?php
			if (have_rows('vereador', $vereadores_page)) {
				while (have_rows('vereador', $vereadores_page)) : the_row();
					$image = get_sub_field('imagem');
					$nome = get_sub_field('nome');
					$texto = get_sub_field('texto');
					echo '<div class="row">';
							echo '<div class="col-sm-2 vereador">';
								echo '<img src="' . $image . '" alt="">';
							echo '</div>';
							echo '<div class="col-sm-8">';
								echo '<h2>'. $nome .'</h2>';
								echo '<p class="vereador-p">'. $texto .'</p>';											

					if (have_rows('sociais')) {
						echo '<ul class="nav flex-nowrap">';
						while (have_rows('sociais')) : the_row();
							$icone = get_sub_field('icone');
							$link = get_sub_field('link');
							echo '<li>';
								echo '<a href="' . $link . '">';
									echo '<img src="' . $icone . '">';
								echo '</a>';
							echo '</li>';
						endwhile;
						echo '</ul>'; // Close the list
					}
					echo '</div>';
					echo '</div>';
				endwhile;
			}
		?>
	</section>
</main>


<?php BsWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
