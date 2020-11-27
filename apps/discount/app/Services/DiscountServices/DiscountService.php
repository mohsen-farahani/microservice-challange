<?php

namespace App\Services\DiscountServices;

use App\Models\Campaign;
use App\Models\UsersCampaign;
use App\Services\DiscountServices\ContextTransaction\WalletTranscation;

class DiscountService
{
    /**
     * begainTransaction
     *
     * @param  mixed $campaign
     * @param  mixed $mobile
     * @return void
     */
    public function begainTransaction(Campaign $campaign, string $mobile): void
    {
        switch ($campaign->campaign_type) {
            case Campaign::CAMPAIGN_TYPE_WALLET:
                $context = new WalletTranscation;
                break;
        }

        $context->prosess($campaign, $mobile);
    }

    /**
     * rollbackTransaction
     *
     * @param  mixed $mobile
     * @param  mixed $campaignID
     * @return void
     */
    public function rollbackTransaction(string $mobile, int $campaignID): void
    {
        UsersCampaign::where('mobile', $mobile)
            ->where('campaign_id', $campaignID)
            ->delete();
    }
}
