<?php

namespace Wolverine\ClickhouseBuilder;

use PHPUnit\Framework\TestCase;
use Wolverine\ClickhouseBuilder\Query\Identifier;

class IdentifierTest extends TestCase
{
    public function testToString()
    {
        $identifier = new Identifier('column');

        $this->assertEquals('column', (string) $identifier);
    }
}
