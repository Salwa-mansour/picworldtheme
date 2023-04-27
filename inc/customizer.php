<?php
/**
 * picworld Theme Customizer
 *
 * @package picworld
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */




function picworldtheme_customize_register( $wp_customize ) {


	// $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	// $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	// $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// if ( isset( $wp_customize->selective_refresh ) ) {
	// 	$wp_customize->selective_refresh->add_partial(
	// 		'blogname',
	// 		array(
	// 			'selector'        => '.site-title a',
	// 			'render_callback' => 'picworldtheme_customize_partial_blogname',
	// 		)
	// 	);
	// 	$wp_customize->selective_refresh->add_partial(
	// 		'blogdescription',
	// 		array(
	// 			'selector'        => '.site-description',
	// 			'render_callback' => 'picworldtheme_customize_partial_blogdescription',
	// 		)
	// 	);
	// }
		$wp_customize->add_section(
		'site_mainSlide_section',array(
		'title'		  =>	'main slider settings',
		'description' =>	'but items for main slider here',


		)
	 );

			mainSlide_images_settings($wp_customize);
				// -------------------------
			$wp_customize->add_section(
		'frontPage_lists_section',array(
		'title'		  =>	'front page product lists settings',
		'description' =>	'titles and number of items in each section',


		)
	 );
			// Freist section 
				$wp_customize->add_setting(
					'newest_products_title',array(
						'type'				=>'theme_mod',
						'default'			=>'newest products',
						'sanitize_callback'	=>'sanitize_text_field',

					)
				) ;
				$wp_customize->add_control(
					'newest_products_title',array(
						'label'			=>' title',
						'description'	=>'newest products section title',
						'section'		=>'frontPage_lists_section',
						'type'			=>'text'

					)
				) ;
				// fleild 2 term
				$wp_customize->add_setting(
					'num_items_newest',array(
						'type'				=>'theme_mod',
						'default'			=>'8',
						'sanitize_callback'	=>'absint',

					)
				) ;
				$wp_customize->add_control(
					'num_items_newest',array(
						'label'			=>'number of items',
						'description'	=>'number of procuts to show in newest list',
						'section'		=>'frontPage_lists_section',
						'type'			=>'number'

					)
				) ;
				// second section 
						$wp_customize->add_setting(
							'top_rated_title',array(
								'type'				=>'theme_mod',
								'default'			=>'top rated',
								'sanitize_callback'	=>'sanitize_text_field',

							)
						) ;
						$wp_customize->add_control(
							'top_rated_title',array(
								'label'			=>' title',
								'description'	=>'top rated section title',
								'section'		=>'frontPage_lists_section',
								'type'			=>'text'

							)
						) ;
						// fleild 2 term
						$wp_customize->add_setting(
							'num_items_topRated
							',array(
								'type'				=>'theme_mod',
								'default'			=>'4',
								'sanitize_callback'	=>'absint',

							)
						) ;
						$wp_customize->add_control(
							'num_items_topRated
							',array(
								'label'			=>'number of items',
								'description'	=>'number of procuts to show in top rated list',
								'section'		=>'frontPage_lists_section',
								'type'			=>'number'

							)
						) ;
					// theird section 
						$wp_customize->add_setting(
							'best_selling_title',array(
								'type'				=>'theme_mod',
								'default'			=>'best selling',
								'sanitize_callback'	=>'sanitize_text_field',

							)
						) ;
						$wp_customize->add_control(
							'best_selling_title',array(
								'label'			=>' title',
								'description'	=>'best selling section title',
								'section'		=>'frontPage_lists_section',
								'type'			=>'text'

							)
						) ;
						// fleild 2 term
						$wp_customize->add_setting(
							'num_items_bestSelling
							',array(
								'type'				=>'theme_mod',
								'default'			=>'4 ',
								'sanitize_callback'	=>'absint',

							)
						) ;
						$wp_customize->add_control(
							'num_items_bestSelling
							',array(
								'label'			=>'number of items',
								'description'	=>'number of procuts to show in top best selling',
								'section'		=>'frontPage_lists_section',
								'type'			=>'number'

							)
						) ;



}
add_action( 'customize_register', 'picworldtheme_customize_register' );
// ------------------------------------------------
function my_customize_sanitize_feature_image($input)
{
    error_log(attachment_url_to_postid($input));//debug
    return attachment_url_to_postid($input);
}

function mainSlide_images_settings($wp_customize,$k=3){

	for($i=1;$i<=$k;$i++):
			//adding setting 
			$wp_customize->add_setting('slide_image'.$i, array(
				'default' => '',
				'type' => 'theme_mod',
				'sanitize_callback' => 'my_customize_sanitize_feature_image',
			));

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize, 'my_slide_image'.$i, array(
						'label'    => 'slide Image '.$i,
						'settings' => 'slide_image'.$i,
						'section'  => 'site_mainSlide_section',
						'priority' => $i.'0',
					)
				)
			);
			//adding setting 
			$wp_customize->add_setting('url_text_setting'.$i, array(
			'default'     			   => 'start shopping',
			'sanitize_callback'        =>'wp_filter_nohtml_kses'
			));
			$wp_customize->add_control('url_text_setting'.$i, array(
			'label'   => 'url text  '.$i,
			'section' => 'site_mainSlide_section',
			'type'    => 'text',
			'priority' => $i.'0',
			));
			//adding setting 
			$wp_customize->add_setting('term_id'.$i, array(
			'default'       		 => 'term id ',
			'sanitize_callback'      =>'absint',
			'priority'				 => $i.'0',
			));
			$wp_customize->add_control('term_id'.$i, array(
			'label'   => 'term id '.$i,
			'section' => 'site_mainSlide_section',
			'type'    => 'number',
			'priority' => $i.'0',
			));
	endfor;
			
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function picworldtheme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function picworldtheme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function picworldtheme_customize_preview_js() {
	wp_enqueue_script( 'picworldtheme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'picworldtheme_customize_preview_js' );
