<nav class="navbar">
  <div class="wrapper">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/img/navbar-logo.png" alt="Logo">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
      <?php
        wp_nav_menu( array(
            'menu'              => 'primary',
            'theme_location'    => 'primary',
            'depth'             => 1,
            'container'         => false,
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
        );
        ?>
    </div>
  </div>
</nav>