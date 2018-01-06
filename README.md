[![Build Status](https://travis-ci.org/benjamincrozat/lumen-swagger.svg?branch=master)](https://travis-ci.org/benjamincrozat/lumen-swagger)
[![Latest Stable Version](https://poser.pugx.org/benjamincrozat/lumen-swagger/v/stable)](https://packagist.org/packages/benjamincrozat/lumen-swagger)
[![Total Downloads](https://poser.pugx.org/benjamincrozat/lumen-swagger/downloads)](https://packagist.org/packages/benjamincrozat/lumen-swagger)
[![License](https://poser.pugx.org/benjamincrozat/lumen-swagger/license)](https://packagist.org/packages/benjamincrozat/lumen-swagger)

# Lumen Swagger

Generate API documentation with swag.

## Installation

- [Lumen](#lumen)
- [Laravel](#laravel)

### Lumen

```bash
composer require benjamincrozat/lumen-swagger
```

Add the following line in your `bootstrap/app.php`:

```php
$app->register(BC\LumenSwagger\ServiceProvider::class);
```

### Laravel

If you wish to run this package on Laravel, you can easily do it. Just install it via Composer and you're done, thanks to its automatic package discovery.

```bash
composer require benjamincrozat/lumen-swagger
```

## Usage

Once you annotated your models and controllers ([see documentation here](https://github.com/zircote/swagger-php)), using the command is pretty straightforward:

```bash
php artisan swagger

Generated at "/path/to/project/swagger.json"
```

You can also specify a custom path:

```bash
php artisan swagger --path whatever/documentation.json

Generated at "/path/to/project/whatever/documentation.json"
```

And even change the scanned location:

```bash
php artisan swagger --scan whatever

Generated at "/path/to/project/swagger.json"
```

## License

[WTFPL](http://www.wtfpl.net/txt/copying/)
