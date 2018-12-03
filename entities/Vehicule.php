<?php

declare(strict_types=1);

abstract class Vehicule
{
    protected $motors;
    protected $type;
    protected $door;
    protected $brand;
    protected $fuel;
    protected $id;

    public function hydrate(array $array)
    {
        foreach ($array as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);

            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    /**
     * GETTERS.
     */

    /**
     * Getters for id.
     *
     * @return self
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Getters for motors.
     *
     * @return self
     */
    public function getMotors()
    {
        return $this->motors;
    }

    /**
     * Getters for type of vehicuele.
     *
     * @return self
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Getters for door on a vehicule.
     *
     * @return self
     */
    public function getDoor()
    {
        return $this->door;
    }

    /**
     * Getters for vehicule's brand.
     *
     * @return self
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Getters for vehicule's fuel.
     *
     * @return self
     */
    public function getFuel()
    {
        return $this->fuel;
    }

    /*
     * SETTERS
     */

    public function setId($id)
    {
        $id = (int) $id;
        if (is_int($id)) {
            $this->id = $id;

            return $this;
        }
    }

    /**
     * Setters for motor.
     *
     * @param string $motors
     *
     * @return self
     */
    public function setMotors(string $motors)
    {
        $motors = (string) $motors;
        if (is_string($motors)) {
            $this->motors = $motors;

            return $this;
        }
    }

    /**
     * Setters for type.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type)
    {
        $type = (string) $type;
        if (is_string($type)) {
            $this->type = $type;

            return $this;
        }
    }

    /**
     * Setters for doors.
     *
     * @param int $door
     *
     * @return self
     */
    public function setDoor($door)
    {
        $door = (int) $door;
        if (is_int($door)) {
            $this->door = $door;

            return $this;
        }
    }

    /**
     * Setters for vehicule's brand.
     *
     * @param string $brand
     *
     * @return self
     */
    public function setBrand(string $brand)
    {
        $brand = (string) $brand;
        if (is_string($brand)) {
            $this->brand = $brand;

            return $brand;
        }
    }

    /**
     * Setters for vehicule's fuel.
     *
     * @param string $fuel
     *
     * @return self
     */
    public function setFuel(string $fuel)
    {
        $fuel = (string) $fuel;

        if (is_string($fuel)) {
            $this->fuel = $fuel;

            return $this;
        }
    }
}
