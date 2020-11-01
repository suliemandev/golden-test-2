module.exports = {
  future: {
    // removeDeprecatedGapUtilities: true,
    // purgeLayersByDefault: true,
  },
  purge: [],
  theme: {
    extend: {
      colors: {
        'yellow-500': '#FFD223'
      }
    },
  },
  variants: {},
  plugins: [
    require('tailwindcss-rtl'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/ui'),
  ],
}
