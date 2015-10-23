# Robots.txt Generator [![Packagist License][badge_license]](LICENSE.md) [![For PHP][badge_php]](https://github.com/ARCANEDEV/Robots)

[![Travis Status][badge_build]](https://travis-ci.org/ARCANEDEV/Robots)
[![HHVM Status][badge_hhvm]](http://hhvm.h4cc.de/package/arcanedev/robots)
[![Coverage Status][badge_coverage]](https://scrutinizer-ci.com/g/ARCANEDEV/Robots/?branch=master)
[![Scrutinizer Code Quality][badge_quality]](https://scrutinizer-ci.com/g/ARCANEDEV/Robots/?branch=master)
[![SensioLabs Insight][badge_insight]](https://insight.sensiolabs.com/projects/e0d5d467-31c8-4bfe-84f1-e4b0bfe2c497)
[![Github Issues][badge_issues]](https://github.com/ARCANEDEV/Robots/issues)

[![Packagist][badge_package]](https://packagist.org/packages/arcanedev/robots)
[![Packagist Release][badge_release]](https://packagist.org/packages/arcanedev/robots)
[![Packagist Downloads][badge_downloads]](https://packagist.org/packages/arcanedev/robots)

[badge_php]:       https://img.shields.io/badge/PHP-Framework%20agnostic-4F5B93.svg?style=flat-square
[badge_license]:   https://img.shields.io/packagist/l/arcanedev/robots.svg?style=flat-square

[badge_build]:     https://img.shields.io/travis/ARCANEDEV/Robots.svg?style=flat-square
[badge_hhvm]:      https://img.shields.io/hhvm/arcanedev/robots.svg?style=flat-square
[badge_coverage]:  https://img.shields.io/scrutinizer/coverage/g/ARCANEDEV/Robots.svg?style=flat-square
[badge_quality]:   https://img.shields.io/scrutinizer/g/ARCANEDEV/Robots.svg?style=flat-square
[badge_insight]:   https://img.shields.io/sensiolabs/i/e0d5d467-31c8-4bfe-84f1-e4b0bfe2c497.svg?style=flat-square
[badge_issues]:    https://img.shields.io/github/issues/ARCANEDEV/Robots.svg?style=flat-square

[badge_package]:   https://img.shields.io/badge/package-arcanedev/robots-blue.svg?style=flat-square
[badge_release]:   https://img.shields.io/packagist/v/arcanedev/robots.svg?style=flat-square
[badge_downloads]: https://img.shields.io/packagist/dt/arcanedev/robots.svg?style=flat-square

*By [ARCANEDEV&copy;](http://www.arcanedev.net/)*


### Features

  * Framework agnostic package.
  * Well documented &amp; IDE Friendly.
  * Well tested with maximum code quality.
  * Laravel 4.2 supported.
  * Laravel 5 supported.
  * Made with :heart: &amp; :coffee:.

### Requirements

    - PHP >= 5.5.9

# INSTALLATION

## Composer

You can install this package via [Composer](http://getcomposer.org/). Add this to your `composer.json` :

```json
{
    "require": {
        "arcanedev/robots": "~2.0"
    }
}
```

Then install it via `composer install` or `composer update`.

## Laravel

### Setup

Once the package is installed, you can register the service provider in `config/app.php` in the `providers` array:

```php
'providers' => [
    ...
    Arcanedev\Robots\RobotsServiceProvider::class,
],
```

And the facade in the `aliases` array:

```php
'aliases' => [
    ...
    'Robots' => Arcanedev\Robots\Facades\Robots::class,
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

## TODOS

  - [ ] Documentation

## DONE

  - [x] Framework agnostic package.
  - [x] Examples
  - [x] Laravel v4.2 Support.
  - [x] Laravel v5.0 Support.
  - [x] Laravel v5.1 Support.

## Contribution

Any ideas are welcome. Feel free to submit any issues or pull requests, please check the [contribution guidelines](CONTRIBUTING.md).
