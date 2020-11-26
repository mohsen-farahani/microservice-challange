<?php

namespace App\Workers;

use App\Services\DiscountServices\DiscountService;

class RollbackWalletIncrease extends AbstractWorkers
{
    public function handle()
    {
        $data = json_decode($this->body, true);

        $discountService = new DiscountService;
        $discountService->rollbackTransaction($data['mobile'], $data['campaign']['id']);
    }

}
