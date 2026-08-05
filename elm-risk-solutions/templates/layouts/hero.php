<?php
/**
 * Layout: Hero
 *
 * Figma: Desktop frame 1 hero (node 5:3) — circular image + copy on ink.
 */

$image   = get_sub_field( 'image' );
$heading = get_sub_field( 'heading' );
$body    = get_sub_field( 'body' );
$link    = get_sub_field( 'link' );

if ( ! $image && ! $heading && ! $body && empty( $link['url'] ) ) {
	return;
}

$link_title = ! empty( $link['title'] ) ? $link['title'] : '';
?>

<section class="ers-hero bg-ink" aria-label="<?php echo esc_attr__( 'Hero', 'elm-risk-solutions' ); ?>">
	<div class="mx-auto flex w-full max-w-site flex-col gap-10 px-5 py-14 lg:flex-row lg:items-center lg:gap-16 lg:px-gutter lg:py-16">
		<?php if ( $image ) : ?>
			<div class="mx-auto w-full max-w-[507px] shrink-0 lg:mx-0 lg:w-[42%]">
				<div class="aspect-square overflow-hidden">
					<?php
					echo wp_get_attachment_image(
						$image,
						'large',
						false,
						array(
							'class'         => 'h-full w-full object-cover',
							'fetchpriority' => 'high',
							'loading'       => 'eager',
						)
					);
					?>
				</div>
			</div>
		<?php endif; ?>

		<div class="flex min-w-0 flex-1 flex-col justify-center text-cream lg:max-w-[395px]">
			<?php if ( $heading ) : ?>
				<h1 class="m-0 font-display text-[36px] leading-[1.1] tracking-[-2px] text-cream lg:text-[46.667px] lg:tracking-[-2.3333px]">
					<?php echo wp_kses_post( $heading ); ?>
				</h1>
			<?php endif; ?>

			<?php if ( $body ) : ?>
				<p class="mt-6 m-0 font-sans text-[20px] leading-[1.1] tracking-[-1px] text-cream lg:mt-8 lg:text-[24px] lg:tracking-[-1.2px]">
					<?php echo esc_html( $body ); ?>
				</p>
			<?php endif; ?>

			<?php if ( ! empty( $link['url'] ) ) : ?>
				<p class="mt-8 m-0 lg:mt-10">
					<a
						href="<?php echo esc_url( $link['url'] ); ?>"
						class="font-sans text-[20px] leading-[1.1] tracking-[-1.0667px] text-cream no-underline transition-opacity hover:opacity-80 lg:text-[22.333px]"
						<?php echo ! empty( $link['target'] ) ? 'target="' . esc_attr( $link['target'] ) . '"' : ''; ?>
						<?php echo ! empty( $link['target'] ) && '_blank' === $link['target'] ? 'rel="noopener noreferrer"' : ''; ?>
					>
						<?php if ( $link_title ) : ?>
							<?php
							// Underline the first word to match Figma (“Explore”).
							$parts = preg_split( '/\s+/', $link_title, 2 );
							if ( count( $parts ) === 2 ) {
								echo '<span class="underline decoration-solid underline-offset-2">' . esc_html( $parts[0] ) . '</span> ' . esc_html( $parts[1] );
							} else {
								echo '<span class="underline decoration-solid underline-offset-2">' . esc_html( $link_title ) . '</span>';
							}
							?>
						<?php else : ?>
							<span class="underline decoration-solid underline-offset-2"><?php esc_html_e( 'Explore', 'elm-risk-solutions' ); ?></span>
							<?php esc_html_e( ' our solutions →', 'elm-risk-solutions' ); ?>
						<?php endif; ?>
					</a>
				</p>
			<?php endif; ?>
		</div>
	</div>
</section>
