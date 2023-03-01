const theme = require('./theme.json');
const tailpress = require('@jeffreyvr/tailwindcss-tailpress');
const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './**/*.php',
    './resources/css/*.css',
    './resources/js/*.js',
    './safelist.txt',
  ],
  safelist: [
    {
      // Paddings
      pattern: /^\-?m(\w?)-/,
      variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
    {
      // Margins
      pattern: /^p(\w?)-/,
      variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
    {
      // Rounded Corners
      pattern: /rounded-(none|md|lg|full)/,
    },
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        md: '1.5rem',
        xl: '2rem',
      },
    },
    extend: {
      colors: {
        brand: {
          blue: '#2255A2',
          bluedark: '#0F2E53',
          bluesky: '#00BAFF',
          red: '#BF2031',
          redchili: '#EA3325',
          gray: '#58595B',
          graylight: '#F3F1EF',
          grayblue: '#F4F8FF',
          grayplatinum: '#D7DBE2',
        },
      },
      fontFamily: {
        sans: ['Poppins', ...defaultTheme.fontFamily.sans],
      },
      // colors: tailpress.colorMapper(
      //   tailpress.theme('settings.color.palette', theme)
      // ),
      // fontSize: tailpress.fontSizeMapper(
      //   tailpress.theme('settings.typography.fontSizes', theme)
      // ),
      typography: {
        DEFAULT: {
          css: {
            color: '#454545',
            a: {
              color: '#EA3325',
              '&:hover': {
                color: '#BF2031',
              },
            },
            h1: {
              fontWeight: '300',
            },
            h2: {
              fontWeight: '600',
            },
            h3: {
              fontWeight: '600',
            },
            h4: {
              fontWeight: '600',
            },
            h5: {
              fontWeight: '400',
            },
            h6: {
              fontWeight: '900',
            },
          },
        },
      },
    },
    screens: {
      xs: '480px',
      sm: '600px',
      md: '782px',
      lg: '1024px',
      xl: '1280px',
      //'2xl': '1440px',
      //'3xl': '1536px',
      //'4xl': '1921px',
    },
  },
  corePlugins: {
    aspectRatio: false,
  },
  plugins: [
    tailpress.tailwind,
    require('daisyui'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/line-clamp'),
    require('@tailwindcss/aspect-ratio'),
  ],
  daisyui: {
    styled: true,
    themes: true,
    base: true,
    utils: true,
    logs: true,
    rtl: false,
    prefix: '',
    darkTheme: false,
  },
};
