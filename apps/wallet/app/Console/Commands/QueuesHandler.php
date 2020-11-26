<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class QueuesHandler extends Command
{
    /**
     * @var string
     */
    protected $signature = 'queues:work {--name=}';

    /**
     * @var string
     */
    protected $description = 'handle queue workers and pub/sub in message broker';

    /**
     * handle
     *
     * @return void
     */
    public function handle()
    {
        $classNameTarget = $this->getClassTarget();
        app($classNameTarget)->handle();
    }

    /**
     * getClassTarget
     *
     * @return string
     */
    private function getClassTarget(): string
    {
        $classNameTarget = $this->option('name');
        $classNameTarget = Str::lower($classNameTarget);
        $classNameTarget = Str::studly($classNameTarget);

        return "App\\Workers\\$classNameTarget";
    }
}
