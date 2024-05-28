<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class DummyLoaderTest extends TestCase
{
    /**
     * @Depends AbstractLoaderTest::testClassExists
     */
    public function testFileExists(): string
    {
        $path = __DIR__.'/../src/Kito/Loader/DummyLoader.php';
        $this->assertFileExists($path);

        return $path;
    }

    /**
     * @depends testFileExists
     */
    public function testClassExists(string $path): void
    {
        include_once $path;
        $this->assertTrue(class_exists(Kito\Loader\DummyLoader::class));
    }
}
