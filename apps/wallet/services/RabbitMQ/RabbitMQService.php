<?php

namespace Services\RabbitMQ;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    private $connection;
    private $channel;

    public function __construct()
    {
        $this->connection = new AMQPStreamConnection(
            env('RABBITMQ_HOST'),
            env('RABBITMQ_PORT'),
            env('RABBITMQ_USERNAME'),
            env('RABBITMQ_PASSWORD')
        );
        $this->channel = $this->connection->channel();
    }

    /**
     * publish
     *
     * @param  mixed $message
     * @param  mixed $channelName
     * @return void
     */
    public function publish(string $message, string $channelName): void
    {
        $this->channel->queue_declare($channelName, false, false, false, false);

        $msg = new AMQPMessage($message);

        $this->channel->basic_publish($msg, '', $channelName);

        $this->channel->close();
        $this->connection->close();
    }

    /**
     * worker
     *
     * @param  mixed $channelName
     * @param  mixed $callback
     * @return void
     */
    public function worker(string $channelName, callable $callback): void
    {
        $this->channel->queue_declare($channelName, false, false, false, false);

        $this->channel->basic_consume($channelName, '', false, true, false, false, $callback);

        while ($this->channel->is_consuming()) {
            $this->channel->wait();
        }

        $this->channel->close();
        $this->connection->close();
    }
}
