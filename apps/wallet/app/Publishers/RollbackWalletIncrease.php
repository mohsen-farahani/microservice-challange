<?php

namespace App\Publishers;

use Services\RabbitMQ\RabbitMQService;

class RollbackWalletIncrease extends AbstractPublisher implements InterfacePublisher
{
    public function handle()
    {
        $rabbitMQService = (new RabbitMQService);
        $rabbitMQService->publish($this->data, $this->channle_name);
    }
}
