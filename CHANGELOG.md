# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- autoload-dev to composer file for OXID devs to test locally

### Changed

- CHANGELOG.md location
- LICENSE to LICENSE.md
- PHPUnit tests can run now without any other dependencies

### Removed

- Change log from README.md

### Fixed

- .gitignore file

## [5.0.0] - 2024-03-04

## [4.0.0-rc1] - 2023-11-14

## [3.0.8] - 2022-09-08

### Changed

- Rebranding easyCredit-Ratenkauf

## [3.0.7] - 2022-02-28

### Fixed

- bugfix-release

## [3.0.6] - 2022-02-08

### Added

- calculate Rateplan only in Payment-Pricerange (by default 200 < x < 10000)

### Changed

- improve Backwards-compatibility to PHP7.2

## [3.0.5] - 2022-01-25

### Added

- add better default-values for payment
-

### Changed

- Remove payment-costs in checkout

## [3.0.4] - 2021-12-17

### Added

- transfer OrderNr to EasyCredit
-

### Removed

- Remove Ankaufsobergrenze

## [3.0.3] - 2021-11-19

### Fixed

- Bugfixes

## [3.0.2] - 2021-11-16

### Fixes

- Bugfixes

## [3.0.1] - 2021-11-02

### Fixes

- Bugfixes

## [3.0.0] - 2021-10-11

### Added

- Introduce namespaces
- Transaction-overview in backend
- Storno in Backend

### Changed

- Integrate new API for dealer gateway

### Removed

- No more support for OXID <= v6.0

## [2.0.6] - 2021-07-16

### Fixed

- Fix: Elimination of malfunctions in other payment modules

## [2.0.5] - 2021-07-14

### Added

- Possibility to use own jqueryUI-Lib in frontend
-

### Fixed

- Birthday is not required

## [2.0.4] - 2020-12-11

### Added

- Function check for OXID 6.2.3

### Changed

- easyCredit Orders are not changeable (Discounts, add Articles...) in OXID-Backend
-

## [2.0.3] - 2020-07-16

## [2.0.2] - 2020-07-16

## [2.0.1] - 2020-04-30

## [2.0.0] - 2020-04-30

### Added

- Version for OXID6 installable via Composer

## 1.0.2

### Fixed

- Allow complete checkout without mailsending to customer

## 1.0.1

### Changed

- still in progress

## 1.0.0 - 2018-07-07

### Added

- Initial development version
- Version for OXID4 installable via FTP

[unreleased]: https://github.com/OXIDprojects/easycredit-module/compare/v5.0.0...HEAD
[5.0.0]: https://github.com/OXIDprojects/easycredit-module/compare/v4.0.0-rc1...v5.0.0
[4.0.0-rc1]: https://github.com/OXIDprojects/easycredit-module/compare/v3.0.8...v4.0.0-rc1
[3.0.8]: https://github.com/OXIDprojects/easycredit-module/compare/v3.0.7...v3.0.8
[3.0.7]: https://github.com/OXIDprojects/easycredit-module/compare/v3.0.6...v3.0.7
[3.0.6]: https://github.com/OXIDprojects/easycredit-module/compare/v3.0.5...v3.0.6
[3.0.5]: https://github.com/OXIDprojects/easycredit-module/compare/v3.0.4...v3.0.5
[3.0.4]: https://github.com/OXIDprojects/easycredit-module/compare/v3.0.3...v3.0.4
[3.0.3]: https://github.com/OXIDprojects/easycredit-module/compare/v3.0.2...v3.0.3
[3.0.2]: https://github.com/OXIDprojects/easycredit-module/compare/v3.0.1...v3.0.2
[3.0.1]: https://github.com/OXIDprojects/easycredit-module/compare/v3.0.0...v3.0.1
[3.0.0]: https://github.com/OXIDprojects/easycredit-module/compare/v2.0.6...v3.0.0
[2.0.6]: https://github.com/OXIDprojects/easycredit-module/compare/v2.0.5...v2.0.6
[2.0.5]: https://github.com/OXIDprojects/easycredit-module/compare/v2.0.4...v2.0.5
[2.0.4]: https://github.com/OXIDprojects/easycredit-module/compare/v2.0.3...v2.0.4
[2.0.3]: https://github.com/OXIDprojects/easycredit-module/compare/v2.0.2...v2.0.3
[2.0.2]: https://github.com/OXIDprojects/easycredit-module/compare/v2.0.1...v2.0.2
[2.0.1]: https://github.com/OXIDprojects/easycredit-module/compare/v2.0.0...v2.0.1
[2.0.0]: https://github.com/OXIDprojects/easycredit-module/releases/tag/v2.0.0