<?php

namespace Castor\User;

use Castor\Attribute\AsTask;
use Ramsey\Collection\Collection;

use function Castor\io;

#[AsTask(name: 'test_from_import')]
function test_2(): void
{
    $items = ['1', '2', '3'];
    $collection = new Collection('string', $items);

    foreach ($collection as $item) {
        io()->writeln($item);
    }
}