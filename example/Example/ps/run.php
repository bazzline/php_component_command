<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-12-14 
 */

$isWindows = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN');

if ($isWindows) {
    throw new Exception(
        'this example needs to be run in an unix environment'
    );
}
require_once __DIR__ . '/../../../vendor/autoload.php';

$command = new \Example\ps\PS();

$lines = $command->ps();

foreach ($lines as $line) {
    echo $line . PHP_EOL;
}