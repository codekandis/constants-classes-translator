# Changelog

All notable changes to this project will be documented in this file.

The format is based on [keep a changelog][xtlink-keep-a-changelog]
and this project adheres to [Semantic Versioning 2.0.0][xtlink-semantic-versioning].

## [2.0.0] - 2024-02-17

### Fixed

* method naming
* PHPDoc

### Changed

* composer package
  * changed
    * description
    * require
      * `php` [>=8.3]
    * require-dev
      * `codekandis/phpunit` [^5.0.0]
  * added
    * version
    * require-dev
      * `rector/rector` [^0.18.5]
    * autoload-dev
      * psr-4
        * `CodeKandis\ConstantsClassesTranslator\Build\`
          * `build/`
* PHPUnit tests
  * configuration
  * externalized data providers
  * exception handling
* `CODE_OF_CONDUCT.md`
* `README.md`
  * PHP version `8.3`
  * documentation

### Added

* read-only fields
* type hints
* `Override` attributes
* rector
  * configuration script
  * shell script

[2.0.0]: https://github.com/codekandis/constants-classes-translator/compare/1.1.0..2.0.0

---
## [1.1.0] - 2021-01-17

### Changed

* composer package dependencies
  * changed
    * `minimum-stability` [stable]
    * `codekandis/phpunit` [^3]

[1.1.0]: https://github.com/codekandis/constants-classes-translator/compare/1.0.0..1.1.0

---
## [1.0.0] - 2021-01-16

### Added

* `ConstantsClassesTranslator` translates constants class values into corresponding constants class values
* `PHPUnit` tests
* `README.md`
* `CHANGELOG.md`

[1.0.0]: https://github.com/codekandis/constants-classes-translator/tree/1.0.0



[xtlink-keep-a-changelog]: http://keepachangelog.com/en/1.0.0/
[xtlink-semantic-versioning]: http://semver.org/spec/v2.0.0.html
