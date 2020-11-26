<?php

namespace App\Services\DiscountServices\ContextTransaction;

use App\Models\Campaign;

interface InterfaceTransaction
{
    public function prosess(Campaign $campaign, string $mobile);
}
