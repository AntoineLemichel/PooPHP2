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

    public function getCar($info)
    {
        $queryCar = $this->getDb()->prepare('SELECT * FROM vehicules WHERE id = :id');
        $queryCar->bindValue(':id', $info, PDO::PARAM_INT);
        $queryCar->execute();

        $dataCar = $queryCar->fetch(PDO::FETCH_ASSOC);

        return new Car($dataCar);
    }

    public function deleteCar(Car $opponent)
    {
        $queryCar = $this->getDb()->prepare('DELETE FROM vehicules WHERE id = :id');
        $queryCar->bindValue(':id', $opponent->getId(), PDO::PARAM_INT);
        $queryCar->execute();
    }

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

    public function deleteMotorBike(MotorBike $opponent)
    {
        $queryDeleteMotorBikes = $this->getDb()->prepare('DELETE FROM vehicules WHERE id = :id');
        $queryDeleteMotorBikes->bindValue(':id', $opponent->getId(), PDO::PARAM_INT);
        $queryDeleteMotorBikes->execute();
    }

    public function getMotorBike($info)
    {
        $queryMotorBike = $this->getDb()->prepare('SELECT * FROM vehicules WHERE id = :id');
        $queryMotorBike->bindValue(':id', $info, PDO::PARAM_INT);
        $queryMotorBike->execute();

        $dataMotorBike = $queryMotorBike->fetch(PDO::FETCH_ASSOC);

        return new MotorBike($dataMotorBike);
    }
}
