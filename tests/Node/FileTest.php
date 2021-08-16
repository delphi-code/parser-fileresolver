<?php

namespace delphi\Tests\Parser\File\Node;

use delphi\Parser\File\Node\File;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \delphi\Parser\File\Node\File
 */
class FileTest extends TestCase
{
    /**
     * @covers ::getType
     */
    public function testGetType()
    {
        $this->assertEquals('File', (new File(''))->getType());
    }

    /**
     * @covers ::getSubNodeNames
     */
    public function testGetSubNodeNames()
    {
        $this->assertEquals(['name', 'stmts'], (new File(''))->getSubNodeNames());
    }

    /**
     * @covers ::__construct
     */
    public function testConstruction()
    {
        $name       = __METHOD__;
        $stmts      = [$this, $name];
        $attributes = [1, 9];
        $sut        = new File($name, $stmts, $attributes);

        $this->assertEquals($name, $sut->name);
        $this->assertEquals($stmts, $sut->stmts);
        $this->assertEquals($attributes, $sut->getAttributes());
    }
}
