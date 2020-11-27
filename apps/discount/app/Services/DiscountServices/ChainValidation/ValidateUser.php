<?php

namespace App\Services\DiscountServices\ChainValidation;

use App\Models\UsersCampaign;

class ValidateUser extends HandlerChain
{

    /**
     * process
     *
     * @param  mixed $data
     * @return array
     */
    public function process(array $data): array
    {
        $campaign      = $data['campaign']->first();
        $usersCampaign = UsersCampaign::where('campaign_id', $campaign->id)
            ->where('mobile', $data['mobile']);

        $usersCampaignCount = $usersCampaign->count();

        if ($usersCampaignCount > 0 && $usersCampaignCount >= $campaign->number_use_possible) {
            $data['status']  = false;
            $data['message'] = "قبلا از این کد استفاده کرده اید";
        }

        return $data;
    }
}
