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
    $brand = htmlspecialchars($_POST['brand']);
    $motors = htmlspecialchars($_POST['motors']);
    $doors = htmlspecialchars($_POST['doors']);
    $fuel = htmlspecialchars($_POST['fuel']);

    $doors = (int) $doors;
    $brand = (string) $brand;
    $motors = (string) $motors;
    $fuel = (string) $fuel;

    if (is_int($doors)) {
        if ($doors >= 2 and $doors <= 5) {
            $id = (int) $_GET['index'];
            if (isset($_POST['motors']) and !empty($_POST['motors'])) {
                if (isset($_POST['brand']) and !empty($_POST['brand'])) {
                    if ($_POST['type'] == 'Car') {
                        if (isset($_POST['doors']) and !empty($_POST['doors'])) {
                            $opponentCar = $vehiculeManager->getVehicule($id);

                            $opponentCar->hydrate(array(
                                'brand' => $brand,
                                'motors' => $motors,
                                'door' => $doors,
                                'fuel' => $fuel,
                            ));
                        } else {
                            $message = "Door's field will not must be empty.";
                        }
                        $vehiculeManager->updateCar($opponentCar);
                    } elseif ($_POST['type'] == 'MotorBike') {
                        $opponentMotorBike = $vehiculeManager->getVehicule($id);
                        $opponentMotorBike->hydrate(array(
                                'brand' => $brand,
                                'motors' => $motors,
                                'fuel' => $fuel,
                            ));
                        $vehiculeManager->updateMotorBike($opponentMotorBike);
                    } elseif ($_POST['type'] == 'Truck') {
                        if (isset($_POST['doors']) and !empty($_POST['doors'])) {
                            $opponentTruck = $vehiculeManager->getVehicule($id);
                            $opponentTruck->hydrate(array(
                            'brand' => $brand,
                            'motors' => $motors,
                            'door' => $doors,
                            'fuel' => $fuel,
                        ));
                            $vehiculeManager->updateTruck($opponentTruck);
                        } else {
                            $message = "Door's field will not must be empty.";
                        }
                    }
                    header('Location: index.php');
                } else {
                    $message = "Brand's field will not must be empty.";
                }
            } else {
                $message = "Motor's field will not must be empty.";
            }
        } else {
            $message = 'There are far too many doors.';
        }
    } else {
        $message = 'Door will must be a number.';
    }
}
include '../views/detailVue.php';
