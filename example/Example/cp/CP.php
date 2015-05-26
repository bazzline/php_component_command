<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-12-14 
 */

namespace Example\cp;

use Net\Bazzline\Component\Command\Command;
use Net\Bazzline\Component\Command\RuntimeException;

/**
 * Class CP
 * @package Example\cp
 */
class CP extends Command
{
    public function __invoke($source, $destination)
    {
        return $this->cp($source, $destination);
    }

    /**
     * @param string $source
     * @param string $destination
     * @return array
     * @throws RuntimeException
     */
    public function cp($source, $destination)
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

        return $this->execute('/usr/bin/cp -r ' . $source . ' ' . $destination);
    }
} 