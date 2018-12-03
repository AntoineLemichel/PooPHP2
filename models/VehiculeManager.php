<?php


declare(strict_types=1);

class VehiculeManager
{
    private $_db;

    /**
     * Construct for VehiculeManager.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Getters for Database.
     *
     * @return self
     */
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Setters for database.
     *
     * @param PDO $db
     *
     * @return PDO self
     */
    public function setDb(PDO $db)
    {
        $this->_db = $db;

        return $this;
    }

    /**
     * All query for Cars.
     */

    /**
     * Get all cars into database.
     *
     * @return array $arrayOfCars
     */
    public function getCars()
    {
        $arrayOfCars = [];
        $queryCars = $this->getDb()->prepare('SELECT * FROM vehicules WHERE type = :type');
        $queryCars->bindValue(':type', 'Car', PDO::PARAM_STR);
        $queryCars->execute();

        $dataCars = $queryCars->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dataCars as $dataCar) {
            $arrayOfCars[] = new Car($dataCar);
        }

        return $arrayOfCars;
    }

    /**
     * Select one car into database.
     *
     * @param array $info
     *
     * @return new Car
     */
    public function getVehicule($info)
    {
        $queryCar = $this->getDb()->prepare('SELECT * FROM vehicules WHERE id = :id');
        $queryCar->bindValue(':id', $info, PDO::PARAM_INT);
        $queryCar->execute();

        $dataCar = $queryCar->fetch(PDO::FETCH_ASSOC);

        if ($dataCar['type'] == 'Car') {
            return new Car($dataCar);
        } elseif ($dataCar['type'] == 'MotorBike') {
            return new MotorBike($dataCar);
        } elseif ($dataCar['type'] == 'Truck') {
            return new Truck($dataCar);
        }
    }

    /**
     * Delete car into database.
     *
     * @param Car $opponent
     */
    public function deleteCar(Car $opponent)
    {
        $queryCar = $this->getDb()->prepare('DELETE FROM vehicules WHERE id = :id');
        $queryCar->bindValue(':id', $opponent->getId(), PDO::PARAM_INT);
        $queryCar->execute();
    }

    /**
     * Update car into database.
     *
     * @param Car $opponent
     */
    public function updateCar(Car $opponent)
    {
        $queryCar = $this->getDb()->prepare('UPDATE vehicules SET motors = :motors, brand = :brand, door = :door, fuel = :fuel WHERE id = :id');
        $queryCar->bindValue(':id', $opponent->getId(), PDO::PARAM_INT);
        $queryCar->bindValue(':motors', $opponent->getMotors(), PDO::PARAM_STR);
        $queryCar->bindValue(':brand', $opponent->getBrand(), PDO::PARAM_STR);
        $queryCar->bindValue(':fuel', $opponent->getFuel(), PDO::PARAM_STR);
        $queryCar->bindValue(':door', $opponent->getDoor(), PDO::PARAM_INT);

        $queryCar->execute();
    }

    /**
     * Add car into database.
     *
     * @param Car $opponent
     */
    public function addCar(Car $opponent)
    {
        $queryCar = $this->getDb()->prepare('INSERT INTO vehicules (brand, motors, door, fuel, type) VALUES (:brand, :motors, :door, :fuel, :type)');
        $queryCar->bindValue(':brand', $opponent->getBrand(), PDO::PARAM_STR);
        $queryCar->bindValue(':motors', $opponent->getMotors(), PDO::PARAM_STR);
        $queryCar->bindValue(':door', $opponent->getDoor(), PDO::PARAM_INT);
        $queryCar->bindValue(':fuel', $opponent->getFuel(), PDO::PARAM_STR);
        $queryCar->bindValue(':type', $opponent->getType(), PDO::PARAM_STR);

        $queryCar->execute();
    }

    /**
     * All query for motorbikes.
     */

    /**
     * Get all motor bike into datase.
     *
     * @return array $arrayMotorBikes
     */
    public function getMotorBikes()
    {
        $arrayOfMotorBikes = [];
        $queryMotorBike = $this->getDb()->prepare('SELECT * FROM vehicules WHERE type = :type');
        $queryMotorBike->bindValue(':type', 'MotorBike', PDO::PARAM_STR);
        $queryMotorBike->execute();

        $dataMotorBikes = $queryMotorBike->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dataMotorBikes as $dataMotorBike) {
            $arrayMotorBikes[] = new MotorBike($dataMotorBike);
        }

        return $arrayMotorBikes;
    }

    /**
     * Get one motorbike into database.
     *
     * @param arry $info
     *
     * @return new Motorbike
     */
    public function getMotorBike($info)
    {
        $queryMotorBike = $this->getDb()->prepare('SELECT * FROM vehicules WHERE id = :id');
        $queryMotorBike->bindValue(':id', $info, PDO::PARAM_INT);
        $queryMotorBike->execute();

        $dataMotorBike = $queryMotorBike->fetch(PDO::FETCH_ASSOC);

        return new MotorBike($dataMotorBike);
    }

    /**
     * Delete motorbike into database.
     *
     * @param MotorBike $opponent
     */
    public function deleteMotorBike(MotorBike $opponent)
    {
        $queryDeleteMotorBikes = $this->getDb()->prepare('DELETE FROM vehicules WHERE id = :id');
        $queryDeleteMotorBikes->bindValue(':id', $opponent->getId(), PDO::PARAM_INT);
        $queryDeleteMotorBikes->execute();
    }

    /**
     * Update motorBike.
     *
     * @param MotorBike $opponent
     */
    public function updateMotorBike(MotorBike $opponent)
    {
        $queryMotorBike = $this->getDb()->prepare('UPDATE vehicules SET motors = :motors, brand = :brand, fuel = :fuel WHERE id = :id');
        $queryMotorBike->bindValue(':id', $opponent->getId(), PDO::PARAM_INT);
        $queryMotorBike->bindValue(':motors', $opponent->getMotors(), PDO::PARAM_STR);
        $queryMotorBike->bindValue(':brand', $opponent->getBrand(), PDO::PARAM_STR);
        $queryMotorBike->bindValue(':fuel', $opponent->getFuel(), PDO::PARAM_STR);

        $queryMotorBike->execute();
    }

    /**
     * Add motorbike into database.
     *
     * @param MotorBike $opponent
     */
    public function addMotorBike(MotorBike $opponent)
    {
        $queryCar = $this->getDb()->prepare('INSERT INTO vehicules (brand, motors, fuel, type) VALUES (:brand, :motors, :fuel, :type)');
        $queryCar->bindValue(':brand', $opponent->getBrand(), PDO::PARAM_STR);
        $queryCar->bindValue(':motors', $opponent->getMotors(), PDO::PARAM_STR);
        $queryCar->bindValue(':fuel', $opponent->getFuel(), PDO::PARAM_STR);
        $queryCar->bindValue(':type', $opponent->getType(), PDO::PARAM_STR);

        $queryCar->execute();
    }

    /*
     * ALL QUERY FOR TRUCK
     */

    /**
     * Get all cars into database.
     *
     * @return array $arrayOfCars
     */
    public function getTrucks()
    {
        $arrayOfTrucks = [];
        $queryTruck = $this->getDb()->prepare('SELECT * FROM vehicules WHERE type = :type');
        $queryTruck->bindValue(':type', 'Truck', PDO::PARAM_STR);
        $queryTruck->execute();

        $dataTrucks = $queryTruck->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dataTrucks as $dataTruck) {
            $arrayOfTrucks[] = new Truck($dataTruck);
        }

        return $arrayOfTrucks;
    }

    /**
     * Delete truck into database.
     *
     * @param Truck $opponent
     */
    public function deleteTruck(Truck $opponent)
    {
        $queryTruck = $this->getDb()->prepare('DELETE FROM vehicules WHERE id = :id');
        $queryTruck->bindValue(':id', $opponent->getId(), PDO::PARAM_INT);
        $queryTruck->execute();
    }

    /**
     * Update truck into database.
     *
     * @param Truck $opponent
     */
    public function updateTruck(Truck $opponent)
    {
        $queryTruck = $this->getDb()->prepare('UPDATE vehicules SET motors = :motors, brand = :brand, door = :door, fuel = :fuel WHERE id = :id');
        $queryTruck->bindValue(':id', $opponent->getId(), PDO::PARAM_INT);
        $queryTruck->bindValue(':motors', $opponent->getMotors(), PDO::PARAM_STR);
        $queryTruck->bindValue(':brand', $opponent->getBrand(), PDO::PARAM_STR);
        $queryTruck->bindValue(':door', $opponent->getDoor(), PDO::PARAM_INT);
        $queryTruck->bindValue(':fuel', $opponent->getFuel(), PDO::PARAM_STR);

        $queryTruck->execute();
    }

    /**
     * Add truck into database.
     *
     * @param Truck $opponent
     */
    public function addTruck(Truck $opponent)
    {
        $queryTruck = $this->getDb()->prepare('INSERT INTO vehicules (brand, motors, door, fuel, type) VALUES (:brand, :motors, :door, :fuel, :type)');
        $queryTruck->bindValue(':brand', $opponent->getBrand(), PDO::PARAM_STR);
        $queryTruck->bindValue(':motors', $opponent->getMotors(), PDO::PARAM_STR);
        $queryTruck->bindValue(':door', $opponent->getDoor(), PDO::PARAM_INT);
        $queryTruck->bindValue(':fuel', $opponent->getFuel(), PDO::PARAM_STR);
        $queryTruck->bindValue(':type', $opponent->getType(), PDO::PARAM_STR);

        $queryTruck->execute();
    }
}
