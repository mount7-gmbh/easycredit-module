# OXID Solution Catalyst easyCredit-Ratenkauf Module

![main workflow](https://github.com/mount7-gmbh/easycredit-module/actions/workflows/php.yml/badge.svg)

# Version 3.0.8

## Description

 * First standalone release of the easyCredit-Ratenkauf Module
 * Supports payment type installment plan
 * Supports handling over the oxid admin backend only

## Installation

Use Composer to add the module to your project
```bash
composer require oxid-professional-services/easycredit-module
```

 * Activate the module in administration area
 * clear tmp and regenerate views
 * Make sure to take care of all the settings, options and credentials described in the user manual

## Uninstall

 * Deactivate the module in administration area
 * remove "oxid-professional-services/easycredit-module" from your composer.json

Run Composer again to remove Module from vendor
```bash
composer update
```


## Bugs and Issues

If you experience any bugs or issues, please report them under issues in GitHub.

## License

[GNU GPLv3](https://choosealicense.com/licenses/gpl-3.0/)