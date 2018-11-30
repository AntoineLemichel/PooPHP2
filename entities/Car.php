<?php

declare(strict_types=1);
class Car extends Vehicule
{
    /**
     * Construct for Car call parent for hydrate.
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
    public function carMotors()
    {
        return parent::getMotors();
    }

    /**
     * Call parent getters for Id.
     *
     * @return self
     */
    public function carId()
    {
        return parent::getId();
    }

    /**
     * Call parent getters for Fuel.
     *
     * @return self
     */
    public function carFuel()
    {
        return parent::getFuel();
    }

    /**
     * call parent getters for type.
     *
     * @return self
     */
    public function carType()
    {
        return parent::getType();
    }

    /**
     * call parent getters for door.
     *
     * @return self
     */
    public function carDoor()
    {
        return parent::getDoor();
    }

    /**
     * call parent getters for brand.
     *
     * @return self
     */
    public function carBrand()
    {
        return parent::getBrand();
    }
}
