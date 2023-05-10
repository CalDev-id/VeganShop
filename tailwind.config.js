/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}"],
  theme: {
    container: {
      center: true,
      padding: '16px',
    },
    extend: {
      screens: {
        '2xl' : '1320px',
        'sm' : '480px',
      },
      colors: {
        body: '#f3f4fb',
        primary: '#0a6a30',
        yellow: '#EBFF00',
        hitam: '#282D30',
        biru2: '#61e1e6',
        discord: '#485ef4',
        linkedln: '#0077b5',
        block: '#491447',
        twitter: '#5d9aea',
        secondary: '#eaf5e4',
        third: '#49a011'
      },
      backgroundImage: {
        bawah: 'url("img/bannerfood.jpg")'
      },
    },
  },
  plugins: [],
};
