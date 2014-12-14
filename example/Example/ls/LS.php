<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-12-14 
 */

namespace Example\ls;

use Net\Bazzline\Component\Command\Command;
use Net\Bazzline\Component\Command\RuntimeException;

/**
 * Class LS
 * @package Example\ls
 */
class LS extends Command
{
    /**
     * @param string $path
     * @return array
     * @throws RuntimeException
     */
    public function ls($path)
    {
        return $this->execute('/usr/bin/ls -halt ' . $path);
    }
} 