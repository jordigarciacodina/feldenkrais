// 1. Compilar código LESS
// 2. Añadir prefijos
// 3. Minificar el archivo resultante
// 4. Renombrar el archivo
// 5. Actualizamos el navegador automáticamente

// 1: Instalar Gulp: npm init -y
// 2. Crear en la ruta raíz el archivo gulpfile.js y pegarle el código (Materials)
// 3. Crear en la ruta raíz la carpeta less, crear dentro app.less y pegarle el código de style.css
// 4: Comprobar url de LBF
// 5: Instalar todos los plugins de Gulp:
// - npm install --save-dev gulp gulp-autoprefixer gulp-clean-css gulp-rename gulp-less browser-sync
// 6 Eliminar comentarios

var gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    cleancss = require('gulp-clean-css'),
    rename = require('gulp-rename'),
    less = require('gulp-less'),
    browsersync = require('browser-sync').create();

// Aquí tratamos nuestras hojas de estilo
function estilos(done){

  gulp.src('./less/style.less')
      .pipe(less())
      .pipe(autoprefixer({
        browsers: ['last 4 versions'],
        flexbox : true,
        grid : true
      }))
      .pipe(cleancss())
      .pipe(rename({
        basename : "style",
      }))
      .pipe(gulp.dest('./'));

  done();
}

// Recacargar el navegador
function recargar(done){
  browsersync.reload();
  done();
}

// Servir el contenido
function servir(done){
  browsersync.init({
    proxy : 'feldenkrais.test', // Modificar por la URL de Local by Flyweel
    open : false
  });
  done();
}

// Observar
function observar(done){
  gulp.watch('./less/**/*.less',gulp.series(estilos,recargar));
  // gulp.watch(['./*.php','./inc/*.php','./template-parts/*.php'], recargar); // Underscores
  gulp.watch('./**/*.php', recargar); 
  done();
}

gulp.task('default', gulp.series(estilos, servir, observar));