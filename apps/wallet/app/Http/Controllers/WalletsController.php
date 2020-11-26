<?php

namespace App\Http\Controllers;

use App\Models\User;

class WalletsController extends Controller
{
    public function getAmount(string $mobile)
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
