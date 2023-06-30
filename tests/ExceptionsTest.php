<?php

namespace Wolverine\ClickhouseBuilder;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery as m;
use PHPUnit\Framework\TestCase;
use Wolverine\ClickhouseClient\Client;
use Wolverine\ClickhouseBuilder\Exceptions\BuilderException;
use Wolverine\ClickhouseBuilder\Exceptions\GrammarException;
use Wolverine\ClickhouseBuilder\Exceptions\NotSupportedException;
use Wolverine\ClickhouseBuilder\Query\Builder;
use Wolverine\ClickhouseBuilder\Query\JoinClause;

class ExceptionsTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function getBuilder(): Builder
    {
        return new Builder(m::mock(Client::class));
    }

    public function testBuilderException()
    {
        $e = BuilderException::cannotDetermineAliasForColumn();
        $this->assertInstanceOf(BuilderException::class, $e);
    }

    public function testGrammarException()
    {
        $e = GrammarException::missedTableForInsert();
        $this->assertInstanceOf(GrammarException::class, $e);

        $e = GrammarException::wrongFrom();
        $this->assertInstanceOf(GrammarException::class, $e);

        $join = new JoinClause($this->getBuilder());

        $e = GrammarException::wrongJoin($join);
        $this->assertInstanceOf(GrammarException::class, $e);

        $e = GrammarException::ambiguousJoinKeys();
        $this->assertInstanceOf(GrammarException::class, $e);
    }

    public function testNotSupportedException()
    {
        $e = NotSupportedException::transactions();
        $this->assertInstanceOf(NotSupportedException::class, $e);

        $e = NotSupportedException::update();
        $this->assertInstanceOf(NotSupportedException::class, $e);
    }
}
