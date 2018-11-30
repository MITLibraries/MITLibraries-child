MIT Libraries' Child Wordpress Theme
========

[![Build Status](https://travis-ci.org/MITLibraries/MITLibraries-child.svg?branch=akdc_prepwork)](https://travis-ci.org/MITLibraries/MITLibraries-child)
[![Code Climate](https://codeclimate.com/github/MITLibraries/MITLibraries-child/badges/gpa.svg)](https://codeclimate.com/github/MITLibraries/MITLibraries-child)

This is the child Wordpress theme for the MIT Libraries. For documentation on its features, [please see the repository wiki](https://github.com/MITLibraries/MITLibraries-child/wiki).

## A note for developers and contributors:

Pull requests are evaluated by Travis-CI for syntax errors and security flaws using relevant sections of the WordPress Coding Standards. They are also evaluated by CodeClimate using static code analysis and linting provided by PHPCS and PHPMD. We expect that contributors are running those tools locally, or otherwise ensuring that pull requests conform to those standards. We have included the `codesniffer.local.xml` configuration for local use, which is typically invoked by the following command:

```
phpcs -psvn . --standard=./codesniffer.local.xml --extensions=php --report=source --report=full
```
