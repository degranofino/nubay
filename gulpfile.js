import gulp from "gulp";
import watch from "gulp-watch";
import dartSass from "sass";
import gulpSass from "gulp-sass";
import plumber from "gulp-plumber";
const sassCompiler = gulpSass(dartSass);
import maps from "gulp-sourcemaps";
import browserSync from "browser-sync";
const server = browserSync.create();
import autoprefixer from "gulp-autoprefixer";
import cleanCSS from "gulp-clean-css";
import rename from "gulp-rename";
import cache from "gulp-cache";
import imagemin from "gulp-imagemin";
import imageminPngquant from "imagemin-pngquant";
import imageminZopfli from "imagemin-zopfli";
import imageminGiflossy from "imagemin-giflossy";
import imageminSvgo from "imagemin-svgo";
import imageminJpegtran from "imagemin-jpegtran";

import commonjs from "@rollup/plugin-commonjs";
import { nodeResolve } from "@rollup/plugin-node-resolve";

import * as rollup from "rollup";
import { babel } from "@rollup/plugin-babel";
import { terser } from "rollup-plugin-terser";

const paths = {
  sass: {
    src: "./src/scss/style.scss",
    watcher: "./src/scss/**/*.scss",
    dest: "./css/",
  },
  css: {
    src: "./style.css",
    dest: "./css/",
  },
  scripts: {
    src: "./src/js/main.js",
    watcher: ["./src/js/modules/**.js", "./src/js/main.js"],
    dest: "./js/",
  },
  images: {
    src: "./src/assets/**/**.{gif,png,jpg,svg}",
    watcher: "./src/assets/**/**.{gif,png,jpg,svg}",
    dest: "./dist/assets/",
  },
  extern_images: {
    src: ['node_modules/lightgallery/images/*'],
    dest: './dist/images'
  },
  extern_fonts: {
    src: ['node_modules/lightgallery/fonts/*'],
    dest: './dist/fonts'
  },
};

/* Gulp Pipe for compiling SASS main file */
gulp.task("sass", async () => {
  gulp
    .src(paths.sass.src)
    .pipe(plumber())
    .pipe(maps.init())
    .pipe(sassCompiler().on("Error compiling!", sassCompiler.logError))
    .pipe(autoprefixer())
    .pipe(maps.write("./"))
    .pipe(gulp.dest(paths.sass.dest))
    .pipe(server.stream());
});

/* Gulp Pipe for minifying CSS main file */
gulp.task("minCss", async () => {
  gulp
    .src(paths.css.src)
    .pipe(plumber())
    .pipe(cleanCSS())
    .pipe(rename({ extname: ".min.css" }))
    .pipe(gulp.dest(paths.css.dest));
});

/* Gulp Pipe for minifying images */
gulp.task("imagemin", async () => {
  gulp
    .src(paths.images.src)
    .pipe(imagemin())
    .pipe(gulp.dest(paths.images.dest));
});

/* Gulp task to Babel and Uglify the Javascript Code */
gulp.task("script", async () => {
  const compile = await rollup.rollup({
    input: paths.scripts.src,
    plugins: [
      commonjs(),
      nodeResolve(),
      babel({
        babelHelpers: "bundled",
      }),
    ],
  });

  await compile.write({
    file: "./js/script.js",
    format: "iife",
    name: "base",
    inlineDynamicImports: true,
  });

  await compile.write({
    file: "./js/min/script.min.js",
    format: "iife",
    name: "minified",
    plugins: [terser()],
  });
});

/* Gulp Watch */
gulp.task("watch", async () => {
  server.init({
    proxy: "http://berlanga.local/",
    browser: "chrome",
  });
  watch(paths.sass.watcher).on(
    "change",
    gulp.series("sass", "minCss", server.reload)
  );
  watch(paths.scripts.watcher).on(
    "change",
    gulp.series("script", server.reload)
  );
  watch(paths.images.watcher).on(
    "add",
    gulp.series("imagemin", server.reload)
  );
  watch("./**/*.php").on("change", server.reload);
});

// TAREA para copiar cualquier archivo que no sea sass, imagenes o js
export const copyExtImages = () => {
  return gulp.src(paths.extern_images.src)
    // .pipe(multiDest([paths.extern_images.dest, 'local/wp-content/themes/wch/images/']));
    .pipe(gulp.dest(paths.extern_images.dest))
}

// TAREA para copiar cualquier archivo que no sea sass, imagenes o js
export const copyExtFonts = () => {
  return gulp.src(paths.extern_fonts.src)
    // .pipe(multiDest([paths.images.dest, 'local/wp-content/themes/wch/fonts/']));
    .pipe(gulp.dest(paths.extern_fonts.dest))
}

export const library = gulp.series(copyExtImages, copyExtFonts);
