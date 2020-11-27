<?php

namespace App\Services\DiscountServices\ContextTransaction;

use App\Models\Campaign;
use App\Models\UsersCampaign;
use App\Publishers\WalletIncrease;

class WalletTranscation implements InterfaceTransaction
{
    /**
     * prosess
     *
     * @param  mixed $campaign
     * @param  mixed $mobile
     * @return void
     */
    public function prosess(Campaign $campaign, string $mobile): void
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
