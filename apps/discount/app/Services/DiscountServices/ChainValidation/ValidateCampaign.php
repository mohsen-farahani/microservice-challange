<?php

namespace App\Services\DiscountServices\ChainValidation;

use App\Models\Campaign;
use Illuminate\Support\Carbon;

class ValidateCampaign extends HandlerChain
{

    /**
     * process
     *
     * @param  mixed $data
     * @return array
     */
    public function process(array $data): array
    {
        $data['campaign'] = $campaign = Campaign::where('code', $data['code'])
            ->where('expired_at', '>=', Carbon::now())
            ->get();

        if ($campaign->isEmpty()) {
            $data['status']  = false;
            $data['message'] = "کد نامعتبر است";
        }

        return $data;
    }
}
