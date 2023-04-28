<?php 
global $product;

if ( ! $product->get_sale_price() ) {
    return false;
}

$percent = ( 100 * (float)$product->get_sale_price() ) / (float)$product->get_regular_price(); 
$result_percent = ceil( 100 - $percent );
?>

<div class="c-cool-price">
    <img src="<?php echo THEME_URI; ?>/img/sloi_1_kopiya_2_2.png" alt="">
    <div class="c-cool-price-num"><?php echo $result_percent; ?>%</div>
</div>