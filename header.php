<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package picworld
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'picworldtheme' ); ?></a>

	<header id="masthead" class="site-header">
		<div id="top-menu-bar">
				<div class="site-branding">
		
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php esc_attr( bloginfo( 'name' ) ) ; ?>" >
						
						<?php	the_custom_logo();?>
				
						
					</a>
						<?php
					
					// $picworldtheme_description = get_bloginfo( 'description', 'display' );
					// if ( $picworldtheme_description || is_customize_preview() ) :
						?>
						<!-- <p class="site-description"><?php //echo $picworldtheme_description;  ?></p> -->
					<?php // endif; ?>
				</div><!-- .site-branding -->
				
			<?php if ( has_nav_menu( 'menu-1' ) ) : ?>	
<div id="site-pages-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'picworldtheme' ); ?></button>
			<?php

			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);?>
			</div><!-- #site-pages-navigationk -->
			
			<?php endif; ?>	
				
				
			<!-- search widget -->
			<?php if ( is_active_sidebar( 'menu-search' ) ) : ?>	
				<?php dynamic_sidebar( 'menu-search' ); ?>
			<?php endif; ?>	
			
				<?php do_action( 'menu-drop-down' ); ?>

	    </div><!-- #top-menu-bar -->
		<nav id="site-navigation" class="main-navigation"><!-- this is the category listing menu -->
			
			

			
		
		<?php 	 if ( class_exists( 'WooCommerce' ) ) :?>
		<?php	get_template_part( 'template-parts/categories', 'menu' ); ?>
		<?php endif;?>
			
				
			
			<ul id="cart-nav">
<!-- cart login account -->
			<li class="page-item cart-item">
					<a href="<?php echo wc_get_cart_url(); ?>">
						<span class="dashicons dashicons-cart"></span>
						<span class="items-count"><?php echo  WC()->cart->get_cart_contents_count(); ?></span>
					</a>
					</li>	
					<?php if( is_user_logged_in()): ?>
						<li>
					<a href="<?php echo esc_url(get_permalink( get_option( 'woocommerce_myaccount_page_id' ))); ?>" title="<?php esc_html_e('my account'); ?>">
					<span class="dashicons dashicons-admin-users"></span></a>
					</li>
						<li>
						<a href="<?php echo esc_url( wp_logout_url( get_permalink(get_option( 'woocommerce_myaccount_page_id' )) )); ?>" title="<?php esc_html_e('logout'); ?>" >
						<span class="dashicons dashicons-exit"></span></a>
						</li>
					<?php else: ?>
					<li>
					<a href="<?php echo esc_url(get_permalink( get_option( 'woocommerce_myaccount_page_id' ))); ?>">
					<?php esc_html_e('login/register'); ?></a>
					</li>
					<?php  endif; ?>
								
		</ul>
			
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div class="main-container <?php is_front_page() &&  is_home() == 1?"dfs":"" ;  ?> ">

