<?php  
require 'conn.php';
require 'top.php';
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
      <h4>Prescription - ID ( <span style="color:red;"><?php echo $prescriptionfetch['id']; ?></span> ) - <span style="color: blue;"><?php echo $cool['total']; ?></span> Af </h4></center>
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