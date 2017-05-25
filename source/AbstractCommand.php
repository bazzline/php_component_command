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
        $lines  = [];
        $return = null;

        exec($command, $lines, $return);

        if ($validateReturnValue) {
            $this->validateExecuteReturn($return, $command, $lines);
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
     * @param mixed|array $lines
     * @throws RuntimeException
     */
    private function validateExecuteReturn($return, $command, $lines)
    {
        if ($return > 0) {
            throw new RuntimeException(
                'following command created an error: "' . $command . '"' . PHP_EOL .
                'exit code: "' . $return . '"' . PHP_EOL .
                'return: ' . var_export($lines, true)
            );
        }
    }
}
