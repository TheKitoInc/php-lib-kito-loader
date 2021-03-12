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
    public function testClassExists(string $path): void
    {       
        include_once $path;
        $this->assertTrue(class_exists(Kito\Loader\AbstractLoader::class));        
    }
    
    /**
     * @depends testClassExists
     */    
    public function testParsePathEmpty(): void
    {                      
        $this->assertEquals(Kito\Loader\AbstractLoader::parsePath(''),'');        
    }
    
    /**
     * @depends testClassExists
     */    
    public function testParsePathSingle(): void
    {                      
        $this->assertEquals(Kito\Loader\AbstractLoader::parsePath('abc'),DIRECTORY_SEPARATOR.'abc');        
    }    
}
