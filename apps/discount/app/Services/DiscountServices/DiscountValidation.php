<?php

namespace App\Services\DiscountServices;

use App\Services\DiscountServices\ChainValidation\CheckMaxUser;
use App\Services\DiscountServices\ChainValidation\ValidateCampaign;
use App\Services\DiscountServices\ChainValidation\ValidateUser;

class DiscountValidation implements InterfaceDiscountValidation
{
    /**
     * validate
     *
     * @param  mixed $data
     * @return array
     */
    public function validate(array $data): array
    {
        $validateCampaign = new ValidateCampaign;
        $checkMaxUser     = new CheckMaxUser;
        $validateUser     = new ValidateUser;

        $validateCampaign->setSuccessor($checkMaxUser);
        $checkMaxUser->setSuccessor($validateUser);

        return $validateCampaign->handle($data);

    }
}
