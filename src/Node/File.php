<?php

namespace delphi\Parser\File\Node;

use PhpParser\Node;
use PhpParser\NodeAbstract;

class File extends NodeAbstract
{
    /** @var Node\Identifier|null Name */
    public $name;

    /** @var Node\Stmt[] Statements */
    public $stmts;

    public function __construct($name, $stmts = [], array $attributes = [])
    {
        $this->name  = $name;
        $this->stmts = $stmts;
        parent::__construct($attributes);
    }

    public function getSubNodeNames(): array
    {
        return ['name', 'stmts'];
    }

    public function getType(): string
    {
        return 'File';
    }
}
