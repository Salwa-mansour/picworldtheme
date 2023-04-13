<?php


get_header();
?>

<main id="primary" class="site-main front-page">
	<section id="hero">
			<?php
				for($i=1;$i<=3;$i++):

					$slider_image_ids[$i]		=get_theme_mod('slide_image'.$i);
					$slider_button_text[$i]	=get_theme_mod('url_text_setting'.$i);
					$slider_term_ids[$i]			=get_theme_mod('term_id'.$i);
				endfor;
$k=0;
				

			?>
		<div class="flexslider" style="direction:rtl">
			<ul class="slides">


				<?php 
				
					foreach($slider_term_ids as $term_id ):
						if ($term_id != null ):
							
						$args = array(
					'taxonomy' 			 => 'product_tag',
					'term_taxonomy_id'	 => $term_id
				
				);

				$thisTag =get_term($term_id,'product_tag');
				//need to handle error
				 ?>
	
				<li>
			<figure >
				<img src="<?php echo esc_url(wp_get_attachment_url( $slider_image_ids[$k])); ?>" 
					alt="<?php esc_html_e( $thisTag->name, 'picworldtheme' ).esc_attr( 'image', 'picworldtheme' ) ;  ?>" />
			</figure>
								
					
			<div class="flex-caption">
	
					<h1 class="term-name">						
						<?php esc_html_e( $thisTag->name, 'picworldtheme' ) ;  ?>
						
					</h1>
					<p class="term-desct">
						<?php  esc_html_e( $thisTag->description, 'picworldtheme' ) ; ?>
					</p>
					<a href="<?php echo esc_url( get_term_link($thisTag->slug, 'product_tag')); ?>">
						
							<?php esc_html_e( get_theme_mod( 'set_link_text','start shopping')); ?>
							
					</a>
						

			</div><!-- flex-caption-->
					
				</li>

				<?php 
				$k++;
				endif;
				wp_reset_query(); 
				endforeach;
				$k = 0;
				 ?>
				
			</ul>
		</div>
	</section>

		<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
		<?php if ( class_exists( 'WooCommerce' ) ) : ?>

<section class="front-section">
	<!-- catigories section -->
	
		<ul class="categories-list ">
			<?php 
				$args = array(
					'taxonomy'     => 'product_cat',
					'orderby'      => 'date',
					'order'		   => 'asc',
					// 'show_count'   => $show_count,
					// 'pad_counts'   => $pad_counts,
					// 'hierarchical' => 0,
					'title_li'     => '',
					// 'hide_empty'   => $empty
			);
			$all_categories = get_categories( $args );
			foreach ($all_categories as $cat) :
				
				$category_id = $cat->term_id;  
					// get the thumbnail id using the queried category term_id
					$thumbnail_id = get_term_meta( $category_id , 'thumbnail_id', true ); 

					// get the image URL
					$image = wp_get_attachment_url( $thumbnail_id ); 
			// echo ($image.'kkkkkk');
				$cat_data=get_term($category_id);
				//    print_r($cat_data);
				?>
			<li class="cat-item ">
				<a href="<?php echo get_term_link($cat->slug, 'product_cat'); ?> " class=" <?php esc_attr_e( 'img-box' )?>">
						<img src="<?php echo($image) ; ?>" alt="<?php esc_html_e('catigoury image'); ?>" class="cat-img">
				 </a>
					<div class="center-text">
						<h1 class="cat-name"><?php echo$cat_data->name; ?></h1>
						<p class="cat-description"><?php echo($cat_data -> description) ?></p>
						
					
					</div>
					<!--.center-text-->

				
				

			</li><!--cat-item-->
			<?php
				//    echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
			endforeach;
wp_reset_query(); 
			?>
		


		</ul>


</section>

<?php endif;//if ( class_exists( 'WooCommerce' ) ) : ?>
<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<section id="trending">
	<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
	<?php if ( class_exists( 'WooCommerce' ) ) : ?>

  <section class=" front-section">

	<div class="content best-selling">
		<h3>best selling products</h3>
		<ul class="best-selling-prodcuts">
			<?php
			$args = array(
				'post_type' => 'product',
				'meta_key' => 'total_sales',
				'orderby' => 'meta_value_num',
				'posts_per_page' => 1,
			);

			$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); 
				global $product;
			?>
			<li class="product">
				<a href="<?php esc_url(the_permalink()) ; ?>" class="<?php esc_attr_e( 'img-box' )?>" title="<?php esc_attr(  the_title() ); ?>">

					<?php if (has_post_thumbnail( $loop->post->ID )) 
					echo get_the_post_thumbnail($loop->post->ID, 'medium'); 
					else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="" width="65px" height="115px" />'; ?>

		</a>

<div class="info">
	<p>
		<?php esc_html(  the_title(),'picworldtheme' );  ?>	
	</p>

</div>
			</li>

	
			<?php 



			endwhile;
			wp_reset_query(); ?>
		</ul>

	</div>
</section>

<?php endif;//if ( class_exists( 'WooCommerce' ) ) : ?>

	</section>
<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
	<section id="sales">
<?php //do_action( 'picworldtheme_get_sale_product' ); ?>	

	</section>

	<section id="follow-discount-1">

	</section>

	<section id="follow-discount-2">

	</section>

	
	<section id="spetual-offers-slider">

	</section>
	<!-- ------------- pobup wedgets------------- -->
	<div id="side-discount"></div>
	<div id="start-discount"></div>
	<!-- ------------- // pobup wedgets------------- -->
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();