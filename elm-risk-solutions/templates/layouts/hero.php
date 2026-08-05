<?php
/**
 * Layout: Hero
 *
 * Homepage hero — navy panel, rectangular image + copy.
 * Prefer section screenshots over Canva→Figma layer structure.
 */

$image   = get_sub_field( 'image' );
$heading = get_sub_field( 'heading' );
$body    = get_sub_field( 'body' );
$link    = get_sub_field( 'link' );

if ( ! $image && ! $heading && ! $body && empty( $link['url'] ) ) {
	return;
}

$link_title = ! empty( $link['title'] ) ? $link['title'] : __( 'Explore our solutions →', 'elm-risk-solutions' );
?>

<section class="ers-hero bg-site-bg" aria-label="<?php echo esc_attr__( 'Hero', 'elm-risk-solutions' ); ?>">
	<div class="mx-auto w-full max-w-site px-5 py-14 lg:px-gutter lg:py-16">
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
						<p class="mt-6 m-0 font-sans text-[20px] leading-[1.35] tracking-[-1px] text-white lg:mt-8 lg:text-[24px] lg:tracking-[-1.2px]">
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
