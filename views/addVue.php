<?php
  include 'template/header.php';
  if (isset($message)) {
      echo '<p>'.$message.'</p>';
  }
?>
<a href="index.php" class="btn btn-primary">Return</a>
<hr>

<form action="add.php" method="POST">
    <div class="form-group">
        <label for="motors">Motors:
            <input type="text" placeholder="Motors" id="motors" name="motors" class="form-control">
        </label>
    </div>
    <div class="form-group">
        <label for="doors">Doors:
            <input type="text" placeholder="Doors" id="doors" name="doors" class="form-control">
        </label>
    </div>
    <div class="form-group">
        <label for="brand">Fuel:
            <input type="text"placeholder="Fuel" id="fuel" name="fuel" class="form-control">
        </label>
    </div>
    <div class="form-group">
        <label for="brand">Brand:
            <input type="text" placeholder="Brand" id="brand" name="brand" class="form-control">
        </label>
    </div>
    <div class="form-group">
        <label for="type">Type:
            <input type="text" value="<?= $_GET['type']; ?>" id="type" name="type" class="form-control" readonly>
        </label>
    </div>
    <input type="submit" value="Add vehicule" name="add" class="btn btn-primary">
</form>


  <?php
  include 'template/footer.php'; ?>