const mix = require("laravel-mix");

mix
  .react("resources/js/app.js", "public/js")
  .sass("resources/sass/app.scss", "public/css");

mix.browserSync({
  open: false,
  proxy: process.env.MIX_BROWSERSYNC_HOST,
  port: process.env.MIX_BROWSERSYNC_PORT
});
