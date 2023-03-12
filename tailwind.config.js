/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
  ],
  theme: {
    extend: {
      backgroundPosition:{
        'top-4': 'right top -6rem',
      },
      screens:{
        'xs': '300px',
      },
      height:{
        'sh-32': '400px',
      },
    },
  },
  plugins: [],
}