# codekandis/constants-classes-translator

[![Version][xtlink-version-badge]][srclink-changelog]
[![License][xtlink-license-badge]][srclink-license]
[![Minimum PHP Version][xtlink-php-version-badge]][xtlink-php-net]
![Code Coverage][xtlink-code-coverage-badge]

`codekandis/constants-classes-translator` is a library to translate values from constants classes into values of another constants classes.

## Index

* [Installation](#installation)
* [Testing](#testing)
* [How to use](#how-to-use)
* [Exceptions](#exceptions)

## Installation

Install the latest version with

```bash
$ composer require codekandis/constants-classes-translator
```

## Testing

Test the code with

```bash
$ composer run-script test
```

If you want to retrieve a full coverage report run

```bash
$ composer run-script test-coverage
```

## How to use

This example demonstrates how to simply translate between error codes and error messages.

First create interfaces or classes containing identical named constants representing error codes and error messages.

```php
interface ErrorCodesInterface
{
    public const int ERROR_ONE   = 1;
    public const int ERROR_TWO   = 2;
    public const int ERROR_THREE = 3;
}

class ErrorMessages
{
    public const string ERROR_ONE   = 'Error one occurred.';
    public const string ERROR_TWO   = 'Error two occurred.';
    public const string ERROR_THREE = 'Error three occurred.';
}
```

Next translate error codes into error messages.

```php
new ConstantsClassesTranslator( ErrorCodesInterface::class, ErrorMessages::class )
    ->translate( ErrorCodesInterface::ERROR_TWO );
/**
 * Error two occured.
 */
```

Or translate error messages into error codes.

```php
new ConstantsClassesTranslator( ErrorMessages::class, ErrorCodesInterface::class )
    ->translate( ErrorMessages::ERROR_TWO );
/**
 * 2
 */
```

## Exceptions

The [`ConstantsClassesTranslator`][srclink-ConstantsClassesTranslator] throws several exceptions.

* [`InterfaceOrClassNotFoundException`][xtsrclink-codekandis-types-InterfaceOrClassNotFoundException] a passed constants interface or class does not exist
* [`InterfaceOrClassConstantNotFoundException`][xtsrclink-codekandis-types-InterfaceOrClassConstantNotFoundException] a constant of a specific interface or class does not exist
* [`InterfaceOrClassConstantValueNotFoundException`][xtsrclink-codekandis-types-InterfaceOrClassConstantValueNotFoundException] a constant with a specific value of a specific interface or class does not exist



[xtlink-version-badge]: https://img.shields.io/badge/version-1.1.0-blue.svg
[xtlink-license-badge]: https://img.shields.io/badge/license-MIT-yellow.svg
[xtlink-php-version-badge]: https://img.shields.io/badge/php-%3E%3D%208.4-8892BF.svg
[xtlink-code-coverage-badge]: https://img.shields.io/badge/coverage-100%25-green.svg
[xtlink-php-net]: https://php.net

[srclink-changelog]: ./CHANGELOG.md
[srclink-license]: ./LICENSE
[srclink-ConstantsClassesTranslator]: ./src/ConstantsClassesTranslator.php

[xtsrclink-codekandis-types-InterfaceOrClassNotFoundException]: https://github.com/codekandis/types/blob/1.x/src/InterfaceOrClassNotFoundException.php
[xtsrclink-codekandis-types-InterfaceOrClassConstantNotFoundException]: https://github.com/codekandis/types/blob/1.x/src/InterfaceOrClassConstantNotFoundException.php
[xtsrclink-codekandis-types-InterfaceOrClassConstantValueNotFoundException]: https://github.com/codekandis/types/blob/1.x/src/InterfaceOrClassConstantValueNotFoundException.php
