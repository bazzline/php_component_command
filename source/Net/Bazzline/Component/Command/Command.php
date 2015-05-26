<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-12-11
 */

namespace Net\Bazzline\Component\Command;

/**
 * Class Command
 * @package Net\Bazzline\Component\Command
 */
class Command
{
    /**
     * @param string $command
     * @param boolean $validateReturnValue
     * @return array
     * @throws RuntimeException
     */
    public function __invoke($command, $validateReturnValue = true)
    {
        return $this->execute($command, $validateReturnValue);
    }

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