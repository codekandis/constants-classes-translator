# codekandis/constants-classes-translator

[![Version][xtlink-version-badge]][srclink-changelog]
[![License][xtlink-license-badge]][srclink-license]
[![Minimum PHP Version][xtlink-php-version-badge]][xtlink-php-net]
![Code Coverage][xtlink-code-coverage-badge]

With the [`ConstantsClassesTranslator`][srclink-constants-classes-translator] you are able to translate values from constants classes into values from another constants classes. E. g. it's useful with third party libraries throwing exceptions with error codes but without meaningful messages.

## Index

* [Installation](#installation)
* [How to use](#how-to-use)
* [Exceptions](#exceptions)

## Installation

Install the latest version with

```bash
$ composer require codekandis/constants-classes-translator
```

## How to use

### Define some error codes and error messages

```php
abstract class ErrorCodes
{
    public const ERROR_ONE   = 1;
    public const ERROR_TWO   = 2;
    public const ERROR_THREE = 3;
}

abstract class ErrorMessages
{
    public const ERROR_ONE   = 'Error one occurred.';
    public const ERROR_TWO   = 'Error two occurred.';
    public const ERROR_THREE = 'Error three occurred.';
}
```

### Instantiate the [`ConstantsClassesTranslator`][srclink-constants-classes-translator]

```php
/** returns 'Error two occurred.' */
( new ConstantsClassesTranslator( ErrorCodes::class, ErrorMessages::class ) )
    ->translate( ErrorCodes::ERROR_TWO );
```

or vice versa

```php
/** returns 2 */
( new ConstantsClassesTranslator( ErrorMessages::class, ErrorCodes::class ) )
    ->translate( ErrorMessages::ERROR_TWO );
```

## Exceptions

The [`ConstantsClassesTranslator`][srclink-constants-classes-translator] throws an [`ConstantsClassesTranslatorException`][srclink-constants-classes-translator-exception] in several cases.

- the passed constants class names are invalid
- the value to interpret does not exist 
- the value interpret does not have a related value 



[xtlink-version-badge]: https://img.shields.io/badge/version-development-blue.svg
[xtlink-license-badge]: https://img.shields.io/badge/license-MIT-yellow.svg
[xtlink-php-version-badge]: https://img.shields.io/badge/php-%3E%3D%207.4-8892BF.svg
[xtlink-code-coverage-badge]: https://img.shields.io/badge/coverage-100%25-green.svg
[xtlink-php-net]: https://php.net

[srclink-changelog]: ./CHANGELOG.md
[srclink-license]: ./LICENSE
[srclink-constants-classes-translator]: ./src/ConstantsClassesTranslator.php
[srclink-constants-classes-translator-exception]: ./src/ConstantsClassesTranslatorException.php
