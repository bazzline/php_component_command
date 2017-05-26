# PHP Command Component

This free as in freedom project aims to deliver a easy to use php command component.

The build status of the current master branch is tracked by Travis CI:
[![Build Status](https://travis-ci.org/bazzline/php_component_command.png?branch=master)](http://travis-ci.org/bazzline/php_component_command)
[![Latest stable](https://img.shields.io/packagist/v/net_bazzline/php_component_command.svg)](https://packagist.org/packages/net_bazzline/php_component_command)

The scrutinizer status are:
[![code quality](https://scrutinizer-ci.com/g/bazzline/php_component_command/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_command/) | [![build status](https://scrutinizer-ci.com/g/bazzline/php_component_command/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_command/)

The versioneye status is:
[![Dependency Status](https://www.versioneye.com/user/projects/548dee2a6e88f4ce4e0001ee/badge.svg?style=flat)](https://www.versioneye.com/user/projects/548dee2a6e88f4ce4e0001ee)

Take a look on [openhub.net](https://www.openhub.net/p/php_component_command).

The current change log can be found [here](https://github.com/bazzline/php_component_command/blob/master/CHANGELOG.md).

# Usage

This component is also shipped with a lot of [examples](https://github.com/bazzline/php_component_command/tree/master/example/Example).

```php
class Zip extends Command
{
    /** 
     * @param string $archiveName
     * @param array $items
     * @return array
     * @throws RuntimeException
     */
    public function __invoke($archiveName, array $items)
    { 
        return $this->zip($archiveName, $items);
    }

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

    /**
     * @throws InvalidSystemEnvironmentException
     */
    public function validateSystemEnvironment()
    {
        if (!is_executable('/usr/bin/zip')) {
            throw new InvalidSystemEnvironmentException(
                '/usr/bin/zip is mandatory'
            );
        }

        if (!is_executable('/usr/bin/unzip')) {
            throw new InvalidSystemEnvironmentException(
                '/usr/bin/unzip is mandatory'
            );
        }
    }
}

$zip = new Zip();

$pathToZipArchive = '/tmp/my.zip';

$zip->validateSystemEnvironment();

echo 'list archive content' . PHP_EOL;
$lines = $zip->listContent($pathToZipArchive);
foreach ($lines as $line) {
    echo $line . PHP_EOL;
}

echo 'unzip archive' . PHP_EOL;
$zip->unzip($pathToZipArchive, '/tmp/my_directory');

echo 'zip directory' . PHP_EOL;
//also valid call since we implemented __invoke
//$zip($pathToZipArchive, array('/tmp/my_directory'));
$zip->zip($pathToZipArchive, array('/tmp/my_directory'));
```

There are also more [examples](https://github.com/bazzline/php_component_command/tree/master/example/Example) shipped with this project.

* [cp](https://github.com/bazzline/php_component_command/tree/master/example/Example/cp/)
* [ls](https://github.com/bazzline/php_component_command/tree/master/example/Example/ls/)
* [mv](https://github.com/bazzline/php_component_command/tree/master/example/Example/mv/)
* [rm](https://github.com/bazzline/php_component_command/tree/master/example/Example/rm/)
* [ps](https://github.com/bazzline/php_component_command/tree/master/example/Example/ps/)

# Install

## By Hand

```
mkdir -p vendor/net_bazzline/php_component_command
cd vendor/net_bazzline/php_component_command
git clone https://github.com/bazzline/php_component_command .
```

## With Composer

```
composer require net_bazzline/php_component_command:dev-master
```

# Benefits

* easy and robust way of dealing with system commands
* return value validation by using exceptions
* hopefully the thinnest possible layer between system commands


# API

[API](http://www.bazzline.net/deaff6d0a8004d2fe870434f0eda12b170111295/index.html) is available at [bazzline.net](http://www.bazzline.net).

# Final Words

Star it if you like it :-). Add issues if you need it. Pull patches if you enjoy it. Write a blog entry if you use it :-D.
