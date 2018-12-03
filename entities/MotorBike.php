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

    /**
     * Call parent to getters Id.
     *
     * @return self
     */
    public function motorBikeId()
    {
        return parent::getId();
    }

    /**
     * Call parent tu getters type.
     *
     * @return self
     */
    public function motorBikeType()
    {
        return parent::getType();
    }

    /**
     * Call parent to getters fuel.
     *
     * @return self
     */
    public function motorBikeFuel()
    {
        return parent::getFuel();
    }

    /**
     * Call parent to getters motors.
     *
     * @return self
     */
    public function motorBikeMotors()
    {
        return parent::getMotors();
    }

    /**
     * Call parent to getters brand.
     *
     * @return self
     */
    public function motorBikeBrand()
    {
        return parent::getBrand();
    }

    public function motorBikeDoor()
    {
        return parent::getDoor();
    }
}
