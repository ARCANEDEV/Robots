Robots.txt Generator [![Packagist License](http://img.shields.io/packagist/l/arcanedev/robots.svg?style=flat-square)](https://github.com/ARCANEDEV/Robots/blob/master/LICENSE)
==============
[![Travis Status](http://img.shields.io/travis/ARCANEDEV/Robots.svg?style=flat-square)](https://travis-ci.org/ARCANEDEV/Robots)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/ARCANEDEV/Robots.svg?style=flat-square)](https://scrutinizer-ci.com/g/ARCANEDEV/Robots/?branch=master)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/ARCANEDEV/Robots.svg?style=flat-square)](https://scrutinizer-ci.com/g/ARCANEDEV/Robots/?branch=master)
[![Github Release](http://img.shields.io/github/release/ARCANEDEV/Robots.svg?style=flat-square)](https://github.com/ARCANEDEV/Robots/releases)
[![Packagist Downloads](https://img.shields.io/packagist/dt/arcanedev/robots.svg?style=flat-square)](https://packagist.org/packages/arcanedev/robots)
[![Github Issues](http://img.shields.io/github/issues/ARCANEDEV/Robots.svg?style=flat-square)](https://github.com/ARCANEDEV/Robots/issues)

*By [ARCANEDEV&copy;](http://www.arcanedev.net/)*

### Requirements
    
    - PHP >= 5.4.0

# INSTALLATION

## Composer
You can install this package via [Composer](http://getcomposer.org/). Add this to your `composer.json` :

```json
{
    "require": {
        "arcanedev/robots": "~1.0"
    }
}
```    

Then install it via `composer install` or `composer update`.

## Laravel

### Setup
Once the package is installed, you can register the service provider in `app/config/app.php` in the `providers` array:

```php
'providers' => [
    ...
    'Arcanedev\Robots\Laravel\ServiceProvider',
],
```

And the facade in the `aliases` array:

```php
'aliases' => [
    ...
    'Robots' => 'Arcanedev\Robots\Laravel\Facade',
],
```

# USAGE

Coming soon...

## Contribution

Any ideas are welcome. Feel free the submit any issues or pull requests.

## TODOS:

  - [ ] Documentation
  - [ ] Examples
  - [x] More tests and code coverage
  - [x] Laravel Support (v4.2)
  - [ ] Laravel Support (v5.0)
  - [ ] Refactoring
  