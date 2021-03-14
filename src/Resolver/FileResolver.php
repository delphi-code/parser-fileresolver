<?php

namespace delphi\Parser\File\Resolver;

use delphi\Parser\File\Node\File;
use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class FileResolver extends NodeVisitorAbstract
{
    public const ATTRIBUTE_KEY = 'filepath';

    protected string $filePath;

    public function beforeTraverse(array $nodes)
    {
        return [new File($this->filePath, $nodes)];
    }

    public function setFilepath(string $path)
    {
        $this->filePath = $path;
    }

    public function enterNode(Node $node)
    {
        $node->setAttribute(self::ATTRIBUTE_KEY, $this->filePath);
        return $node;
    }
}
