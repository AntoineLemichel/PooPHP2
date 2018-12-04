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
    $brand = htmlspecialchars($_POST['brand']);
    $motors = htmlspecialchars($_POST['motors']);
    $doors = htmlspecialchars($_POST['doors']);
    $fuel = htmlspecialchars($_POST['fuel']);

    $doors = (int) $doors;
    $brand = (string) $brand;
    $motors = (string) $motors;
    $fuel = (string) $fuel;
    if (is_int($doors)) {
        if ($doors >= 2 and $doors <= 5 or $doors == 0) {
            if ($_POST['type'] == 'Car') {
                $opponentCar = new Car([
                    'brand' => $brand,
                    'motors' => $motors,
                    'door' => $doors,
                    'fuel' => $fuel,
                    'type' => 'Car',
                ]);
                $vehiculeManager->addCar($opponentCar);
                header('Location: index.php');
            } elseif ($_POST['type'] == 'MotorBike') {
                $opponentMotorBike = new MotorBike([
                    'brand' => $brand,
                    'motors' => $motors,
                    'fuel' => $fuel,
                    'type' => 'MotorBike',
                ]);
                $vehiculeManager->addMotorBike($opponentMotorBike);
                header('Location: index.php');
            } elseif ($_POST['type'] == 'Truck') {
                $opponentTruck = new Truck([
                    'brand' => $brand,
                    'motors' => $motors,
                    'door' => $doors,
                    'fuel' => $fuel,
                    'type' => 'Truck',
                ]);
                $vehiculeManager->addTruck($opponentTruck);
                header('Location: index.php');
            } else {
                $message = 'The type is undefined.';
            }
        }
    }
}
include '../views/addVue.php';
