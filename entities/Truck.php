<?php

declare(strict_types=1);

class Truck extends Vehicule
{
    /**
     * Construct for truck call parent for hydrate.
     *
     * @param array $array
     */
    public function __construct(array $array)
    {
        parent::hydrate($array);
    }

    /**
     * Call parent getters for motors.
     *
     * @return self
     */
    public function truckMotors()
    {
        return parent::getMotors();
    }

    /**
     * Call parent getters for Id.
     *
     * @return self
     */
    public function truckId()
    {
        return parent::getId();
    }

    /**
     * Call parent getters for Fuel.
     *
     * @return self
     */
    public function truckFuel()
    {
        return parent::getFuel();
    }

    /**
     * call parent getters for type.
     *
     * @return self
     */
    public function truckType()
    {
        return parent::getType();
    }

    /**
     * call parent getters for door.
     *
     * @return self
     */
    public function truckDoor()
    {
        return parent::getDoor();
    }

    /**
     * call parent getters for brand.
     *
     * @return self
     */
    public function truckBrand()
    {
        return parent::getBrand();
    }
}
