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

$command = new \Example\mv\MV();
$destination = __DIR__ . '/bar';
$source = __DIR__ . '/foo';

$lines = $command->mv($source, $destination);

foreach ($lines as $line) {
    echo $line . PHP_EOL;
}

echo 'moved "' . $source . '" to "' . $destination . '"' . PHP_EOL;
