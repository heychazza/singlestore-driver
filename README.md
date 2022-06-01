# SingleStore DB Driver for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/heychazza/singlestore-driver.svg?style=flat-square)](https://packagist.org/packages/heychazza/singlestore-driver)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/heychazza/singlestore-driver/run-tests?label=tests)](https://github.com/heychazza/singlestore-driver/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/heychazza/singlestore-driver/Check%20&%20fix%20styling?label=code%20style)](https://github.com/heychazza/singlestore-driver/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/heychazza/singlestore-driver.svg?style=flat-square)](https://packagist.org/packages/heychazza/singlestore-driver)

This package provides SingleStore specific schema options, currently supporting keys & shard keys, alongside setting rowstore and clusterstore tables. In addition, tables are automatically deleted one-by-one when `db:wipe` is ran, as Laravel traditionally deletes all at once - which isn't compatible with SingleStore.

A huge thanks to [Fathom Analytics](https://usefathom.com/ref/PUX1KG) for the motivation to build this package, as I never knew about SingleStore until their [blog post](https://usefathom.com/blog/worlds-fastest-analytics). 

## End of Life 😢
It is with regret that this package has been archived, as the SingleStore team have chosen to build their own official driver using parts from this package. So I no longer have the motivation to keep this going, and instead suggest you check out the official one found [here](https://github.com/singlestore-labs/singlestore-laravel-driver).
