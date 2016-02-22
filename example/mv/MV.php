<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-12-14 
 */

namespace Example\mv;

use Net\Bazzline\Component\Command\Command;
use Net\Bazzline\Component\Command\RuntimeException;

/**
 * Class MV
 * @package Example\mv
 */
class MV extends Command
{
    /**
     * @param string $source
     * @param string $destination
     * @return array
     * @throws RuntimeException
     */
    public function mv($source, $destination)
    {
        if (!is_readable($source)
            && (
                !is_file($source)
                || !is_dir($source)
            )
        ) {
            throw new RuntimeException(
                'given source needs to be a readable file or directory'
            );
        }

        return $this->execute('/usr/bin/mv ' . $source . ' ' . $destination);
    }
}