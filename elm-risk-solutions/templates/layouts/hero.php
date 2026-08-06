<?php
/**
 * Layout: Hero
 *
 * Variants:
 * - split   — navy panel, image beside copy (homepage)
 * - overlay — inset photo panel, copy bottom-left (inner pages)
 * Prefer section screenshots over Canva→Figma layer structure.
 */

$style   = get_sub_field( 'style' );
$image   = get_sub_field( 'image' );
$heading = get_sub_field( 'heading' );
$body    = get_sub_field( 'body' );
$link    = get_sub_field( 'link' );

if ( ! $image && ! $heading && ! $body && empty( $link['url'] ) ) {
	return;
}

$is_overlay = ( 'overlay' === $style );
$link_title = ! empty( $link['title'] ) ? $link['title'] : ( $is_overlay ? __( 'Speak to us →', 'elm-risk-solutions' ) : __( 'Explore our solutions →', 'elm-risk-solutions' ) );

// Scrim for cream text on light photos. Contact Us always; elsewhere via ACF toggle.
$darken_image = (bool) get_sub_field( 'darken_image' );
if ( ! $darken_image && $is_overlay && is_page( array( 'contact', 'contact-us', 'contactus' ) ) ) {
	$darken_image = true;
}
?>

<?php if ( $is_overlay ) : ?>

<section class="ers-hero ers-hero--overlay bg-site-bg" aria-label="<?php echo esc_attr__( 'Hero', 'elm-risk-solutions' ); ?>">
	<div class="mx-auto w-full max-w-site px-5 py-section lg:px-gutter">
		<div class="relative flex min-h-[520px] items-end overflow-hidden bg-ink lg:min-h-[675px]">
			<?php if ( $image ) : ?>
				<?php
				echo wp_get_attachment_image(
					$image,
					'full',
					false,
					array(
						'class'         => 'pointer-events-none absolute inset-0 h-full w-full object-cover',
						'alt'           => '',
						'fetchpriority' => 'high',
						'loading'       => 'eager',
						'aria-hidden'   => 'true',
					)
				);
				?>
			<?php endif; ?>

			<?php if ( $darken_image ) : ?>
				<div
					class="pointer-events-none absolute inset-0 bg-gradient-to-t from-ink/85 via-ink/50 to-ink/20"
					aria-hidden="true"
				></div>
			<?php endif; ?>

			<div class="relative z-10 w-full px-5 pb-10 pt-20 sm:px-8 lg:px-12 lg:pb-14 lg:pt-28">
				<div class="max-w-[626px] text-cream">
					<?php if ( $heading ) : ?>
						<h1 class="m-0 font-display text-[36px] leading-[1.1] tracking-[-2px] text-cream lg:text-[45.667px] lg:tracking-[-2.3333px]">
							<?php echo wp_kses_post( $heading ); ?>
						</h1>
					<?php endif; ?>

					<?php if ( $body ) : ?>
						<p class="mt-5 m-0 font-sans text-[18px] leading-[1.35] tracking-[-1px] text-cream lg:mt-6 lg:text-[18px] lg:leading-[1.1] lg:tracking-[-1.2px]">
							<?php echo esc_html( $body ); ?>
						</p>
					<?php endif; ?>

					<?php if ( ! empty( $link['url'] ) ) : ?>
						<p class="mt-8 m-0 lg:mt-10">
							<a
								href="<?php echo esc_url( $link['url'] ); ?>"
								class="font-sans text-[18px] leading-[1.1] tracking-[-1.0667px] text-cream underline decoration-solid underline-offset-4 transition-opacity hover:opacity-80 lg:text-[22.333px]"
								<?php echo ! empty( $link['target'] ) ? 'target="' . esc_attr( $link['target'] ) . '"' : ''; ?>
								<?php echo ! empty( $link['target'] ) && '_blank' === $link['target'] ? 'rel="noopener noreferrer"' : ''; ?>
							>
								<?php echo esc_html( $link_title ); ?>
							</a>
						</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php else : ?>

<section class="ers-hero ers-hero--split bg-site-bg" aria-label="<?php echo esc_attr__( 'Hero', 'elm-risk-solutions' ); ?>">
	<div class="mx-auto w-full max-w-site px-5 py-section lg:px-gutter">
		<div class="bg-ink px-5 py-10 sm:px-8 sm:py-12 lg:px-12 lg:py-14">
			<div class="flex flex-col gap-10 lg:flex-row lg:items-center lg:gap-16 xl:gap-20">
				<?php if ( $image ) : ?>
					<div class="w-full shrink-0 lg:w-[48%] xl:w-[507px]">
						<?php
						echo wp_get_attachment_image(
							$image,
							'large',
							false,
							array(
								'class'         => 'h-auto w-full object-cover',
								'fetchpriority' => 'high',
								'loading'       => 'eager',
							)
						);
						?>
					</div>
				<?php endif; ?>

				<div class="flex min-w-0 flex-1 flex-col justify-center text-white lg:max-w-[420px]">
					<?php if ( $heading ) : ?>
						<h1 class="m-0 font-display text-[36px] leading-[1.1] tracking-[-2px] text-white lg:text-[46.667px] lg:tracking-[-2.3333px]">
							<?php echo wp_kses_post( $heading ); ?>
						</h1>
					<?php endif; ?>

					<?php if ( $body ) : ?>
						<p class="mt-6 m-0 font-sans text-[20px] leading-[1.35] tracking-[-1px] text-white lg:mt-8 lg:text-[18px] lg:tracking-[-1.2px]">
							<?php echo esc_html( $body ); ?>
						</p>
					<?php endif; ?>

					<?php if ( ! empty( $link['url'] ) ) : ?>
						<p class="mt-8 m-0 lg:mt-10">
							<a
								href="<?php echo esc_url( $link['url'] ); ?>"
								class="font-sans text-[20px] leading-[1.1] tracking-[-1.0667px] text-white underline decoration-solid underline-offset-4 transition-opacity hover:opacity-80 lg:text-[22.333px]"
								<?php echo ! empty( $link['target'] ) ? 'target="' . esc_attr( $link['target'] ) . '"' : ''; ?>
								<?php echo ! empty( $link['target'] ) && '_blank' === $link['target'] ? 'rel="noopener noreferrer"' : ''; ?>
							>
								<?php echo esc_html( $link_title ); ?>
							</a>
						</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php endif; ?>
