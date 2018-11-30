<?php
  include 'template/header.php';
?>


  <table>
  <tr>
    <th>ID</th>
    <th>Type</th>
    <th>Brand</th>
    <th>Doors</th>
    <th>Fuel</th>
    <th>Motors</th>
  </tr>
  <?php

foreach ($cars as $car) {
    ?>
  <tr>
    <td><?= $car->carId(); ?></td>
    <td><?= $car->carType(); ?></td>
    <td><?= $car->carBrand(); ?></td>
    <td><?= $car->carDoor(); ?></td>
    <td><?= $car->carFuel(); ?></td>
    <td><?= $car->carMotors(); ?></td>
  </tr>
  <?php
} ?>
</table>
 <?php
   include 'template/footer.php'; ?>
