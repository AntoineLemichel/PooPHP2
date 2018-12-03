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

    public function updateCar(Car $opponent)
    {
        $queryCar = $this->getDb()->prepare('UPDATE vehicules SET motors = :motors, brand = :brand, door = :door WHERE id = :id');
        $queryCar->bindValue(':id', $opponent->getId(), PDO::PARAM_INT);
        $queryCar->bindValue(':motors', $opponent->getMotors(), PDO::PARAM_STR);
        $queryCar->bindValue(':brand', $opponent->getBrand(), PDO::PARAM_STR);
        $queryCar->bindValue(':door', $opponent->getDoor(), PDO::PARAM_INT);

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

    public function updateMotorBike(MotorBike $opponent)
    {
        $queryMotorBike = $this->getDb()->prepare('UPDATE vehicules SET motors = :motors, brand = :brand WHERE id = :id');
        $queryMotorBike->bindValue(':id', $opponent->getId(), PDO::PARAM_INT);
        $queryMotorBike->bindValue(':motors', $opponent->getMotors(), PDO::PARAM_STR);
        $queryMotorBike->bindValue(':brand', $opponent->getBrand(), PDO::PARAM_STR);

        $queryMotorBike->execute();
    }
}
