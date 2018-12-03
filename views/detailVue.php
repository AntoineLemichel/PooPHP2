<?php
  include 'template/header.php';
  if (isset($message)) {
      echo '<p>'.$message.'</p>';
  }
?>
<a href="index.php" class="btn btn-primary">Return</a>
<hr>

<form action="detail.php?index=<?= $_GET['index']; ?>" method="POST">
    <div class="form-group">
        <label for="motors">Motors:
            <input type="text" value="<?= $updateVehicule->getMotors(); ?>" placeholder="Motors" id="motors" name="motors" class="form-control">
        </label>
    </div>
    <div class="form-group">
        <label for="doors">Doors:
            <input type="text" value="<?= $updateVehicule->getDoor(); ?>" placeholder="Doors" id="doors" name="doors" class="form-control">
        </label>
    </div>
    <div class="form-group">
        <label for="brand">Fuel:
            <input type="text" value="<?= $updateVehicule->getFuel(); ?>" placeholder="Fuel" id="fuel" name="fuel" class="form-control">
        </label>
    </div>
    <div class="form-group">
        <label for="brand">Brand:
            <input type="text" value="<?= $updateVehicule->getBrand(); ?>" placeholder="Brand" id="brand" name="brand" class="form-control">
        </label>
    </div>
    <div class="form-group">
        <label for="type">Type:
            <input type="text" value="<?= $updateVehicule->getType(); ?>" id="type" name="type" class="form-control" readonly>
        </label>
    </div>
    <input type="submit" value="Update" name="update" class="btn btn-primary">
</form>


  <?php
  include 'template/footer.php'; ?>