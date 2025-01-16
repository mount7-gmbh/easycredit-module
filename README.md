# Mount7 GmbH easyCredit-Ratenkauf Module

![main workflow](https://github.com/mount7-gmbh/easycredit-module/actions/workflows/php.yml/badge.svg)

## Description

 * First standalone release of the easyCredit-Ratenkauf Module
 * Supports payment type installment plan
 * Supports handling over the oxid admin backend

## Installation

Use Composer to add the module to your project
```bash
composer require mount7-gmbh/easycredit-module
```

 * Activate the module in administration area
 * Clear tmp and regenerate views
 * Make sure to take care of all the settings, options and credentials in under the settings page in the module

## Uninstall

 * Deactivate the module in administration area
 * Remove "mount7-gmbh/easycredit-module" from your composer.json or run `composer remove mount7-gmbh/easycredit-module`

Run Composer again to remove module from vendor

```bash
composer update
```

## Bugs and Issues

If you experience any bugs or issues, please report them under issues in GitHub.

## License

[GNU GPLv3](https://choosealicense.com/licenses/gpl-3.0/)