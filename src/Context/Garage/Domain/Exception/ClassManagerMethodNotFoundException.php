<?php

namespace App\Garage\Domain\Exception;

/**
 * Class ClassManagerMethodNotFoundException
 * @package App\Garage\Domain\Exception
 */
class ClassManagerMethodNotFoundException extends AbstractGarageException
{
    /**
     * ClassManagerMethodNotFoundException constructor.
     */
    public function __construct()
    {
        parent::__construct(
            "Class manager method not found",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}