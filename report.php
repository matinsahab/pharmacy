<?php  
require 'conn.php';
require 'admintop.php';
?>
<?php if (isset($_GET['today'])) {?>
<table class="table">
	<thead class="thead-dark">
		<tr>
		<th scope="col">#</th>
		<th scope="col">Name</th>
		<th scope="col">Type</th>
		<th scope="col">Price</th>
		<th scope="col">Origin</th>
		<th scope="col">Sold</th>
		<th scope="col">Quantity</th>
		<th scope="col">Price</th>
		</tr>
	</thead>
<tbody>
	<?php
	$date = date('d-m-Y');
	$tax = "SELECT COUNT(`id`) AS `tax` FROM `prescription` WHERE `date` = '$date'";
	$qtax = mysqli_query($conn, $tax);
	$ftax = mysqli_fetch_assoc($qtax);
	$command1 = "SELECT `id` FROM `drug` ORDER BY `name` ASC";
	$query1 = mysqli_query($conn, $command1);
	$command9 = "SELECT (SUM(`p1`)+SUM(`p2`)+SUM(`p3`)+SUM(`p4`)+SUM(`p5`)+SUM(`p6`)+SUM(`p7`)+SUM(`p8`)+SUM(`p9`)+SUM(`p10`)+SUM(`p11`)+SUM(`p12`)+SUM(`p13`)) AS `total` FROM `prescription` WHERE `date` = '".$date."'";
	$query9 = mysqli_query($conn, $command9);
	$fetch9 = mysqli_fetch_assoc($query9);
	?>
	<p style="text-align: right;">Date: <?php echo $date; ?></p>
	<p style="text-align: right;">Total Prescription: <?php echo $ftax['tax']; ?></p>
	<center><h1 style="color: black;">Total: ( <?php echo $fetch9['total']; ?> ) AFN</h1></center>
	<?php
	while ($show = mysqli_fetch_assoc($query1)) {
		$command = "
		SELECT `drug`.*, (COUNT(`d1`)+
				  (SELECT COUNT(`d2`) FROM `prescription` WHERE `d2` = '".$show['id']."' AND `date` = '".$date."')+
                  (SELECT COUNT(`d3`) FROM `prescription` WHERE `d3` = '".$show['id']."' AND `date` = '".$date."')+
                  (SELECT COUNT(`d4`) FROM `prescription` WHERE `d4` = '".$show['id']."' AND `date` = '".$date."')+
                  (SELECT COUNT(`d5`) FROM `prescription` WHERE `d5` = '".$show['id']."' AND `date` = '".$date."')+
                  (SELECT COUNT(`d6`) FROM `prescription` WHERE `d6` = '".$show['id']."' AND `date` = '".$date."')+
                  (SELECT COUNT(`d7`) FROM `prescription` WHERE `d7` = '".$show['id']."' AND `date` = '".$date."')+
                  (SELECT COUNT(`d8`) FROM `prescription` WHERE `d8` = '".$show['id']."' AND `date` = '".$date."')+
                  (SELECT COUNT(`d9`) FROM `prescription` WHERE `d9` = '".$show['id']."' AND `date` = '".$date."')+
                (SELECT COUNT(`d10`) FROM `prescription` WHERE `d10` = '".$show['id']."' AND `date` = '".$date."')+
                (SELECT COUNT(`d11`) FROM `prescription` WHERE `d11` = '".$show['id']."' AND `date` = '".$date."')+
                (SELECT COUNT(`d12`) FROM `prescription` WHERE `d12` = '".$show['id']."' AND `date` = '".$date."')+
                (SELECT COUNT(`d13`) FROM `prescription` WHERE `d13` = '".$show['id']."' AND `date` = '".$date."')) AS `tdrug`,

(SELECT 
	(SELECT COALESCE(SUM(`q1`),0) FROM `prescription` WHERE `d1` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q2`),0) FROM `prescription` WHERE `d2` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q3`),0) FROM `prescription` WHERE `d3` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q4`),0) FROM `prescription` WHERE `d4` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q5`),0) FROM `prescription` WHERE `d5` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q6`),0) FROM `prescription` WHERE `d6` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q7`),0) FROM `prescription` WHERE `d7` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q8`),0) FROM `prescription` WHERE `d8` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q9`),0) FROM `prescription` WHERE `d9` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`q10`),0) FROM `prescription` WHERE `d10` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`q11`),0) FROM `prescription` WHERE `d11` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`q12`),0) FROM `prescription` WHERE `d12` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`q13`),0) FROM `prescription` WHERE `d13` = '".$show['id']."' AND `date` = '".$date."')) AS `tquantity`,

	(SELECT (SELECT COALESCE(SUM(`p1`),0) FROM `prescription` WHERE `d1` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p2`),0) FROM `prescription` WHERE `d2` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p3`),0) FROM `prescription` WHERE `d3` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p4`),0) FROM `prescription` WHERE `d4` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p5`),0) FROM `prescription` WHERE `d5` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p6`),0) FROM `prescription` WHERE `d6` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p7`),0) FROM `prescription` WHERE `d7` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p8`),0) FROM `prescription` WHERE `d8` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p9`),0) FROM `prescription` WHERE `d9` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`p10`),0) FROM `prescription` WHERE `d10` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`p11`),0) FROM `prescription` WHERE `d11` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`p12`),0) FROM `prescription` WHERE `d12` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`p13`),0) FROM `prescription` WHERE `d13` = '".$show['id']."' AND `date` = '".$date."')) AS `tprice`
	FROM `prescription`,`drug` WHERE `d1` = '".$show['id']."' AND `drug`.`id`='".$show['id']."'  AND `date` = '".$date."'";
	$query = mysqli_query($conn,$command);
		$fetch = mysqli_fetch_assoc($query);
		echo"
		<tr>
			<th>".$fetch['id']."</th>
			<td>".$fetch['name']."</td>
			<td>".$fetch['type']."</td>
			<td>".$fetch['price']."</td>
			<td>".$fetch['origin']."</td>
			<td style='color:blue;'><h5>".$fetch['tdrug']."</h5></td>
			<td style='color:green;'><h5>".$fetch['tquantity']."</h5></td>
			<td style='color:red;'><h5>".$fetch['tprice']."</h5></td>
		</tr>";
}
?>
<?php } if (isset($_GET['specificdate'])) {
?>
<table class="table">
	<thead class="thead-dark">
		<tr>
		<th scope="col">#</th>
		<th scope="col">Name</th>
		<th scope="col">Type</th>
		<th scope="col">Price</th>
		<th scope="col">Origin</th>
		<th scope="col">Sold</th>
		<th scope="col">Quantity</th>
		<th scope="col">Price</th>
		</tr>
	</thead>
<tbody>
	<?php
	$date = $_GET['date'];
	$tax = "SELECT COUNT(`id`) AS `tax` FROM `prescription` WHERE `date` = '$date'";
	$qtax = mysqli_query($conn, $tax);
	$ftax = mysqli_fetch_assoc($qtax);
	$command1 = "SELECT `id` FROM `drug` ORDER BY `name` ASC";
	$query1 = mysqli_query($conn, $command1);
	$command9 = "SELECT (SUM(`p1`)+SUM(`p2`)+SUM(`p3`)+SUM(`p4`)+SUM(`p5`)+SUM(`p6`)+SUM(`p7`)+SUM(`p8`)+SUM(`p9`)+SUM(`p10`)+SUM(`p11`)+SUM(`p12`)+SUM(`p13`)) AS `total` FROM `prescription` WHERE `date` = '".$date."'";
	$query9 = mysqli_query($conn, $command9);
	$fetch9 = mysqli_fetch_assoc($query9);
	?>
	<p style="text-align: right;">Total Prescription: <?php echo $ftax['tax']; ?></p>
	<center><h1 style="color: black;"><?php echo $date; ?></h1></center>
	<center><h1 style="color: black;">Total: ( <?php echo $fetch9['total']; ?> ) AFN</h1></center>
	<?php
	while ($show = mysqli_fetch_assoc($query1)) {
		$command = "
		SELECT `drug`.*, (COUNT(`d1`)+
				  (SELECT COUNT(`d2`) FROM `prescription` WHERE `d2` = '".$show['id']."' AND `date` = '".$date."')+
                  (SELECT COUNT(`d3`) FROM `prescription` WHERE `d3` = '".$show['id']."' AND `date` = '".$date."')+
                  (SELECT COUNT(`d4`) FROM `prescription` WHERE `d4` = '".$show['id']."' AND `date` = '".$date."')+
                  (SELECT COUNT(`d5`) FROM `prescription` WHERE `d5` = '".$show['id']."' AND `date` = '".$date."')+
                  (SELECT COUNT(`d6`) FROM `prescription` WHERE `d6` = '".$show['id']."' AND `date` = '".$date."')+
                  (SELECT COUNT(`d7`) FROM `prescription` WHERE `d7` = '".$show['id']."' AND `date` = '".$date."')+
                  (SELECT COUNT(`d8`) FROM `prescription` WHERE `d8` = '".$show['id']."' AND `date` = '".$date."')+
                  (SELECT COUNT(`d9`) FROM `prescription` WHERE `d9` = '".$show['id']."' AND `date` = '".$date."')+
                (SELECT COUNT(`d10`) FROM `prescription` WHERE `d10` = '".$show['id']."' AND `date` = '".$date."')+
                (SELECT COUNT(`d11`) FROM `prescription` WHERE `d11` = '".$show['id']."' AND `date` = '".$date."')+
                (SELECT COUNT(`d12`) FROM `prescription` WHERE `d12` = '".$show['id']."' AND `date` = '".$date."')+
                (SELECT COUNT(`d13`) FROM `prescription` WHERE `d13` = '".$show['id']."' AND `date` = '".$date."')) AS `tdrug`,

(SELECT 
	(SELECT COALESCE(SUM(`q1`),0) FROM `prescription` WHERE `d1` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q2`),0) FROM `prescription` WHERE `d2` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q3`),0) FROM `prescription` WHERE `d3` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q4`),0) FROM `prescription` WHERE `d4` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q5`),0) FROM `prescription` WHERE `d5` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q6`),0) FROM `prescription` WHERE `d6` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q7`),0) FROM `prescription` WHERE `d7` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q8`),0) FROM `prescription` WHERE `d8` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`q9`),0) FROM `prescription` WHERE `d9` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`q10`),0) FROM `prescription` WHERE `d10` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`q11`),0) FROM `prescription` WHERE `d11` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`q12`),0) FROM `prescription` WHERE `d12` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`q13`),0) FROM `prescription` WHERE `d13` = '".$show['id']."' AND `date` = '".$date."')) AS `tquantity`,

	(SELECT (SELECT COALESCE(SUM(`p1`),0) FROM `prescription` WHERE `d1` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p2`),0) FROM `prescription` WHERE `d2` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p3`),0) FROM `prescription` WHERE `d3` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p4`),0) FROM `prescription` WHERE `d4` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p5`),0) FROM `prescription` WHERE `d5` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p6`),0) FROM `prescription` WHERE `d6` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p7`),0) FROM `prescription` WHERE `d7` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p8`),0) FROM `prescription` WHERE `d8` = '".$show['id']."' AND `date` = '".$date."')+
	(SELECT COALESCE(SUM(`p9`),0) FROM `prescription` WHERE `d9` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`p10`),0) FROM `prescription` WHERE `d10` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`p11`),0) FROM `prescription` WHERE `d11` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`p12`),0) FROM `prescription` WHERE `d12` = '".$show['id']."' AND `date` = '".$date."')+
  (SELECT COALESCE(SUM(`p13`),0) FROM `prescription` WHERE `d13` = '".$show['id']."' AND `date` = '".$date."')) AS `tprice`
	FROM `prescription`,`drug` WHERE `d1` = '".$show['id']."' AND `drug`.`id`='".$show['id']."'  AND `date` = '".$date."'";
	$query = mysqli_query($conn,$command);
		$fetch = mysqli_fetch_assoc($query);
		echo"
		<tr>
			<th>".$fetch['id']."</th>
			<td>".$fetch['name']."</td>
			<td>".$fetch['type']."</td>
			<td>".$fetch['price']."</td>
			<td>".$fetch['origin']."</td>
			<td style='color:blue;'><h5>".$fetch['tdrug']."</h5></td>
			<td style='color:green;'><h5>".$fetch['tquantity']."</h5></td>
			<td style='color:red;'><h5>".$fetch['tprice']."</h5></td>
		</tr>";

}} ?>


<!-- ########################################################################## -->


<?php if (isset($_GET['fromto'])) {
?>
<table class="table">
	<thead class="thead-dark">
		<tr>
		<th scope="col">#</th>
		<th scope="col">Name</th>
		<th scope="col">Type</th>
		<th scope="col">Price</th>
		<th scope="col">Origin</th>
		<th scope="col">Sold</th>
		<th scope="col">Quantity</th>
		<th scope="col">Price</th>
		</tr>
	</thead>
<tbody>
	<?php
	$date1 = $_GET['date1'];
	$date2 = $_GET['date2'];
	$tax = "SELECT COUNT(`id`) AS `tax` FROM `prescription` WHERE `date` BETWEEN '$date1' AND '$date2'";
	$qtax = mysqli_query($conn, $tax);
	$ftax = mysqli_fetch_assoc($qtax);
	$command1 = "SELECT `id` FROM `drug` ORDER BY `name` ASC";
	$query1 = mysqli_query($conn, $command1);
	$command9 = "SELECT (SUM(`p1`)+SUM(`p2`)+SUM(`p3`)+SUM(`p4`)+SUM(`p5`)+SUM(`p6`)+SUM(`p7`)+SUM(`p8`)+SUM(`p9`)+SUM(`p10`)+SUM(`p11`)+SUM(`p12`)+SUM(`p13`)) AS `total` FROM `prescription` WHERE `date` BETWEEN '".$date1."' AND '".$date2."'";
	$query9 = mysqli_query($conn, $command9);
	$fetch9 = mysqli_fetch_assoc($query9);
	?>
	<p style="text-align: right;">Total Prescription: <?php echo $ftax['tax']; ?></p>
	<center><h1 style="color: black;">From (<?php echo $date1; ?>) To (<?php echo $date2; ?>)</h1></center>
	<center><h1 style="color: black;">Total: ( <?php echo $fetch9['total']; ?> ) AFN</h1></center>
	<?php
	while ($show = mysqli_fetch_assoc($query1)) {
		$command = "
		SELECT `drug`.*, (COUNT(`d1`)+
				  (SELECT COUNT(`d2`) FROM `prescription` WHERE `d2` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
                  (SELECT COUNT(`d3`) FROM `prescription` WHERE `d3` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
                  (SELECT COUNT(`d4`) FROM `prescription` WHERE `d4` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
                  (SELECT COUNT(`d5`) FROM `prescription` WHERE `d5` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
                  (SELECT COUNT(`d6`) FROM `prescription` WHERE `d6` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
                  (SELECT COUNT(`d7`) FROM `prescription` WHERE `d7` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
                  (SELECT COUNT(`d8`) FROM `prescription` WHERE `d8` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
                  (SELECT COUNT(`d9`) FROM `prescription` WHERE `d9` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
                (SELECT COUNT(`d10`) FROM `prescription` WHERE `d10` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
                (SELECT COUNT(`d11`) FROM `prescription` WHERE `d11` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
                (SELECT COUNT(`d12`) FROM `prescription` WHERE `d12` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
                (SELECT COUNT(`d13`) FROM `prescription` WHERE `d13` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')) AS `tdrug`,

(SELECT 
	(SELECT COALESCE(SUM(`q1`),0) FROM `prescription` WHERE `d1` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`q2`),0) FROM `prescription` WHERE `d2` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`q3`),0) FROM `prescription` WHERE `d3` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`q4`),0) FROM `prescription` WHERE `d4` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`q5`),0) FROM `prescription` WHERE `d5` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`q6`),0) FROM `prescription` WHERE `d6` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`q7`),0) FROM `prescription` WHERE `d7` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`q8`),0) FROM `prescription` WHERE `d8` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`q9`),0) FROM `prescription` WHERE `d9` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
  (SELECT COALESCE(SUM(`q10`),0) FROM `prescription` WHERE `d10` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
  (SELECT COALESCE(SUM(`q11`),0) FROM `prescription` WHERE `d11` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
  (SELECT COALESCE(SUM(`q12`),0) FROM `prescription` WHERE `d12` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
  (SELECT COALESCE(SUM(`q13`),0) FROM `prescription` WHERE `d13` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')) AS `tquantity`,

	(SELECT 
	(SELECT COALESCE(SUM(`p1`),0) FROM `prescription` WHERE `d1` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`p2`),0) FROM `prescription` WHERE `d2` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`p3`),0) FROM `prescription` WHERE `d3` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`p4`),0) FROM `prescription` WHERE `d4` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`p5`),0) FROM `prescription` WHERE `d5` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`p6`),0) FROM `prescription` WHERE `d6` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`p7`),0) FROM `prescription` WHERE `d7` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`p8`),0) FROM `prescription` WHERE `d8` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
	(SELECT COALESCE(SUM(`p9`),0) FROM `prescription` WHERE `d9` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
  (SELECT COALESCE(SUM(`p10`),0) FROM `prescription` WHERE `d10` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
  (SELECT COALESCE(SUM(`p11`),0) FROM `prescription` WHERE `d11` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
  (SELECT COALESCE(SUM(`p12`),0) FROM `prescription` WHERE `d12` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')+
  (SELECT COALESCE(SUM(`p13`),0) FROM `prescription` WHERE `d13` = '".$show['id']."' AND `date` BETWEEN '".$date1."' AND '".$date2."')) AS `tprice`
	FROM `prescription`,`drug` WHERE `d1` = '".$show['id']."' AND `drug`.`id`='".$show['id']."'  AND `date` BETWEEN '".$date1."' AND '".$date2."'";
	$query = mysqli_query($conn,$command);
		$fetch = mysqli_fetch_assoc($query);
		echo"
		<tr>
			<th>".$fetch['id']."</th>
			<td>".$fetch['name']."</td>
			<td>".$fetch['type']."</td>
			<td>".$fetch['price']."</td>
			<td>".$fetch['origin']."</td>
			<td style='color:blue;'><h5>".$fetch['tdrug']."</h5></td>
			<td style='color:green;'><h5>".$fetch['tquantity']."</h5></td>
			<td style='color:red;'><h5>".$fetch['tprice']."</h5></td>
		</tr>";

}} ?>