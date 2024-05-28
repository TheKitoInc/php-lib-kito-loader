<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class AbstractLoaderTest extends TestCase
{
    public function testFileExists(): string
    {
        $path = __DIR__.'/../src/Kito/Loader/AbstractLoader.php';
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
        $this->assertEquals(Kito\Loader\AbstractLoader::parsePath(''), '');
    }

    /**
     * @depends testClassExists
     */
    public function testParsePathSingle(): void
    {
        $this->assertEquals(Kito\Loader\AbstractLoader::parsePath('TheClass'), DIRECTORY_SEPARATOR.'TheClass');
    }

    /**
     * @depends testClassExists
     */
    public function testParsePathSingleDirty(): void
    {
        $this->assertEquals(Kito\Loader\AbstractLoader::parsePath('////TheClass////'), DIRECTORY_SEPARATOR.'TheClass');
    }

    /**
     * @depends testClassExists
     */
    public function testParsePathVendorNameSpace(): void
    {
        $this->assertEquals(Kito\Loader\AbstractLoader::parsePath('TheVendor/TheClass'), DIRECTORY_SEPARATOR.'TheVendor'.DIRECTORY_SEPARATOR.'TheClass');
    }

    /**
     * @depends testClassExists
     */
    public function testParsePathVendorNameSpaceDirty(): void
    {
        $this->assertEquals(Kito\Loader\AbstractLoader::parsePath('////TheVendor////TheClass////'), DIRECTORY_SEPARATOR.'TheVendor'.DIRECTORY_SEPARATOR.'TheClass');
    }

    /**
     * @depends testClassExists
     */
    public function testParsePathVendorPackageNameSpace(): void
    {
        $this->assertEquals(Kito\Loader\AbstractLoader::parsePath('TheVendor/Package/TheClass'), DIRECTORY_SEPARATOR.'TheVendor'.DIRECTORY_SEPARATOR.'Package'.DIRECTORY_SEPARATOR.'TheClass');
    }

    /**
     * @depends testClassExists
     */
    public function testParsePathVendorPackageNameSpaceDirty(): void
    {
        $this->assertEquals(Kito\Loader\AbstractLoader::parsePath('////TheVendor////Package////TheClass////'), DIRECTORY_SEPARATOR.'TheVendor'.DIRECTORY_SEPARATOR.'Package'.DIRECTORY_SEPARATOR.'TheClass');
    }
}
