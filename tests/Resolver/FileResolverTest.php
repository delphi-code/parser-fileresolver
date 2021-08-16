<?php

namespace delphi\Tests\Parser\File\Resolver;

use delphi\Parser\File\Node\File;
use delphi\Parser\File\Resolver\FileResolver;
use PhpParser\NodeAbstract;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \delphi\Parser\File\Resolver\FileResolver
 */
class FileResolverTest extends TestCase
{
    private $sut;

    private $filepath;

    protected function setUp(): void
    {
        $this->filepath = 'filepath';

        $this->sut = new FileResolver();
        $this->sut->setFilepath($this->filepath);
    }

    /**
     * @covers ::beforeTraverse
     * @covers ::setFilepath
     */
    public function testBeforeTraverse()
    {
        $nodes = [1, 'asdf'];
        $out   = $this->sut->beforeTraverse($nodes);
        $this->assertCount(1, $out);
        $this->assertInstanceOf(File::class, $out[0]);

        $file = $out[0];
        $this->assertEquals($this->filepath, $file->name);
        $this->assertSame($nodes, $file->stmts);
    }

    /**
     * @covers ::enterNode
     */
    public function testEnterNode()
    {
        $node = $this->getMockForAbstractClass(
            NodeAbstract::class,
            [],
            '',
            true,
            true,
            true,
            ['setAttribute'],
        );

        $node
            ->expects($this->once())
            ->method('setAttribute')
            ->with(FileResolver::ATTRIBUTE_KEY, $this->filepath);
        $out = $this->sut->enterNode($node);
        $this->assertSame($node, $out);
    }
}
