<?php

namespace App\Garage\Infrastructure\Web\Service;

use App\Garage\Application\Factory\GarageManagerFactory;
use App\Garage\Domain\Adapter\Cargo\CargoAdapter;
use App\Garage\Domain\Adapter\Cargo\CargoInterface;
use App\Garage\Domain\Adapter\Fuel\FuelAdapter;
use App\Garage\Domain\Adapter\Fuel\FuelInterface;
use App\Garage\Domain\Factory\ActionFactory;
use App\Garage\Domain\Factory\VehicleFactory;
use App\Garage\Domain\Model\Action\MusicOn\MusicOnActionInterface;
use App\Garage\Domain\Model\Vehicle\Air\Plane\PlaneInterface;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;
use App\Garage\Application\Factory\VehicleManagerFactory;
use App\Garage\Domain\Model\Vehicle\Water\Boat\BoatInterface;
use App\Garage\Domain\Shared\Collection\ArrayCollection;

/**
 * Class GarageService
 * @package App\Garage\Infrastructure\Web\Service
 */
class GarageService
{
    /** @var  ArrayCollection */
    protected $fuels;
    /** @var  ArrayCollection */
    protected $cargo;

    /**
     * GarageService constructor.
     */
    function __construct()
    {
        $this->setFuels(new ArrayCollection());
        $this->setCargo(new ArrayCollection());
    }

    /**
     * @return array
     */
    public function garageTest()
    {
        $garage = GarageManagerFactory::create([
            VehicleFactory::create(VehicleFactory::LAND_CAR, 'BMW'),
            VehicleFactory::create(VehicleFactory::LAND_CAR, 'Lada'),
            VehicleFactory::create(VehicleFactory::WATER_BOAT, 'Boat'),
            VehicleFactory::create(VehicleFactory::AIR_HELICOPTER, 'Helicopter'),
            VehicleFactory::create(VehicleFactory::AIR_PLANE, 'Plane'),
            VehicleFactory::create(VehicleFactory::LAND_TRUCK, 'Kamaz'),
            VehicleFactory::create(VehicleFactory::LAND_HORSE, 'Bucephalus'),
            VehicleFactory::create(VehicleFactory::LAND_HORSE, 'Bolívar'),
        ]);
        $result = [];
        $garage->getVehicles()->forAll(
            function (int $index, VehicleInterface $vehicle) use ($garage, &$result) {
                $manager = VehicleManagerFactory::create($vehicle);
                if ($vehicle->getName() == "Lada") {
                    $manager->removeAction(MusicOnActionInterface::class);
                }
                if (
                    ($vehicle instanceof PlaneInterface)
                    || ($vehicle instanceof BoatInterface)
                ) {
                    $manager->addAction(ActionFactory::create(ActionFactory::ACTION_MUSIC_ON));
                }
                $row = &$result[$vehicle->getName()];
                if ($garage->isCar($vehicle)) {
                    $row[] = $manager->move();
                    if ($vehicle->getName() != "Lada") {
                        $row[] = $manager->musicOn();
                    }
                }
                if ($garage->isBoat($vehicle)) {
                    $row[] = $manager->move();
                    $row[] = $manager->musicOn();
                    $row[] = $manager->swim();
                }
                if ($garage->isHelicopter($vehicle)) {
                    $row[] = $manager->takeOff();
                    $row[] = $manager->fly();
                    $row[] = $manager->landing();
                }
                if ($garage->isPlane($vehicle)) {
                    $row[] = $manager->takeOff();
                    $row[] = $manager->musicOn();
                    $row[] = $manager->fly();
                    $row[] = $manager->landing();
                }
                if ($garage->isTruck($vehicle)) {
                    $row[] = $manager->move();
                    $row[] = $manager->stop();
                    $row[] = $manager->emptyLoads($this->getCargo()->get('Bulk cargo'));
                }
                if ($garage->isHorse($vehicle)) {
                    $row[] = $manager->move();
                }
                $row[] = $manager->stop();
                if ($garage->isHorse($vehicle)) {
                    $row[] = $manager->refuel($this->getFuels()->get('Oats'));
                } else {
                    $row[] = $manager->refuel($this->getFuels()->get('Gas'));
                }
                return true;
            }
        );
        return $result;
    }

    /**
     * @param $fuel
     * @return FuelInterface
     */
    public function mergeFuel($fuel): FuelInterface
    {
        return FuelAdapter::from($fuel);
    }

    /**
     * @param $cargo
     * @return CargoInterface
     */
    public function mergeCargo($cargo): CargoInterface
    {
        return CargoAdapter::from($cargo);
    }

    /**
     * @return ArrayCollection
     */
    public function getFuels(): ArrayCollection
    {
        return $this->fuels;
    }

    /**
     * @param ArrayCollection $fuels
     */
    public function setFuels(ArrayCollection $fuels)
    {
        $this->fuels = $fuels;
    }

    /**
     * @param $fuel
     * @return GarageService
     */
    public function addFuel($fuel): GarageService
    {
        $fuel = $this->mergeFuel($fuel);
        $this->getFuels()->set($fuel->getName(), $fuel);
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCargo(): ArrayCollection
    {
        return $this->cargo;
    }

    /**
     * @param ArrayCollection $cargo
     */
    public function setCargo(ArrayCollection $cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * @param $cargo
     * @return GarageService
     */
    public function addCargo($cargo): GarageService
    {
        $cargo = $this->mergeCargo($cargo);
        $this->getCargo()->set($cargo->getName(), $cargo);
        return $this;
    }
}