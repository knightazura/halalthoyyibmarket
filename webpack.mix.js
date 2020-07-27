const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

mix.ts("resources/js/app.ts", "public/js/app.js");
mix.sass("resources/sass/app.scss", "public/css").options({
  processCssUrls: false,
  postCss: [tailwindcss("./tailwind.config.js")],
});

/**
 * *************************************************
 * Environment
 * *************************************************
 *
 * Di file .env tambahkan
 * MIX_BROWSERSYNC_HOST dan
 * MIX_BROWSERSYNC_PORT
 *
 * Value MIX_BROWSERSYNC_HOST adalah url development di komputer
 * ex. http://halalthoyyibmarket.test:8080
 *
 * Value MIX_BROWSERSYNC_PORT adalah port untuk browsersyncnya
 * Bebas berapa saja asal port tersebut tidak digunakan oleh aplikasi lain
 * pada sistem.
 * ex. 3003
 */
mix.browserSync({
  open: false,
  proxy: process.env.MIX_BROWSERSYNC_HOST,
  port: process.env.MIX_BROWSERSYNC_PORT
});
