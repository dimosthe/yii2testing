yii2testing
===========

Experimenting with Yii2 framework. It uses [Yii 2 Advanced Application Template](https://github.com/yiisoft/yii2-app-advanced) 

Modules added
-------------
- [Yii2-user](http://yii2-user.readthedocs.org/en/latest/index.html)

Features
--------
- Login/Signup
- Users admin panel (create, update, delete users)
- Rbac
- User profile management 

Requirements
------------
- PHP > 5.4.0
- php5-curl 
- php5-intl 
- php5-mcrypt
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
4. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.
5. Apply migrations on the Yii2-user module to create the tables. Run `./yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations` 
6. Run `./yii create-users/create` to create the admin user (username='admin', password='administrator')
  
How to run
----------
1. You can use php build-in web server. Run `php -S localhost:8000` from the
   root directory (`www` directory)
2. Point your browser to `http://localhost:8000/` 
3. To login into the application you can either
- Sign up, with any of your email address, username and password. Then, you can login into the application with same email address and 
  password at any time (you wont receive an email confirmation) or
- Use the default admin credentials (admin, administrator) in order to benefit administrator priviledges.  


