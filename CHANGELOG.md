# Change Log

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [Open]

### To Add

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
* updated dependencies
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

### To Change

## [Unreleased]

### Added

### Changed

* moved documentation to code.bazzline.net
* replaced deprecated >>array()<< syntax with >>[]<<

## [1.2.2](https://github.com/bazzline/php_component_command/tree/1.2.2) - released at 22.02.2016

### Added

* added integration test for php 7.0

### Changed

* moved to psr-4 autoloading
* removed integration test for php 5.3.3
* updated dependency

## [1.2.1](https://github.com/bazzline/php_component_command/tree/1.2.1) - released at 11.12.2015

### Changed

* updated dependency

## [1.2.0](https://github.com/bazzline/php_component_command/tree/1.2.0) - released at 18.09.2015

### Changed

* extracted main code to *AbstractCommand* and extended *Command* from this

## [1.1.0](https://github.com/bazzline/php_component_command/tree/1.1.0) - released at 13.09.2015

### Added

* added output of command output to exit code validation exception

## [1.0.11](https://github.com/bazzline/php_component_command/tree/1.0.11) - released at 23.08.2015

### Changed

* updated dependencies

## [1.0.10](https://github.com/bazzline/php_component_command/tree/1.0.10) - released at 30.07.2015

### Changed

* updated dependencies

## [1.0.9](https://github.com/bazzline/php_component_command/tree/1.0.9) - released at 04.07.2015

### Changed

* updated dependencies

## [1.0.8](https://github.com/bazzline/php_component_command/tree/1.0.8) - released at 29.06.2015

### Changed

* updated dependencies

## [1.0.7](https://github.com/bazzline/php_component_command/tree/1.0.7) - released at 26.05.2015

### Changed

* implement __invoke() to use a command as a callable

## [1.0.6](https://github.com/bazzline/php_component_command/tree/1.0.6) - released at 08.02.2015

### Changed

* removed dependency to apigen

## [1.0.5](https://github.com/bazzline/php_component_command/tree/1.0.5) - released at 08.02.2015

### Added

* added "passthru" as public method
* covered "$validateReturnValue" with a unit test
* implement linux/unix commands (not as example but as ready to use)
* implemented "validateSystemEnvironment" in example commands
* implemented usage of "$validateReturnValue" in example commands

### Changed

* updated dependencies

## [1.0.4](https://github.com/bazzline/php_component_command/tree/1.0.4) - released at 18.12.2014

### Changed

* implemented optional parameter "$validateReturnValue" in method "Command::execute()"

## [1.0.3](https://github.com/bazzline/php_component_command/tree/1.0.3) - released at 17.12.2014

### Changed

* implement "validateSystemEnvironment" (throws "InvalidSystemEnvironmentException")

## [1.0.2](https://github.com/bazzline/php_component_command/tree/1.0.2) - released at 14.12.2014

### Added

* added api
* added [example](https://github.com/bazzline/php_component_command/tree/master/example/Example/) as php scripts

### Changed

* removed @todos

## [1.0.1](https://github.com/bazzline/php_component_command/tree/1.0.1) - released at 12.12.2014

### Added

* add unit tests
* add usage / example in readme

## [1.0.0](https://github.com/bazzline/php_component_command/tree/1.0.0) - released at 11.12.2014

* initial release
