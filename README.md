# ACL Manager
This package provides access control list and user manager for
laravel apps.

## Installation
Using Composer :

```bash
composer require dizatech/acl-manager
```

packagist : [acl-manager](https://packagist.org/packages/dizatech/acl-manager)

## Usage

* Change the user modal namespace to laratrust config 
  (located in `/config/laratrust.php`) in `user_models` section :

```php
'user_models' => [
    'users' => 'App\Models\User',
],
```

* Publish blade files

```bash
php artisan vendor:publish --tag=acl-manager
```

** Please note if you already published the vendor, for updates you can run the 
following command :

```bash
php artisan vendor:publish --tag=acl-manager --force
```

* Add the following tag in your sidebar layout :

```html
<x-acl-menu></x-acl-menu>
```

or shorten tag :

```html
<x-acl-menu />
```

## ChangeLog

[See ChangeLog](https://github.com/dizatech/acl_manager/wiki/ChangeLog)
