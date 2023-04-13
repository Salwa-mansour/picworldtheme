		<div id="nv1-toggler" role="button" rel="navigation">
              <span class="line line1"></span>
              <span class="line line2"></span>
              <span class="line line3"></span>
            </div>  

<div id="menu-overlay"></div>


<ul id="categories-navigation" >
            
				<!-- shows on mobile only -->
			<?php if ( is_active_sidebar( 'menu-search' ) ) : ?>	
				<?php dynamic_sidebar( 'menu-search' ); ?>
			<?php endif; ?>	

 


<li class="cat-item">
	<a href="<?php  echo esc_url(get_permalink( get_option( 'woocommerce_shop_page_id' )));  ?>">
		<?php esc_html_e("كل المنتجات","picworldtheme") ?>

		<span class="link-decore "></span>
	</a>
</li>
			<?php 
							$args = array(
								'taxonomy'     => 'product_cat',
								'orderby'      => 'date',
								'order'		   => 'asc',
								'parent'       => 0 ,
								// 'show_count'   => $show_count,
								// 'pad_counts'   => $pad_counts,
								 'hierarchical' => 0,
								'title_li'     => '',
								// 'hide_empty'   => $empty
						);
						$root_categories = get_categories( $args );


						foreach ($root_categories as $cat) :
							
							$category_id = $cat->term_id;  
								// get the thumbnail id using the queried category term_id
								$thumbnail_id = get_term_meta( $category_id , 'thumbnail_id', true ); 

							
								$childs1=get_categories( array(
									'taxonomy'     => 'product_cat',
									'parent'    => $cat->cat_ID,
									
								) );
						// echo ($image.'kkkkkk');
							$cat_data=get_term($category_id);
							$has_children = !empty($childs1);
							//    print_r($cat_data);
							?>
			<li class="cat-item <?php echo $has_children ? esc_attr_e( 'dropMenu', 'picworldtheme' ):""; ?>">


				<a href="<?php echo get_term_link($cat->slug, 'product_cat') ; ?> "
					class="callout-link">
					<?php  esc_html_e( $cat_data->name, 'picworldtheme' ) ; ?>
					<span class="<?php esc_attr_e( 'link-decore', 'picworldtheme' )?> "></span>
					
					<span id="item-<?php esc_attr_e($category_id) ?>" class="<?php echo $has_children ? esc_attr_e( 'dashicons dashicons-arrow-down', 'picworldtheme' ):""; ?>"  ></span>
						</a>
				<!--.center-text-->


				<!--cat-item-->

				<ul class="item-<?php esc_attr_e($category_id) ?>" >
					<?php foreach ($childs1 as $child1) : ?>

					<?php $child1_Id = $child1->cat_ID;
	     			 $child1_Data =  get_term($child1_Id);
					  $childs2= get_categories( array(
						'taxonomy'     => 'product_cat',
						'parent'    => $child1->cat_ID,
						
					) );
					
					$has_children = !empty($childs2);
					 ?>
					<li class="<?php echo $has_children ? esc_attr_e( 'dropMenu', 'picworldtheme' ):""; ?>" >
						
						<a href="<?php echo get_term_link($child1->slug, 'product_cat') ; ?>">
						<?php esc_html_e( $child1_Data->name , 'picworldtheme' )  ?>
							<span class="<?php esc_attr_e( 'link-decore', 'picworldtheme' )?> "></span>
							<span id="item-<?php esc_attr_e($child1_Id) ?>" class="<?php echo $has_children ? esc_attr_e( 'dashicons dashicons-arrow-down', 'picworldtheme' ):""; ?>   "  ></span>
						
						</a>
										<ul class="item-<?php esc_attr_e($child1_Id) ?>" >
									<?php foreach ($childs2 as $child2) : ?>
									


									<?php $child2_Id = $child2->cat_ID;
									$child2_Data =  get_term($child2_Id) ?>
									<li>
										<a href="<?php echo get_term_link($child2->slug, 'product_cat') ; ?>">
											<?php esc_html_e( $child2_Data->name , 'picworldtheme' )  ?>
										</a>
									</li>

									<?php  endforeach;  ?>

								</ul>
					</li>

					<?php  endforeach;  ?>

				</ul>
			</li>
			<?php
						
						endforeach;?>



		</ul>