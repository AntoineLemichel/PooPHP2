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

if (isset($_POST['deleteMotorBike'])) {
    $id = (int) $_GET['index'];

    $opponentMotorBike = $VehiculeManager->getMotorBike($id);

    $VehiculeManager->deleteMotorBike($opponentMotorBike);
    header('Location: '.$_SERVER['HTTP_REFERER']);
} elseif (isset($_POST['deleteCar'])) {
    $id = (int) $_GET['index'];

    $opponentCar = $VehiculeManager->getCar($id);
    $VehiculeManager->deleteCar($opponentCar);
    header('Location: '.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['updateCar'])) {
    header('Location: detail.php?index='.$_GET['index']);
}

include '../views/indexVue.php';
