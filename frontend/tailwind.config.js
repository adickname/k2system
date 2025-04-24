/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx,vue}", // Dopasowanie do plików w src
  ],
  theme: {
    extend: {
      colors: {
        "dark-blue": "#023e8a",
        "nav-dark-blue": "#03045e",
        "primary-color": "#48cae4",
      },
    },
  },
  plugins: [],
};
