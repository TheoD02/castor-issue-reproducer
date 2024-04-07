<?php

use Castor\Attribute\AsTask;

use function Castor\capture;
use function Castor\import;
use function Castor\io;

import('package://theod02/castor-class-task', source: [
    'url' => 'https://github.com/TheoD02/castor-class-task.git',
    'type' => 'git',
    'reference' => 'main',
]);
import(__DIR__);

#[AsTask(description: 'Welcome to Castor!')]
function hello(): void
{
    $currentUser = capture('whoami');

    io()->title(sprintf('Hello %s!', $currentUser));
}