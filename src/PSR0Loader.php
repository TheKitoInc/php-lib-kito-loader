<?php
declare(strict_types=1);

/*
 * PSR0Loader
 */

namespace Kito\Loader;

/**
 * PSR0Loader
 * Loader old style
 * php version 7.2
 *
 * @category Loader
 * @package  Kito\Loader
 * @author   The Kito <thekito@blktech.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU GPL
 * @link     https://github.com/TheKito/Loader
 */
class PSR0Loader extends AbstractLoader
{
    private $libPath;
    
    /**
     * PSR0Loader Constructor
     * 
     * @param string $libPath base path to map namespace
     *     
     */    
    public function __construct(string $libPath)
    {
        $this->libPath = $libPath;
    }    
    
    /**
     * Find and load class file
     * 
     * @param string $className Class name with namespace
     * 
     * @return bool Return true if class file its found and loaded
     */
    public function loadClass(string $className): bool
    {
        $className = ltrim($className, '\\');
        $fileName = $this->libPath . '/';
        $namespace = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        if(!file_exists($fileName))
            return false;
        
        if(!is_readable($fileName))
            return false;
        
        require $fileName;
        
        return class_exists($className, false);
    }

}
