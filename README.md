# SingleStore DB Driver for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/heychazza/singlestore-driver.svg?style=flat-square)](https://packagist.org/packages/heychazza/singlestore-driver)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/heychazza/singlestore-driver/run-tests?label=tests)](https://github.com/heychazza/singlestore-driver/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/heychazza/singlestore-driver/Check%20&%20fix%20styling?label=code%20style)](https://github.com/heychazza/singlestore-driver/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/heychazza/singlestore-driver.svg?style=flat-square)](https://packagist.org/packages/heychazza/singlestore-driver)

This package provides SingleStore specific schema options, currently supporting keys & shard keys, alongside setting rowstore and clusterstore tables. In addition, tables are automatically deleted one-by-one when `db:wipe` is ran, as Laravel traditionally deletes all at once - which isn't compatible with SingleStore.

A huge thanks to [Fathom Analytics](https://usefathom.com/ref/PUX1KG) for the motivation to build this package, as I never knew about SingleStore until their [blog post](https://usefathom.com/blog/worlds-fastest-analytics). 

## Support us
If this package helped you, feel free to donate to my [PayPal](https://paypal.me/heychazza), every donation regardless of amount is appreciated for my time.

## Installation

You can install the package via composer:

```bash
composer require heychazza/singlestore-driver
```

Then, within your `database.php` file, edit the `driver` property and set it to `singlestore`:

```php
        "mysql" => [
            "driver" => "singlestore",
            // ... other options ... //
        ]
```

## Example Usage
```php
Schema::create("example_table", function (Blueprint $table) {
    // ... other options ... //
    $table->id();

    // Creating a basic KEY
    $table->key('nickname');
    
    // Or, creating a SHARD KEY
    $table->key('nickname')->sharded();
    
    // Or, creating a PRIMARY KEY
    $table->key('nickname')->primary();
    
    // Or, SHARD with ROWSTORE.
    $table->key("nickname")->sharded()->storeType(StoreType::ROWSTORE);
    
    // Or, KEY with COLUMNSTORE.
    $table->key("nickname")->storeType(StoreType::COLUMNSTORE);
});
```

## Features

1. Ability to set a `KEY`, `SHARD KEY` and `PRIMARY KEY`.
2. Ability to specify `ROWSTORE` and `COLUMNSTORE` tables.
3. Ability to use `php artisan db:wipe` that is compatible with SingleStore.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [heychazza](https://github.com/heychazza) (Developed it)
- [Jack Ellis](https://twitter.com]) (For the inspiration to build this)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
