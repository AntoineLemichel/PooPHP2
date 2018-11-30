<?php
  include 'template/header.php';
?>

<h2>Cars</h2>
  <table>
  <tr>
    <th>ID</th>
    <th>Type</th>
    <th>Brand</th>
    <th>Doors</th>
    <th>Fuel</th>
    <th>Motors</th>
    <th>Action</th>
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
    <td>
    <form action="index.php?index=<?= $car->carId(); ?>" method="POST">
       <input type="submit" name="deleteCar" value="Delete">
     </form>
  </td>
  </tr>
  <?php
} ?>
</table>

<h2>MotorBike</h2>
  <table>
  <tr>
    <th>ID</th>
    <th>Type</th>
    <th>Brand</th>
    <th>Doors</th>
    <th>Fuel</th>
    <th>Motors</th>
    <th>Action</th>
  </tr>
  <?php

foreach ($motorBikes as $motorBike) {
    ?>
  <tr>
    <td><?= $motorBike->motorBikeId(); ?></td>
    <td><?= $motorBike->motorBikeType(); ?></td>
    <td><?= $motorBike->motorBikeBrand(); ?></td>
    <td><?= $motorBike->motorBikeDoor(); ?></td>
    <td><?= $motorBike->motorBikeFuel(); ?></td>
    <td><?= $motorBike->motorBikeMotors(); ?></td>
    <td>
     <form action="index.php?index=<?= $motorBike->motorBikeId(); ?>" method="POST">
       <input type="submit" name="deleteMotorBike" value="Delete">
     </form>
  </td>
  </tr>
  <?php
} ?>
</table>
 <?php
   include 'template/footer.php'; ?>
