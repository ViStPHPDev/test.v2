<?php

namespace App\Garage\Domain\Exception;

/**
 * Class VehicleTypeIncorrectException
 * @package App\Garage\Domain\Exception
 */
class VehicleTypeIncorrectException extends AbstractGarageException
{
    /**
     * VehicleTypeIncorrectException constructor.
     */
    public function __construct()
    {
        parent::__construct(
            "Vehicle type is incorrect",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}