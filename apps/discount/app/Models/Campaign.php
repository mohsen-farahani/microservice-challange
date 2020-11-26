<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    const CAMPAIGN_TYPE_WALLET = "wallet";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campaign_type',
        'code',
        'quantity',
        'max_usability',
        'number_use_possible',
        'expired_at',
    ];

}
