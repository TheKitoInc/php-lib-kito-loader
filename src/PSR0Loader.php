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
     * Find class file.
     *
     * @param string $className Class name with namespace
     */
    public function getFileName(string $className): string
    {
        $classFile = $this->_libPath . parent::parsePath($className . '.php');
        
        return (
                pathinfo($classFile,PATHINFO_DIRNAME) . 
                DIRECTORY_SEPARATOR . 
                str_replace('_', DIRECTORY_SEPARATOR, pathinfo($classFile,PATHINFO_BASENAME))
        );        
    }

    /**
     * Find and load class file.
     *
     * @param string $className Class name with namespace
     */
    protected function loadClass(string $className): void
    {
        $fileName = $this->getFileName($className);

        if (!file_exists($fileName)) {
            return;
        }

        if (!is_readable($fileName)) {
            return;
        }

        require $fileName;
    }

    public function getLibPath()
    {
        return $this->_libPath;
    }
}
