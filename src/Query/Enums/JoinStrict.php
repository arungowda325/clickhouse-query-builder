<?php

namespace Wolverine\ClickhouseBuilder\Query\Enums;

use MyCLabs\Enum\Enum;

/**
 * Join strictness.
 */
final class JoinStrict extends Enum
{
    public const ALL = 'ALL';
    public const ANY = 'ANY';
}
