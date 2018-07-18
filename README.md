[![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
[![Build Status](https://travis-ci.org/RhisiartK/Easy-PHP-Framework.svg?branch=master)](https://travis-ci.org/RhisiartK/Easy-PHP-Framework)
[![StyleCI](https://github.styleci.io/repos/121808865/shield?branch=master)](https://github.styleci.io/repos/121808865)

[![forthebadge](https://forthebadge.com/images/badges/built-by-developers.svg)](https://forthebadge.com)
# Easy-PHP-Framework v.0.3.6
This project's goal is to create a community driven and open source PHP framework which makes it easy and fast to develop secure web pages.

# Set up developer environment (Windows)
- Install the latest [XAMPP](https://www.apachefriends.org/hu/index.html) with php 7.2+
  - Required components: Apache, MySQL, PHP, phpMyAdmin
- Install [Composer](https://getcomposer.org/doc/00-intro.md#installation-windows)
- Clone the repository to the xampp's htdocs directory
- Run `composer install` in the root directory
- Open XAMPP Control Panel and Start Apache and MySQL
- Create database with utf8mb4_bin collation
- Create a database user for the web page
  - machine name should be localhost
- Set database specific grants for created user
    - check only the following grants: select, insert, update, delete
- Change the information of database in web/EasyPHP/Core/Settings.php
  - DATABASE_NAME
  - DATABASE_USER
  - DATABASE_PASSWORD
- Run `composer run-script start-watcher` for compile scss files to minimized css while developing
  
# About the directory structure
- test - PHP unit tests
- vendor - composer packages
- web
  - Application - the web page itself
  - EasyPHP - directory of the framework
  - Public - all public files (index.php, images, javascripts)
    - js
    - style - style files (scss, css, map)

# Developing
- Run `composer install` - to install composer packages
- Run `composer update` - to update and install new composer packages
- Run `composer run-script start-watcher` for compile scss files to minimized css while developing
- Run `composer run-script generate-documentation` to generate documentation
- Run `composer run-script test` to run tests  
- Run `composer run-script php-check` to check PHP code style (standard PSR2)
- Run `composer run-script php-fix` to fix PHP code style errors (standard PSR2)
- Run `composer run-script compile-sass` to compile sass files to css with maps in the styles directory
- Run `composer build` to create a new build (it will run the `compile-sass`, `php-fix`, `php-check`, `test` scripts)

# Publishing
- Run `composer release` to create a new release (it will run the `compile-sass`, `php-fix`, `php-check`, `test` and 
`generate-documentation` scripts)
- Copy the `web` directory's content to the server
- Rename `.htaccess_published` to `.htaccess`
