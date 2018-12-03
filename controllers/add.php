<?php

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

$vehiculeManager = new VehiculeManager($db);

if (isset($_POST['add'])) {
    if ($_POST['type'] == 'Car') {
        $opponentCar = new Car([
            'brand' => $_POST['brand'],
            'motors' => $_POST['motors'],
            'door' => $_POST['doors'],
            'fuel' => $_POST['fuel'],
            'type' => 'Car',
        ]);
        $vehiculeManager->addCar($opponentCar);
        header('Location: index.php');
    } elseif ($_POST['type'] == 'MotorBike') {
        $opponentMotorBike = new MotorBike([
            'brand' => $_POST['brand'],
            'motors' => $_POST['motors'],
            'fuel' => $_POST['fuel'],
            'type' => 'MotorBike',
        ]);
        $vehiculeManager->addMotorBike($opponentMotorBike);
        header('Location: index.php');
    } elseif ($_POST['type'] == 'Truck') {
        $opponentTruck = new Truck([
            'brand' => $_POST['brand'],
            'motors' => $_POST['motors'],
            'door' => $_POST['doors'],
            'fuel' => $_POST['fuel'],
            'type' => 'Truck',
        ]);
        $vehiculeManager->addTruck($opponentTruck);
        header('Location: index.php');
    } else {
        $message = 'The type is undefined.';
    }
}
include '../views/addVue.php';
