[![Build Status](https://travis-ci.org/lumen-swagger.svg?branch=master)](https://travis-ci.org/lumen-swagger)
[![Latest Stable Version](https://poser.pugx.org/lumen-swagger/v/stable)](https://packagist.org/packages/lumen-swagger)
[![Total Downloads](https://poser.pugx.org/lumen-swagger/downloads)](https://packagist.org/packages/lumen-swagger)
[![License](https://poser.pugx.org/lumen-swagger/license)](https://packagist.org/packages/lumen-swagger)

# Lumen Swagger

Generate API documentation with swag.

## Usage

```bash
composer require benjamincrozat/lumen-swagger
```

Add the following line in your `bootstrap/app.php`:

```php
$app->register(BC\LumenSwagger\ServiceProvider::class);
```

Using the command is pretty straightforward:

```bash
php artisan swagger
Generated at "/path/to/project/swagger.json"
```

You can also specify a custom path:

```bash
php artisan swagger -p "/path/to/project/whatever/documentation.json"
Generated at "/path/to/project/whatever/documentation.json"
```

## License

[WTFPL](http://www.wtfpl.net/txt/copying/)
