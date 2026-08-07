/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.php',
  ],
  theme: {
    extend: {
      colors: {
        'site-bg': '#FFFFFF',
        ink: '#18243A',
        'ink-hover': '#101828',
        cream: '#F4F0E9',
        muted: '#5C5C5C',
        accent: '#8D8175',
        cta: '#8D8175',
        'cta-hover': '#72675C',
        'header-rule': '#A12F5C',
        'header-rule-hover': '#86264C',
      },
      fontFamily: {
        // Self-hosted in assets/fonts/ via @font-face in src/input.css
        sans: ['"Avenir Next"', 'Avenir', 'Helvetica Neue', 'system-ui', 'sans-serif'],
        display: ['"IvyOra Display"', 'Georgia', 'Times New Roman', 'serif'],
      },
      fontSize: {
        'nav-link': ['19.333px', { lineHeight: 'normal' }],
        'nav-cta': ['18.667px', { lineHeight: 'normal' }],
        'nav-logo': ['37px', { lineHeight: 'normal', letterSpacing: '-2px' }],
      },
      maxWidth: {
        site: '1366px',
      },
      spacing: {
        gutter: '76.8px',
        section: '80px',
      },
    },
  },
  plugins: [],
};
