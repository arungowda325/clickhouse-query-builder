<?php

namespace Wolverine\ClickhouseBuilder\Query\Traits;

use Wolverine\ClickhouseBuilder\Query\BaseBuilder as Builder;
use Wolverine\ClickhouseBuilder\Query\TwoElementsLogicExpression;

trait WheresComponentCompiler
{
    /**
     * Compiles wheres to string to pass this string in query.
     *
     * @param Builder                      $builder
     * @param TwoElementsLogicExpression[] $wheres
     *
     * @return string
     */
    public function compileWheresComponent(Builder $builder, array $wheres): string
    {
        $result = $this->compileTwoElementLogicExpressions($wheres);

        return "WHERE {$result}";
    }
}
