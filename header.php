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
	

	<header id="masthead" class="site-header">
		<div id="top-menu-bar">
				<div class="site-branding">
							
						<?php	the_custom_logo();?>			
					
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
			<!-- <li class="page-item cart-item"> -->
					<!-- <a href="<?php //echo wc_get_cart_url(); ?>">
						<span class="dashicons dashicons-cart"></span>
						<span class="items-count"><?php //echo  WC()->cart->get_cart_contents_count(); ?></span>
					</a> -->
						 <!-- cart widget -->
			<?php if ( is_active_sidebar( 'header-cart' ) ) : ?>	
				<?php dynamic_sidebar( 'header-cart' ); ?>
			<?php endif; ?>	
			
				<?php do_action( 'menu-drop-down' ); ?>
					<!-- </li>	 -->
					<?php if( is_user_logged_in()): ?>
						<li>
					<a href="<?php echo esc_url(get_permalink( get_option( 'woocommerce_myaccount_page_id' ))); ?>" title="<?php esc_html_e('my account'); ?>">
					<span class="dashicons dashicons-admin-users"></span></a>
					</li>
						<li>
						<a href="<?php echo esc_url( wp_logout_url( home_url())); ?>" title="<?php esc_html_e('logout'); ?>" >
						<span class="dashicons dashicons-exit"></span></a>
						</li>
					<?php else: ?>
							<?php if ( get_option( 'users_can_register' ) ) : ?>
								
							<li>
								<a href="<?php echo wp_login_url(); ?>">
								<?php esc_html_e('login'); ?>
									
								</a>
							</li>
							<li>
								<a href="<?php echo esc_url( site_url('/wp-login.php?action=register&redirect_to=' . get_permalink())
); ?>">
								<?php esc_html_e('register'); ?>
									
								</a>
							</li>
							<?php endif//if ( get_option( 'users_can_register' ) ) : ?>
					<?php  endif; ?>
								
		</ul>
			
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div class="<?php esc_attr_e("main-container"); ?>" >

