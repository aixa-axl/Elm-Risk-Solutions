<?php
/**
 * Layout: Approach
 *
 * “The Elm approach” — header + 2×2 step grid (Figma frame 5 / node 5:156).
 * Center mark is ACF-only (no hardcoded logo). Prefer section screenshots.
 */

$label       = get_sub_field( 'label' );
$heading     = get_sub_field( 'heading' );
$intro       = get_sub_field( 'intro' );
$center_logo = get_sub_field( 'center_logo' );
$steps       = get_sub_field( 'steps' );

$has_steps = is_array( $steps ) && ! empty( $steps );

if ( ! $label && ! $heading && ! $intro && ! $has_steps && ! $center_logo ) {
	return;
}
?>

<section class="ers-approach bg-site-bg" aria-label="<?php echo esc_attr__( 'The Elm approach', 'elm-risk-solutions' ); ?>">
	<div class="mx-auto w-full max-w-site px-5 py-section lg:px-gutter">
		<header class="mx-auto flex max-w-[704px] flex-col items-center text-center">
			<?php if ( $label ) : ?>
				<p class="m-0 font-sans text-[18px] uppercase leading-[1.1] tracking-[-1.3333px] text-ink lg:text-[27.667px]">
					<?php echo esc_html( $label ); ?>
				</p>
			<?php endif; ?>

			<?php if ( $heading ) : ?>
				<h2 class="mt-4 m-0 font-display text-[36px] leading-[1.1] tracking-[-2px] text-black lg:mt-5 lg:text-[45.667px] lg:tracking-[-2.3333px]">
					<?php echo esc_html( $heading ); ?>
				</h2>
			<?php endif; ?>

			<?php if ( $intro ) : ?>
				<p class="mt-6 m-0 max-w-[592px] font-sans text-[18px] leading-[1.35] tracking-[-1px] text-ink lg:mt-8 lg:text-[18px] lg:leading-[1.1] lg:tracking-[-1.2px]">
					<?php echo esc_html( $intro ); ?>
				</p>
			<?php endif; ?>
		</header>

		<?php if ( $has_steps ) : ?>
			<div class="relative mx-auto mt-14 max-w-[1114px] lg:mt-20">
				<ul class="m-0 grid list-none grid-cols-1 gap-10 p-0 sm:grid-cols-2 sm:gap-0">
					<?php foreach ( $steps as $step ) : ?>
						<?php
						$title = isset( $step['title'] ) ? $step['title'] : '';
						$body  = isset( $step['body'] ) ? $step['body'] : '';
						$cell_pad = 'sm:px-10 sm:py-14 lg:px-14 lg:py-16';
						?>
						<li class="flex flex-col items-center text-center <?php echo esc_attr( $cell_pad ); ?>">
							<?php if ( $title ) : ?>
								<h3 class="m-0 font-sans text-[24px] uppercase leading-[1.1] tracking-[-1.5px] text-ink lg:text-[35.333px] lg:tracking-[-1.6667px]">
									<?php echo esc_html( $title ); ?>
								</h3>
							<?php endif; ?>
							<?php if ( $body ) : ?>
								<p class="mt-4 m-0 max-w-[432px] font-sans text-[18px] leading-[1.35] tracking-[-1px] text-ink lg:mt-5 lg:text-[18px] lg:leading-[1.1] lg:tracking-[-1.2px]">
									<?php echo esc_html( $body ); ?>
								</p>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php // Crosshair — hidden on stacked mobile; gap in the middle for the logo. ?>
				<div class="pointer-events-none absolute inset-0 hidden sm:block" aria-hidden="true">
					<span class="absolute left-0 right-[calc(50%+56px)] top-1/2 h-px -translate-y-1/2 bg-ink/20"></span>
					<span class="absolute left-[calc(50%+56px)] right-0 top-1/2 h-px -translate-y-1/2 bg-ink/20"></span>
					<span class="absolute left-1/2 top-0 bottom-[calc(50%+56px)] w-px -translate-x-1/2 bg-ink/20"></span>
					<span class="absolute left-1/2 top-[calc(50%+56px)] bottom-0 w-px -translate-x-1/2 bg-ink/20"></span>
				</div>

				<?php if ( $center_logo ) : ?>
					<div class="absolute left-1/2 top-1/2 z-10 hidden -translate-x-1/2 -translate-y-1/2 sm:block">
						<?php
						echo wp_get_attachment_image(
							$center_logo,
							'medium',
							false,
							array(
								'class'   => 'h-auto w-[32px] object-contain lg:w-[36px]',
								'alt'     => '',
								'loading' => 'lazy',
							)
						);
						?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
