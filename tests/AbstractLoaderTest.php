<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class AbstractLoaderTest extends TestCase
{
    public function testFileExists(): string
    {
        $path = __DIR__.'/../src/AbstractLoader.php';
        $this->assertFileExists($path);

        return $path;
    }
    
    /**
     * @depends testFileExists
     */    
    public function testClassExists(string $path): string
    {       
        $this->assertTrue(class_exists(Kito\Loader\AbstractLoader::class));        
    }
    
}
