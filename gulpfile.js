var gulp = require('gulp');
var sass = require('gulp-sass');
// var browserSync = require('browser-sync');
var gutil = require( 'gulp-util' );
//var ftp = require( 'vinyl-ftp' );
autoprefixer = require('gulp-autoprefixer');
// var reload      = browserSync.reload;
// var config = {
//     host: '',
//     user: '',
//     password: '',
//     root: ''
// }
// var globs = [
//     '',
// ];

gulp.task( 'deploy', ['sass'], function () {

    // var conn = ftp.create( {
    //     host:     config.host,
    //     user:     config.user,
    //     password: config.password,
    //     parallel: 8,
    //     log:      gutil.log
    // } );


    // return gulp.src( globs, { base: 'wp-content/themes/jupiter-child/.', buffer: false } )
    //     .pipe( conn.newer( config.root ) ) // only upload newer files
    //     .pipe( conn.dest( config.root ) );

} );

gulp.task('default', function(){
    //
});

gulp.task('sass', function () {
        return gulp.src([
          'app/styles/sass/main.scss'
        ])
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(autoprefixer({  browsers: ['last 2 versions'], cascade: false }))
        .pipe(gulp.dest('app/styles/'));
});

gulp.task('watch', function () {
    gulp.watch('app/styles/sass/*.scss', ['sass']).on('change', function (e) {
        console.log('El archivo SASS  ha cambiado. Compilando...');
    });
});

// browser-sync task for starting the server.
/*gulp.task('browser-sync', function() {
    //watch files
    var files = [
    'wp-content/themes/jupiter-child/*.scss'
    ];

    //initialize browsersync
    browserSync.init(files, {
    //browsersync with a php server
    proxy: "dev.guerrero.cl/",
    notify: false
    });
});
*/
