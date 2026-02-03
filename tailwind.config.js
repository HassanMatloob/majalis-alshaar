/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    container: {
      padding: {
        DEFAULT:'20px',
        xl: '86px',
        lg: '46px',
        md: '36px',
        sm: "20px"
      },
      center: true,
    },
    extend: {
      colors: {
        primary: '#46584c',
        primaryHover: '#313d35',
        secondary:'#9e834b',
        black:'#17181A',
        white:"#ffffff",
        success:'#128145',
        successed:"#D4FFE8",
        info:"#811269",
        bgInfo: "#FFE5F9",
        warning:"#CC7209",
        bgWarning:"#FFF0DE",
      }
    },
  },
  plugins: [],
};
