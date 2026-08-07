/**
 * Elm Risk Solutions — main theme script
 */
(function () {
	const header = document.querySelector('#masthead');
	const toggle = header ? header.querySelector('[data-mobile-nav-toggle]') : null;
	const panel = header ? header.querySelector('[data-mobile-nav-panel]') : null;

	if (toggle && panel) {
		toggle.addEventListener('click', function () {
			const open = toggle.getAttribute('aria-expanded') === 'true';
			toggle.setAttribute('aria-expanded', open ? 'false' : 'true');
			panel.hidden = open;

			// Keep header visible while the mobile menu is open.
			if (!open && header) {
				header.classList.remove('is-header-hidden');
			}
		});
	}

	/**
	 * Hide header on scroll down; reveal on scroll up.
	 * Stays visible near the top of the page and while mobile nav is open.
	 */
	if (header) {
		let lastY = window.scrollY || 0;
		let ticking = false;
		const threshold = 8;
		const topReveal = 80;

		function isMobileNavOpen() {
			return toggle && toggle.getAttribute('aria-expanded') === 'true';
		}

		function updateHeader() {
			const y = window.scrollY || 0;
			const delta = y - lastY;

			if (Math.abs(delta) < threshold) {
				ticking = false;
				return;
			}

			if (y <= topReveal || isMobileNavOpen() || delta < 0) {
				header.classList.remove('is-header-hidden');
			} else {
				header.classList.add('is-header-hidden');
			}

			lastY = y;
			ticking = false;
		}

		window.addEventListener(
			'scroll',
			function () {
				if (!ticking) {
					window.requestAnimationFrame(updateHeader);
					ticking = true;
				}
			},
			{ passive: true }
		);
	}

	/**
	 * Subtle fade-in as sections enter the viewport.
	 * Tall sections (e.g. legal/privacy) skip the fade — threshold-based
	 * observers never fire when a section is taller than the viewport.
	 */
	function initScrollReveal() {
		const prefersReduced =
			window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
		const sections = document.querySelectorAll('.site-main .entry-content > section');

		if (!sections.length) {
			return;
		}

		if (prefersReduced || !('IntersectionObserver' in window)) {
			sections.forEach(function (section) {
				section.classList.add('ers-reveal', 'is-visible');
			});
			return;
		}

		const observer = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						entry.target.classList.add('is-visible');
						observer.unobserve(entry.target);
					}
				});
			},
			{
				root: null,
				rootMargin: '0px 0px -40px 0px',
				threshold: 0,
			}
		);

		sections.forEach(function (section) {
			// Long legal/policy pages: show immediately (no fade).
			if (section.classList.contains('ers-legal-content')) {
				section.classList.add('ers-reveal', 'is-visible');
				return;
			}

			section.classList.add('ers-reveal');
			observer.observe(section);
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initScrollReveal);
	} else {
		initScrollReveal();
	}
})();
