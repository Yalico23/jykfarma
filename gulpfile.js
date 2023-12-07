
const {src,dest, watch, parallel} = require("gulp");
const sass = require("gulp-sass")(require('sass'));
const plumber = require("gulp-plumber");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const postcss = require("gulp-postcss");
//Iamgenes web
const webp = require("gulp-webp");
const cache = require("gulp-cache");
const imagemin = require("gulp-imagemin");
const avif = require("gulp-avif");
//Encontrar los archivos desde el navegador
const sourcemaps = require("gulp-sourcemaps");
//Javascript
const terser = require("gulp-terser-js");

function css(callback) {
    src('src/scss/**/*app.scss')
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(sass())
    .pipe(postcss([autoprefixer(),cssnano()]))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('./public/build/css'));
    callback();
}
function versionWebp(callback) {
    const opciones = {
        quality:50
    };

    src("src/img/**/*.{png,jpg}")
    .pipe(webp(opciones))
    .pipe(dest('./public/build/img'));
    callback();
}
function versionAvif(callback) {
    const opciones = {
        quality:50
    };

    src("src/img/**/*.{png,jpg}")
    .pipe(avif(opciones))
    .pipe(dest('./public/build/img'))
    callback();
}
function imagenes(callback) {
    const opciones = {
        optimizacionlevel : 3
    }

    src("src/img/**/*.{png,jpg}")
    .pipe(cache(imagemin(opciones)))
    .pipe(dest('./public/build/img'))
    callback();
}
/**Javascript */
function Javascript(callback) {
    src("src/js/**/*.js")
    .pipe(terser())
    .pipe(dest('./public/build/js'));
    callback();
}
/** */
function dev(callback) {
    watch("src/scss/**/*.scss" , css);
    watch("src/js/**/*.js" , Javascript);
    callback();
}

exports.css = css;
exports.Javascript = Javascript;
exports.imagenes=imagenes;
exports.versionWebp = versionWebp;
exports.versionAvif = versionAvif;
exports.dev = parallel(imagenes , versionWebp , versionAvif , Javascript ,dev);