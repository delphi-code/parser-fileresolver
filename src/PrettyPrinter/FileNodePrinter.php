<?php

namespace delphi\Parser\File\PrettyPrinter;

use delphi\Parser\File\Node\File;

trait FileNodePrinter
{
    protected function pFile(File $node)
    {
        return 'File:' . $node->name;
    }
}
