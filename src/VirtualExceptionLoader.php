<?php

declare(strict_types=1);

/**
 * VirtualExceptionLoader
 * Create Generic Exception class in runtime
 * php version 7.2.
 *
 * @category Loader
 *
 * @author   The Kito <thekito@blktech.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU GPL
 *
 * @link     https://github.com/TheKito/Loader
 */

namespace Kito\Loader;

class VirtualExceptionLoader extends AbstractLoader
{
    /**
     * Load virtual class file.
     *
     * @param string $className Class name with namespace
     *
     * @return bool Return true if class file its found and loaded
     */
    protected function loadClass(string $className): void
    {
        if (substr($className, -9) != 'Exception')
            return;
                
//        if (count($_)>0) {
//            eval('namespace ' . pathinfo($className,PATHINFO_DIRNAME) . '{ class ' . pathinfo($className,PATHINFO_FILENAME) . ' extends '.$extends.' {} }');
//        } else {
//            eval('class ' . pathinfo($className,PATHINFO_FILENAME) . ' extends '.$extends.' {}');
//        }
                
    }
}
