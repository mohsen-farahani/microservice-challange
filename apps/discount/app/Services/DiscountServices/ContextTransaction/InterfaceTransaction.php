<?php

namespace App\Services\DiscountServices\ContextTransaction;

use App\Models\Campaign;

interface InterfaceTransaction
{
    /**
     * prosess
     *
     * @param  mixed $campaign
     * @param  mixed $mobile
     * @return void
     */
    public function prosess(Campaign $campaign, string $mobile): void;
}
