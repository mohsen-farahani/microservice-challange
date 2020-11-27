<?php

namespace App\Workers;

use App\Models\User;
use App\Publishers\RollbackWalletIncrease;
use App\Services\WalletService\WalletIncrease as WalletIncreaseService;

class WalletIncrease extends AbstractWorkers
{
    /**
     * handle
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            $data = json_decode($this->body, true);

            $campaign = $data['campaign'];
            $user     = $this->getUser($data['mobile']);

            $walletIncreaseService = new WalletIncreaseService();
            $walletIncreaseService->setUser($user)
                ->setAmount($campaign['quantity'])
                ->setGateway_type($campaign['campaign_type'])
                ->setReason_by($campaign['code']);

            $walletIncreaseService->prosess();
        } catch (\Exception $e) {
            $publisher = new RollbackWalletIncrease($data);

            $publisher->handle();
        }
    }

    /**
     * getUser
     *
     * @return User
     */
    private function getUser($mobile): User
    {
        $user = User::where('mobile', $mobile)->first();
        if (!$user) {
            //publish event rollback
            throw new \Exception("user not found");
        }

        return $user;
    }
}
