<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package picworld
 */

?>
</div><!--  .main-container  -->
	<footer id="colophon" class="site-footer">
		<div class="site-info">

			<div class="countact-info">
		
				<div class="logo-container">
							
								<?php	the_custom_logo();?>
						
						<p>
						<?php	esc_html_e( bloginfo( 'description' ) ,'picworldtheme'); ?>
						</p>
				</div><!-- .logo-container -->
					
				<div>
				
						<?php	if (is_active_sidebar( 'footer-title' ) ): ?>
						
						<?php	dynamic_sidebar( 'footer-title' );?>
					<?php endif; ?>
					<?php if ( has_nav_menu( 'menu-2' ) ):  ?>
						<?php wp_nav_menu(
						array(
							'theme_location' => 'menu-2',
							'menu_id'        => 'footer-menu',
						)); ?>
					<?php endif; ?>

				</div>
					

<div>
	<?php	if (is_active_sidebar( 'footer-socail-1' ) ) ?>
			
			<?php	dynamic_sidebar( 'footer-socail-1' );?>
			
			
</div>
			
		
			
				
			
				
			</div><!-- .countact-info -->


			<div class="copy-rights">
				<p>
					<span> <?php esc_html_e( '&#169;حقوق الطبع محفوظة لدى', 'picworldtheme' ) ?> </span>
					<bdi><?php esc_html(  the_time('Y') ); ?></bdi>
					<a href="<?php esc_url(bloginfo( 'url' )) ?> "> <?php esc_html(bloginfo( 'name' )) ?> </a>

				</p>	

				<p>
					<span><?php esc_html_e("صنع بحب بواسطة",'picworldtheme') ?></span> 
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" id="heart" width="25" >
					<path fill="#DD2E44" d="M35.885 11.833c0-5.45-4.418-9.868-9.867-9.868-3.308 0-6.227 1.633-8.018
					 4.129-1.791-2.496-4.71-4.129-8.017-4.129-5.45 0-9.868 4.417-9.868 9.868 0 .772.098 1.52.266 2.241C1.751 22.587
					  11.216 31.568 18 34.034c6.783-2.466 16.249-11.447 17.617-19.959.17-.721.268-1.469.268-2.242z"/></svg>
					 <a href="<?php echo esc_url('https://salwacoding.com/') ?> "><?php esc_html_e("SalwaCoding",'picworldtheme') ?></a>
				</p>	
			</div>
		
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
