# FileResolver

Adds a top-level node to represent the file that contains the code.

Sets an attribute on every node with the filepath for reference.

# Usage
```php
$fileResolver = new FileResolver();

$t = new \PhpParser\NodeTraverser();
$t->addVisitor($fileResolver);

$fileResolver->setFilepath($filepath);
```
