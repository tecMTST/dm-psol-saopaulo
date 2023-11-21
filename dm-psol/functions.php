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
	register_nav_menus(array(
		'primary' => 'Menu principal'
	));
	

	add_action( 'wp_enqueue_scripts', 'bootstrap_script_init' );

	function default_theme_nav($menu_location, $menu_class, $menu_id) {
		wp_nav_menu(
			array(
				'theme_location'  => $menu_location, // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
				'menu'            => '', // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
				'container'       => 'div', // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
				'container_class' => '', // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
				// 'container_id'    => $menu_id, // (string) The ID that is applied to the container.
				'menu_class'      => $menu_class, // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
				'menu_id'         => $menu_id, // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
				'echo'            => true, // (bool) Whether to echo the menu or return it. Default true.
				'fallback_cb'     => 'wp_page_menu', // (callable|bool) If the menu doesn't exists, a callback function will fire. Default is 'wp_page_menu'. Set to false for no fallback.
				'before'          => '', // (string) Text before the link markup.
				'after'           => '', // (string) Text after the link markup.
				'link_before'     => '', // (string) Text before the link text.
				'link_after'      => '', // (string) Text after the link text.
				//'items_wrap'      => '<ul>%3$s</ul>', // (string) How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders.
				'item_spacing'      => 'preserve', // (string) Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'. Default 'preserve'.
				'depth'           => 0, // (int) How many levels of the hierarchy are to be included. 0 means all. Default 0.
				'walker'          => '' // (object) Instance of a custom walker class.
			)
		);
	}
	function bootstrap_script_init() {
		wp_register_script('bootstrap', get_template_directory_uri(). '/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true);
		wp_enqueue_script('bootstrap');
		wp_enqueue_script('bootstrap-5.3.1', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', true, null);

		
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery', 'bootstrap' ), '0.0.1', true );
		wp_enqueue_script( 'site' );

		wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css', '', '3.3.7', 'all' );
		wp_enqueue_style( 'bootstrap' );
		wp_enqueue_style('bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css', false, 'all');
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

	function wp_example_excerpt_length( $length ) {
		return 18;
	}
	add_filter( 'excerpt_length', 'wp_example_excerpt_length');

	add_theme_support( 'title-tag' );