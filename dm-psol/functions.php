<?php
	require_once( 'external/bootstrap-utilities.php' );
	require_once( 'external/wp_bootstrap_navwalker.php' );
	
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

	add_theme_support('post-thumbnails');
	register_nav_menus(array('primary' => 'Menu principal'));
	

	add_action( 'wp_enqueue_scripts', 'bootstrap_script_init' );
	function bootstrap_script_init() {
		wp_register_script('bootstrap', get_template_directory_uri(). '/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true);
		wp_enqueue_script('bootstrap');
		
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery', 'bootstrap' ), '0.0.1', true );
		wp_enqueue_script( 'site' );

		wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css', '', '3.3.7', 'all' );
		wp_enqueue_style( 'bootstrap' );
		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', array(), 'screen' );
		wp_enqueue_style( 'screen' );
	}

	add_filter( 'body_class', array( 'BsWp', 'add_slug_to_body_class' ) );


	add_filter('the_generator', 'theme_remove_version');
	function theme_remove_version() {
		return '';
	}
	
	add_filter('admin_footer_text', 'remove_footer_admin');
	function remove_footer_admin () {
        echo "";
  }
     
	add_action('wp_before_admin_bar_render', 'wp_logo_admin_bar_remove', 0);
	function wp_logo_admin_bar_remove() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('wp-logo');
	}
	
	
	function bootstrap_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>
		<li class="media">
			<div class="media-left">
				<?php echo get_avatar( $comment ); ?>
			</div>
			<div class="media-body">
				<h4 class="media-heading">
					<?php comment_author_link() ?>
				</h4>
				<time>
					<a href="#comment-<?php comment_ID() ?>" pubdate>
						<?php comment_date() ?> at <?php comment_time() ?>
					</a>
				</time>
				<?php comment_text() ?>
			</div>
		<?php endif;
	}

	add_action('init', 'vereadores_register');
	function vereadores_register() {
    $labels = array(
        'name'                  => __('Vereadores'),
        'singular_name'         => __('Vereador'),
        'add_new'               => __('Novo vereador'),
        'add_new_item'          => __('Novo vereador'),
        'edit_item'             => __('Editar vereador'),
        'new_item'              => __('Novo vereador'),
        'view_item'             => __('Ver vereador'),
        'search_items'          => __('Procurar vereador'),
        'not_found'             => __('Nenhum resultado'),
        'not_found_in_trash'    => __('Nenhum resultado'),
        'parent_item_colon'     => '',
        'menu_name'             => __('Vereadores')
    );
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'show_ui'               => true,
        'capability_type'       => 'post',
        'hierarchical'          => true,
        'rewrite'               => array('slug' => 'vereadores'),
        'supports'              => array('title', 'thumbnail'),
        'menu_position'         => null,
        'menu_icon'             => 'dashicons-groups'
    );
    register_post_type('vereadores', $args);
	}