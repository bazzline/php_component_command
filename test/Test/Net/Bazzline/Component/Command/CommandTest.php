<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-12-11 
 */

namespace Test\Net\Bazzline\Component\Command;

use Net\Bazzline\Component\Command\Command;
use PHPUnit_Framework_TestCase;

/**
 * Class CommandTest
 * @package Test\Net\Bazzline\Component\Command
 */
class CommandTest extends PHPUnit_Framework_TestCase
{
    /** @var string */
    private $pathToBash = '/usr/bin/bash';

    //begin of test
    public function testEnvironment()
    {
        $isWindowsOs = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN');
        $this->assertFalse($isWindowsOs, 'test only work on unix systems');

        //results in an error "not within the allowed paths"
        //$isValidBashPath = (is_file($this->pathToBash) && is_executable($this->pathToBash));
        //$this->assertTrue($isValidBashPath, '"' . $this->pathToBash . '" is not a file or not executable');
    }

    /**
     * @depends testEnvironment
     */
    public function testRunningCommand()
    {
        $class = $this->getNewCommand();
        $command = 'php ' . __DIR__ . '/../../../../../resources/running_command.php';

        $class->execute($command);
    }

    /**
     * @depends testEnvironment
     */
    public function testRunningCommandOutputLines()
    {
        $class = $this->getNewCommand();
        $command = 'php ' . __DIR__ . '/../../../../../resources/running_command.php';
        $expectedLines = array(date('Y-m-d'));

        $lines = $class->execute($command);

        $this->assertEquals($expectedLines, $lines);
    }

    /**
     * @depends testEnvironment
     * @expectedException \Net\Bazzline\Component\Command\RuntimeException
     * @expectedExceptionMessage following command created an error:
     */
    public function testFailingCommand()
    {
        $class = $this->getNewCommand();
        $command = 'php ' . __DIR__ . '/../../../../../resources/failing_command.php';
        $expectedLines = array(date('Y-m-d'));

        $lines = $class->execute($command);

        $this->assertEquals($expectedLines, $lines);
    }
    //end of test

    //begin of helper
    private function getNewCommand()
    {
        return new Command();
    }
    //end of helper
}