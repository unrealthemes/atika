<?php 
$form = get_field('select_form_c', 'option');

if ( ! $form ) {
    return false;
}

$contact_form = WPCF7_ContactForm::get_instance( $form->ID );
?>

<div class="myPopup-1" id="myPopup">
    <div class="popup-block">

        <?php echo do_shortcode( $contact_form->shortcode() ); ?>

    </div>
</div>