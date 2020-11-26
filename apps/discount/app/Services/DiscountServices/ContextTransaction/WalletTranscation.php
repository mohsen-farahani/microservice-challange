<?php

namespace App\Services\DiscountServices\ContextTransaction;

use App\Models\Campaign;
use App\Models\UsersCampaign;
use App\Publishers\WalletIncrease;

class WalletTranscation implements InterfaceTransaction
{
    public function prosess(Campaign $campaign, string $mobile)
    {
        UsersCampaign::create([
            'campaign_id' => $campaign->id,
            'mobile'      => $mobile,
        ]);

        $publisher = new WalletIncrease([
            'mobile'   => $mobile,
            'campaign' => $campaign,
        ]);

        $publisher->handle();

    }
}
