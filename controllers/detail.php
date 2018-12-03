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

if (isset($_GET['index']) and !empty($_GET['index'])) {
    $id = (int) $_GET['index'];
    $updateVehicule = $vehiculeManager->getVehicule($id);
}
if (isset($_POST['update'])) {
    $id = $_GET['index'];
    if (isset($_POST['motors']) and !empty($_POST['motors'])) {
        if (isset($_POST['brand']) and !empty($_POST['brand'])) {
            if ($_POST['type'] == 'Car') {
                if (isset($_POST['doors']) and !empty($_POST['doors'])) {
                    $opponentCar = $vehiculeManager->getVehicule($id);
                    $opponentCar->hydrate(array(
                        'brand' => $_POST['brand'],
                        'motors' => $_POST['motors'],
                        'door' => $_POST['doors'],
                        'fuel' => $_POST['fuel'],
                    ));
                } else {
                    $message = "Door's field will not must be empty.";
                }
                $vehiculeManager->updateCar($opponentCar);
            } elseif ($_POST['type'] == 'MotorBike') {
                $opponentMotorBike = $vehiculeManager->getVehicule($id);
                $opponentMotorBike->hydrate(array(
                        'brand' => $_POST['brand'],
                        'motors' => $_POST['motors'],
                        'fuel' => $_POST['fuel'],
                    ));
                $vehiculeManager->updateMotorBike($opponentMotorBike);
            } elseif ($_POST['type'] == 'Truck') {
                $opponentTruck = $vehiculeManager->getVehicule($id);
                $opponentTruck->hydrate(array(
                    'brand' => $_POST['brand'],
                    'motors' => $_POST['motors'],
                    'door' => $_POST['doors'],
                    'fuel' => $_POST['fuel'],
                ));
                $vehiculeManager->updateTruck($opponentTruck);
            }
            header('Location: index.php');
        } else {
            $message = "Brand's field will not must be empty.";
        }
    } else {
        $message = "Motor's field will not must be empty.";
    }
}
include '../views/detailVue.php';
