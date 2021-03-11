<?php

declare(strict_types=1);

/**
 * PSR0Loader
 * Loader old style
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

class PSR0Loader extends AbstractLoader
{
    private $_libPath;

    /**
     * PSR0Loader Constructor.
     *
     * @param string $_libPath base path to map namespace
     */
    public function __construct(string $_libPath)
    {
        $this->_libPath = $_libPath;
    }

    /**
     * Find and load class file.
     *
     * @param string $className Class name with namespace
     *   
     */
    protected function loadClass(string $className): void
    {
        $className = ltrim($className, '\\');
        $fileName = $this->_libPath.'/';
        $namespace = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace).DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className).'.php';

        if (!file_exists($fileName)) {
            return;
        }

        if (!is_readable($fileName)) {
            return;
        }

        require $fileName;
    }
}
