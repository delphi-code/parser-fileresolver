<?php

namespace delphi\Parser\File\PrettyPrinter;

use PhpParser\PrettyPrinter\Standard as DefaultStandard;

class Standard extends DefaultStandard
{
    use FileNodePrinter;
}
