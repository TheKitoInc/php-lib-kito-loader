# Loader
PHPLoaderLibs

    define('PATH_LIB', __DIR__ . '/lib');

    require_once PATH_LIB . '/Kito/Loader/AbstractLoader.php';

    require_once PATH_LIB . '/Kito/Loader/PSR0Loader.php';
    $cacheLoader = new \Kito\Loader\PSR0Loader(__DIR__);
    $cacheLoader->register();

    require_once PATH_LIB . '/Kito/Loader/BLKLoader.php';
    $blkLoader = new \Kito\Loader\BLKLoader($cacheLoader);
    $blkLoader->register();
    
