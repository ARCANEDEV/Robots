# Robots.txt Generator [![Packagist License](http://img.shields.io/packagist/l/arcanedev/robots.svg?style=flat-square)](LICENSE.md)

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

### Laravel

The quickest way to use Robots is to just setup a callback-style route for robots.txt in your `app/routes.php` file.

```php
Route::get('robots.txt', function() {

    // If on the live server, serve a nice, welcoming robots.txt.
    if (App::environment() == 'production') {
        Robots::addUserAgent('*');
        Robots::addSitemap('sitemap.xml');
    }
    else {
        // If you're on any other server, tell everyone to go away.
        Robots::addDisallow('*');
    }

    return Response::make(Robots::generate(), 200, ['Content-Type' => 'text/plain']);
});
```

### Hard Coded

Add a rule in your `.htaccess` for `robots.txt` that points to a new script (or something else) that generate the robots file.

The code would look something like:

```php
require_once __DIR__ . '/../vendor/autoload.php';

use Arcanedev\Robots\Robots;

$robots = new Robots;

$robots->addUserAgent('Google');
$robots->addDisallow(['/admin/', '/login/', '/secret/']);
$robots->addSpacer();
$robots->addSitemap('sitemap.xml');

header('HTTP/1.1 200 OK');
echo $robots->generate();
```

## Contribution

Any ideas are welcome. Feel free the submit any issues or pull requests.

## TODOS:

  - [ ] Documentation
  - [x] Examples
  - [x] More tests and code coverage
  - [x] Laravel Support (v4.2)
  - [ ] Laravel Support (v5.0)
  - [x] Refactoring
