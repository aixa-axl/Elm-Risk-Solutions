<?php
/**
 * Layout: Enquiry Form
 *
 * “How can we help?” — heading + Fluent Forms shortcode in a navy panel
 * (Figma frame 25 / node 5:559). Form fields live in Fluent Forms.
 */

$heading        = get_sub_field( 'heading' );
$form_shortcode = get_sub_field( 'form_shortcode' );

if ( ! $heading && ! $form_shortcode ) {
	return;
}
?>

<section class="ers-enquiry-form bg-cream" aria-label="<?php echo esc_attr( $heading ? $heading : __( 'Enquiry form', 'elm-risk-solutions' ) ); ?>">
	<div class="mx-auto w-full max-w-site px-5 py-section lg:px-gutter">
		<?php if ( $heading ) : ?>
			<h2 class="m-0 mx-auto max-w-[500px] text-center font-display text-[36px] leading-[1.1] tracking-[-2px] text-black lg:text-[45.667px] lg:tracking-[-2.3333px]">
				<?php echo esc_html( $heading ); ?>
			</h2>
		<?php endif; ?>

		<?php if ( $form_shortcode ) : ?>
			<div class="ers-enquiry-form__panel mt-10 bg-ink px-5 py-10 sm:px-8 sm:py-12 lg:mt-14 lg:px-16 lg:py-16">
				<?php echo do_shortcode( $form_shortcode ); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
