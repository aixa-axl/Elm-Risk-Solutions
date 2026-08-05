<?php
/**
 * Layout: Intro
 *
 * Centered heading, body copy, and CTA (Figma frame 2 / node 5:24).
 * Prefer section screenshots over Canva→Figma layer structure.
 */

$heading = get_sub_field( 'heading' );
$body    = get_sub_field( 'body' );
$link    = get_sub_field( 'link' );

if ( ! $heading && ! $body && empty( $link['url'] ) ) {
	return;
}

$cta_class = 'inline-flex h-[55px] min-w-[172px] items-center justify-center bg-cta px-6 font-sans text-nav-cta uppercase text-white no-underline transition-opacity hover:opacity-90';
?>

<section class="ers-intro bg-site-bg" aria-label="<?php echo esc_attr__( 'Intro', 'elm-risk-solutions' ); ?>">
	<div class="mx-auto flex w-full max-w-site flex-col items-center px-5 py-section text-center lg:px-gutter">
		<?php if ( $heading ) : ?>
			<h2 class="m-0 max-w-[573px] font-display text-[36px] leading-[1.1] tracking-[-2px] text-black lg:text-[45.667px] lg:tracking-[-2.3333px]">
				<?php echo esc_html( $heading ); ?>
			</h2>
		<?php endif; ?>

		<?php if ( $body ) : ?>
			<div class="mt-8 max-w-[640px] space-y-6 font-sans text-[20px] leading-[1.35] tracking-[-1px] text-ink lg:mt-10 lg:text-[24px] lg:leading-[1.1] lg:tracking-[-1.2px] [&_p]:m-0">
				<?php echo wp_kses_post( $body ); ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $link['url'] ) ) : ?>
			<div class="mt-10 lg:mt-12">
				<?php
				ers_render_link(
					$link,
					$cta_class,
					__( 'Discover Elm', 'elm-risk-solutions' )
				);
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
