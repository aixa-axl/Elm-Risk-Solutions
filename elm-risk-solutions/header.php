<?php
/**
 * Header Template
 *
 * Minimal shell ? nav/CTA from ACF Options (Theme Settings ? Theme Header).
 * Wireframe: Elm Risk ? SPEAK TO US CTA + primary links.
 * Build real markup from Figma; do not copy Impact One Million header.
 */

$header_logo   = function_exists( 'get_field' ) ? get_field( 'header_logo', 'option' ) : null;
$header_nav    = function_exists( 'get_field' ) ? get_field( 'header_nav_links', 'option' ) : null;
$primary_cta   = function_exists( 'get_field' ) ? get_field( 'header_primary_cta', 'option' ) : null;
$has_acf_nav   = is_array( $header_nav ) && ! empty( $header_nav );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-site-bg text-ink antialiased' ); ?>>
	<?php wp_body_open(); ?>

	<header id="masthead" class="site-header sticky top-0 z-50 bg-white" data-mobile-nav>
		<div class="mx-auto flex w-full max-w-site items-center justify-between gap-6 px-5 py-4 lg:px-gutter">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="shrink-0 no-underline">
				<?php if ( $header_logo ) : ?>
					<?php
					echo wp_get_attachment_image(
						$header_logo,
						'medium',
						false,
						array(
							'class'         => 'h-10 w-auto object-contain object-left',
							'alt'           => get_bloginfo( 'name' ),
							'fetchpriority' => 'high',
						)
					);
					?>
				<?php else : ?>
					<span class="text-lg font-semibold tracking-wide text-ink">
						<?php bloginfo( 'name' ); ?>
					</span>
				<?php endif; ?>
			</a>

			<nav class="hidden items-center gap-8 lg:flex" aria-label="<?php echo esc_attr__( 'Primary', 'elm-risk-solutions' ); ?>">
				<?php if ( $has_acf_nav ) : ?>
					<?php foreach ( $header_nav as $row ) : ?>
						<?php
						$link = isset( $row['link'] ) ? $row['link'] : null;
						ers_render_link( $link, 'text-sm text-ink no-underline transition-opacity hover:opacity-70' );
						?>
					<?php endforeach; ?>
				<?php endif; ?>

				<?php
				ers_render_link(
					$primary_cta,
					'inline-flex items-center justify-center border border-ink px-5 py-3 text-sm uppercase tracking-wide text-ink no-underline transition-opacity hover:opacity-80',
					__( 'Speak to us', 'elm-risk-solutions' )
				);
				?>
			</nav>

			<button
				type="button"
				class="inline-flex items-center justify-center border border-ink px-3 py-2 text-sm lg:hidden"
				data-mobile-nav-toggle
				aria-expanded="false"
				aria-controls="mobile-nav-panel"
			>
				<?php esc_html_e( 'Menu', 'elm-risk-solutions' ); ?>
			</button>
		</div>

		<div id="mobile-nav-panel" class="border-t border-ink/10 px-5 py-4 lg:hidden" data-mobile-nav-panel hidden>
			<nav class="flex flex-col gap-4" aria-label="<?php echo esc_attr__( 'Mobile', 'elm-risk-solutions' ); ?>">
				<?php if ( $has_acf_nav ) : ?>
					<?php foreach ( $header_nav as $row ) : ?>
						<?php
						$link = isset( $row['link'] ) ? $row['link'] : null;
						ers_render_link( $link, 'text-sm text-ink no-underline' );
						?>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php
				ers_render_link(
					$primary_cta,
					'inline-flex items-center justify-center border border-ink px-5 py-3 text-sm uppercase tracking-wide text-ink no-underline',
					__( 'Speak to us', 'elm-risk-solutions' )
				);
				?>
			</nav>
		</div>
	</header>
