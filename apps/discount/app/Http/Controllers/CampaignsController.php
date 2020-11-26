<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Services\DiscountServices\DiscountService;
use App\Services\DiscountServices\DiscountValidation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CampaignsController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'campaign_type'       => 'required',
            'code'                => 'required',
            'quantity'            => 'required',
            'max_usability'       => 'required',
            'number_use_possible' => 'required',
            'expired_at'          => 'required',
        ]);

        $data = [
            'campaign_type'       => $request->campaign_type,
            'code'                => $request->code,
            'quantity'            => $request->quantity,
            'max_usability'       => $request->max_usability,
            'number_use_possible' => $request->number_use_possible,
            'expired_at'          => $request->expired_at,
        ];

        Campaign::create($data);

        return response('campaign created!');
    }

    /**
     * demand
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function demand(Request $request): JsonResponse
    {
        $data = [
            'mobile' => $request->mobile,
            'code'   => $request->code,
        ];

        $discountValidation = new DiscountValidation;
        $result             = $discountValidation->validate($data);

        if ($result['status'] === true) {
            //verify and complete transaction for discount steps
            $discountService = new DiscountService;
            $discountService->begainTransaction($result['campaign']->first(), $request->mobile);
        }

        return response()->json($result);
    }

}
