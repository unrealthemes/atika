<div class="cart-count-wrapper">

    <?php if ( WC()->cart->get_cart_contents_count() > 0 ) : ?>
        <div class="cart-count"><div><?php echo WC()->cart->get_cart_contents_count(); ?></div></div>
    <?php else : ?>
        
    <?php endif; ?>

</div>