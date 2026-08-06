<?php
/**
 * Footer Template
 *
 * Content from ACF Options (Theme Settings → Theme Footer).
 * Figma: Desktop frame 8 (node 5:204).
 */

$footer_tagline         = function_exists( 'get_field' ) ? get_field( 'footer_tagline', 'option' ) : null;
$footer_phone           = function_exists( 'get_field' ) ? get_field( 'footer_phone', 'option' ) : null;
$footer_email           = function_exists( 'get_field' ) ? get_field( 'footer_email', 'option' ) : null;
$footer_primary_heading = function_exists( 'get_field' ) ? get_field( 'footer_primary_heading', 'option' ) : null;
$footer_primary_links   = function_exists( 'get_field' ) ? get_field( 'footer_primary_links', 'option' ) : null;
$footer_info_heading    = function_exists( 'get_field' ) ? get_field( 'footer_info_heading', 'option' ) : null;
$footer_info_links      = function_exists( 'get_field' ) ? get_field( 'footer_info_links', 'option' ) : null;
$footer_badge           = function_exists( 'get_field' ) ? get_field( 'footer_badge', 'option' ) : null;
$footer_badge_label     = function_exists( 'get_field' ) ? get_field( 'footer_badge_label', 'option' ) : null;
$footer_legal           = function_exists( 'get_field' ) ? get_field( 'footer_legal', 'option' ) : null;
$footer_instagram_url   = function_exists( 'get_field' ) ? get_field( 'footer_instagram_url', 'option' ) : null;
$footer_linkedin_url    = function_exists( 'get_field' ) ? get_field( 'footer_linkedin_url', 'option' ) : null;

$has_primary_links = is_array( $footer_primary_links ) && ! empty( $footer_primary_links );
$has_info_links    = is_array( $footer_info_links ) && ! empty( $footer_info_links );
$primary_heading   = $footer_primary_heading ? $footer_primary_heading : get_bloginfo( 'name' );
$info_heading      = $footer_info_heading ? $footer_info_heading : __( 'Further information', 'elm-risk-solutions' );

$theme_uri    = get_template_directory_uri();
$ig_src       = $theme_uri . '/assets/images/footer/instagram.svg';
$linkedin_src = $theme_uri . '/assets/images/footer/linkedin.svg';

$link_class = 'font-sans text-[20.333px] leading-[1.3] tracking-[-1.0667px] text-white no-underline transition-opacity hover:opacity-70';
?>

	<footer id="site-footer" class="site-footer mt-auto bg-ink text-white">
		<div class="mx-auto w-full max-w-site px-5 pb-12 pt-[77px] lg:px-gutter lg:pb-16">
			<div class="flex flex-col gap-10 lg:flex-row lg:items-start lg:justify-between lg:gap-16">
				<?php if ( $footer_tagline ) : ?>
					<p class="max-w-[657px] font-display text-[28px] leading-[1.1] tracking-[-1.2px] text-white lg:text-[33.333px] lg:tracking-[-1.6667px]">
						<?php echo esc_html( $footer_tagline ); ?>
					</p>
				<?php endif; ?>

				<div class="shrink-0 lg:max-w-[316px] lg:text-right">
					<p class="font-display text-[28px] tracking-[-1.5px] text-white lg:text-nav-logo lg:tracking-[-2px]">
						<?php bloginfo( 'name' ); ?>
					</p>
					<?php if ( $footer_phone ) : ?>
						<p class="mt-4 font-sans text-[18.333px] leading-[1.3] tracking-[-1.0667px]">
							<a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $footer_phone ) ); ?>" class="text-white no-underline transition-opacity hover:opacity-70">
								<?php echo esc_html( $footer_phone ); ?>
							</a>
						</p>
					<?php endif; ?>
					<?php if ( $footer_email ) : ?>
						<p class="<?php echo $footer_phone ? 'mt-1' : 'mt-4'; ?> font-sans text-[18.333px] leading-[1.3] tracking-[-1.0667px]">
							<a href="<?php echo esc_url( 'mailto:' . $footer_email ); ?>" class="text-white no-underline transition-opacity hover:opacity-70">
								<?php echo esc_html( $footer_email ); ?>
							</a>
						</p>
					<?php endif; ?>
				</div>
			</div>

			<div class="mt-12 flex flex-col gap-10 lg:mt-14 lg:flex-row lg:items-end lg:justify-between lg:gap-16">
				<div class="flex flex-col gap-10 sm:flex-row sm:gap-16 lg:gap-24">
					<?php if ( $has_primary_links || $primary_heading ) : ?>
						<div>
							<p class="m-0 font-sans text-[25.667px] leading-[1.1] tracking-[-1.3333px] text-white lg:text-[26.667px]">
								<?php echo esc_html( $primary_heading ); ?>
							</p>
							<?php if ( $has_primary_links ) : ?>
								<nav class="mt-4" aria-label="<?php echo esc_attr__( 'Footer primary', 'elm-risk-solutions' ); ?>">
									<ul class="m-0 flex list-none flex-col gap-0 p-0">
										<?php foreach ( $footer_primary_links as $row ) : ?>
											<li>
												<?php
												$link = isset( $row['link'] ) ? $row['link'] : null;
												ers_render_link( $link, $link_class );
												?>
											</li>
										<?php endforeach; ?>
									</ul>
								</nav>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( $has_info_links || $footer_info_heading ) : ?>
						<div>
							<p class="m-0 font-sans text-[25.667px] leading-[1.1] tracking-[-1.3333px] text-white lg:text-[26.667px]">
								<?php echo esc_html( $info_heading ); ?>
							</p>
							<?php if ( $has_info_links ) : ?>
								<nav class="mt-4" aria-label="<?php echo esc_attr__( 'Footer further information', 'elm-risk-solutions' ); ?>">
									<ul class="m-0 flex list-none flex-col gap-0 p-0">
										<?php foreach ( $footer_info_links as $row ) : ?>
											<li>
												<?php
												$link = isset( $row['link'] ) ? $row['link'] : null;
												ers_render_link( $link, $link_class );
												?>
											</li>
										<?php endforeach; ?>
									</ul>
								</nav>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>

				<?php if ( $footer_badge ) : ?>
					<div class="flex flex-col items-center self-end lg:self-auto">
						<?php
						echo wp_get_attachment_image(
							$footer_badge,
							'medium',
							false,
							array(
								'class'   => 'h-[70px] w-auto object-contain',
								'alt'     => $footer_badge_label ? $footer_badge_label : __( 'Accreditation', 'elm-risk-solutions' ),
								'loading' => 'lazy',
							)
						);
						?>
						<?php if ( $footer_badge_label ) : ?>
							<span class="mt-2 font-display text-[12px] leading-[1.1] tracking-[-3.2px] text-white">
								<?php echo esc_html( $footer_badge_label ); ?>
							</span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="mt-14 border-t-[3px] border-header-rule pt-8 lg:mt-16">
				<div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between lg:gap-12">
					<?php if ( $footer_legal ) : ?>
						<p class="m-0 max-w-[924px] font-sans text-[13px] leading-[1.35] tracking-[-0.4px] text-white lg:text-[14px]">
							<?php echo wp_kses_post( $footer_legal ); ?>
						</p>
					<?php endif; ?>

					<?php if ( $footer_instagram_url || $footer_linkedin_url ) : ?>
						<ul class="m-0 flex list-none items-center gap-5 p-0 lg:shrink-0">
							<?php if ( $footer_instagram_url ) : ?>
								<li>
									<a
										href="<?php echo esc_url( $footer_instagram_url ); ?>"
										class="inline-flex no-underline opacity-100 transition-opacity hover:opacity-70"
										target="_blank"
										rel="noopener noreferrer"
									>
										<img
											src="<?php echo esc_url( $ig_src ); ?>"
											alt="<?php echo esc_attr__( 'Instagram', 'elm-risk-solutions' ); ?>"
											width="24"
											height="24"
											class="h-6 w-6"
											loading="lazy"
										>
									</a>
								</li>
							<?php endif; ?>
							<?php if ( $footer_linkedin_url ) : ?>
								<li>
									<a
										href="<?php echo esc_url( $footer_linkedin_url ); ?>"
										class="inline-flex no-underline opacity-100 transition-opacity hover:opacity-70"
										target="_blank"
										rel="noopener noreferrer"
									>
										<img
											src="<?php echo esc_url( $linkedin_src ); ?>"
											alt="<?php echo esc_attr__( 'LinkedIn', 'elm-risk-solutions' ); ?>"
											width="24"
											height="24"
											class="h-6 w-6"
											loading="lazy"
										>
									</a>
								</li>
							<?php endif; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
