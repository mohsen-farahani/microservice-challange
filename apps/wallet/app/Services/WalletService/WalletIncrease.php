<?php

namespace App\Services\WalletService;

use App\Models\FinancialTransaction;
use Illuminate\Support\Facades\DB;

class WalletIncrease extends AbstractWallet implements InterfaceWallet
{
    /**
     * prosess
     *
     * @return void
     */
    public function prosess(): void
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

    /**
     * createFinanacialTransaction
     *
     * @return void
     */
    private function createFinanacialTransaction(): void
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
