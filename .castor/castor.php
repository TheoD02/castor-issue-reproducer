<?php

namespace Castor\User;

use Castor\Attribute\AsTask;
use Ramsey\Collection\Collection;

use function Castor\import;
use function Castor\io;

import('composer://ramsey/collection');
import(__DIR__);

#[AsTask]
function test(): void
{
    $items = ['a', 'b', 'c'];
    $collection = new Collection('string', $items);

    foreach ($collection as $item) {
        io()->writeln($item);
    }
}