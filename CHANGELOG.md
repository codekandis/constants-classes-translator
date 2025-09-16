# Changelog

All notable changes to this project will be documented in this file.

The format is based on [keep a changelog 1.1.0][xtlink-keep-a-changelog]
and this project adheres to [Semantic Versioning 2.0.0][xtlink-semantic-versioning].

## [2.0.0] - 2025-09-16

### Fixed

* inheritance
* method naming
* `PHPDoc`

### Changed

* composer package
  * changed
    * description
    * require
      * `php` [>=8.4]
    * require-dev
      * `codekandis/phpunit` [~5.0]
  * added
    * version
    * require
      * `codekandis/tooling` [~1.0]
      * `codekandis/types` [~1.0]
    * require-dev
      * `rector/rector` [~1.2]
    * scripts
      * `test`
      * `test-coverage`
* PHPUnit tests
  * configuration
  * externalized data providers
* error and exception handling
* `PHPUnit` tests
* `CODE_OF_CONDUCT.md`
* `README.md`
  * documentation

### Added

* read-only fields
* type hints
* `Override` attributes
* `rector` scripts
* `GitHub` workflows
* `.gitattributes` to ignore dev-assets

[2.0.0]: https://github.com/codekandis/constants-classes-translator/compare/1.1.0...2.0.0

---
## [1.1.0] - 2021-01-17

### Changed

* composer package dependencies
  * changed
    * `minimum-stability` [stable]
    * `codekandis/phpunit` [^3]

[1.1.0]: https://github.com/codekandis/constants-classes-translator/compare/1.0.0...1.1.0

---
## [1.0.0] - 2021-01-16

### Added

* `ConstantsClassesTranslator` translates constants class values into corresponding constants class values
* `PHPUnit` tests
* `README.md`
* `CHANGELOG.md`

[1.0.0]: https://github.com/codekandis/constants-classes-translator/tree/1.0.0



[xtlink-keep-a-changelog]: http://keepachangelog.com/en/1.1.0/
[xtlink-semantic-versioning]: http://semver.org/spec/v2.0.0.html
