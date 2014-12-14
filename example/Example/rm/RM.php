<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-12-14 
 */

namespace Example\rm;

use Net\Bazzline\Component\Command\Command;
use Net\Bazzline\Component\Command\RuntimeException;

/**
 * Class RM
 * @package Example\rm
 */
class RM extends Command
{
    /**
     * @param string $source
     * @return array
     * @throws RuntimeException
     */
    public function rm($source)
    {
        return $this->execute('/usr/bin/rm -fr ' . $source);
    }
} 