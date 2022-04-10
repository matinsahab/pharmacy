<?php 
	require 'conn.php';
	require 'admintop.php';
?>
<?php if (isset($_GET['tablet'])) {
	$command = "SELECT `stock`.`id`,`name`,`type`,`price`,`origin`, `drug_limit`, `count` FROM `drug` LEFT JOIN `stock` ON `stock`.`id`=`drug`.`id` WHERE `drug`.`type` = 'Tablet' ORDER BY (`count` - `drug_limit`) ASC";
	$query = mysqli_query($conn, $command);?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Price</th>
      <th scope="col">Origin</th>
      <th scope="col">Limit</th>
      <th scope="col">In Stock</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($show = mysqli_fetch_assoc($query)) {?>
    <tr>
      <th scope="row"><?php echo $show['id']; ?></th>
      <td><?php echo $show['name']; ?></td>
      <td><?php echo $show['type']; ?></td>
      <td><?php echo $show['price']; ?></td>
      <td><?php echo $show['origin']; ?></td>
      <td><?php echo $show['drug_limit']; ?></td>
      <td><h5 style="color: red;"><?php echo $show['count']; ?></h5></td>
    </tr>


  	<?php }} ?>
  </tbody>
</table>

<!-- ############################################################################################# -->


<?php if (isset($_GET['capsule'])) {
	$command = "SELECT `stock`.`id`,`name`,`type`,`price`,`origin`, `drug_limit`, `count` FROM `drug` LEFT JOIN `stock` ON `stock`.`id`=`drug`.`id` WHERE `drug`.`type` = 'Capsule' ORDER BY (`count` - `drug_limit`) ASC";
	$query = mysqli_query($conn, $command);?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Price</th>
      <th scope="col">Origin</th>
      <th scope="col">Limit</th>
      <th scope="col">In Stock</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($show = mysqli_fetch_assoc($query)) {?>
    <tr>
      <th scope="row"><?php echo $show['id']; ?></th>
      <td><?php echo $show['name']; ?></td>
      <td><?php echo $show['type']; ?></td>
      <td><?php echo $show['price']; ?></td>
      <td><?php echo $show['origin']; ?></td>
      <td><?php echo $show['drug_limit']; ?></td>
      <td><h5 style="color: red;"><?php echo $show['count']; ?></h5></td>
    </tr>


  	<?php }} ?>
  </tbody>
</table>

<!-- ############################################################################################# -->

<?php if (isset($_GET['pomade'])) {
	$command = "SELECT `stock`.`id`,`name`,`type`,`price`,`origin`, `drug_limit`, `count` FROM `drug` LEFT JOIN `stock` ON `stock`.`id`=`drug`.`id` WHERE `drug`.`type` = 'Pomade' ORDER BY (`count` - `drug_limit`) ASC";
	$query = mysqli_query($conn, $command);?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Price</th>
      <th scope="col">Origin</th>
      <th scope="col">Limit</th>
      <th scope="col">In Stock</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($show = mysqli_fetch_assoc($query)) {?>
    <tr>
      <th scope="row"><?php echo $show['id']; ?></th>
      <td><?php echo $show['name']; ?></td>
      <td><?php echo $show['type']; ?></td>
      <td><?php echo $show['price']; ?></td>
      <td><?php echo $show['origin']; ?></td>
      <td><?php echo $show['drug_limit']; ?></td>
      <td><h5 style="color: red;"><?php echo $show['count']; ?></h5></td>
    </tr>


  	<?php }} ?>
  </tbody>
</table>

<!-- ############################################################################################# -->

<?php if (isset($_GET['solution'])) {
	$command = "SELECT `stock`.`id`,`name`,`type`,`price`,`origin`, `drug_limit`, `count` FROM `drug` LEFT JOIN `stock` ON `stock`.`id`=`drug`.`id` WHERE `drug`.`type` = 'Solution' ORDER BY (`count` - `drug_limit`) ASC";
	$query = mysqli_query($conn, $command);?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Price</th>
      <th scope="col">Origin</th>
      <th scope="col">Limit</th>
      <th scope="col">In Stock</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($show = mysqli_fetch_assoc($query)) {?>
    <tr>
      <th scope="row"><?php echo $show['id']; ?></th>
      <td><?php echo $show['name']; ?></td>
      <td><?php echo $show['type']; ?></td>
      <td><?php echo $show['price']; ?></td>
      <td><?php echo $show['origin']; ?></td>
      <td><?php echo $show['drug_limit']; ?></td>
      <td><h5 style="color: red;"><?php echo $show['count']; ?></h5></td>
    </tr>


  	<?php }} ?>
  </tbody>
</table>

<!-- ############################################################################################# -->

<?php if (isset($_GET['syrup'])) {
	$command = "SELECT `stock`.`id`,`name`,`type`,`price`,`origin`, `drug_limit`, `count` FROM `drug` LEFT JOIN `stock` ON `stock`.`id`=`drug`.`id` WHERE `drug`.`type` = 'Syrup' ORDER BY (`count` - `drug_limit`) ASC";
	$query = mysqli_query($conn, $command);?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Price</th>
      <th scope="col">Origin</th>
      <th scope="col">Limit</th>
      <th scope="col">In Stock</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($show = mysqli_fetch_assoc($query)) {?>
    <tr>
      <th scope="row"><?php echo $show['id']; ?></th>
      <td><?php echo $show['name']; ?></td>
      <td><?php echo $show['type']; ?></td>
      <td><?php echo $show['price']; ?></td>
      <td><?php echo $show['origin']; ?></td>
      <td><?php echo $show['drug_limit']; ?></td>
      <td><h5 style="color: red;"><?php echo $show['count']; ?></h5></td>
    </tr>


  	<?php }} ?>
  </tbody>
</table>

<!-- ############################################################################################# -->

<?php if (isset($_GET['drops'])) {
	$command = "SELECT `stock`.`id`,`name`,`type`,`price`,`origin`, `drug_limit`, `count` FROM `drug` LEFT JOIN `stock` ON `stock`.`id`=`drug`.`id` WHERE `drug`.`type` = 'Drops' ORDER BY (`count` - `drug_limit`) ASC";
	$query = mysqli_query($conn, $command);?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Price</th>
      <th scope="col">Origin</th>
      <th scope="col">Limit</th>
      <th scope="col">In Stock</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($show = mysqli_fetch_assoc($query)) {?>
    <tr>
      <th scope="row"><?php echo $show['id']; ?></th>
      <td><?php echo $show['name']; ?></td>
      <td><?php echo $show['type']; ?></td>
      <td><?php echo $show['price']; ?></td>
      <td><?php echo $show['origin']; ?></td>
      <td><?php echo $show['drug_limit']; ?></td>
      <td><h5 style="color: red;"><?php echo $show['count']; ?></h5></td>
    </tr>


  	<?php }} ?>
  </tbody>
</table>

<!-- ############################################################################################# -->

<?php if (isset($_GET['inhaler'])) {
	$command = "SELECT `stock`.`id`,`name`,`type`,`price`,`origin`, `drug_limit`, `count` FROM `drug` LEFT JOIN `stock` ON `stock`.`id`=`drug`.`id` WHERE `drug`.`type` = 'Inhaler' ORDER BY (`count` - `drug_limit`) ASC";
	$query = mysqli_query($conn, $command);?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Price</th>
      <th scope="col">Origin</th>
      <th scope="col">Limit</th>
      <th scope="col">In Stock</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($show = mysqli_fetch_assoc($query)) {?>
    <tr>
      <th scope="row"><?php echo $show['id']; ?></th>
      <td><?php echo $show['name']; ?></td>
      <td><?php echo $show['type']; ?></td>
      <td><?php echo $show['price']; ?></td>
      <td><?php echo $show['origin']; ?></td>
      <td><?php echo $show['drug_limit']; ?></td>
      <td><h5 style="color: red;"><?php echo $show['count']; ?></h5></td>
    </tr>


  	<?php }} ?>
  </tbody>
</table>

<!-- ############################################################################################# -->

<?php if (isset($_GET['injection'])) {
	$command = "SELECT `stock`.`id`,`name`,`type`,`price`,`origin`, `drug_limit`, `count` FROM `drug` LEFT JOIN `stock` ON `stock`.`id`=`drug`.`id` WHERE `drug`.`type` = 'Injection' ORDER BY (`count` - `drug_limit`) ASC";
	$query = mysqli_query($conn, $command);?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Price</th>
      <th scope="col">Origin</th>
      <th scope="col">Limit</th>
      <th scope="col">In Stock</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($show = mysqli_fetch_assoc($query)) {?>
    <tr>
      <th scope="row"><?php echo $show['id']; ?></th>
      <td><?php echo $show['name']; ?></td>
      <td><?php echo $show['type']; ?></td>
      <td><?php echo $show['price']; ?></td>
      <td><?php echo $show['origin']; ?></td>
      <td><?php echo $show['drug_limit']; ?></td>
      <td><h5 style="color: red;"><?php echo $show['count']; ?></h5></td>
    </tr>


  	<?php }} ?>
  </tbody>
</table>

<!-- ############################################################################################# -->

