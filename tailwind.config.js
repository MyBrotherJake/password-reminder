/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/css/*.css",
    "./resources/js/*.js",    
    "./resources/views/**/*.blade.php"
  ],
  theme: {
    extend: {}
  },
  plugins: [
    require('tailwindcss'),
    require('autoprefixer'),
  ],
}

