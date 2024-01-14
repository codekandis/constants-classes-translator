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
$ composer test
```

## How to use

### Define some error codes and error messages

```php
abstract class ErrorCodes
{
    public const int ERROR_ONE   = 1;
    public const int ERROR_TWO   = 2;
    public const int ERROR_THREE = 3;
}

abstract class ErrorMessages
{
    public const string ERROR_ONE   = 'Error one occurred.';
    public const string ERROR_TWO   = 'Error two occurred.';
    public const string ERROR_THREE = 'Error three occurred.';
}
```

### Instantiate the [`ConstantsClassesTranslator`][srclink-constants-classes-translator]

```php
( new ConstantsClassesTranslator( ErrorCodes::class, ErrorMessages::class ) )
    ->translate( ErrorCodes::ERROR_TWO );
/**
 * Error two occured.
 */
```

or vice versa

```php
( new ConstantsClassesTranslator( ErrorMessages::class, ErrorCodes::class ) )
    ->translate( ErrorMessages::ERROR_TWO );
/**
 * 2
 */
```

## Exceptions

The [`ConstantsClassesTranslator`][srclink-constants-classes-translator] throws several exceptions which inherits from [`ConstantsClassesTranslatorException`][srclink-constants-classes-translator-exception].

- [`ConstantsClassNotFoundException`][srclink-constants-class-not-found-exception] the passed constants class name does not exist
- [`CorrespondingConstantsClassValueNotFoundException`][srclink-corresponding-constants-class-value-not-found-exception] the constants class value has no corresponding constants class value
- [`ConstantsClassValueNotFoundException`][srclink-constants-class-value-not-found-exception] the constants class value does not exist



[xtlink-version-badge]: https://img.shields.io/badge/version-2.0.0-blue.svg
[xtlink-license-badge]: https://img.shields.io/badge/license-MIT-yellow.svg
[xtlink-php-version-badge]: https://img.shields.io/badge/php-%3E%3D%208.3-8892BF.svg
[xtlink-code-coverage-badge]: https://img.shields.io/badge/coverage-100%25-green.svg
[xtlink-php-net]: https://php.net

[srclink-changelog]: ./CHANGELOG.md
[srclink-license]: ./LICENSE
[srclink-constants-classes-translator]: ./src/ConstantsClassesTranslator.php
[srclink-constants-classes-translator-exception]: ./src/ConstantsClassesTranslatorException.php
[srclink-constants-class-not-found-exception]: ./src/ConstantsClassNotFoundException.php
[srclink-corresponding-constants-class-value-not-found-exception]: ./src/CorrespondingConstantsClassValueNotFoundException.php
[srclink-constants-class-value-not-found-exception]: ./src/ConstantsClassValueNotFoundException.php
