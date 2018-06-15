<?php

namespace App\Garage\Domain\Exception;

/**
 * Class ClassManagerNotFoundException
 * @package App\Garage\Domain\Exception
 */
class ClassManagerNotFoundException extends AbstractGarageException
{
    /**
     * ClassManagerNotFoundException constructor.
     */
    public function __construct()
    {
        parent::__construct(
            "Class manager not found",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}