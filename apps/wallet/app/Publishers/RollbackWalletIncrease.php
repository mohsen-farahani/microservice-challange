<?php

namespace App\Publishers;

use Services\RabbitMQ\RabbitMQService;

class RollbackWalletIncrease extends AbstractPublisher implements InterfacePublisher
{
    /**
     * handle
     *
     * @return void
     */
    public function handle(): void
    {
        $rabbitMQService = (new RabbitMQService);
        $rabbitMQService->publish($this->data, $this->channle_name);
    }
}
