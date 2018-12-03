<?php

// On enregistre notre autoload.
function loadClass($classname)
{
    if (file_exists('../models/'.$classname.'.php')) {
        require '../models/'.$classname.'.php';
    } else {
        require '../entities/'.$classname.'.php';
    }
}
spl_autoload_register('loadClass');
$db = Database::DB();

$VehiculeManager = new VehiculeManager($db);
$cars = $VehiculeManager->getCars();
$motorBikes = $VehiculeManager->getMotorBikes();
$trucks = $VehiculeManager->getTrucks();

if (isset($_POST['deleteMotorBike'])) {
    $id = (int) $_GET['index'];

    $opponentMotorBike = $VehiculeManager->getVehicule($id);

    $VehiculeManager->deleteMotorBike($opponentMotorBike);
    header('Location: index.php');
} elseif (isset($_POST['deleteCar'])) {
    $id = (int) $_GET['index'];

    $opponentCar = $VehiculeManager->getVehicule($id);
    $VehiculeManager->deleteCar($opponentCar);
    header('Location: index.php');
} elseif (isset($_POST['deleteTruck'])) {
    $id = (int) $_GET['index'];

    $opponentTruck = $VehiculeManager->getVehicule($id);
    $VehiculeManager->deleteTruck($opponentTruck);
    header('Location: index.php');
}

if (isset($_POST['updateCar'])) {
    header('Location: detail.php?index='.$_GET['index']);
} elseif (isset($_POST['updateMotorBike'])) {
    header('Location: detail.php?index='.$_GET['index']);
} elseif (isset($_POST['updateTruck'])) {
    header('Location: detail.php?index='.$_GET['index']);
}

include '../views/indexVue.php';
