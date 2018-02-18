# Easy-PHP-Framework
This project's goal is to create a community driven and open source PHP framework which makes it easy and fast to develop web pages. It uses the newest PHP and Bootstrap. The project wants to be the most secure and easiest to use PHP framework.

# Set up developer environment (Windows)
- Install the latest [XAMPP](https://www.apachefriends.org/hu/index.html)
  - Required components: Apache, MySQL, PHP, phpMyAdmin
- Install [Composer](https://getcomposer.org/doc/00-intro.md#installation-windows)
- Clone the repository to the xampp's htdocs directory
- Run ```npm install``` in the src directory
  - It will install node packages and after that it will install phpunit with composer
- Open XAMPP Control Panel and Start Apache and MySQL
- Create database table with utf8_bin collation
  - machine name should be localhost
- Create a database user for the web page
- Set database specific grants
    - check only the following grants: select, insert, update, delete
- Change the information of database in web/System/Core/Settings.php
  - DATABASE_NAME
  - DATABASE_USER
  - DATABASE_PASSWORD
  
# About the file structure
- src - all source files
  - node_modules - node packages
  - vendor - phpunit
- web
  - application - application files
  - system - framework files
    - public - all public files (index.php, images, javascripts)
  - tests - test files

# Developing
- Run ```npm start``` to start file watcher which compile style.scc file after file changes
- Run ```npm run-script copy``` to copy vendors from ```src``` to public directory 
