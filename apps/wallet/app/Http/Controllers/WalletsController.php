<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class WalletsController extends Controller
{
    /**
     * getAmount
     *
     * @param  mixed $mobile
     * @return JsonResponse
     */
    public function getAmount(string $mobile): JsonResponse
    {
        $user = User::where('mobile', $mobile)->first();
        if (!$user) {
            return response()->json([]);
        }

        return response()->json([
            'wallet' => $user->wallet,
        ]);
    }
}
