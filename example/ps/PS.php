<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-12-14 
 */

namespace Example\ps;

use Net\Bazzline\Component\Command\Command;
use Net\Bazzline\Component\Command\RuntimeException;

/**
 * Class PS
 * @package Example\ps
 */
class PS extends Command
{
    /**
     * @return array
     * @throws RuntimeException
     */
    public function ps()
    {
        return $this->execute('/usr/bin/ps auxf');
    }
} 