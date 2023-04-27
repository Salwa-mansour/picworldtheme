<?php	$args = array(
				'post_type' => 'product',
				
			);?>

		<?php	$all = new WP_Query( $args );
				$onSale =array();
		foreach($all as $item):
if( is_on_sale($item))

$onSale.push(item);
echo $onSale;
		endforeach;

?>
