<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-09-18
 */

namespace Net\Bazzline\Component\Command;

/**
 * Class AbstractCommand
 *
 * @package Net\Bazzline\Component\Command
 */
abstract class AbstractCommand
{
    /**
     * @param string $command
     * @param boolean $validateReturnValue
     * @return array
     * @throws RuntimeException
     * @todo add callback as parameter
     */
    public function execute($command, $validateReturnValue = true)
    {
        $lines  = array();
        $return = null;

        exec($command, $lines, $return);

        if ($validateReturnValue) {
            $this->validateExecuteReturn($return, $command);
        }

        return $lines;
    }

    /**
     * @throws InvalidSystemEnvironmentException
     */
    public function validateSystemEnvironment() {}

    /**
     * @param int $return
     * @param string $command
     * @throws RuntimeException
     */
    private function validateExecuteReturn($return, $command)
    {
        if ($return > 0) {
            throw new RuntimeException(
                'following command created an error: "' . $command . '"' . PHP_EOL .
                'return: "' . $return . '"'
            );
        }
    }
}
