<?php
/**
 * Test-paper functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Test-paper
 */

if ( ! function_exists( 'test_paper_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function test_paper_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Test-paper, use a find and replace
		 * to change 'test-paper' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'test-paper', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'test-paper' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'test_paper_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		add_theme_support( 'custom-footer-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'test_paper_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function test_paper_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'test_paper_content_width', 640 );
}
add_action( 'after_setup_theme', 'test_paper_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function test_paper_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'test-paper' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'test-paper' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'test_paper_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function test_paper_scripts() {
	wp_enqueue_style( 'test-paper-style', get_stylesheet_uri() );

	wp_enqueue_script( 'test-paper-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'test-paper-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'test_paper_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* theme css & js */
function theme_js_css() {
	wp_enqueue_style( 'owl-carousal-min', get_template_directory_uri() . '/css/owl.carousel.min.css',false,'1.1','all');
	wp_enqueue_style( 'owl-carousal-default-min', get_template_directory_uri() . '/css/owl.theme.default.min.css',false,'1.1','all'); 
    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    
    wp_enqueue_script( 'owl-carousal-script', get_template_directory_uri() . '/js/owl.carousel.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'owl-carousal-script-min', get_template_directory_uri() . '/js/owl.carousel.min.js', array ( 'jquery' ), 1.1, true); 
	/* add custom js */
    wp_enqueue_script( 'custom-theme', get_template_directory_uri() . '/js/custom.js', array ( 'jquery' ), 1.1, true);
	$translation_array = array( 'templateUrl' => get_template_directory_uri() );
	wp_localize_script( 'custom-theme', 'object_name', $translation_array );
}
add_action( 'wp_enqueue_scripts', 'theme_js_css' );

/* Custom theme option */

// create custom plugin settings menu
add_action('admin_menu', 'custom_theme_admin_option_menu');

function custom_theme_admin_option_menu() {
	add_menu_page('Theme Option', 'Theme Option Settings', 'administrator', __FILE__, 'theme_option_settings_page' );
	add_action( 'admin_init', 'register_theme_option_settings' );
}


function register_theme_option_settings() {
	register_setting( 'theme_option_settings-group', 'footer-menu' );
	register_setting( 'theme_option_settings-group', 'footer_logo' );
}
 
function theme_option_settings_page() {
?>
	<div class="wrap">
		<h1> <?php echo "Test"; ?></h1>

		<form method="post" action="options.php">
			
			<?php settings_fields( 'theme_option_settings-group' ); ?>
			<?php do_settings_sections( 'theme_option_settings-group' ); ?>
			<table class="form-table">
				 
				<tr valign="top">
					<th scope="row"><?php echo "Footer content";?></th>
					<td><input type="text" name="footer_content" value="<?php echo esc_attr( get_option('footer_content') ); ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><?php echo "Footer content";?></th>
					<td><input id="upload_image" type="text" size="36" name="footer_logo" value="<?php echo esc_attr( get_option('footer_logo') ); ?>" />
						<input id="upload_image_button" class="button" type="button" value="Upload Image" />
					</td>
				</tr>
			</table>
			
			<?php submit_button(); ?>

		</form>
	</div>
<?php }

/* footer memu */
function register_my_menu() {
  register_nav_menu('footer-menu',__( 'Footer menu' ));
}
add_action( 'init', 'register_my_menu' );

/* footer widget */
register_sidebar( array(
	'name' => 'Footer Sidebar 1',
	'id' => 'footer-sidebar-1',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );
register_sidebar( array(
	'name' => 'Footer Sidebar 2',
	'id' => 'footer-sidebar-2',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => 'Footer Sidebar 3',
	'id' => 'footer-sidebar-3',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => 'Footer Sidebar 4',
	'id' => 'footer-sidebar-4',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );


function news_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'News', 'Post Type General Name', 'test-paper' ),
        'singular_name'       => _x( 'News', 'Post Type Singular Name', 'test-paper' ),
        'menu_name'           => __( 'News', 'test-paper' ),
        'parent_item_colon'   => __( 'Parent News', 'test-paper' ),
        'all_items'           => __( 'All News', 'test-paper' ),
        'view_item'           => __( 'View News', 'test-paper' ),
        'add_new_item'        => __( 'Add New News', 'test-paper' ),
        'add_new'             => __( 'Add New', 'test-paper' ),
        'edit_item'           => __( 'Edit News', 'test-paper' ),
        'update_item'         => __( 'Update News', 'test-paper' ),
        'search_items'        => __( 'Search News', 'test-paper' ),
        'not_found'           => __( 'Not Found', 'test-paper' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'test-paper' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'news', 'test-paper' ),
        'description'         => __( 'News news and reviews', 'test-paper' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'news', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'news_post_type', 0 );

function project_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Project', 'Post Type General Name', 'test-paper' ),
        'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'test-paper' ),
        'menu_name'           => __( 'Project', 'test-paper' ),
        'parent_item_colon'   => __( 'Parent Project', 'test-paper' ),
        'all_items'           => __( 'All Project', 'test-paper' ),
        'view_item'           => __( 'View Project', 'test-paper' ),
        'add_new_item'        => __( 'Add New Project', 'test-paper' ),
        'add_new'             => __( 'Add New', 'test-paper' ),
        'edit_item'           => __( 'Edit Project', 'test-paper' ),
        'update_item'         => __( 'Update Project', 'test-paper' ),
        'search_items'        => __( 'Search Project', 'test-paper' ),
        'not_found'           => __( 'Not Found', 'test-paper' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'test-paper' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'project', 'test-paper' ),
        'description'         => __( 'News news and reviews', 'test-paper' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'project', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'project_post_type', 0 );

/* News widget */


function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 

class wpb_widget extends WP_Widget {
 
		function __construct() {
			parent::__construct(
			'wpb_widget', 
			__('News Recent Post', 'test-paper'), 
 
				array( 'description' => __( 'Project Recent Post', 'test-paper' ), ) 
			);
		}
 
		public function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', $instance['title'] );
 
			echo $args['before_widget'];
			if ( ! empty( $title ) )
				echo $args['before_title'] . $title . $args['after_title'];

				
				$the_query = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => '3' ) );
                
				// The Loop
                ?> <ul class="news-list-main"> <?php 
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
					?><li><a href="<?php echo the_permalink();?>"><?php echo the_title();?></a></li>
			    <?php endwhile; ?>
                </ul>
				<?php echo $args['after_widget'];
		}
         

	    public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = __( 'New title', 'wpb_widget_domain' );
			}

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
		}
     
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			return $instance;
		}
}

function wpb_load_widget_project() {
    register_widget( 'wpb_widget_project' );
}
add_action( 'widgets_init', 'wpb_load_widget_project' );
 
/* project Recent */
class wpb_widget_project extends WP_Widget {
 
		function __construct() {
			parent::__construct(
			'wpb_widget_project', 
			__('Project Recent Post', 'test-paper'), 
 
				array( 'description' => __( 'Project Recent Post', 'test-paper' ), ) 
			);
		}
 
		public function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', $instance['title'] );
 
			echo $args['before_widget'];
			if ( ! empty( $title ) )
				echo $args['before_title'] . $title . $args['after_title'];

				//echo __( 'Hello, World!', 'test-paper' );
				$the_query = new WP_Query( 
						array( 
							'post_type'      => 'project', 
							'posts_per_page' => '3', 
                            'order'		     => 'asc',
						) 
				);
                ?> <ul class="project-list-main"> <?php
				// The Loop
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
					?>
					<div class="project-widget">
						<li><a href="<?php echo the_permalink();?>"><?php echo the_post_thumbnail();?></a></li>
                    </div>
                <?php
				endwhile;
				echo $args['after_widget'];
		}
         

	    public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = __( 'New title', 'wpb_widget_domain' );
			}

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
		}
     
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			return $instance;
		}
}  

add_action('admin_enqueue_scripts', 'uploader_javaScript');

function uploader_javaScript() {
		wp_enqueue_media();
		wp_register_script('theme_options', get_template_directory_uri().'/js/custom-admin.js', array('jquery'));
		wp_enqueue_script('theme_options');
	
}