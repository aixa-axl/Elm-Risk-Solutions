<?php
/**
 * Layout: Media Text
 *
 * Reusable coloured panel: image + heading/label/body/CTA + optional footer note.
 * Used for Personal service, Private aviation, Equine, Business, etc.
 * Prefer section screenshots over Canva→Figma layer structure.
 */

$image              = get_sub_field( 'image' );
$heading            = get_sub_field( 'heading' );
$label              = get_sub_field( 'label' );
$body               = get_sub_field( 'body' );
$link               = get_sub_field( 'link' );
$footer_note        = get_sub_field( 'footer_note' );
$background         = get_sub_field( 'background' );
$section_background = get_sub_field( 'section_background' );
$content_align      = get_sub_field( 'content_align' );

if ( ! $image && ! $heading && ! $label && ! $body && empty( $link['url'] ) && ! $footer_note ) {
	return;
}

$bg_map = array(
	'ink'   => 'bg-ink',
	'taupe' => 'bg-cta',
	'brand' => 'bg-header-rule',
);
$bg_class = isset( $bg_map[ $background ] ) ? $bg_map[ $background ] : 'bg-header-rule';

$section_bg_map = array(
	'white' => 'bg-white',
	'cream' => 'bg-cream',
);
$section_bg_class = isset( $section_bg_map[ $section_background ] ) ? $section_bg_map[ $section_background ] : 'bg-white';

$is_center   = ( 'center' === $content_align );
$row_align   = $is_center ? 'lg:items-center' : 'lg:items-start';
$heading_align = $is_center ? 'text-center' : 'text-left';

$link_title = ! empty( $link['title'] ) ? $link['title'] : '';
?>

<section class="ers-media-text <?php echo esc_attr( $section_bg_class ); ?>" aria-label="<?php echo esc_attr( $heading ? $heading : __( 'Feature', 'elm-risk-solutions' ) ); ?>">
	<div class="mx-auto w-full max-w-site px-5 lg:px-gutter">
		<div class="<?php echo esc_attr( $bg_class ); ?> px-5 py-8 text-cream sm:px-8 sm:py-10 lg:px-12 lg:py-14">
			<div class="flex flex-col gap-8 lg:flex-row lg:gap-12 xl:gap-16 <?php echo esc_attr( $row_align ); ?>">
				<?php if ( $image ) : ?>
					<div class="w-full shrink-0 lg:w-[48%] xl:w-[507px]">
						<div class="aspect-square overflow-hidden">
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
					</div>
				<?php endif; ?>

				<div class="flex min-w-0 flex-1 flex-col lg:max-w-[420px] lg:pt-0">
					<?php if ( $heading ) : ?>
						<h2 class="m-0 font-display text-[36px] leading-[1.1] tracking-[-2px] text-cream lg:text-[45.667px] lg:tracking-[-2.3333px] <?php echo esc_attr( $heading_align ); ?>">
							<?php echo esc_html( $heading ); ?>
						</h2>
					<?php endif; ?>

					<?php if ( $label ) : ?>
						<p class="mt-4 m-0 font-sans text-[18px] uppercase leading-[1.1] tracking-[-1.0667px] text-white lg:mt-5 lg:text-[22.333px]">
							<?php echo esc_html( $label ); ?>
						</p>
					<?php endif; ?>

					<?php if ( $body ) : ?>
						<div class="mt-6 space-y-5 font-sans text-[18px] leading-[1.35] tracking-[-1px] text-cream lg:mt-8 lg:space-y-6 lg:text-[18px] lg:leading-[1.1] lg:tracking-[-1.2px] [&_p]:m-0">
							<?php echo wp_kses_post( $body ); ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $link['url'] ) ) : ?>
						<p class="mt-8 m-0 lg:mt-10">
							<a
								href="<?php echo esc_url( $link['url'] ); ?>"
								class="font-sans text-[18px] leading-[1.1] tracking-[-1.0667px] text-cream underline decoration-solid underline-offset-4 transition-opacity hover:opacity-80 lg:text-[22.333px]"
								<?php echo ! empty( $link['target'] ) ? 'target="' . esc_attr( $link['target'] ) . '"' : ''; ?>
								<?php echo ! empty( $link['target'] ) && '_blank' === $link['target'] ? 'rel="noopener noreferrer"' : ''; ?>
							>
								<?php echo esc_html( $link_title ? $link_title : __( 'Learn more →', 'elm-risk-solutions' ) ); ?>
							</a>
						</p>
					<?php endif; ?>
				</div>
			</div>

			<?php if ( $footer_note ) : ?>
				<p class="mt-8 m-0 font-sans text-[15px] leading-[1.35] tracking-[-0.8px] text-cream lg:mt-10 lg:text-[18px] lg:leading-[1.3]">
					<?php echo esc_html( $footer_note ); ?>
				</p>
			<?php endif; ?>
		</div>
	</div>
</section>
