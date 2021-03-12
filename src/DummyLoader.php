<?php

declare(strict_types=1);

/**
 * DummyLoader
 * DummyLoader
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

class DummyLoader extends AbstractLoader
{
    /**
     * Print Dummy Load Class.
     *
     * @param string $className Class name with namespace
     */
    protected function loadClass(string $className): void
    {
        error_log('Dummy Loading: '.$className);
    }
}
