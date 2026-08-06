<?php
/**
 * Layout: Solutions Grid
 *
 * Expertise intro + 3-column solution cards (Figma frame 3 / node 5:31).
 * Prefer section screenshots over Canva→Figma layer structure.
 */

$heading = get_sub_field( 'heading' );
$label   = get_sub_field( 'label' );
$intro   = get_sub_field( 'intro' );
$cards   = get_sub_field( 'cards' );
$cta     = get_sub_field( 'cta' );

$has_cards = is_array( $cards ) && ! empty( $cards );

if ( ! $heading && ! $label && ! $intro && ! $has_cards && empty( $cta['url'] ) ) {
	return;
}

$cta_class = 'inline-flex h-[55px] min-w-[172px] items-center justify-center bg-ink px-8 font-sans text-nav-cta uppercase text-white no-underline transition-opacity hover:opacity-90 lg:min-w-[393px]';
?>

<section class="ers-solutions-grid bg-cream" aria-label="<?php echo esc_attr__( 'Insurance solutions', 'elm-risk-solutions' ); ?>">
	<div class="mx-auto w-full max-w-site px-5 py-section lg:px-gutter">
		<header class="mx-auto flex max-w-[897px] flex-col items-center text-center">
			<?php if ( $heading ) : ?>
				<h2 class="m-0 font-display text-[36px] leading-[1.1] tracking-[-2px] text-ink lg:text-[52.333px] lg:tracking-[-2.6667px]">
					<?php echo esc_html( $heading ); ?>
				</h2>
			<?php endif; ?>

			<?php if ( $label ) : ?>
				<p class="mt-6 m-0 font-sans text-[18px] uppercase leading-[1.1] tracking-[-1.2px] text-ink lg:mt-8 lg:text-[25px]">
					<?php echo esc_html( $label ); ?>
				</p>
			<?php endif; ?>

			<?php if ( $intro ) : ?>
				<p class="mt-4 m-0 max-w-[592px] font-sans text-[18px] leading-[1.35] tracking-[-1px] text-ink lg:mt-5 lg:text-[24px] lg:leading-[1.1] lg:tracking-[-1.2px]">
					<?php echo esc_html( $intro ); ?>
				</p>
			<?php endif; ?>
		</header>

		<?php if ( $has_cards ) : ?>
			<ul class="mt-12 m-0 grid list-none grid-cols-1 gap-6 p-0 sm:grid-cols-2 lg:mt-16 lg:grid-cols-3 lg:gap-8">
				<?php foreach ( $cards as $card ) : ?>
					<?php
					$image       = isset( $card['image'] ) ? $card['image'] : null;
					$title       = isset( $card['title'] ) ? $card['title'] : '';
					$body        = isset( $card['body'] ) ? $card['body'] : '';
					$link        = isset( $card['link'] ) ? $card['link'] : null;
					$is_dark     = ! empty( $card['dark_background'] );
					$card_bg     = $is_dark ? 'bg-ink' : 'bg-cta';
					$link_title  = ! empty( $link['title'] ) ? $link['title'] : __( 'Explore our solutions →', 'elm-risk-solutions' );
					?>
					<li class="<?php echo esc_attr( $card_bg ); ?> flex flex-col p-6 text-white lg:p-8">
						<?php if ( $image ) : ?>
							<div class="aspect-square w-full overflow-hidden">
								<?php
								echo wp_get_attachment_image(
									$image,
									'large',
									false,
									array(
										'class'   => 'h-full w-full object-cover',
										'loading' => 'lazy',
									)
								);
								?>
							</div>
						<?php endif; ?>

						<?php if ( $title ) : ?>
							<h3 class="mt-6 m-0 font-display text-[32px] leading-[1.1] tracking-[-2px] text-white lg:mt-8 lg:text-[40px]">
								<?php echo esc_html( $title ); ?>
							</h3>
						<?php endif; ?>

						<?php if ( $body ) : ?>
							<p class="mt-4 m-0 flex-1 font-sans text-[18px] leading-[1.35] tracking-[-1px] text-white lg:text-[24px] lg:leading-[1.1] lg:tracking-[-1.2px]">
								<?php echo esc_html( $body ); ?>
							</p>
						<?php endif; ?>

						<?php if ( ! empty( $link['url'] ) ) : ?>
							<p class="mt-6 m-0 lg:mt-8">
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
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( ! empty( $cta['url'] ) ) : ?>
			<div class="mt-12 flex justify-center lg:mt-16 whitespace-nowrap">
				<?php
				ers_render_link(
					$cta,
					$cta_class,
					__( 'View all insurance solutions', 'elm-risk-solutions' )
				);
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
