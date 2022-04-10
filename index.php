<?php 
require('conn.php');
require 'top.php';
if (!isset($_SESSION['lol'])) {
	header('location: login.php');
}
?>
<!-- ############################################################################ -->
<?php
	if (isset($_POST['addtoprescription'])) {
		$cid = $_SESSION['lol'];
		$d1 = $_POST['d1'];
		$d2 = $_POST['d2'];
		$d3 = $_POST['d3'];
		$d4 = $_POST['d4'];
		$d5 = $_POST['d5'];
		$d6 = $_POST['d6'];
		$d7 = $_POST['d7'];
		$d8 = $_POST['d8'];
		$d9 = $_POST['d9'];
		$d10 = $_POST['d10'];
		$d11 = $_POST['d11'];
		$d12 = $_POST['d12'];
		$d13 = $_POST['d13'];
		$q1 = $_POST['q1'];
		$q2 = $_POST['q2'];
		$q3 = $_POST['q3'];
		$q4 = $_POST['q4'];
		$q5 = $_POST['q5'];
		$q6 = $_POST['q6'];
		$q7 = $_POST['q7'];
		$q8 = $_POST['q8'];
		$q9 = $_POST['q9'];
		$q10 = $_POST['q10'];
		$q11 = $_POST['q11'];
		$q12 = $_POST['q12'];
		$q13 = $_POST['q13'];
		$date = date('d-m-Y');
		$command1 = "UPDATE `stock` 
		SET `count` = (`count` - '$q1') WHERE `id` = '$d1'";
		$queryup1 = mysqli_query($conn,$command1);

		$command2 = "UPDATE `stock` 
		SET `count` = (`count` - '$q2') WHERE `id` = '$d2'";
		$queryup2 = mysqli_query($conn,$command2);

		$command3 = "UPDATE `stock` 
		SET `count` = (`count` - '$q3') WHERE `id` = '$d3'";
		$queryup3 = mysqli_query($conn,$command3);

		$command4 = "UPDATE `stock` 
		SET `count` = (`count` - '$q4') WHERE `id` = '$d4'";
		$queryup4 = mysqli_query($conn,$command4);

		$command5 = "UPDATE `stock` 
		SET `count` = (`count` - '$q5') WHERE `id` = '$d5'";
		$queryup5 = mysqli_query($conn,$command5);

		$command6 = "UPDATE `stock` 
		SET `count` = (`count` - '$q6') WHERE `id` = '$d6'";
		$queryup6 = mysqli_query($conn,$command6);

		$command7 = "UPDATE `stock` 
		SET `count` = (`count` - '$q7') WHERE `id` = '$d7'";
		$queryup7 = mysqli_query($conn,$command7);

		$command8 = "UPDATE `stock` 
		SET `count` = (`count` - '$q8') WHERE `id` = '$d8'";
		$queryup8 = mysqli_query($conn,$command8);

		$command9 = "UPDATE `stock` 
		SET `count` = (`count` - '$q9') WHERE `id` = '$d9'";
		$queryup9 = mysqli_query($conn,$command9);

		$command10 = "UPDATE `stock` 
		SET `count` = (`count` - '$q10') WHERE `id` = '$d10'";
		$queryup10 = mysqli_query($conn,$command10);

		$command11 = "UPDATE `stock` 
		SET `count` = (`count` - '$q11') WHERE `id` = '$d11'";
		$queryup11 = mysqli_query($conn,$command11);

		$command12 = "UPDATE `stock` 
		SET `count` = (`count` - '$q12') WHERE `id` = '$d12'";
		$queryup12 = mysqli_query($conn,$command12);

		$command13 = "UPDATE `stock` 
		SET `count` = (`count` - '$q13') WHERE `id` = '$d13'";
		$queryup13 = mysqli_query($conn,$command13);
		$koko = "
		INSERT INTO `prescription`(`cid`,`date`, 
		 `d1`, `q1`, `p1`, 
		 `d2`, `q2`, `p2`,
		 `d3`, `q3`, `p3`, 
		 `d4`, `q4`, `p4`, 
		 `d5`, `q5`, `p5`, 
		 `d6`, `q6`, `p6`, 
		 `d7`, `q7`, `p7`,
		 `d8`, `q8`, `p8`, 
		 `d9`, `q9`, `p9`, 
		 `d10`, `q10`, `p10`, 
		 `d11`, `q11`, `p11`, 
		 `d12`, `q12`, `p12`, 
		 `d13`, `q13`, `p13`) 
		VALUES ((SELECT `id` FROM `account` WHERE `username` = '$cid'),'$date', 
		'$d1', '$q1', ROUND(((SELECT `price` FROM `drug` WHERE `id` = '$d1') * '$q1'),0),
		'$d2', '$q2', ROUND(((SELECT `price` FROM `drug` WHERE `id` = '$d2') * '$q2'),0),
		'$d3', '$q3', ROUND(((SELECT `price` FROM `drug` WHERE `id` = '$d3') * '$q3'),0),
		'$d4', '$q4', ROUND(((SELECT `price` FROM `drug` WHERE `id` = '$d4') * '$q4'),0),
		'$d5', '$q5', ROUND(((SELECT `price` FROM `drug` WHERE `id` = '$d5') * '$q5'),0),
		'$d6', '$q6', ROUND(((SELECT `price` FROM `drug` WHERE `id` = '$d6') * '$q6'),0),
		'$d7', '$q7', ROUND(((SELECT `price` FROM `drug` WHERE `id` = '$d7') * '$q7'),0),
		'$d8', '$q8', ROUND(((SELECT `price` FROM `drug` WHERE `id` = '$d8') * '$q8'),0),
		'$d9', '$q9', ROUND(((SELECT `price` FROM `drug` WHERE `id` = '$d9') * '$q9'),0),
		'$d10', '$q10', ROUND(((SELECT `price` FROM `drug` WHERE `id` = '$d10') * '$q10'),0), 
		'$d11', '$q11', ROUND(((SELECT `price` FROM `drug` WHERE `id` = '$d11') * '$q11'),0), 
		'$d12', '$q12', ROUND(((SELECT `price` FROM `drug` WHERE `id` = '$d12') * '$q12'),0), 
		'$d13', '$q13', ROUND(((SELECT `price` FROM `drug` WHERE `id` = '$d13') * '$q13'),0))";
		$query = mysqli_query($conn, $koko);
	}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form method="post">
<div class="row" style="margin-top: 50px;">
<div class="col-md-1">
	<center><h4 class="mr-sm-2" for="inlineFormCustomSelect">#</h4>
	<?php for ($i=1; $i < 14; $i++) { ?>
	<center><h3 style="margin-top: 14px;" class="mr-sm-2" for="inlineFormCustomSelect"><?php echo $i; ?></h3>
	<?php } ?>
	
</div>
<div class="col-md-2 container">
	<center><h4 class="mr-sm-2" for="inlineFormCustomSelect">Drug</h4>
		<div>
		<select class="selectpicker" data-width="fit" data-style="btn-info" name="d1" title="Choose Drug" data-live-search="true">
		<?php
		$command = "SELECT * FROM `drug` ORDER BY `name` ASC";
		$query = mysqli_query($conn, $command);
		$x = 1;
		while ($drug = mysqli_fetch_assoc($query)) { ?>
		<option value="<?php echo $drug['id'];?>" selected><?php echo $drug['name'].' - '.$drug['type'].' - '.$drug['origin'].' - '.round($drug['price']); ?></option>
		<?php } ?>
		</select>
		</div>
		<?php for ($i=2; $i <14 ; $i++) { ?>
		<div style="margin-top: 10px;">
		<select class="selectpicker" data-width="fit" data-style="btn-info" name="d<?php echo $i; ?>" title="Choose Drug" data-live-search="true">
		<?php
		$command = "SELECT * FROM `drug` ORDER BY `name` ASC";
		$query = mysqli_query($conn, $command);?>
		<?php 
		while ($drug = mysqli_fetch_assoc($query)) { ?>
		<option value="<?php echo $drug['id']; ?>" selected><?php echo $drug['name'].' - '.$drug['type'].' - '.$drug['origin'].' - '.round($drug['price']); ?></option>
		<?php } ?>
		</select>
		</div>
		<?php } ?>
	</div>
<div class="col-md-2">
	<center><h4 class="mr-sm-2" for="inlineFormCustomSelect">Qty</h4>
	<div>
	<select class="selectpicker" data-width="80px" data-style="btn-warning" title="No" name="q1" data-live-search="true">
		<option value="0" selected>0</option>
		<?php for ($i=1; $i <1001 ; $i++) { ?>
		<option value="<?php echo $i; ?>"><?php echo "$i"; ?></option>
		<?php } ?>
	</select>
	</div>
	<?php for ($v=2; $v <14 ; $v++) { ?>
	<div style="margin-top: 10px;">
	<select class="selectpicker" data-width="80px" data-style="btn-warning" title="No" name="q<?php echo $v; ?>" data-live-search="true">
		<option value="0" selected>0</option>
		<?php for ($i=1; $i <1001 ; $i++) { ?>
		<option value="<?php echo $i; ?>"><?php echo "$i"; ?></option>
		<?php } ?>
	</select>
	</div>
	<?php } ?>

</div>
<div class="col-md-1 container" style="margin-top: 299px;">
	<center><input type="submit" class="btn btn-success"  value="Add" name="addtoprescription"></center>
</div>
</form>
</center>
<!-- ############################################################################################### -->
<?php 
	$prescriptionid = "SELECT `id` FROM `prescription` ORDER BY `id` DESC LIMIT 1";
	$prescriptionquery = mysqli_query($conn, $prescriptionid);
	$prescriptionfetch = mysqli_fetch_assoc($prescriptionquery);
	$date = date('m-d-Y');
	$total = "SELECT  (SUM(p1) + SUM(p2) + SUM(p3) + SUM(p4) + SUM(p5) + SUM(p6) + SUM(p7) +
					   SUM(p8) + SUM(p9) + SUM(p10) + SUM(p11) + SUM(p12) + SUM(p13)) AS `total` FROM `prescription` WHERE `id` = (SELECT `id` FROM `prescription` ORDER BY `id` DESC LIMIT 1)";
	$totalq = mysqli_query($conn, $total);
	$cool = mysqli_fetch_assoc($totalq);
 ?>
	<div class="col-md-6 container" style="border-left: 1px solid black;">
		<center><h4>Prescription - ID ( <span style="color:red;"><?php echo $prescriptionfetch['id']; ?></span> ) - <span style="color: blue;"><?php echo $cool['total']; ?></span> Af</h4></center>
		<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Drugs</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
  		$command = 'SELECT `id`, `date`, 
(SELECT `name` FROM `drug` WHERE `id` = `prescription`.`d1`) AS `name1`, `q1`, 
(SELECT `name` FROM `drug` WHERE `id` = `prescription`.`d2`) AS `name2`, `q2`, 
(SELECT `name` FROM `drug` WHERE `id` = `prescription`.`d3`) AS `name3`, `q3`, 
(SELECT `name` FROM `drug` WHERE `id` = `prescription`.`d4`) AS `name4`, `q4`, 
(SELECT `name` FROM `drug` WHERE `id` = `prescription`.`d5`) AS `name5`, `q5`, 
(SELECT `name` FROM `drug` WHERE `id` = `prescription`.`d6`) AS `name6`, `q6`, 
(SELECT `name` FROM `drug` WHERE `id` = `prescription`.`d7`) AS `name7`, `q7`, 
(SELECT `name` FROM `drug` WHERE `id` = `prescription`.`d8`) AS `name8`, `q8`, 
(SELECT `name` FROM `drug` WHERE `id` = `prescription`.`d9`) AS `name9`, `q9`, 
(SELECT `name` FROM `drug` WHERE `id` = `prescription`.`d10`) AS `name10`, `q10`, 
(SELECT `name` FROM `drug` WHERE `id` = `prescription`.`d11`) AS `name11`, `q11`, 
(SELECT `name` FROM `drug` WHERE `id` = `prescription`.`d12`) AS `name12`, `q12`, 
(SELECT `name` FROM `drug` WHERE `id` = `prescription`.`d13`) AS `name13`, `q13`, 
FORMAT(((SELECT `price` FROM `drug` WHERE `id` = `prescription`.`d1`)*`q1`),0) AS `p1`, `q1`, 
FORMAT(((SELECT `price` FROM `drug` WHERE `id` = `prescription`.`d2`)*`q2`),0) AS `p2`, `q2`, 
FORMAT(((SELECT `price` FROM `drug` WHERE `id` = `prescription`.`d3`)*`q3`),0) AS `p3`, `q3`, 
FORMAT(((SELECT `price` FROM `drug` WHERE `id` = `prescription`.`d4`)*`q4`),0) AS `p4`, `q4`, 
FORMAT(((SELECT `price` FROM `drug` WHERE `id` = `prescription`.`d5`)*`q5`),0) AS `p5`, `q5`, 
FORMAT(((SELECT `price` FROM `drug` WHERE `id` = `prescription`.`d6`)*`q6`),0) AS `p6`, `q6`, 
FORMAT(((SELECT `price` FROM `drug` WHERE `id` = `prescription`.`d7`)*`q7`),0) AS `p7`, `q7`, 
FORMAT(((SELECT `price` FROM `drug` WHERE `id` = `prescription`.`d8`)*`q8`),0) AS `p8`, `q8`, 
FORMAT(((SELECT `price` FROM `drug` WHERE `id` = `prescription`.`d9`)*`q9`),0) AS `p9`, `q9`, 
FORMAT(((SELECT `price` FROM `drug` WHERE `id` = `prescription`.`d10`)* `q10`),0) AS `p10`, `q10`, 
FORMAT(((SELECT `price` FROM `drug` WHERE `id` = `prescription`.`d11`)* `q11`),0) AS `p11`, `q11`, 
FORMAT(((SELECT `price` FROM `drug` WHERE `id` = `prescription`.`d12`)* `q12`),0) AS `p12`, `q12`, 
FORMAT(((SELECT `price` FROM `drug` WHERE `id` = `prescription`.`d13`)* `q13`),0) AS `p13`, `q13`

FROM `prescription` ORDER BY `prescription`.`id` DESC LIMIT 1';
  		$query = mysqli_query($conn, $command);
  		$m = mysqli_fetch_assoc($query);
  		$h = 1;
  		while ($h < 14) {
  	?>
    <tr>
		<th scope="row"><?php echo $h; ?></th>
		<td><?php echo $m['name'.$h]; ?></td>
			<td><?php echo $m['q'.$h]; ?></td>
		<td><?php echo $m['p'.$h]; ?></td>
    </tr>
<?php $h++;} ?>
  </tbody>
</table>
<hr>
</div>
</body>
</html>