# Loader
PHPLoaderLibs

    require_once __DIR__ . '/Kito/Loader/AbstractLoader.php';
    
    require_once __DIR__ . '/Kito/Loader/PSR0Loader.php';
    $cacheLoader = new \Kito\Loader\PSR0Loader(__DIR__);
    $cacheLoader->register();

    require_once __DIR__ . '/Kito/Loader/BLKLoader.php';
    $blkLoader = new \Kito\Loader\BLKLoader($cacheLoader);
    $blkLoader->register();
