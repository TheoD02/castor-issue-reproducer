<?php

use Castor\Attribute\AsContext;
use Castor\Attribute\AsTask;
use Castor\Context;
use TheoD02\Castor\Docker\CastorDockerContext;
use TheoD02\Castor\Docker\RunnerTrait;

use function Castor\context;
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
#[AsContext]
function default_context(): Context
{
    return new Context(
        data: [
            'docker' => [
                'default' => new CastorDockerContext(
                    container: 'UNKNOWN',
                    serviceName: 'UNKNOWN',
                    workdir: '/app',
                )
            ]
        ]
    );
}

class Composer
{
    use RunnerTrait {
        __construct as private __runnerConstruct;
    }

    public function __construct(
        Context $context,
    ) {
        $this->__runnerConstruct($context);
    }

    protected function allowRunningUsingDocker(): bool
    {
        return true;
    }

    protected function getBaseCommand(): ?string
    {
        return 'composer';
    }

    public function install(): void
    {
        $this->add('install')->runCommand();
    }
}

function composer(?Context $context = null): Composer
{
    return new Composer($context ?? context());
}

#[AsTask]
function install(): void
{
    composer()->install();
}