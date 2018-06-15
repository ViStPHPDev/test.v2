<?php

namespace App\Garage\Domain\Exception;

/**
 * Class FuelTypeNotSupportedException
 * @package App\Garage\Domain\Exception
 */
class FuelTypeNotSupportedException extends AbstractGarageException
{
    /**
     * FuelTypeNotSupportedException constructor.
     */
    public function __construct()
    {
        parent::__construct(
            "Fuel type is not supported",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}