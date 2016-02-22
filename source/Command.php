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
class Command extends AbstractCommand
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
}
