<?php
/**
 * Layout: Intro
 *
 * Centered heading + optional label + body, with either a CTA button or a bottom icon
 * (Figma frames 2 & 10; also Complaints prose sections). Prefer section screenshots.
 */

$heading            = get_sub_field( 'heading' );
$label              = get_sub_field( 'label' );
$body               = get_sub_field( 'body' );
$link               = get_sub_field( 'link' );
$icon               = get_sub_field( 'icon' );
$section_background = get_sub_field( 'section_background' );

if ( ! $heading && ! $label && ! $body && empty( $link['url'] ) && ! $icon ) {
	return;
}

$section_bg_map = array(
	'white' => 'bg-site-bg',
	'cream' => 'bg-cream',
);
$section_bg_class = isset( $section_bg_map[ $section_background ] ) ? $section_bg_map[ $section_background ] : 'bg-site-bg';

$cta_class = 'inline-flex h-[55px] min-w-[172px] items-center justify-center bg-cta px-6 font-sans text-nav-cta uppercase text-white no-underline transition-opacity hover:opacity-90';
?>

<section class="ers-intro <?php echo esc_attr( $section_bg_class ); ?>" aria-label="<?php echo esc_attr( $heading ? $heading : __( 'Intro', 'elm-risk-solutions' ) ); ?>">
	<div class="mx-auto flex w-full max-w-site flex-col items-center px-5 py-section text-center lg:px-gutter">
		<?php if ( $heading ) : ?>
			<h2 class="m-0 max-w-[841px] font-display text-[36px] leading-[1.1] tracking-[-2px] text-black lg:text-[45.667px] lg:tracking-[-2.3333px]">
				<?php echo esc_html( $heading ); ?>
			</h2>
		<?php endif; ?>

		<?php if ( $label ) : ?>
			<p class="mt-6 m-0 max-w-[704px] font-sans text-[16px] uppercase leading-[1.3] tracking-[-1.0667px] text-black lg:mt-8 lg:text-[18.333px]">
				<?php echo esc_html( $label ); ?>
			</p>
		<?php endif; ?>

		<?php if ( $body ) : ?>
			<div class="mt-8 max-w-[704px] space-y-6 font-sans text-[20px] leading-[1.35] tracking-[-1px] text-ink lg:mt-10 lg:text-[24px] lg:leading-[1.1] lg:tracking-[-1.2px] [&_p]:m-0">
				<?php echo wp_kses_post( $body ); ?>
			</div>
		<?php endif; ?>

		<?php if ( $icon ) : ?>
			<div class="mt-12 lg:mt-16">
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
		<?php elseif ( ! empty( $link['url'] ) ) : ?>
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
