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
    //begin of test
    public function testEnvironment()
    {
        $isWindowsOs = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN');

        $this->assertFalse($isWindowsOs, 'test only work on unix systems');
    }

    /**
     * @depends testEnvironment
     */
    public function testExecuteCommand()
    {
        $class      = $this->getNewCommand();
        $command    = $this->getNotFailingCommandCall();

        $class->execute($command);
    }

    /**
     * @depends testEnvironment
     */
    public function testInvokeCommand()
    {
        $class      = $this->getNewCommand();
        $command    = $this->getNotFailingCommandCall();

        $class($command);
    }

    /**
     * @depends testEnvironment
     */
    public function testExecuteCommandOutputLines()
    {
        $class          = $this->getNewCommand();
        $command        = $this->getNotFailingCommandCall();
        $expectedLines  = array(date('Y-m-d'));

        $lines = $class->execute($command);

        $this->assertEquals($expectedLines, $lines);
    }

    /**
     * @depends testEnvironment
     */
    public function testInvokeCommandOutputLines()
    {
        $class          = $this->getNewCommand();
        $command        = $this->getNotFailingCommandCall();
        $expectedLines  = array(date('Y-m-d'));

        $lines = $class($command);

        $this->assertEquals($expectedLines, $lines);
    }

    /**
     * @depends testEnvironment
     * @expectedException \Net\Bazzline\Component\Command\RuntimeException
     * @expectedExceptionMessage following command created an error:
     */
    public function testExecuteCommandExpectedToFail()
    {
        $class      = $this->getNewCommand();
        $command    = $this->getFailingCommandCall();

        $class->execute($command);
    }

    /**
     * @depends testEnvironment
     * @expectedException \Net\Bazzline\Component\Command\RuntimeException
     * @expectedExceptionMessage following command created an error:
     */
    public function testInvokeCommandExpectedToFail()
    {
        $class      = $this->getNewCommand();
        $command    = $this->getFailingCommandCall();

        $class($command);
    }

    /**
     * @depends testEnvironment
     */
    public function testExecuteCommandWithDisabledValidationOrReturnValueExpectedToFail()
    {
        $class      = $this->getNewCommand();
        $command    = $this->getFailingCommandCall();

        $lines= $class->execute($command, false);

        $this->assertEquals(array(), $lines);
    }

    /**
     * @depends testEnvironment
     */
    public function testInvokeCommandWithDisabledValidationOrReturnValueExpectedToFail()
    {
        $class      = $this->getNewCommand();
        $command    = $this->getFailingCommandCall();

        $lines= $class($command, false);

        $this->assertEquals(array(), $lines);
    }
    //end of test

    //begin of helper
    /**
     * @return Command
     */
    private function getNewCommand()
    {
        return new Command();
    }

    /**
     * @return string
     */
    private function getFailingCommandCall()
    {
        return 'php ' . __DIR__ . '/../../../../../resources/failing_command.php';
    }

    /**
     * @return string
     */
    private function getNotFailingCommandCall()
    {
        return 'php ' . __DIR__ . '/../../../../../resources/running_command.php';
    }
    //end of helper
}