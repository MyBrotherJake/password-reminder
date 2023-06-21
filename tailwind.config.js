/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/css/*.css",
    "./resources/js/*.js",
    //"./resources/views/layouts/layout.blade.php"
    "./resources/views/**/*.blade.php"
  ],
  theme: {
    extend: {
      gridTemplateColumns: {        
        '3': 'repeat(3, minmax(0, 1fr))',
      }
    },
  },
  plugins: [
    require('tailwindcss'),
    require('autoprefixer'),
  ],
}

