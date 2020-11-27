<?php

namespace App\Services\DiscountServices;

interface InterfaceDiscountValidation
{
    /**
     * validate
     *
     * @param  mixed $data
     * @return array
     */
    public function validate(array $data): array;
}
