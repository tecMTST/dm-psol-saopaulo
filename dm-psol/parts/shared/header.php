<header>
  <nav class="container">
    <div class="navbar navbar-expand-lg align-items-stretch">
      <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/navbar-logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bs-navbar-collapse" aria-controls="bs-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span id="toggler-icon" class="navbar-toggler-icon"></span>
				</button>
        
      </div>
      <div class="collapse navbar-collapse" id="bs-navbar-collapse">
        <?php
						$args = array(
							'theme_location' => 'primary', // Replace with your menu location
							'menu_class'     => 'navbar-nav', // Replace with your menu slug or ID
						);
						wp_nav_menu($args);
					?>
      </div>
    </div>
  </nav>
</header>