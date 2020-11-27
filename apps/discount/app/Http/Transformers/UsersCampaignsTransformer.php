<?php

namespace App\Http\Transformers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UsersCampaignsTransformer implements InterfaceTransformer
{
    /**
     * transform
     *
     * @param  mixed $model
     * @return array
     */
    public function transform(Model $model): array
    {
        return [
            'mobile'        => $model->mobile,
            'campaign_code' => $model->campaign->code,
        ];
    }

    /**
     * transformMany
     *
     * @param  mixed $collection
     * @return array
     */
    public function transformMany(Collection $collection): array
    {
        $result = $collection->map(function ($model) {
            return $this->transform($model);
        });

        return $result->toArray();
    }
}
