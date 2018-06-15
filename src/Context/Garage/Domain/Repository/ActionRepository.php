<?php

namespace App\Garage\Domain\Repository;

use App\Garage\Domain\Exception\ActionTypeIncorrectException;
use App\Garage\Domain\Model\Action\ActionInterface;
use App\Garage\Domain\Shared\Collection\ArrayCollection;

/**
 * Class ActionRepository
 * @package App\Garage\Domain\Repository
 */
class ActionRepository extends ArrayCollection implements ActionRepositoryInterface
{
    /**
     * ActionRepository constructor.
     * @param iterable $elements
     */
    public function __construct(iterable $elements = [])
    {
        foreach ($elements as $element) {
            self::check($element);
        }
        parent::__construct($elements);
    }

    /**
     * @param $element
     * @throws ActionTypeIncorrectException
     */
    protected function check($element)
    {
        if (is_array($element)) {
            foreach ($element as $el) {
                $this->check($el);
            }
        } elseif (!($element instanceof ActionInterface)) {
            throw new ActionTypeIncorrectException();
        }
    }

    /**
     * @param $element
     * @return bool
     */
    public function add($element)
    {
        self::check($element);
        return parent::add($element);
    }

    /**
     * @param $key
     * @param $element
     * @return mixed|void
     */
    public function set($key, $element)
    {
        self::check($element);
        parent::set($key, $element);
    }

    /**
     * @param iterable $elements
     */
    protected function load(iterable $elements = [])
    {
        foreach ($elements as $element) {
            self::check($element);
        }
        parent::load($elements);
    }
}