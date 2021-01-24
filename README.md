# ACL Manager
This package provides access control list and user manager for
laravel apps.

## Installation
Using Composer :

`not available yet`

packagist : `not available yet`

## Usage

* Change the user modal namespace to laratrust config 
  (located in /config/laratrust.php) in `user_models` section :

`'user_models' => [
'users' => 'App\Models\User',
],`

* Publish blade files

`php artisan vendor:publish --tag=acl-manager`

* Add the following tag in your sidebar layout :

`<x-acl-menu></x-acl-menu>`

or shorten tag :

`<x-acl-menu />`

## ChangeLog

https://github.com/dizatech/acl_manager/wiki/ChangeLog
