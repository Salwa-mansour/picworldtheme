<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package picworld
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */



function picworldtheme_changes()
{


					function picworldtheme_woocommerce_setup() {
						add_theme_support(
							'woocommerce',
							array(
								'thumbnail_image_width' => 150,
								'single_image_width'    => 300,
								'product_grid'          => array(
									'default_rows'    => 5,
									'min_rows'        => 1,
									'default_columns' => 4,
									'min_columns'     => 1,
									'max_columns'     => 6,
								),
							)
						);
						add_theme_support( 'wc-product-gallery-zoom' );
						add_theme_support( 'wc-product-gallery-lightbox' );
						add_theme_support( 'wc-product-gallery-slider' );


						add_image_size( 'picworldtheme-slider',1920 , 800, array('center','center') );



					}
					add_action( 'after_setup_theme', 'picworldtheme_woocommerce_setup' );

					/**
					 * WooCommerce specific scripts & stylesheets.
					 *
					 * @return void
					 */
					function picworldtheme_woocommerce_scripts() {
						wp_enqueue_style( 'picworldtheme-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION );
							wp_enqueue_style( 'picworldtheme-woocommerce-style-rtl', get_template_directory_uri() . '/woocommerce-rtl.css', array(), _S_VERSION );

						$font_path   = WC()->plugin_url() . '/assets/fonts/';
						$inline_font = '@font-face {
								font-family: "star";
								src: url("' . $font_path . 'star.eot");
								src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
									url("' . $font_path . 'star.woff") format("woff"),
									url("' . $font_path . 'star.ttf") format("truetype"),
									url("' . $font_path . 'star.svg#star") format("svg");
								font-weight: normal;
								font-style: normal;
							}';

						wp_add_inline_style( 'picworldtheme-woocommerce-style', $inline_font );
					}
					add_action( 'wp_enqueue_scripts', 'picworldtheme_woocommerce_scripts' );

					/**
					 * Disable the default WooCommerce stylesheet.
					 *
					 * Removing the default WooCommerce stylesheet and enqueing your own will
					 * protect you during WooCommerce core updates.
					 *
					 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
					 */
					// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

					/**
					 * Add 'woocommerce-active' class to the body tag.
					 *
					 * @param  array $classes CSS classes applied to the body tag.
					 * @return array $classes modified to include 'woocommerce-active' class.
					 */
					function picworldtheme_woocommerce_active_body_class( $classes ) {
						$classes[] = 'woocommerce-active';

						return $classes;
					}
					add_filter( 'body_class', 'picworldtheme_woocommerce_active_body_class' );

					/**
					 * Related Products Args.
					 *
					 * @param array $args related products args.
					 * @return array $args related products args.
					 */
					function picworldtheme_woocommerce_related_products_args( $args ) {
						$defaults = array(
							'posts_per_page' => 3,
							'columns'        => 3,
						);

						$args = wp_parse_args( $defaults, $args );

						return $args;
					}
					add_filter( 'woocommerce_output_related_products_args', 'picworldtheme_woocommerce_related_products_args' );

					/**
					 * Remove default WooCommerce wrapper.
					 */
					remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
					remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

					if ( ! function_exists( 'picworldtheme_woocommerce_wrapper_before' ) ) {
						/**
						 * Before Content.
						 *
						 * Wraps all WooCommerce content in wrappers which match the theme markup.
						 *
						 * @return void
						 */
						function picworldtheme_woocommerce_wrapper_before() {
							?>
								<main id="primary" class="site-main">
							<?php
						}
					}
					add_action( 'woocommerce_before_main_content', 'picworldtheme_woocommerce_wrapper_before' );

					if ( ! function_exists( 'picworldtheme_woocommerce_wrapper_after' ) ) {
						/**
						 * After Content.
						 *
						 * Closes the wrapping divs.
						 *
						 * @return void
						 */
						function picworldtheme_woocommerce_wrapper_after() {
							?>
								</main><!-- #main -->
							<?php
						}
					}
					add_action( 'woocommerce_after_main_content', 'picworldtheme_woocommerce_wrapper_after' );

					/**
					 * Sample implementation of the WooCommerce Mini Cart.
					 *
					 * You can add the WooCommerce Mini Cart to header.php like so ...
					 *
						<?php
							if ( function_exists( 'picworldtheme_woocommerce_header_cart' ) ) {
								picworldtheme_woocommerce_header_cart();
							}
						?>
					 */

					if ( ! function_exists( 'picworldtheme_woocommerce_cart_link_fragment' ) ) {
						/**
						 * Cart Fragments.
						 *
						 * Ensure cart contents update when products are added to the cart via AJAX.
						 *
						 * @param array $fragments Fragments to refresh via AJAX.
						 * @return array Fragments to refresh via AJAX.
						 */
						function picworldtheme_woocommerce_cart_link_fragment( $fragments ) {
							ob_start();
							picworldtheme_woocommerce_cart_link();
							$fragments['a.cart-contents'] = ob_get_clean();

							return $fragments;
						}
					}
					add_filter( 'woocommerce_add_to_cart_fragments', 'picworldtheme_woocommerce_cart_link_fragment' );

					if ( ! function_exists( 'picworldtheme_woocommerce_cart_link' ) ) {
						/**
						 * Cart Link.
						 *
						 * Displayed a link to the cart including the number of items present and the cart total.
						 *
						 * @return void
						 */
						function picworldtheme_woocommerce_cart_link() {
							?>
							<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'picworldtheme' ); ?>">
								<?php
								$item_count_text = sprintf(
									/* translators: number of items in the mini cart. */
									_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'picworldtheme' ),
									WC()->cart->get_cart_contents_count()
								);
								?>
								<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
							</a>
							<?php
						}
					}

					if ( ! function_exists( 'picworldtheme_woocommerce_header_cart' ) ) {
						/**
						 * Display Header Cart.
						 *
						 * @return void
						 */
						function picworldtheme_woocommerce_header_cart() {
							if ( is_cart() ) {
								$class = 'current-menu-item';
							} else {
								$class = '';
							}
							?>
							<ul id="site-header-cart" class="site-header-cart">
								<li class="<?php echo esc_attr( $class ); ?>">
									<?php picworldtheme_woocommerce_cart_link(); ?>
								</li>
								<li>
									<?php
									$instance = array(
										'title' => '',
									);

									the_widget( 'WC_Widget_Cart', $instance );
									?>
								</li>
							</ul>
							<?php
						}
					}

					 function is_on_sale( $context = 'view' ) {
					   if ( '' !== (string) $context->get_sale_price( $context ) && $context->get_regular_price( $context ) > $context->get_sale_price( $context ) ) {
						   $on_sale = true;

						   if ( $context->get_date_on_sale_from( $context ) && $context->get_date_on_sale_from( $context )->getTimestamp() > time() ) {
							   $on_sale = false;
						   }

						   if ( $context->get_date_on_sale_to( $context ) && $context->get_date_on_sale_to( $context )->getTimestamp() < time() ) {
							   $on_sale = false;
						   }
					   } else {
						   $on_sale = false;
					   }
					   return 'view' === $context ? apply_filters( 'woocommerce_product_is_on_sale', $on_sale, $context ) : $on_sale;
					}
					function picworldtheme_get_sale_items(){
						// include_once get_template_directory() . 'wp-content/plugins/woocommerce/includes/abstracts/abstract-wc-product.php';
						// include_once	get_template_directory() . '/woocommerce/onSale.php';
					}
					// /---------------------------------------------------------------------
					add_action( 'picworldtheme_get_sale_product','picworldtheme_get_sale_items',10 );

					add_filter( 'woocommerce_single_product_carousel_options', 'sf_update_woo_flexslider_options' );
					/** 
					 * Filer WooCommerce Flexslider options - Add Navigation Arrows
					 */
					function sf_update_woo_flexslider_options( $options ) {
					// $options(
					//     'rtl'            => is_rtl(),
					//     'animation'      => 'slide',
					//     'smoothHeight'   => true,
					//     'directionNav'   => false,
					//     'controlNav'     => 'thumbnails',
					//     'slideshow'      => false,
					//     'animationSpeed' => 500,
					//     'animationLoop'  => false, // Breaks photoswipe pagination if true.
					//     'allowOneSlide'  => false,
					// )
					    $options['directionNav'] = true;
					    $options['smoothHeight'] = true;
					    $options['rtl'] = is_rtl();

					    return $options;
					}
					// ------------------------------
					// function picworldtheme_woocommerce_template_loop_product_galery_img($product)
					// {
					// $attachment_ids =get_gallery_image_ids($product);
					// $firest_imgIid =$attachment_ids[0];
					// $img =get_gallery_image_html($firest_imgIid );
					// 	echo img;
					// }


					remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination',  10 );
					add_action('woocommerce_before_shop_loop','woocommerce_pagination',10);
					add_action('woocommerce_after_shop_loop_item_title','the_excerpt',1);

					// if(is_shop()){

					// 	add_action("woocommerce_before_shop_loop_item_title","picworldtheme_woocommerce_template_loop_product_galery_img",11,1);
						
					// }

function picworldtheme_get_firest_gallery_image(){
	// https://stackoverflow.com/questions/27702915/how-to-get-woocommerce-product-gallery-image-urls
	  global $product;
    $attachment_ids = $product->get_gallery_image_ids();
    if(wp_get_attachment_url( $attachment_ids[0] )!= ""){
 echo ('<li><img src="'. wp_get_attachment_url( $attachment_ids[0] ).'"></img></li>');
    }
        
       // echo ( wp_get_attachment_image( $attachment_ids[0] ));
  
}

function picworldtheme_slider_start(){
	echo '<div class="single-flexslider"> 
	<ul class="slides">';
}
function picworldtheme_slider_thumbnail_wrap_start(){
	echo '<li>';
	
}
function picworldtheme_slider_thumbnail_wrap_end(){
	echo '</li>';
	
}
function picworldtheme_slider_end(){
	echo "	</ul>
			</div>";
}

add_action( 'woocommerce_before_shop_loop_item','picworldtheme_slider_start',12);
add_action( 'woocommerce_before_shop_loop_item_title','picworldtheme_slider_thumbnail_wrap_start', 7);
			// woocommerce_before_shop_loop_item_title, woocommerce_template_loop_product_thumbnail,	10	
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash',10);
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash',11);
add_action( 'woocommerce_before_shop_loop_item_title','picworldtheme_slider_thumbnail_wrap_end', 13);
add_action( 'woocommerce_before_shop_loop_item_title','picworldtheme_get_firest_gallery_image', 15);
add_action( 'woocommerce_before_shop_loop_item_title','picworldtheme_slider_end',20);

function picworldtheme_get_copons(){
	 global $woocommerce;
    $coupon_data = new WC_Coupon('2uxkvuq2');
	var_dump( $coupon_data);
}

// add_action('wp_body_open','picworldtheme_get_copons');
	// .........................
}
add_action('wp','picworldtheme_changes');