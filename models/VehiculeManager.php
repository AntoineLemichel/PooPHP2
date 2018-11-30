<?php


declare(strict_types=1);

class VehiculeManager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    public function getDb()
    {
        return $this->_db;
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;

        return $this;
    }

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

    public function getMotorBike()
    {
        $arrayOfMotorBikes = [];
        $queryMotorBike = $this->getDb()->prepare('SELECT * FROM vehicules WHERE type = :type');
        $queryMotorBike->bindValue(':type', 'MotorBike', PDO::PARAM_STR);
        $queryMotorBike->execute();

        $dataMotorBikes = $queryMotorBike->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dataMotorBikes as $dataMotorBike) {
            $dataMotorBikes[] = new MotorBike($dataMotorBike);
        }

        return $arrayOfMotorBikes;
    }
}
