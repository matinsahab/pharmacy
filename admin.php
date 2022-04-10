<?php 
require('conn.php');
require 'admintop.php';
if (!isset($_SESSION['ax'])) {
	header('location: adminlogin.php');
}
?>
<?php 
$command = "SELECT `stock`.`id`,`name`,`type`,`price`,`origin`, `drug_limit`, `count` FROM `drug` LEFT JOIN `stock` ON `stock`.`id`=`drug`.`id` ORDER BY (`count` - `drug_limit`) ASC";
$query = mysqli_query($conn,$command);
?>
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
  	<?php } ?>
  </tbody>
</table>