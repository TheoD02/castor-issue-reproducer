<?php

use Castor\Context;
use TheoD02\Castor\Docker\RunnerTrait;

use function Castor\context;

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