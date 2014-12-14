# PHP Command Component

This project aims to deliver a easy to use php command component.

The build status of the current master branch is tracked by Travis CI:
[![Build Status](https://travis-ci.org/bazzline/php_component_command.png?branch=master)](http://travis-ci.org/bazzline/php_component_command)
[![Latest stable](https://img.shields.io/packagist/v/net_bazzline/php_component_command.svg)](https://packagist.org/packages/net_bazzline/php_component_command)

The scrutinizer status are:
[![code quality](https://scrutinizer-ci.com/g/bazzline/php_component_command/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_command/) | [![code coverage](https://scrutinizer-ci.com/g/bazzline/php_component_command/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_command/) | [![build status](https://scrutinizer-ci.com/g/bazzline/php_component_command/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_command/)

The versioneye status is:
[![Dependency Status](https://www.versioneye.com/user/projects/548dee2a6e88f4ce4e0001ee/badge.svg?style=flat)](https://www.versioneye.com/user/projects/548dee2a6e88f4ce4e0001ee)

<!--
Take a look on [ohloh.net](https://www.ohloh.net/p/php_component_command).
-->

# Usage / Example

```php
class Zip extends Command
{
    /** 
     * @param string $archiveName
     * @param array $items
     * @return array
     * @throws RuntimeException
     * @todo implement parameter validation
     */
    public function zip($archiveName, array $items)
    {   
        $command = '/usr/bin/zip -r ' . $archiveName . ' ' . implode(' ' , $items);

        return $this->execute($command);
    }

    /** 
     * @param string $pathToArchive
     * @param null|string $outputPath
     * @return array
     * @throws RuntimeException
     * @todo implement parameter validation
     */
    public function unzip($pathToArchive, $outputPath = null)
    {   
        if (!is_null($outputPath)) {
            $command = '/usr/bin/unzip ' . $pathToArchive . ' -d ' . $outputPath;
        } else {
            $command = '/usr/bin/unzip ' . $pathToArchive;
        }

        return $this->execute($command);
    }

    /** 
     * @param string $pathToArchive
     * @return array
     * @throws RuntimeException
     * @todo implement parameter validation
     */
    public function listContent($pathToArchive)
    {   
        $command = '/usr/bin/unzip -l ' . $pathToArchive;

        return $this->execute($command);
    }
}

$zip = new Zip();

$pathToZipArchive = '/tmp/my.zip';

echo 'list archive content' . PHP_EOL;
$lines = $zip->listContent($pathToZipArchive);
foreach ($lines as $line) {
    echo $line . PHP_EOL;
}

echo 'unzip archive' . PHP_EOL;
$zip->unzip($pathToZipArchive, '/tmp/my_directory');

echo 'zip directory' . PHP_EOL;
$zip->zip($pathToZipArchive, array('/tmp/my_directory'));
```

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

* implement some stuff from [system process](https://github.com/jakobwesthoff/systemProcess) with a general approach in mind
* get inspired by [ShellCommand](https://github.com/apinstein/ShellCommand/blob/master/src/ShellCommand/ShellCommand.php)
* implement input validation

# API

Thanks to [apigen](https://github.com/apigen/apigen), the api is available in the [document](https://github.com/bazzline/php_component_command/blob/master/document/index.html) section or [online](http://code.bazzline.net/).

# History

* [1.0.1](https://github.com/bazzline/php_component_command/tree/1.0.1) - not yet released
    * add unit tests
    * added api
    * removed @todos
    * add usage / example in readme
* [1.0.0](https://github.com/bazzline/php_component_command/tree/1.0.0) - released at 11-12-2014
    * initial release
