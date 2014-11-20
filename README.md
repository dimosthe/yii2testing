yii2testing
===========

Experimenting with Yii2 framework. It uses [Yii 2 Advanced Application Template](https://github.com/yiisoft/yii2-app-advanced) 

Modules added
-------------
- [Yii2-user](http://yii2-user.readthedocs.org/en/latest/index.html)

Requirements
------------
- PHP > 5.4.0
- php5-curl 
- php5-intl 
- Composer. If you do not have [Composer](http://getcomposer.org/), you can run
  the following commands on Linux and Mac OS X:
  1. `curl -s http://getcomposer.org/installer | php`
  2. `mv composer.phar /usr/local/bin/composer`

Deployment
----------
1. Clone the repository 
2. Run `composer global require "fxp/composer-asset-plugin:1.0.0-beta3"`. Installs the composer asset plugin which allows managing
   bower and npm package dependencies through Composer. You only need to run this command once for all. 
3. Run `composer install` in the root directory of the application in order to
   install dependencies. This will create the vendor directory with all
   package dependencies inlcuding the yii core source code.
4. Run `./init` to initialize the application with a specific environment.
2. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.
3. Apply migrations on the Yii2-user module to create the tables. Run `./yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations` 
  
How to run
----------
1. You can use php build-in web server. Run `php -S localhost:8000` from the
   root directory
2. Point your browser to `http://localhost:8000/frontend/web` 
3. To login into the application, you need to first sign up, with any of your email address, username (use admin to get admin priviledges) and password. 
   Then, you can login into the application with same email address and password at any time. 


