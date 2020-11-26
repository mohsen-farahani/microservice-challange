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

    private function prepare()
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

    abstract public function handle();

    /**
     * getChannleName
     *
     * @return self
     */
    private function getChannleName()
    {
        $childeClass = get_called_class();
        $className   = Str::afterLast($childeClass, '\\');
        $className   = Str::snake($className);
        return Str::upper($className);
    }

}
