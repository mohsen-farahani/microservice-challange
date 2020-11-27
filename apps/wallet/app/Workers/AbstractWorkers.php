<?php

namespace App\Workers;

use Illuminate\Support\Str;
use Services\RabbitMQ\RabbitMQService;

abstract class AbstractWorkers
{
    protected $message;
    protected $body;

    public function __construct()
    {
        $this->prepare();
    }

    /**
     * prepare
     *
     * @return void
     */
    private function prepare(): void
    {
        $rabb = (new RabbitMQService);

        $callback = function ($msg) {
            $this->message = $msg;
            $this->body    = $msg->body;
            $this->handle();
            dump(date('H:i:s') . " prosessing done!");
        };

        $rabb->worker($this->getChannleName(), $callback);
    }

    /**
     * handle
     *
     * @return void
     */
    abstract public function handle(): void;

    /**
     * getChannleName
     *
     * @return string
     */
    private function getChannleName(): string
    {
        $childeClass = get_called_class();
        $className   = Str::afterLast($childeClass, '\\');
        $className   = Str::snake($className);
        return Str::upper($className);
    }

}
