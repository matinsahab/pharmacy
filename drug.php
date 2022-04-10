<?php 
require('conn.php');
require 'admintop.php';
ob_start();
if (!isset($_SESSION['ax'])) {
	header('location: adminlogin.php');
}
if (isset($_GET['adddrug'])) {
  $a = $_GET['name'];
  $b = $_GET['type'];
  $c = $_GET['price'];
  $d = $_GET['origin'];
  $e = $_GET['limit'];
  $f = $_GET['stock'];
  $command = "INSERT INTO `drug`(`name`, `type`, `price`, `origin`) 
              VALUES ('$a','$b','$c','$d')";
  $query = mysqli_query($conn, $command);
  $cmdstock = "INSERT INTO `stock`(`id`, `drug_limit`, `count`)
              VALUES ((SELECT `id` FROM `drug` WHERE `name` = '$a' AND `origin` = '$d'), '$e', '$f')";
  $qrystock = mysqli_query($conn, $cmdstock);
  if ($query) {
    header('location: drug.php?add');
  }
}
if (isset($_GET['add'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="row">
<div class="col-md-3"></div>
<div class="form-group col-md-6">
  <form method="get">
  <h3 for="usr" style="margin: 13px;">Name:</h3>
  <input type="text" class="form-control" style="margin: 5px;" name="name" id="usr" required>
    <h3 for="usr" style="margin: 13px; margin-bottom: 0px;">Type:</h3><br>
  <div class="form-check form-check-inline" style="margin-left: 10px;">
    <label class="radio-inline mx-2"><input class="mx-1" type="radio" value="Solution" name="type">Solution</label>
    <label class="radio-inline mx-2"><input class="mx-1" type="radio" value="Syrup" name="type">Syrup</label>
    <label class="radio-inline mx-2"><input class="mx-1" type="radio" value="Tablet" name="type">Tablet</label>
    <label class="radio-inline mx-2"><input class="mx-1" type="radio" value="Capsule" name="type">Capsule</label>
    <label class="radio-inline mx-2"><input class="mx-1" type="radio" value="Drops" name="type">Drops</label>
    <label class="radio-inline mx-2"><input class="mx-1" type="radio" value="Inhaler" name="type">Inhaler</label>
    <label class="radio-inline mx-2"><input class="mx-1" type="radio" value="Injection" name="type">Injection</label>
    <label class="radio-inline mx-2"><input class="mx-1" type="radio" value="Pomade" name="type">Pomade</label>
  </div>
    <h3 for="usr" style="margin: 13px;">Price:</h3>
  <input type="text" class="form-control" style="margin: 5px;" name="price" id="usr" required>
    <h3 for="usr" style="margin: 13px;">Origin:</h3>
  <div class="form-check form-check-inline" style="margin-left: 10px;">
    <label class="radio-inline mx-2"><input class="mx-1" type="radio" value="Afg" name="origin">Afg</label>
    <label class="radio-inline mx-2"><input class="mx-1" type="radio" value="Ind" name="origin">Ind</label>
    <label class="radio-inline mx-2"><input class="mx-1" type="radio" value="Pak" name="origin">Pak</label>
    <label class="radio-inline mx-2"><input class="mx-1" type="radio" value="Irn" name="origin">Irn</label>
    <label class="radio-inline mx-2"><input class="mx-1" type="radio" value="Arb" name="origin">Arb</label>
    <label class="radio-inline mx-2"><input class="mx-1" type="radio" value="Tur" name="origin">Tur</label>
  </div>
    <h3 for="usr" style="margin: 13px;">Limit:</h3>
  <input type="text" class="form-control" style="margin: 5px;" name="limit" id="usr" required>
    <h3 for="usr" style="margin: 13px;">Stock:</h3>
  <input type="text" class="form-control" style="margin: 5px;" name="stock" id="usr" required>
  <center><input type="submit" value="Add Drug" class="btn btn-danger" style="margin-top: 20px;" name="adddrug"></center>
</form>
</div>
<div class="col-md-3"></div>
</div>
</body>
</html>
<?php } ?>

<!-- ##################################################################################################### -->

<?php 
if (isset($_GET['edit'])) {
    $command = "SELECT `stock`.`id`, `name`, `type`, `price`, `origin`, `drug_limit`, `count` FROM `stock` RIGHT JOIN `drug` ON `drug`.`id` = `stock`.`id` ORDER BY `drug`.`name`";
    $query = mysqli_query($conn, $command);

      

?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Price</th>
      <th scope="col">Origin</th>
      <th scope="col">Limit</th>
      <th scope="col">In Stock</th>
      <th scope="col">Edit</th>
      <th scope="col">Remove</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($drug = mysqli_fetch_assoc($query)) { ?>
    <tr>
      <th scope="row"><?php echo $drug['id']; ?></th>
      <td><?php echo $drug['name']; ?></td>
      <td><?php echo $drug['type']; ?></td>
      <td><?php echo $drug['price']; ?></td>
      <td><?php echo $drug['origin']; ?></td>
      <td><?php echo $drug['drug_limit']; ?></td>
      <td><?php echo $drug['count']; ?></td>
      <td><a href="drug.php?editdrug=<?php echo $drug['id']; ?>">Edit</a></td>
      <td><a href="drug.php?removedrug=<?php echo $drug['id']; ?>">Remove</a></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<?php } ?>

<!-- ##################################################################################################### -->


<?php 
      if (isset($_GET['finaledit'])) {
          $a = $_GET['name'];
          $b = $_GET['type'];
          $c = $_GET['price'];
          $d = $_GET['origin'];
          $e = $_GET['id'];
          $f = $_GET['limit'];
          $g = $_GET['instock'];
          $command = "UPDATE `drug` SET `name`= '$a',`type`= '$b',`price`= '$c',`origin`= '$d' WHERE `id` = '$e'";
          $command2 = "UPDATE `stock` SET `drug_limit`= '$f',`count`= '$g' WHERE `id` = '$e'";
          $query = mysqli_query($conn, $command);
          $query2 = mysqli_query($conn, $command2);
          if ($query) {
            header('location: drug.php?edit');
          }
      }
    if (isset($_GET['editdrug'])) {
      $a = $_GET['editdrug']; 
      $command = "SELECT * FROM `drug` WHERE `id` = '$a'";
      $command2 = "SELECT * FROM `stock` WHERE `id` = '$a'";
      $query = mysqli_query($conn, $command);
      $query2 = mysqli_query($conn, $command2);
      $b = mysqli_fetch_assoc($query);
      $c = mysqli_fetch_assoc($query2);
?>    
<html>
<head>
  <title></title>
</head>
<body>
  <div class="row">
<div class="col-md-3"></div>
<div class="form-group col-md-6">
  <form method="get">
  <input type="hidden" value="<?php echo $b['id'] ?>" name="id" id="usr">
    <h3 for="usr" style="margin: 13px;">Name:</h3>
  <input type="text" class="form-control" style="margin: 5px;" value="<?php echo $b['name'] ?>" name="name" id="usr">
    <h3 for="usr" style="margin: 13px;">Type:</h3>
   <div class="form-check form-check-inline" style="margin-left: 10px; margin-top: 10px;">
    <label class="radio-inline mx-2"><input <?php if($b['type']=="Solution") {echo "checked";}?> class="mx-1" type="radio" value="Solution" name="type">Solution</label>
    <label class="radio-inline mx-2"><input <?php if($b['type']=="Syrup") {echo "checked";}?> class="mx-1" type="radio" value="Syrup" name="type">Syrup</label>
    <label class="radio-inline mx-2"><input <?php if($b['type']=="Tablet") {echo "checked";}?> class="mx-1" type="radio" value="Tablet" name="type">Tablet</label>
    <label class="radio-inline mx-2"><input <?php if($b['type']=="Capsule") {echo "checked";}?> class="mx-1" type="radio" value="Capsule" name="type">Capsule</label>
    <label class="radio-inline mx-2"><input <?php if($b['type']=="Drops") {echo "checked";}?> class="mx-1" type="radio" value="Drops" name="type">Drops</label>
    <label class="radio-inline mx-2"><input <?php if($b['type']=="Inhaler") {echo "checked";}?> class="mx-1" type="radio" value="Inhalers" name="type">Inhaler</label>
    <label class="radio-inline mx-2"><input <?php if($b['type']=="Injection") {echo "checked";}?> class="mx-1" type="radio" value="Injection" name="type">Injection</label>
    <label class="radio-inline mx-2"><input <?php if($b['type']=="Pomade") {echo "checked";}?> class="mx-1" type="radio" value="Pomade" name="type">Pomade<label>
  </div>
    <h3 for="usr" style="margin: 13px;">Price:</h3>
  <input type="text" class="form-control" style="margin: 5px;" value="<?php echo $b['price'] ?>" name="price" id="usr">
    <h3 for="usr" style="margin: 13px;">Origin:</h3>
   <div class="form-check form-check-inline" style="margin-left: 10px; margin-top: 10px;">
    <label class="radio-inline mx-2"><input <?php if($b['origin']=="Afg") {echo "checked";}?> class="mx-1" type="radio" value="Afg" name="origin">Afg</label>
    <label class="radio-inline mx-2"><input <?php if($b['origin']=="Ind") {echo "checked";}?> class="mx-1" type="radio" value="Ind" name="origin">Ind</label>
    <label class="radio-inline mx-2"><input <?php if($b['origin']=="Pak") {echo "checked";}?> class="mx-1" type="radio" value="Pak" name="origin">Pak</label>
    <label class="radio-inline mx-2"><input <?php if($b['origin']=="Irn") {echo "checked";}?> class="mx-1" type="radio" value="Irn" name="origin">Irn</label>
    <label class="radio-inline mx-2"><input <?php if($b['origin']=="Arb") {echo "checked";}?> class="mx-1" type="radio" value="Arb" name="origin">Arb</label>
    <label class="radio-inline mx-2"><input <?php if($b['origin']=="Tur") {echo "checked";}?> class="mx-1" type="radio" value="Tur" name="origin">Tur</label>
  </div>
    <h3 for="usr" style="margin: 13px;">Limit:</h3>
  <input type="text" class="form-control" style="margin: 5px;" value="<?php echo $c['drug_limit']; ?>" name="limit" id="usr">
    <h3 for="usr" style="margin: 13px;">Stock:</h3>
  <input type="text" class="form-control" style="margin: 5px;" value="<?php echo $c['count']; ?>" name="instock" id="usr">
  <center><input type="submit" value="Update Drug" class="btn btn-info" style="margin-top: 20px;" name="finaledit"></center>
</form>
</div>
<div class="col-md-3"></div>
</div>
</body>
</html>
<?php } ?>

<?php 
if (isset($_GET['removedrug'])) { 
    $a = $_GET['removedrug'];
    $command = "DELETE FROM `drug` WHERE `id` = '$a'";
    $query = mysqli_query($conn, $command);
    if ($query) {
      header('location: drug.php?edit');
    }
?>

<?php } ob_flush(); ?>
