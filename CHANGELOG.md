# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.0]

### Added

- autoload-dev to composer file for OXID devs to test locally
- phpstan
- GitHub actions for building project
- php-cs-fixer

### Changed

- CHANGELOG.md location
- LICENSE to LICENSE.md
- PHPUnit tests can run now without any other dependencies

### Removed

- Change log from README.md
- Static call in [EasyCreditPayment](Core/Domain/EasyCreditPayment.php)
- Old versions from changelog, there are reasons for this since the versions were not kept semantically

### Fixed

- .gitignore file
- Validation on first and last name according to EasyCredit model

[unreleased]: https://github.com/mount7-gmbh/easycredit-module/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/mount7-gmbh/easycredit-module/releases/tag/v1.0.0