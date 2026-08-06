/**
 * Elm Risk Solutions — main theme script
 */
(function () {
	const header = document.querySelector('#masthead');
	if (!header) {
		return;
	}

	const toggle = header.querySelector('[data-mobile-nav-toggle]');
	const panel = header.querySelector('[data-mobile-nav-panel]');

	if (toggle && panel) {
		toggle.addEventListener('click', function () {
			const open = toggle.getAttribute('aria-expanded') === 'true';
			toggle.setAttribute('aria-expanded', open ? 'false' : 'true');
			panel.hidden = open;

			// Keep header visible while the mobile menu is open.
			if (!open) {
				header.classList.remove('is-header-hidden');
			}
		});
	}

	/**
	 * Hide header on scroll down; reveal on scroll up.
	 * Stays visible near the top of the page and while mobile nav is open.
	 */
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
})();
