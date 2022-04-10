<?php  
require 'conn.php';
require 'admintop.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $prescriptionid = "SELECT `id`,(SELECT `username` FROM `account` WHERE `account`.`id` = `prescription`.`cid` AND `prescription`.`id` = '$id') AS `user`,`date` FROM `prescription` WHERE `id` = '$id'";
  $prescriptionquery = mysqli_query($conn, $prescriptionid);
  $prescriptionfetch = mysqli_fetch_assoc($prescriptionquery);
  $date = date('m-d-Y');
  $total = "SELECT  (SUM(p1) + SUM(p2) + SUM(p3) + SUM(p4) + SUM(p5) + SUM(p6) + SUM(p7) +
             SUM(p8) + SUM(p9) + SUM(p10) + SUM(p11) + SUM(p12) + SUM(p13)) AS `total` FROM `prescription` WHERE `id` = (SELECT `id` FROM `prescription` WHERE `id` = '$id')";
  $totalq = mysqli_query($conn, $total);
  $cool = mysqli_fetch_assoc($totalq);
 ?>
  <div class="col-md-6 container" style="border-left: 1px solid black;border-right: 1px solid black;">
    <center>
      <h4><?php echo $prescriptionfetch['user']; ?> - ( <?php echo $prescriptionfetch['date']; ?> )</h4>
      <h4>Prescription - ID ( <span style="color:red;"><?php echo $prescriptionfetch['id']; ?></span> ) - <span style="color: blue;"><?php echo $cool['total']; ?></span> Af <a style="margin-left: 20px;" class="btn btn-danger" href="prescription.php?del=<?php echo $id; ?>">Delete</a></h4></center>
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
      $command = "SELECT `id`, `date`, 
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

FROM `prescription` WHERE `id` = '$id'";
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
<?php } ?>

<?php if (isset($_GET['del'])) {
$del = $_GET['del'];

$command1 = "UPDATE `stock` SET `count` = (`count` + (SELECT COALESCE(SUM(`q1`),0) FROM `prescription` WHERE `id` = '$del')) WHERE `id` = (SELECT `d1` FROM `prescription` WHERE `id` = '$del')";
$query1 = mysqli_query($conn, $command1);
$command2 = "UPDATE `stock` SET `count` = (`count` + (SELECT COALESCE(SUM(`q2`),0) FROM `prescription` WHERE `id` = '$del')) WHERE `id` = (SELECT `d2` FROM `prescription` WHERE `id` = '$del')";
$query2 = mysqli_query($conn, $command2);
$command3 = "UPDATE `stock` SET `count` = (`count` + (SELECT COALESCE(SUM(`q3`),0) FROM `prescription` WHERE `id` = '$del')) WHERE `id` = (SELECT `d3` FROM `prescription` WHERE `id` = '$del')";
$query3 = mysqli_query($conn, $command3);
$command4 = "UPDATE `stock` SET `count` = (`count` + (SELECT COALESCE(SUM(`q4`),0) FROM `prescription` WHERE `id` = '$del')) WHERE `id` = (SELECT `d4` FROM `prescription` WHERE `id` = '$del')";
$query4 = mysqli_query($conn, $command4);
$command5 = "UPDATE `stock` SET `count` = (`count` + (SELECT COALESCE(SUM(`q5`),0) FROM `prescription` WHERE `id` = '$del')) WHERE `id` = (SELECT `d5` FROM `prescription` WHERE `id` = '$del')";
$query5 = mysqli_query($conn, $command5);
$command6 = "UPDATE `stock` SET `count` = (`count` + (SELECT COALESCE(SUM(`q6`),0) FROM `prescription` WHERE `id` = '$del')) WHERE `id` = (SELECT `d6` FROM `prescription` WHERE `id` = '$del')";
$query6 = mysqli_query($conn, $command6);
$command7 = "UPDATE `stock` SET `count` = (`count` + (SELECT COALESCE(SUM(`q7`),0) FROM `prescription` WHERE `id` = '$del')) WHERE `id` = (SELECT `d7` FROM `prescription` WHERE `id` = '$del')";
$query7 = mysqli_query($conn, $command7);
$command8 = "UPDATE `stock` SET `count` = (`count` + (SELECT COALESCE(SUM(`q8`),0) FROM `prescription` WHERE `id` = '$del')) WHERE `id` = (SELECT `d8` FROM `prescription` WHERE `id` = '$del')";
$query8 = mysqli_query($conn, $command8);
$command9 = "UPDATE `stock` SET `count` = (`count` + (SELECT COALESCE(SUM(`q9`),0) FROM `prescription` WHERE `id` = '$del')) WHERE `id` = (SELECT `d9` FROM `prescription` WHERE `id` = '$del')";
$query9 = mysqli_query($conn, $command9);
$command10 = "UPDATE `stock` SET `count` = (`count` + (SELECT COALESCE(SUM(`q10`),0) FROM `prescription` WHERE `id` = '$del')) WHERE `id` = (SELECT `d10` FROM `prescription` WHERE `id` = '$del')";
$query10 = mysqli_query($conn, $command10);
$command11 = "UPDATE `stock` SET `count` = (`count` + (SELECT COALESCE(SUM(`q11`),0) FROM `prescription` WHERE `id` = '$del')) WHERE `id` = (SELECT `d11` FROM `prescription` WHERE `id` = '$del')";
$query11 = mysqli_query($conn, $command11);
$command12 = "UPDATE `stock` SET `count` = (`count` + (SELECT COALESCE(SUM(`q12`),0) FROM `prescription` WHERE `id` = '$del')) WHERE `id` = (SELECT `d12` FROM `prescription` WHERE `id` = '$del')";
$query12 = mysqli_query($conn, $command12);
$command13 = "UPDATE `stock` SET `count` = (`count` + (SELECT COALESCE(SUM(`q13`),0) FROM `prescription` WHERE `id` = '$del')) WHERE `id` = (SELECT `d13` FROM `prescription` WHERE `id` = '$del')";
$query13 = mysqli_query($conn, $command13);

$command = "DELETE FROM `prescription` WHERE `id` = '$del'";
$query = mysqli_query($conn, $command);

if ($query) {
  header('location: admin.php?pres='.$del);
}

} ?>