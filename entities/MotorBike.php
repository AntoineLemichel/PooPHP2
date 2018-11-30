<?php

declare(strict_types=1);

class MotorBike extends Vehicule
{
    /**
     * Construct for motorbike, call parent hydrate.
     *
     * @param array $array
     */
    public function __construct(array $array)
    {
        return parent::hydrate($array);
    }

    public function motorBikeId()
    {
        return parent::getId();
    }

    public function motorBikeType()
    {
        return parent::getType();
    }

    public function motorBikeFuel()
    {
        return parent::getFuel();
    }

    public function motorBikeMotors()
    {
        return parent::getMotors();
    }

    public function motorBikeBrand()
    {
        return parent::getBrand();
    }

    public function motorBikeDoor()
    {
        return parent::getDoor();
    }
}
