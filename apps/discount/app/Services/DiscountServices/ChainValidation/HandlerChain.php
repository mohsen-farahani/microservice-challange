<?php

namespace App\Services\DiscountServices\ChainValidation;

abstract class HandlerChain
{

    private $successor;

    /**
     * setSuccessor function.
     */
    final public function setSuccessor(self $handler): void
    {
        $this->successor = $handler;
    }

    /**
     * handle function.
     *
     * @param null|mixed[] $data
     *
     * @return mixed[]
     */
    final public function handle(array $data): array
    {
        $data = $this->process($data);

        if (isset($data['status']) && false === (bool) $data['status']) {
            return $data;
        }

        if (null !== $this->successor) {
            return $this->successor->handle($data);
        }

        $data['message'] = 'کد معتبر است';
        $data['status']  = true;

        return $data;
    }

    /**
     * process function.
     *
     * @param null|mixed[] $request
     *
     * @return mixed[]
     */
    abstract protected function process(array $request): array;
}
