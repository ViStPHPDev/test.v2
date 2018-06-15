<?php

namespace App\Garage\Application\Manager;

use App\Garage\Domain\Exception\ActionNotFoundException;
use App\Garage\Domain\Exception\ActionTypeIncorrectException;
use App\Garage\Domain\Exception\VehicleNotSetException;
use App\Garage\Domain\Factory\ActionRepositoryFactory;
use App\Garage\Domain\Model\Action\ActionInterface;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;
use App\Garage\Domain\Repository\ActionRepositoryInterface;

/**
 * Class VehicleManager
 * @package App\Garage\Application\Manager
 */
class VehicleManager implements VehicleManagerInterface
{
    /** @var  VehicleInterface */
    protected $vehicle;

    /** @var  ActionRepositoryInterface */
    protected $action_repository;

    /** @var  \SplObjectStorage */
    protected $vehicle_actions;

    /**
     * VehicleManager constructor.
     */
    function __construct()
    {
        $this->setVehicleActions(new \SplObjectStorage());
        $this->setActionRepository(ActionRepositoryFactory::create());
    }

    /**
     * @return VehicleInterface
     */
    public function getVehicle(): VehicleInterface
    {
        return $this->vehicle;
    }

    /**
     * @param VehicleInterface $vehicle
     * @return VehicleManagerInterface
     */
    public function setVehicle(VehicleInterface $vehicle)
    {
        $this->vehicle = $vehicle;
        try {
            $this->getVehicleActions()->offsetGet($this->vehicle);
        } catch (\UnexpectedValueException $e) {
            $this->getVehicleActions()->offsetSet($this->vehicle, []);
            $interfaces = array_keys((new \ReflectionClass($vehicle))->getInterfaces());
            foreach ($interfaces as $interface) {
                if ($this->getActionRepository()->containsKey($interface)) {
                    $this->addActions($this->getActionRepository()->get($interface));
                }
            }
        }
        return $this;
    }

    /**
     * @return ActionRepositoryInterface
     */
    protected function getActionRepository(): ActionRepositoryInterface
    {
        return $this->action_repository;
    }

    /**
     * @param ActionRepositoryInterface $action_repository
     */
    protected function setActionRepository(ActionRepositoryInterface $action_repository)
    {
        $this->action_repository = $action_repository;
    }

    /**
     * @return \SplObjectStorage
     */
    protected function getVehicleActions(): \SplObjectStorage
    {
        return $this->vehicle_actions;
    }

    /**
     * @param \SplObjectStorage $vehicle_actions
     */
    protected function setVehicleActions(\SplObjectStorage $vehicle_actions)
    {
        $this->vehicle_actions = $vehicle_actions;
    }

    public function addAction(ActionInterface $action)
    {
        if (!(($vehicle = $this->getVehicle()) instanceof VehicleInterface)) {
            throw new VehicleNotSetException();
        }
        try {
            $actions = $this->getVehicleActions()->offsetGet($vehicle);
        } catch (\UnexpectedValueException $e) {
            $this->getVehicleActions()->offsetSet($vehicle, []);
            $actions = $this->getVehicleActions()->offsetGet($vehicle);
        }
        $actions[$action->getInterface()] = $action;
        $this->getVehicleActions()->offsetSet($vehicle, $actions);
    }

    public function addActions(array $new_actions)
    {
        if (!(($vehicle = $this->getVehicle()) instanceof VehicleInterface)) {
            throw new VehicleNotSetException();
        }
        try {
            $actions = $this->getVehicleActions()->offsetGet($vehicle);
        } catch (\UnexpectedValueException $e) {
            $this->getVehicleActions()->offsetSet($vehicle, []);
            $actions = $this->getVehicleActions()->offsetGet($vehicle);
        }
        foreach ($new_actions as $action) {
            if ($action instanceof ActionInterface) {
                $actions[$action->getInterface()] = $action;
            } else {
                throw new ActionTypeIncorrectException();
            }
        }
        $this->getVehicleActions()->offsetSet($vehicle, $actions);
    }

    public function removeAction(string $action_interface)
    {
        if (!(($vehicle = $this->getVehicle()) instanceof VehicleInterface)) {
            throw new VehicleNotSetException();
        }
        try {
            $actions = $this->getVehicleActions()->offsetGet($vehicle);
            unset($actions[$action_interface]);
            $this->getVehicleActions()->offsetSet($vehicle, $actions);
        } catch (\UnexpectedValueException $e) {
        }
    }

    public function __call($name, $arguments)
    {
        if (!(($vehicle = $this->getVehicle()) instanceof VehicleInterface)) {
            throw new VehicleNotSetException();
        }
        try {
            $actions = $this->getVehicleActions()->offsetGet($vehicle);
        } catch (\UnexpectedValueException $e) {
            $actions = [];
        }
        /** @var ActionInterface $action */
        foreach ($actions as $action) {
            if (method_exists($action, $name)) {
                $action->setVehicle($this->getVehicle());
                return call_user_func_array([$action, $name], $arguments);
            }
        }
        throw new ActionNotFoundException();
    }
}