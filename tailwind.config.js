module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
      backgroundColors: {
          page: 'var(--page-background-color)',
          card: 'var(--card-background-color)',
          button: 'var(--button-background-color)'
      },
      extend: {}
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
