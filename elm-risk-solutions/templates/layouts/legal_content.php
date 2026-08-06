<?php
/**
 * Layout: Legal Content
 *
 * Left-aligned policy/document page (Accessibility, Cookies, Terms).
 * Figma frame 34 / node 5:682. Prefer section screenshots over Canva→Figma layers.
 */

$heading = get_sub_field( 'heading' );
$label   = get_sub_field( 'label' );
$body    = get_sub_field( 'body' );

if ( ! $heading && ! $label && ! $body ) {
	return;
}
?>

<section class="ers-legal-content bg-site-bg" aria-label="<?php echo esc_attr( $heading ? $heading : __( 'Legal content', 'elm-risk-solutions' ) ); ?>">
	<div class="mx-auto w-full max-w-site px-5 py-section lg:px-gutter">
		<?php if ( $heading ) : ?>
			<h1 class="m-0 max-w-[840px] font-display text-[40px] leading-[1.1] tracking-[-2px] text-black lg:text-[52.333px] lg:tracking-[-2.6667px]">
				<?php echo esc_html( $heading ); ?>
			</h1>
		<?php endif; ?>

		<?php if ( $label ) : ?>
			<p class="mt-6 m-0 font-sans text-[16px] uppercase leading-[1.3] tracking-[-1.0667px] text-black lg:mt-8 lg:text-[18.333px]">
				<?php echo esc_html( $label ); ?>
			</p>
		<?php endif; ?>

		<?php if ( $body ) : ?>
			<div class="ers-legal-content__body mt-8 max-w-[1020px] font-sans text-[18px] leading-[1.35] tracking-[-1px] text-ink lg:mt-10 lg:text-[18px] lg:leading-[1.1] lg:tracking-[-1.2px]">
				<?php echo wp_kses_post( $body ); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
