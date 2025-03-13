const {createThemes} = require('tw-colors');

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
      fontFamily: {
        sans: ['Fira Sans', 'sans-serif'],
        mono: ['Fira Mono', 'monospace'],
      },
      colors: {
        palette: {
          pink: '#F4A99A',
          green: '#84A761',
          blue: '#36A7A4'
        },
        grey: {
          DEFAULT: '#7D7D83',
        },
        error: {
          DEFAULT: '#B70F0F',
          light: '#FECACA'
        },
        success: {
          DEFAULT: '#4D7C0F',
          light: '#ECFCCB'
        }
      },
      fontSize: {
        '1.5xl': ['1.375rem', '1.875rem'], // 22px
        '2.5xl': ['1.75rem', '2.125rem'], // 28px
        '3.5xl': ['2rem', '2.375rem'], // 32px
        '4.5xl': ['2.75rem', '1'], // 44px
        '5.5xl': ['3.25rem', '1'], // 52px
        '7.5xl': ['5.25rem', '1'], // 84px
      },
      spacing: {
        4.5: '1.125rem', // 18px
        5.5: '1.375rem', // 22px
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
      translate: {
        '1.25': '0.313rem', // 5px
      },
      backgroundImage: {
        check: 'url(/assets/svg/icons/check.svg)',
      },
    },
  },
  plugins: [
    createThemes(
        {
          pink: {
            theme: {
              DEFAULT: '#F7C3B8',
              // dark: '#F99E8B',
              dark: '#F4A99A',
              light: '#FBDDD7',
              lightest: '#FDEEEB',
            }
          },
          green: {
            theme: {
              DEFAULT: '#A9C190',
              dark: '#84A761',
              light: '#CEDCC0',
              lightest: '#E6EDDF',
            }
          },
          blue: {
            theme: {
              DEFAULT: '#72C1BF',
              dark: '#36A7A4',
              light: '#AFDCDB',
              lightest: '#D7EDED',
            }
          }
        }
    )
  ],
};
