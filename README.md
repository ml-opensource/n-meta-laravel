# N-Meta Laravel 

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nstack-io/laravel-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nstack-io/laravel-sdk/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/nstack-io/laravel-sdk/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/nstack-io/laravel-sdk/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/nstack-io/laravel-sdk/badges/build.png?b=master)](https://scrutinizer-ci.com/g/nstack-io/laravel-sdk/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/nstack-io/laravel-sdk/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

## 📝 Introduction

Package to enforce & parse Meta header (Default: "Client-Meta-Information")

`Client-Meta-Information: [PLATFORM];[ENVIRONMENT];[APP_VERSION];[DEVICE_OS];[DEVICE]`

## 📦 Installation

To install this package you will need:

* PHP 7.1+

Run

`composer require monstar-lab-oss/n-meta-laravel`

or setup in composer.json

`monstar-lab-oss/n-meta-laravel: 1.0.x`

In `config/app.php` (Laravel) or `bootstrap/app.php` (Lumen) you should add service provider

```php
NMeta\ServiceProvider::class
```

Copy config over from vendor/monstar-lab-oss/n-meta-laravel/config/n-meta.php to project/config/n-meta.php

```
php artisan vendor:publish --provider="NMeta\ServiceProvider"

```

## ⚙ Usage

Add middleware to routes:

```php
// in RouteServiceProvider
protected function mapApiRoutes()
{
    Route::prefix('api')
        ->middleware('api')
        ->middleware(NMetaMiddleware::class) // Add NMeta middleware
        ->namespace($this->namespace)
        ->group(base_path('routes/api.php'));
}
```

You can now call via function, eg:
```php
nmeta()->getPlatform()
nmeta()->getVersion()
```  

## 🏆 Credits

This package is developed and maintained by the PHP team at [Monstar Lab](http://monstar-lab.com)

## 📄 License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
