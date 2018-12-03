<?php
  include 'template/header.php';
  if (isset($message)) {
      echo '<p>'.$message.'</p>';
  }
?>
<div class="container-fluid m-2">
  <h2>Cars</h2>
  <a href="add.php?type=Car" class="btn btn-success">Add car</a>
</div>

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
       <input type="submit" name="deleteCar" value="Delete" class="btn btn-dark">
       <input type="submit" name="updateCar" value="Update" class="btn btn-dark">
    </form>
  </td>
  </tr>
  <?php
} ?>
</table>

<div class="container-fluid m-2">
  <h2>MotorBike</h2>
  <a href="add.php?type=MotorBike" class="btn btn-success">Add motor bike</a>
</div>

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
       <input type="submit" name="deleteMotorBike" value="Delete" class="btn btn-dark">
       <input type="submit" name="updateMotorBike" value="Update" class="btn btn-dark">

     </form>
  </td>
  </tr>
  <?php
} ?>
</table>


<div class="container-fluid m-2">
  <h2>Trucks</h2>
  <a href="add.php?type=Truck" class="btn btn-success">Add truck</a>

</div>
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

foreach ($trucks as $truck) {
    ?>
  <tr>
    <td><?= $truck->truckId(); ?></td>
    <td><?= $truck->truckType(); ?></td>
    <td><?= $truck->truckBrand(); ?></td>
    <td><?= $truck->truckDoor(); ?></td>
    <td><?= $truck->truckFuel(); ?></td>
    <td><?= $truck->truckMotors(); ?></td>
    <td>
     <form action="index.php?index=<?= $truck->truckId(); ?>" method="POST">
       <input type="submit" name="deleteTruck" value="Delete" class="btn btn-dark">
       <input type="submit" name="updateTruck" value="Update" class="btn btn-dark">

     </form>
  </td>
  </tr>
  <?php
} ?>
</table>
 <?php
   include 'template/footer.php'; ?>
