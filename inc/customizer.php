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


	// login img control 
	$wp_customize->add_section(
		'login_background_image',array(
		'title'		  =>	esc_html__('login background image', 'picworldtheme'),
		'description' =>	esc_html__('login background image', 'picworldtheme'),


		)
	 );

				$wp_customize->add_setting(
					'login_image',array(
						'type'				=>'theme_mod',
						
						'sanitize_callback'	=>'my_customize_sanitize_feature_image',

					)
				) ;
				
				$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize, 'login_image', array(
						'label'    => esc_html__('login Image', 'picworldtheme'),
						'settings' => 'login_image',
						'section'  => 'login_background_image',
						
					)
				)
			);


		$wp_customize->add_section(
		'site_mainSlide_section',array(
		'title'		  =>	esc_html__('main slider settings', 'picworldtheme'),
		'description' =>	esc_html__('but items for main slider here', 'picworldtheme'),


		)
	 );

			mainSlide_images_settings($wp_customize);
				// -------------------------
		$wp_customize->add_section(
		'image_fliper_section',array(
		'title'		  =>	esc_html__('image flipper settings', 'picworldtheme'),
		'description' =>	esc_html__('but items for image flipper', 'picworldtheme'),


		)
	 );

			image_fliper_images_settings($wp_customize);
			// Freist section 
				$wp_customize->add_setting(
					'image_flipper_title',array(
						'type'				=>'theme_mod',
						'default'			=>esc_html__('daramatice changes', 'picworldtheme'),
						'sanitize_callback'	=>'sanitize_text_field',

					)
				) ;
				$wp_customize->add_control(
					'image_flipper_title',array(
						'label'			=>esc_html__('title'),
						'description'	=>esc_html__('image flipper section title', 'picworldtheme'),
						'section'		=>'image_fliper_section',
						'type'			=>'text',
						'priority'      => '30',
					)
				) ;
				// second section 
				$wp_customize->add_setting(
					'image_flipper_description',array(
						'type'				=>'theme_mod',
						'default'			=>esc_html__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit maiores 
												corrupti expedita id veniam porro atque, ut placeat officia modi', 'picworldtheme'),
						'sanitize_callback'	=>'sanitize_text_field',

					)
				) ;
				$wp_customize->add_control(
					'image_flipper_description',array(
						'label'			=>esc_html__('description', 'picworldtheme'),
						'description'	=>esc_html__('image flipper section description', 'picworldtheme'),
						'section'		=>'image_fliper_section',
						'type'			=>'text',
						'priority'      => '40',
					)
				) ;
				// -------------------------
			$wp_customize->add_section(
		'frontPage_lists_section',array(
		'title'		  =>	esc_html__('front page product lists settings', 'picworldtheme'),
		'description' =>	esc_html__('titles and number of items in each section', 'picworldtheme'),


		)
	 );
			
				// Freist section 
				$wp_customize->add_setting(
					'newest_products_title',array(
						'type'				=>'theme_mod',
						'default'			=>esc_html__('newest products', 'picworldtheme'),
						'sanitize_callback'	=>'sanitize_text_field',

					)
				) ;
				$wp_customize->add_control(
					'newest_products_title',array(
						'label'			=>esc_html__('title', 'picworldtheme'),
						'description'	=>esc_html__('newest products section title', 'picworldtheme'),
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
						'label'			=>esc_html__('number of items', 'picworldtheme'),
						'description'	=>esc_html__('number of procuts to show in newest list', 'picworldtheme'),
						'section'		=>'frontPage_lists_section',
						'type'			=>'number'

					)
				) ;
				// second section 
						$wp_customize->add_setting(
							'top_rated_title',array(
								'type'				=>'theme_mod',
								'default'			=>esc_html__('top rated', 'picworldtheme'),
								'sanitize_callback'	=>'sanitize_text_field',

							)
						) ;
						$wp_customize->add_control(
							'top_rated_title',array(
								'label'			=>esc_html__('title', 'picworldtheme'),
								'description'	=>esc_html__('top rated section title', 'picworldtheme'),
								'section'		=>'frontPage_lists_section',
								'type'			=>'text'

							)
						) ;
						// fleild 2 term
						$wp_customize->add_setting(
							'num_items_topRated'
							,array(
								'type'				=>'theme_mod',
								'default'			=>'4',
								'sanitize_callback'	=>'absint',

							)
						) ;
						$wp_customize->add_control(
							'num_items_topRated'
							,array(
								'label'			=>esc_html__('number of items', 'picworldtheme'),
								'description'	=>esc_html__('number of procuts to show in top rated list', 'picworldtheme'),
								'section'		=>'frontPage_lists_section',
								'type'			=>'number'

							)
						) ;

						$wp_customize->add_setting(
					'topRated_background',array(
						'type'				=>'theme_mod',
						
						'sanitize_callback'	=>'my_customize_sanitize_feature_image',

					)
				) ;
				
				$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize, 'topRated_background', array(
						'label'    => esc_html__('top rated background image', 'picworldtheme'),
						'settings' => 'topRated_background',
						'section'  => 'frontPage_lists_section',
						
					)
				)
			);

					// theird section 
						$wp_customize->add_setting(
							'best_selling_title',array(
								'type'				=>'theme_mod',
								'default'			=>esc_html__('best selling','picworldtheme'),
								'sanitize_callback'	=>'sanitize_text_field',

							)
						) ;
						$wp_customize->add_control(
							'best_selling_title',array(
								'label'			=>esc_html__(' title', 'picworldtheme'),
								'description'	=>esc_html__('best selling section title', 'picworldtheme'),
								'section'		=>'frontPage_lists_section',
								'type'			=>'text'

							)
						) ;
						// fleild 2 term
						$wp_customize->add_setting(
							'num_items_bestSelling
							',array(
								'type'				=>'theme_mod',
								'default'			=>'4',
								'sanitize_callback'	=>'absint',

							)
						) ;
						$wp_customize->add_control(
							'num_items_bestSelling
							',array(
								'label'			=>esc_html__('number of items', 'picworldtheme'),
								'description'	=>esc_html__('number of procuts to show in top best selling', 'picworldtheme'),
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

function image_fliper_images_settings($wp_customize,$k=2){

	for($i=1;$i<=$k;$i++):
			//adding setting 
			$wp_customize->add_setting('flipper_image'.$i, array(
				'default' => '',
				'type' => 'theme_mod',
				'sanitize_callback' => 'my_customize_sanitize_feature_image',
			));

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize, 'my_flipper_image'.$i, array(
						'label'    => esc_html__('flipper Image', 'picworldtheme').$i,
						'settings' => 'flipper_image'.$i,
						'section'  => 'image_fliper_section',
						'priority' => $i.'0',
					)
				)
			);
		endfor;
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
						'label'    =>  esc_html__('slide Image ', 'picworldtheme').$i,
						'settings' => 'slide_image'.$i,
						'section'  => 'site_mainSlide_section',
						'priority' => $i.'0',
					)
				)
			);
			//adding setting 
			$wp_customize->add_setting('url_text_setting'.$i, array(
			'default'     			   =>  esc_html__('start shopping', 'picworldtheme'),
			'sanitize_callback'        =>'wp_filter_nohtml_kses'
			));
			$wp_customize->add_control('url_text_setting'.$i, array(
			'label'   => esc_html__( 'url text', 'picworldtheme').$i,
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
			'label'   =>esc_html__(  'term id ', 'picworldtheme').$i,
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
	wp_enqueue_script( 'picworldtheme-customizer', get_template_directory_uri() . '/src/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'picworldtheme_customize_preview_js' );
