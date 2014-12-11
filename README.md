# PHP Command Component

This project aims to deliver a easy to use php command component.

The build status of the current master branch is tracked by Travis CI:
[![Build Status](https://travis-ci.org/bazzline/php_component_command.png?branch=master)](http://travis-ci.org/bazzline/php_component_command)
[![Latest stable](https://img.shields.io/packagist/v/net_bazzline/php_component_command.svg)](https://packagist.org/packages/net_bazzline/php_component_command)

The scrutinizer status are:
[![code quality](https://scrutinizer-ci.com/g/bazzline/php_component_command/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_command/) | [![code coverage](https://scrutinizer-ci.com/g/bazzline/php_component_command/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_command/) | [![build status](https://scrutinizer-ci.com/g/bazzline/php_component_locator_generator/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_command/)

The versioneye status is:
@todo
[![Dependency Status](https://www.versioneye.com/user/projects/54036dbbeab62ac615000143/badge.svg?style=flat)](https://www.versioneye.com/user/projects/54036dbbeab62ac615000143)

Take a look on [ohloh.net](https://www.ohloh.net/p/php_component_command).

# Install

## By Hand

    mkdir -p vendor/net_bazzline/php_component_command
    cd vendor/net_bazzline/php_component_command
    git clone https://github.com/bazzline/php_component_command .

## With [Packagist](https://packagist.org/packages/net_bazzline/php_component_command)

    composer require net_bazzline/php_component_command:dev-master

# Benefits

* easy and robust way of dealing with system commands
* return value validation by using exceptions
* hopefully the thinnest possible layer between system commands

# Optimization Potential

* implement some stuff from [system process](https://github.com/jakobwesthoff/systemProcess) with a general aproach in mind
* no unit tests so far

# API

@todo
Thanks to [apigen](https://github.com/apigen/apigen), the api is available in the [document](https://github.com/bazzline/php_component_code_generator/blob/master/document/index.html) section or [online](http://code.bazzline.net/).

# History

* [1.0.1](https://github.com/bazzline/php_component_command/tree/1.0.1) - not yet released
    * add unit tests
* [1.0.0](https://github.com/bazzline/php_component_command/tree/1.0.0) - released at 11-12-2014
    * initial release
