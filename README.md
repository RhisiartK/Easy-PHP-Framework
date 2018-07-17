[![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
[![Build Status](https://travis-ci.org/RhisiartK/Easy-PHP-Framework.svg?branch=master)](https://travis-ci.org/RhisiartK/Easy-PHP-Framework)
[![StyleCI](https://github.styleci.io/repos/121808865/shield?branch=master)](https://github.styleci.io/repos/121808865)
[![forthebadge](https://forthebadge.com/images/badges/built-by-developers.svg)](https://forthebadge.com)
# Easy-PHP-Framework v.0.3.6
This project's goal is to create a community driven and open source PHP framework which makes it easy and fast to develop web pages. It uses the newest PHP and Bootstrap. The project wants to be the most secure and easiest to use PHP framework.

# Set up developer environment (Windows)
- Install the latest [XAMPP](https://www.apachefriends.org/hu/index.html) with php 7.1+
  - Required components: Apache, MySQL, PHP, phpMyAdmin
- Install [Composer](https://getcomposer.org/doc/00-intro.md#installation-windows)
- Clone the repository to the xampp's htdocs directory
- Download the phpDocumentor from [here](http://www.phpdoc.org/phpDocumentor.phar) and save to the ```src``` directory
- Run ```npm install``` in the src directory
  - It will install node packages and after that it will install phpunit with composer
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
- Run ```npm run-script compile-scss```
- Run ```npm run-script copy```
  
# About the directory structure
- src - all source files
  - node_modules - node packages
  - style - Main style file (style.scss)
  - vendor - phpunit
- web
  - Application - application files
  - EasyPHP - framework files
  - Public - all public files (index.php, images, javascripts)
  - tests - test files

# Developing
- Run ```npm start``` to start file watcher which compile style.scss file after file changes
- Run ```npm run-script copy``` to copy vendors and minified css from ```src``` to public directory
- Run ```npm run-script gd``` to generate documentation  
- Run ```npm run-script php-check``` to check PHP code style (standard PSR2)
- Run ```npm run-script php-fix``` to fix PHP code style errors (standard PSR2)
- Run ```npm test``` to start PHP Unit tests

# Publishing
- Copy the ```web``` directory's content to the server except ```test``` directory
- Rename ```.htaccess_published``` to ```.htaccess```
