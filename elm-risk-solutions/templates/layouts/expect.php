<?php
/**
 * Layout: Expect
 *
 * “What you can expect” — centered label/heading + 4-column items
 * (Figma frame 18 / node 5:466). Prefer section screenshots over Canva→Figma layers.
 */

$label   = get_sub_field( 'label' );
$heading = get_sub_field( 'heading' );
$items   = get_sub_field( 'items' );

$has_items = is_array( $items ) && ! empty( $items );

if ( ! $label && ! $heading && ! $has_items ) {
	return;
}
?>

<section class="ers-expect bg-cream" aria-label="<?php echo esc_attr( $label ? $label : __( 'What you can expect', 'elm-risk-solutions' ) ); ?>">
	<div class="mx-auto w-full max-w-site px-5 py-section lg:px-gutter">
		<header class="mx-auto flex max-w-[704px] flex-col items-center text-center">
			<?php if ( $label ) : ?>
				<p class="m-0 font-sans text-[18px] uppercase leading-[1.1] tracking-[-1.3333px] text-ink lg:text-[27.667px]">
					<?php echo esc_html( $label ); ?>
				</p>
			<?php endif; ?>

			<?php if ( $heading ) : ?>
				<h2 class="mt-4 m-0 font-display text-[36px] leading-[1.1] tracking-[-2px] text-ink lg:mt-5 lg:text-[45.667px] lg:tracking-[-2.3333px]">
					<?php echo esc_html( $heading ); ?>
				</h2>
			<?php endif; ?>
		</header>

		<?php if ( $has_items ) : ?>
			<ul class="mt-12 m-0 grid list-none grid-cols-1 gap-10 p-0 sm:grid-cols-2 sm:gap-x-8 sm:gap-y-12 lg:mt-16 lg:grid-cols-4 lg:gap-x-10 lg:gap-y-0">
				<?php foreach ( $items as $item ) : ?>
					<?php
					$title = isset( $item['title'] ) ? $item['title'] : '';
					$body  = isset( $item['body'] ) ? $item['body'] : '';

					if ( ! $title && ! $body ) {
						continue;
					}
					?>
					<li class="flex flex-col text-left">
						<?php if ( $title ) : ?>
							<h3 class="m-0 min-h-[2.2em] font-sans text-[20px] uppercase leading-[1.1] tracking-[-1.3333px] text-ink lg:text-[27.667px]">
								<?php echo esc_html( $title ); ?>
							</h3>
						<?php endif; ?>

						<?php if ( $body ) : ?>
							<p class="mt-5 m-0 max-w-[240px] font-sans text-[18px] leading-[1.35] tracking-[-1px] text-ink lg:mt-6 lg:text-[24px] lg:leading-[1.1] lg:tracking-[-1.2px]">
								<?php echo esc_html( $body ); ?>
							</p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
