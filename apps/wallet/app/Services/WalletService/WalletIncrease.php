<?php

namespace App\Services\WalletService;

use App\Models\FinancialTransaction;
use Illuminate\Support\Facades\DB;

class WalletIncrease extends AbstractWallet implements InterfaceWallet
{
    public function prosess()
    {

        DB::beginTransaction();
        try {
            $this->createFinanacialTransaction();
            $this->user->increment('wallet', $this->amount);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function createFinanacialTransaction()
    {
        FinancialTransaction::create([
            'user_id'        => $this->user->id,
            'amount'         => $this->amount,
            'operation type' => 'increase',
            'gateway_type'   => $this->gateway_type,
            'reason_by'      => $this->reason_by,
            'status'         => 1,
        ]);
    }

}
