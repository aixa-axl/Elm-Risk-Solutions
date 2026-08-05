<?php
/**
 * Layout: Feature Panel
 *
 * Full-bleed background + centered cream panel (Figma frames 4 & 7).
 * Optional CTA for “Let’s start with a conversation” style sections.
 * Prefer section screenshots over Canva→Figma layer structure.
 */

$background = get_sub_field( 'background_image' );
$heading    = get_sub_field( 'heading' );
$body       = get_sub_field( 'body' );
$link       = get_sub_field( 'link' );

if ( ! $background && ! $heading && ! $body && empty( $link['url'] ) ) {
	return;
}

$cta_class = 'inline-flex h-[55px] min-w-[172px] items-center justify-center bg-ink px-10 font-sans text-nav-cta uppercase text-white no-underline transition-opacity hover:opacity-90 lg:min-w-[280px]';
?>

<section
	class="ers-feature-panel relative flex min-h-[640px] items-center justify-center overflow-hidden bg-ink lg:min-h-[894px]"
	aria-label="<?php echo esc_attr( $heading ? $heading : __( 'Feature', 'elm-risk-solutions' ) ); ?>"
>
	<?php if ( $background ) : ?>
		<?php
		echo wp_get_attachment_image(
			$background,
			'full',
			false,
			array(
				'class'       => 'pointer-events-none absolute inset-0 h-full w-full object-cover',
				'alt'         => '',
				'loading'     => 'lazy',
				'aria-hidden' => 'true',
			)
		);
		?>
	<?php endif; ?>

	<div class="relative z-10 mx-auto w-full max-w-site px-5 py-16 lg:px-gutter lg:py-[148px]">
		<div class="mx-auto flex w-full max-w-[862px] flex-col items-center bg-cream px-8 py-12 text-center sm:px-12 sm:py-16 lg:px-16 lg:py-20">
			<?php if ( $heading ) : ?>
				<h2 class="m-0 mx-auto max-w-[540px] font-display text-[32px] leading-[1.1] tracking-[-2px] text-black lg:text-[45.667px] lg:tracking-[-2.3333px]">
					<?php echo esc_html( $heading ); ?>
				</h2>
			<?php endif; ?>

			<?php if ( $body ) : ?>
				<div class="mx-auto mt-6 max-w-[588px] space-y-5 font-sans text-[18px] leading-[1.35] tracking-[-1px] text-ink lg:mt-8 lg:space-y-6 lg:text-[20.333px] lg:leading-[1.1] lg:tracking-[-1.0667px] [&_p]:m-0">
					<?php echo wp_kses_post( $body ); ?>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $link['url'] ) ) : ?>
				<div class="mt-8 lg:mt-10">
					<?php
					ers_render_link(
						$link,
						$cta_class,
						__( 'Speak to us', 'elm-risk-solutions' )
					);
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
