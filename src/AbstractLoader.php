<?php
declare(strict_types=1);

/**
 * AbstractLoader
 */

namespace Kito\Loader;

/**
 * AbstractLoader
 * Loader skeleton class
 * php version 7.2
 *
 * @category Loader
 * @package  Kito\Loader
 * @author   The Kito <thekito@blktech.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU GPL
 * @link     https://github.com/TheKito/Loader
 */
abstract class AbstractLoader
{

    /**
     * Installs this class loader on the SPL autoload stack.
     * 
     * @param bool $prepend If true, register will prepend the autoloader in queue
     * 
     * @return self self class 
     */
    public function register(bool $prepend = false): self
    {
        spl_autoload_register(array($this, 'loadClass'), true, $prepend);
        return $this;
    }

    /**
     * Uninstalls this class loader from the SPL autoloader stack.
     * 
     * @return self self class 
     */
    public function unregister(): self
    {
        spl_autoload_unregister(array($this, 'loadClass'));
        return $this;
    }

    /**
     * Find and load class file
     * 
     * @param string $className Class name with namespace
     * 
     * @return bool Return true if class file its found and loaded
     */
    public abstract function loadClass(string $className): bool;
}
