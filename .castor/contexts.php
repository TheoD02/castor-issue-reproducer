<?php

use Castor\Attribute\AsContext;
use Castor\Context;
use TheoD02\Castor\Docker\CastorDockerContext;

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