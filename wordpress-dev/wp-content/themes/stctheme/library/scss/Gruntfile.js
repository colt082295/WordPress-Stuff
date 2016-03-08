module.exports = function (grunt) {
  grunt.initConfig({
    autoprefixer: {
            dist: {
                files: {
                    '../css/style.css': '../css/style.css'
                }
            }
        },
        
            browserSync: {
      dev: {
        bsFiles: {
          src: [
            '../css/*.css',
            '../../*.php',
            'images/*.jpg',
            'images/*.png',
          ],
        },
        options: {
          watchTask: true,
          debugInfo: true,
          logConnections: true,
          notify: true,
          proxy: "localhost",
          ghostMode: {
            scroll: true,
            links: true,
            forms: true
          }
        }
      }
    },
    // Watch task config
    watch: {
      styles: {
        files: ['../css/*.css'],
        tasks: ['autoprefixer']
      },
      sass: {
        files: "./*.scss",
        tasks: ['sass'],
        options: {
      livereload: true,
    },
      },
    php: {
        files: ['../../*.php'],
        options: {
          livereload: 35729
        }
      }
    },
    // SASS task config
    sass: {
        dev: {
            files: {
                // destination         // source file
                "../css/style.css" : "./style.scss"
            }
        }
    },
    
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-browser-sync');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-autoprefixer');
  
  grunt.registerTask('default', ['browserSync']);
};