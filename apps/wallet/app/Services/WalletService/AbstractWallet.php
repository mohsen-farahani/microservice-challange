<?php
namespace App\Services\WalletService;

abstract class AbstractWallet
{
    protected $user;
    protected $amount;
    protected $gateway_type;
    protected $reason_by;

    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of gateway_type
     */
    public function getGateway_type()
    {
        return $this->gateway_type;
    }

    /**
     * Set the value of gateway_type
     *
     * @return  self
     */
    public function setGateway_type($gateway_type)
    {
        $this->gateway_type = $gateway_type;

        return $this;
    }

    /**
     * Get the value of reason_by
     */
    public function getReason_by()
    {
        return $this->reason_by;
    }

    /**
     * Set the value of reason_by
     *
     * @return  self
     */
    public function setReason_by($reason_by)
    {
        $this->reason_by = $reason_by;

        return $this;
    }
}
