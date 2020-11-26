<?php

namespace App\Services\DiscountServices;

use App\Models\Campaign;
use App\Models\UsersCampaign;
use App\Services\DiscountServices\ContextTransaction\WalletTranscation;

class DiscountService
{
    public function begainTransaction(Campaign $campaign, string $mobile)
    {
        switch ($campaign->campaign_type) {
            case Campaign::CAMPAIGN_TYPE_WALLET:
                $context = new WalletTranscation;
                break;
        }

        $context->prosess($campaign, $mobile);
    }

    public function rollbackTransaction(string $mobile, int $campaignID)
    {
        UsersCampaign::where('mobile', $mobile)
            ->where('campaign_id', $campaignID)
            ->delete();
    }
}
