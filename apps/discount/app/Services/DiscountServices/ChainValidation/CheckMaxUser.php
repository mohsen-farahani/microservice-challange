<?php

namespace App\Services\DiscountServices\ChainValidation;

use App\Models\UsersCampaign;

class CheckMaxUser extends HandlerChain
{

    /**
     * process
     *
     * @param  mixed $data
     * @return array
     */
    public function process(array $data): array
    {
        $campaign = $data['campaign']->first();

        $usersCampaign = UsersCampaign::where('campaign_id', $campaign->id);

        $usersCampaignCount = $usersCampaign->count();

        if ($usersCampaignCount > 0 && $usersCampaignCount >= $campaign->max_usability) {
            $data['status']  = false;
            $data['message'] = "میزان استفاده از این کد به پایان رسیده";
        }

        return $data;
    }
}
