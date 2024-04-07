<?php

use Castor\Attribute\AsTask;

use function Castor\import;

import('package://theod02/castor-class-task', source: [
    'url' => 'https://github.com/TheoD02/castor-class-task.git',
    'type' => 'git',
    'reference' => 'main',
]);
import('package://theod02/castor-docker', source: [
    'url' => 'https://github.com/TheoD02/castor-docker.git',
    'type' => 'git',
    'reference' => 'main',
]);
import(__DIR__);

// Comment from here when running castor without vendor fetched

#[AsTask]
function install(): void
{
    composer()->install();
}