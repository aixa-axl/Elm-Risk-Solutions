<?php
/**
 * Footer Template
 *
 * Content from ACF Options (Theme Settings ? Theme Footer).
 * Build real markup from Figma; do not copy Impact One Million footer.
 */

$footer_logo    = function_exists( 'get_field' ) ? get_field( 'footer_logo', 'option' ) : null;
$footer_tagline = function_exists( 'get_field' ) ? get_field( 'footer_tagline', 'option' ) : null;
$footer_copy    = function_exists( 'get_field' ) ? get_field( 'footer_copyright', 'option' ) : null;
$footer_nav     = function_exists( 'get_field' ) ? get_field( 'footer_nav_links', 'option' ) : null;
$has_acf_nav    = is_array( $footer_nav ) && ! empty( $footer_nav );
?>

	<footer id="site-footer" class="site-footer mt-auto bg-ink px-5 py-10 text-white lg:px-gutter lg:py-16">
		<div class="mx-auto flex w-full max-w-site flex-col gap-8 lg:flex-row lg:items-start lg:justify-between">
			<div>
				<?php if ( $footer_logo ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-block no-underline">
						<?php
						echo wp_get_attachment_image(
							$footer_logo,
							'medium',
							false,
							array(
								'class'   => 'h-8 w-auto object-contain',
								'alt'     => get_bloginfo( 'name' ),
								'loading' => 'lazy',
							)
						);
						?>
					</a>
				<?php else : ?>
					<p class="text-sm font-semibold tracking-wide"><?php bloginfo( 'name' ); ?></p>
				<?php endif; ?>

				<?php if ( $footer_tagline ) : ?>
					<p class="mt-2 text-sm text-white/70">
						<?php echo esc_html( $footer_tagline ); ?>
					</p>
				<?php endif; ?>

				<p class="mt-2 text-sm text-white/70">
					&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
					<?php
					if ( $footer_copy ) {
						echo ' ' . esc_html( $footer_copy );
					} else {
						echo ' ' . esc_html( get_bloginfo( 'name' ) ) . '. ';
						esc_html_e( 'All rights reserved.', 'elm-risk-solutions' );
					}
					?>
				</p>
			</div>

			<?php if ( $has_acf_nav ) : ?>
				<nav aria-label="<?php echo esc_attr__( 'Footer', 'elm-risk-solutions' ); ?>">
					<ul class="m-0 flex list-none flex-col gap-3 p-0 text-sm text-white/80">
						<?php foreach ( $footer_nav as $row ) : ?>
							<li>
								<?php
								$link = isset( $row['link'] ) ? $row['link'] : null;
								ers_render_link( $link, 'text-white/80 no-underline transition-opacity hover:opacity-100' );
								?>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav>
			<?php endif; ?>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
