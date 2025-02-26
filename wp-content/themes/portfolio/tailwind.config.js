module.exports = {
  content: [
    // https://tailwindcss.com/docs/content-configuration
    './*.php',
    './inc/**/*.php',
    './template-parts/**/*.php',
    './page-templates/**/*.php',
    './safelist.txt',
    //'./**/*.php', // recursive search for *.php (be aware on every file change it will go even through /node_modules which can be slow, read doc)
  ],
  safelist: [
    'text-center',
    //{
    //  pattern: /text-(white|black)-(200|500|800)/
    //}
  ],
  theme: {
    screens: {
      sm: '460px',
      md: '768px',
      rg: '1024px',
      rl: '1240px',
      lg: '1440px',
      xl: '1920px',
      '2xl': '2060px',
      '3xl': '2300px',
    },
    extend: {
      fontFamily: {},
      colors: {},
      spacing: {
        4.5: '1.125rem', // 18px
        18: '4.5rem', // 72px
      },
      letterSpacing: {
        lg: '0.15rem', //100 (2.5px)
        xl: '0.3rem', //200 (4.5px)
      },
      zIndex: {
        1: 1,
        2: 2,
        3: 3,
        4: 4,
        5: 5,
      },
    },
  },
  plugins: [],
};
