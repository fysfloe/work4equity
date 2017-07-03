module.exports = function(grunt) {
  grunt.initConfig({
    concat: {
      options: {
        separator: '\n\n//-------------------------------\n',
        banner: '\n\n//-------------------------------\n',
      },
      frontend: {
        src: ['js/*.js'],
        dest: 'js/src/scripts.js'
      },
      admin: {
        src: ['js/admin/*.js'],
        dest: 'js/admin/src/admin.js'
      }
    },
    sass: {
      dist: {
        options: {
          style: 'expanded'
        },
        files: [
          {
            src: 'scss/admin/admin.scss',
            dest: 'css/admin/admin.css'
          },
          {
            src: 'scss/main.scss',
            dest: 'css/main.css'
          }
        ]
      }
    },
    babel: {
      options: {
        sourceMap: true,
        presets: ['react','es2015']
      },
      dist: {
        files: {
          'js/dist/scripts.js': 'js/src/scripts.js',
          'js/admin/dist/admin.js': 'js/admin/src/admin.js'
        }
      }
    },
    browserify: {
      dist: {
        options: {
           transform: [['babelify', {presets: ['es2015', 'react']}]]
        },
        src: ['js/react/react.js'],
        dest: 'js/dist/react_bundle.js',
      }
    },
    watch: {
      options: {
        spawn: false,
        livereload: true
      },
      scripts: {
        files: ['js/**/*.js', 'js/admin/**/src/*.js', 'js/admin/**/*.js', 'js/admin/*.js', 'scss/*.scss', 'scss/admin/*.scss', 'gruntfile.js'],
        tasks: ['concat','sass','babel','browserify']
      }
    }
  });
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-babel');
  grunt.loadNpmTasks('grunt-browserify');
  grunt.registerTask('default', ['concat', 'sass', 'browserify', 'watch', 'babel']);
} // wrapper function
