yii2testing
===========

Experimenting with Yii2 framework. It uses Yii 2 Advanced Application Template (https://github.com/yiisoft/yii2-app-advanced)  

Requirements
------------
- PHP > 5.4.0 
- Composer. If you do not have [Composer](http://getcomposer.org/), you can run
  the following commands on Linux and Mac OS X:
  ~~~
  curl -s http://getcomposer.org/installer | php
  mv composer.phar /usr/local/bin/composer
  ~~~   

Deployment
----------
1. Clone the repository 
2. Run `composer global require "fxp/composer-asset-plugin:1.0.0-beta3"`. Installs the composer asset plugin which allows managing
   bower and npm package dependencies through Composer. You only need to run this command once for all. 
3. Run `composer update` in the root directory of the application in order to
   install/update dependencies. This will create the vendor directory with all
   package dependencies inlcuding the yii core source code.
4. Run `init` to initialize the application with a specific environment.
2. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.
3. Apply migrations with console command `yii migrate`. This will create tables needed for the application to work.
  
How to run
----------
1. You can use php build-in web server. Run `php -S localhost:8000` from the
   root directory
2. Point your browser to 'http://localhost:8000/frontend/web' 
3. To login into the application, you need to first sign up, with any of your email address, username and password. 
   Then, you can login into the application with same email address and password at any time. 


