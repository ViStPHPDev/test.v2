<?php

namespace App\Garage\Domain\Exception;

/**
 * Class CargoTypeNotSupportedException
 * @package App\Garage\Domain\Exception
 */
class CargoTypeNotSupportedException extends AbstractGarageException
{
    /**
     * CargoTypeNotSupportedException constructor.
     */
    public function __construct()
    {
        parent::__construct(
            "Cargo type is not supported",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}