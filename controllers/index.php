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
$motorBike = $VehiculeManager->getMotorBike();
include '../views/indexVue.php';
