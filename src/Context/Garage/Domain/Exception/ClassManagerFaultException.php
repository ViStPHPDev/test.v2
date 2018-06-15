<?php

namespace App\Garage\Domain\Exception;

/**
 * Class ClassManagerFaultException
 * @package App\Garage\Domain\Exception
 */
class ClassManagerFaultException extends AbstractGarageException
{
    /**
     * ClassManagerFaultException constructor.
     */
    public function __construct()
    {
        parent::__construct(
            "Class manager fault",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}