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

# Usage / [examples](https://github.com/bazzline/php_component_command/tree/master/example/Example)

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
* implement commands for unix and windows like
```php
if (PHP_OS === 'Windows') {
    exec("rd /s /q {$path}");
} else {
    exec("rm -rf {$path}");
}
```

# API

Thanks to [apigen](https://github.com/apigen/apigen), the api is available in the [document](https://github.com/bazzline/php_component_command/blob/master/document/index.html) section or [online](http://code.bazzline.net/).

# History

* upcomming
    * updated dependencies
    * move documentation to code.bazzline.net
    * move examples into [command collection](https://github.com/bazzline/php_component_command_collection)
    * implement validateSystemEnvironment() and usage in "this->execute"
```php
    /**
     * @throws InvalidSystemEnvironmentException
     */
    protected function validateSystemEnvironment($pathToTheCommand)
    {
        if (!is_executable('/usr/bin/rm')) {
            throw new InvalidSystemEnvironmentException(
                '/usr/bin/rm is mandatory'
            );
        }
    }
```

* [1.0.9](https://github.com/bazzline/php_component_command/tree/1.0.9) - released at 04.07.2015
    * updated dependencies
* [1.0.8](https://github.com/bazzline/php_component_command/tree/1.0.8) - released at 29.06.2015
    * updated dependencies
* [1.0.7](https://github.com/bazzline/php_component_command/tree/1.0.7) - released at 26.05.2015
    * implement __invoke() to use a command as a function
* [1.0.6](https://github.com/bazzline/php_component_command/tree/1.0.6) - released at 08.02.2015
    * removed dependency to apigen
* [1.0.5](https://github.com/bazzline/php_component_command/tree/1.0.5) - released at 08.02.2015
    * covered "$validateReturnValue" with a unit test
    * implement linux/unix commands (not as example but as ready to use)
    * implemented "validateSystemEnvironment" in example commands
    * implemented usage of "$validateReturnValue" in example commands
    * added "passthru" as public method
    * updated dependencies
* [1.0.4](https://github.com/bazzline/php_component_command/tree/1.0.4) - released at 18.12.2014
    * implemented optional parameter "$validateReturnValue" in method "Command::execute()"
* [1.0.3](https://github.com/bazzline/php_component_command/tree/1.0.3) - released at 17.12.2014
    * implement "validateSystemEnvironment" (throws "InvalidSystemEnvironmentException")
* [1.0.2](https://github.com/bazzline/php_component_command/tree/1.0.2) - released at 14.12.2014
    * removed @todos
    * added api
    * added [example](https://github.com/bazzline/php_component_command/tree/master/example/Example/) as php scripts
* [1.0.1](https://github.com/bazzline/php_component_command/tree/1.0.1) - released at 12.12.2014
    * add unit tests
    * add usage / example in readme
* [1.0.0](https://github.com/bazzline/php_component_command/tree/1.0.0) - released at 11.12.2014
    * initial release
