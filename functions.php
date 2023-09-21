<?php
/**
 * picworld functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package picworld
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
$textdomain='picworldtheme';


function picworldtheme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on picworld, use a find and replace
		* to change 'picworldtheme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( $textdomain,get_stylesheet_directory() . '/languages/' );//to add text domain to chiled thems
	load_theme_textdomain( $textdomain, get_template_directory() . '/languages/' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'picworldtheme' ),
		
			'menu-2' => esc_html__( 'footer', 'picworldtheme' ),
		),


	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'picworldtheme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);


}
add_action( 'after_setup_theme', 'picworldtheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function picworldtheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'picworldtheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'picworldtheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function picworldtheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'picworldtheme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'picworldtheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'menuSearch', 'picworldtheme' ),
			'id'            => 'menu-search',
			'description'   => esc_html__( 'add search form', 'picworldtheme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'footer-social', 'baketheme' ),
			'id'            => 'footer-socail-1',
			'description'   => esc_html__( 'Add soial media block here.', 'baketheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s social">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'header-cart', 'baketheme' ),
			'id'            => 'header-cart',
			'description'   => esc_html__( 'add woocommerce mini cart wedget here', 'baketheme' ),
			
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'footerTitle', 'baketheme' ),
			'id'            => 'footer-title',
			'description'   => esc_html__( 'add title to footer menu', 'baketheme' ),
			
		)
	);
	
}
add_action( 'widgets_init', 'picworldtheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function picworldtheme_styles() {
	
	wp_enqueue_style('flex-slider-css','https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css');
	wp_enqueue_style( 'picworldtheme-style',get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'picworldtheme-font', "https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" );
	wp_enqueue_style('dashicons');
	// wp_style_add_data( 'picworldtheme-style', 'rtl', 'replace' );
}

function picworldtheme_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// The core GSAP library
  wp_enqueue_script( 'gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js', array(), false, true );
  // ScrollTrigger - with gsap.js passed as a dependency
  wp_enqueue_script( 'gsap-st', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js', array('gsap-js'), false, true );


wp_enqueue_script('flex-slider-jqeury', 'https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js'
	,array('jquery'),'',true);

    // Your animation code file - with gsap.js passed as a dependency
  wp_enqueue_script( 'main-js', get_template_directory_uri() . '/dist/bundle.js', array('gsap-js','flex-slider-jqeury'), false, true );
}

add_action( 'wp_enqueue_scripts', 'picworldtheme_styles' );
add_action( 'wp_enqueue_scripts', 'picworldtheme_scripts' );

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

// -------------------------------	
add_filter( 'login_display_language_dropdown', '__return_false' );
function picworldtheme_filter_login_head() {

	if ( has_custom_logo() ) :

		$image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
		?>
		<style type="text/css">
			.login h1 a {
				background-image: url(<?php echo esc_url( $image[0] ); ?>);
				-webkit-background-size: <?php echo absint( $image[1] )?>px;
				background-size:contain;
				height: 100px;
				width:auto;
			}
		</style>
		<?php
	endif;


$login_image = wp_get_attachment_image_src( get_theme_mod( 'login_image' ), 'full' );
if (isset($login_image)) :
	?>

	<style type="text/css">
			body.login  {
				background-image:linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0,0)),
				 url(<?php echo esc_url( $login_image[0] ); ?>);
				
			}
		</style>

	<?php
	
endif;

}

add_action( 'login_head', 'picworldtheme_filter_login_head', 100 );
function picworldtheme_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'picworldtheme_login_logo_url' );

function picworldtheme_login_logo_url_title() {
	$headertext = esc_html__(get_bloginfo('name') , 'picworldtheme' );
	return $headertext;
    
}
add_filter( 'login_headertext', 'picworldtheme_login_logo_url_title' );

function picworldtheme_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/src/css/style-login.css' );
    // wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'picworldtheme_login_stylesheet' );
// --------------------------------------
function custom_login_redirect() {

return 'home_url()';

}
//add_filter('login_redirect', 'custom_login_redirect');
// --------------
function wp_version_remove_version() {
return '';
}
add_filter('the_generator', 'wp_version_remove_version');
// --------------

/*
 * Change WP Login file URL using "login_url" filter hook
 * https://developer.wordpress.org/reference/hooks/login_url/
 */
// add_filter( 'login_url', 'custom_login_url', PHP_INT_MAX );
// function custom_login_url( $login_url ) {
// 	$login_url = site_url( 'wellcom.php', 'login' );	
//     return $login_url;
// }
if(class_exists( 'WooCommerce' )){
			add_filter( 'woocommerce_currencies', 'add_cw_currency' );
		function add_cw_currency( $cw_currency ) {
		     $cw_currency['newRyial'] = __( 'ريال يمني جديد', 'woocommerce' );
		     return $cw_currency;
		}
		add_filter('woocommerce_currency_symbol', 'add_cw_currency_symbol', 10, 2);
		function add_cw_currency_symbol( $custom_currency_symbol, $custom_currency ) {
		     switch( $custom_currency ) {
		         case 'newRyial': $custom_currency_symbol = 'ريال يمني جديد'; break;
		     }
		     return $custom_currency_symbol;
		}
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
