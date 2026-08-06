<?php
/**
 * Layout: Contact
 *
 * “Speak directly with Elm” — centered contact details + notes + closing
 * (Figma frame 24 / node 5:549). Bottom icon is ACF-only.
 */

$heading   = get_sub_field( 'heading' );
$details   = get_sub_field( 'details' );
$note      = get_sub_field( 'note' );
$form_note = get_sub_field( 'form_note' );
$closing   = get_sub_field( 'closing' );
$icon      = get_sub_field( 'icon' );

$has_details = is_array( $details ) && ! empty( $details );

if ( ! $heading && ! $has_details && ! $note && ! $form_note && ! $closing && ! $icon ) {
	return;
}

$text_class = 'font-sans text-[18px] leading-[1.35] tracking-[-1px] text-ink lg:text-[24px] lg:leading-[1.1] lg:tracking-[-1.2px]';
?>

<section class="ers-contact bg-site-bg" aria-label="<?php echo esc_attr( $heading ? $heading : __( 'Contact', 'elm-risk-solutions' ) ); ?>">
	<div class="mx-auto flex w-full max-w-site flex-col items-center px-5 py-section text-center lg:px-gutter">
		<?php if ( $heading ) : ?>
			<h2 class="m-0 max-w-[500px] font-display text-[36px] leading-[1.1] tracking-[-2px] text-black lg:text-[45.667px] lg:tracking-[-2.3333px]">
				<?php echo esc_html( $heading ); ?>
			</h2>
		<?php endif; ?>

		<?php if ( $has_details ) : ?>
			<ul class="mt-10 m-0 flex list-none flex-col gap-6 p-0 lg:mt-12 lg:gap-7">
				<?php foreach ( $details as $row ) : ?>
					<?php
					$label = isset( $row['label'] ) ? $row['label'] : '';
					$value = isset( $row['value'] ) ? $row['value'] : '';
					$type  = isset( $row['link_type'] ) ? $row['link_type'] : 'none';

					if ( ! $label && ! $value ) {
						continue;
					}

					$href = '';
					if ( 'tel' === $type && $value ) {
						$href = 'tel:' . preg_replace( '/[^\d+]/', '', $value );
					} elseif ( 'email' === $type && $value ) {
						$href = 'mailto:' . $value;
					}
					?>
					<li class="<?php echo esc_attr( $text_class ); ?>">
						<?php if ( $label ) : ?>
							<p class="m-0"><?php echo esc_html( $label ); ?></p>
						<?php endif; ?>
						<?php if ( $value ) : ?>
							<p class="m-0">
								<?php if ( $href ) : ?>
									<a href="<?php echo esc_url( $href ); ?>" class="text-ink no-underline transition-opacity hover:opacity-70">
										<?php echo esc_html( $value ); ?>
									</a>
								<?php else : ?>
									<?php echo esc_html( $value ); ?>
								<?php endif; ?>
							</p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( $note ) : ?>
			<div class="mt-8 max-w-[704px] space-y-1 <?php echo esc_attr( $text_class ); ?> [&_p]:m-0 lg:mt-10">
				<?php echo wp_kses_post( $note ); ?>
			</div>
		<?php endif; ?>

		<?php if ( $form_note ) : ?>
			<p class="mt-10 m-0 max-w-[704px] <?php echo esc_attr( $text_class ); ?> lg:mt-12">
				<?php echo esc_html( $form_note ); ?>
			</p>
		<?php endif; ?>

		<?php if ( $closing ) : ?>
			<p class="mt-12 m-0 max-w-[720px] font-display text-[28px] leading-[1.1] tracking-[-2px] text-black lg:mt-16 lg:text-[40px]">
				<?php echo esc_html( $closing ); ?>
			</p>
		<?php endif; ?>

		<?php if ( $icon ) : ?>
			<div class="mt-10 lg:mt-14">
				<?php
				echo wp_get_attachment_image(
					$icon,
					'medium',
					false,
					array(
						'class'   => 'mx-auto h-auto w-[32px] object-contain lg:w-[36px]',
						'alt'     => '',
						'loading' => 'lazy',
					)
				);
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
