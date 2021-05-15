
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "spark bank");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

// Attempt insert query execution
$sql = "SELECT *FROM accountdetails ";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) 
{
    
?>

<!DOCTYPE html>
<head>

<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,
      initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="style.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity=
"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">

  <title>online moneytransfer Website</title>

</head>

<body>
<!--navbar-->
<?php include('navbar.php'); ?>
<!--navbar close-->
<br><br>
<?php

while($row = mysqli_fetch_assoc($result)) 
  {  
    $id=$row["sno"];
    if($id==$_GET["id"]){
?>
<div class="card">
    <h5 class="card-header">Name:<?php echo $row["name"]; ?></h5>
    <div class="card-body">
      <h5 class="card-title">Email: <?php echo $row["email"]; ?></h5>
      <h6 class="card-title">Account Id:<?php echo $row["accID"]; ?></h6>
      <p class="card-text">The customers current balance is <?php echo $row["balance"]; ?> .</p>
      <a href="Transfer.php?id=<?php echo $row["sno"] ?>" class="btn btn-dark">Transfer Money</a>
</div>
</div>
<?php }}}?>
</body>
