<?php

namespace App\Http\Controllers;

use App\Http\Transformers\UsersCampaignsTransformer;
use App\Models\UsersCampaign;
use Illuminate\Http\JsonResponse;

class UsersCampaignsController extends Controller
{

    /**
     * getUsers
     *
     * @return JsonResponse
     */
    public function getUsers(): JsonResponse
    {
        $usersCampaign = UsersCampaign::all();

        $transform = new UsersCampaignsTransformer;
        $transform = $transform->transformMany($usersCampaign);

        return response()->json($transform);
    }

}
