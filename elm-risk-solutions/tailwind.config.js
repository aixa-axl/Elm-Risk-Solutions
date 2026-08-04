/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.php',
  ],
  theme: {
    extend: {
      colors: {
        // Placeholder tokens ? replace from Figma variables when design is locked
        'site-bg': '#FFFFFF',
        ink: '#1A1A1A',
        muted: '#5C5C5C',
        accent: '#1A1A1A',
      },
      fontFamily: {
        sans: ['system-ui', 'sans-serif'],
      },
      maxWidth: {
        site: '1366px',
      },
      spacing: {
        gutter: '76.8px',
        section: '120px',
      },
    },
  },
  plugins: [],
};
