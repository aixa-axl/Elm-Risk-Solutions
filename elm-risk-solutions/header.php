<?php
/**
 * Header Template
 *
 * Nav/CTA from ACF Options (Theme Settings → Theme Header).
 * Figma: Desktop frame 1 header — wordmark, links, SPEAK TO US CTA.
 */

$header_logo = function_exists( 'get_field' ) ? get_field( 'header_logo', 'option' ) : null;
$header_nav  = function_exists( 'get_field' ) ? get_field( 'header_nav_links', 'option' ) : null;
$primary_cta = function_exists( 'get_field' ) ? get_field( 'header_primary_cta', 'option' ) : null;
$has_acf_nav = is_array( $header_nav ) && ! empty( $header_nav );

$nav_link_class = 'font-sans text-nav-link text-ink no-underline transition-opacity hover:opacity-70';
$cta_class      = 'inline-flex h-[55px] min-w-[172px] items-center justify-center bg-cta px-6 font-sans text-nav-cta uppercase text-white no-underline transition-opacity hover:opacity-90';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-site-bg font-sans text-ink antialiased' ); ?>>
	<?php wp_body_open(); ?>

	<header id="masthead" class="site-header sticky top-0 z-50 border-b border-header-rule bg-white" data-mobile-nav>
		<div class="mx-auto flex w-full max-w-site items-center justify-between gap-6 px-5 py-[35px] lg:px-gutter lg:py-[35px]">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="shrink-0 no-underline">
				<?php if ( $header_logo ) : ?>
					<?php
					echo wp_get_attachment_image(
						$header_logo,
						'medium',
						false,
						array(
							'class'         => 'h-6 w-auto object-contain object-left lg:h-9',
							'alt'           => get_bloginfo( 'name' ),
							'fetchpriority' => 'high',
						)
					);
					?>
				<?php else : ?>
					<span class="font-display text-[16px] text-black tracking-[-1px] lg:text-[30px] lg:tracking-[-2px]">
						<?php bloginfo( 'name' ); ?>
					</span>
				<?php endif; ?>
			</a>

			<nav class="hidden items-center gap-10 lg:flex xl:gap-14" aria-label="<?php echo esc_attr__( 'Primary', 'elm-risk-solutions' ); ?>">
				<?php if ( $has_acf_nav ) : ?>
					<?php foreach ( $header_nav as $row ) : ?>
						<?php
						$link = isset( $row['link'] ) ? $row['link'] : null;
						ers_render_link( $link, $nav_link_class );
						?>
					<?php endforeach; ?>
				<?php endif; ?>

				<?php
				ers_render_link(
					$primary_cta,
					$cta_class,
					__( 'Speak to us', 'elm-risk-solutions' )
				);
				?>
			</nav>

			<button
				type="button"
				class="inline-flex items-center justify-center border border-ink px-3 py-2 font-sans text-sm text-ink lg:hidden"
				data-mobile-nav-toggle
				aria-expanded="false"
				aria-controls="mobile-nav-panel"
			>
				<?php esc_html_e( 'Menu', 'elm-risk-solutions' ); ?>
			</button>
		</div>

		<div id="mobile-nav-panel" class="border-t border-header-rule/30 px-5 py-4 lg:hidden" data-mobile-nav-panel hidden>
			<nav class="flex flex-col gap-4" aria-label="<?php echo esc_attr__( 'Mobile', 'elm-risk-solutions' ); ?>">
				<?php if ( $has_acf_nav ) : ?>
					<?php foreach ( $header_nav as $row ) : ?>
						<?php
						$link = isset( $row['link'] ) ? $row['link'] : null;
						ers_render_link( $link, $nav_link_class );
						?>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php
				ers_render_link(
					$primary_cta,
					$cta_class . ' w-full',
					__( 'Speak to us', 'elm-risk-solutions' )
				);
				?>
			</nav>
		</div>
	</header>
