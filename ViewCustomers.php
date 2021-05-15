<?php
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "spark bank"; 
    $conn = new mysqli($servername, $username, $password, $dbname); 
    if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
    } 
    //$sql = "SELECT * FROM customerinfo" ;
    $sql = "SELECT * FROM accountdetails" ;
    $result = $conn->query($sql);
?>
            
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Customer Details</title>    
    <!-- CSS style sheet -->
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
  <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
               font-size:25px;
               padding-bottom: 100px;
               background: white;
               

              }
        .container{      
                padding-top:5px;
                display: block;
                margin-top: 20px;
                margin-left: auto;
                margin-right: auto;
                width: 50%;    
        }

        td,th { border: 1px solid #ddd; padding: 8px;}
        .table{ font-family: Arial,Helvetica, sans-serif; border-collapse: collapse; margin-bottom: 15px;}
        .table tr:nth-child(even){ background-color: #F5F5F5; }
        .table tr:nth-child(odd){ background-color: #E0E0E0; }
        .table tr:hover{ background-color:#C0C0C0; }
        .table th { padding-top: 12px; padding-bottom: 12px; text-align:left; background-color: #333; color:white; }
    </style>
</head>

<body>
  <!-- navbar -->
  <?php include('navbar.php'); ?>
       <div class="container">
            <h2 style="text-align: center">Customer Details</h2>
            <br>                   
            <table class="table">
                <thead>
                    <tr>
                    <th>S.No.</th>
                    <th>Account No.</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Balance</th>  
                    <th>View details</th>
                    </tr>
                </thead>                     
                <?php
                while($row = $result->fetch_assoc()) { 
                ?> 
                <tr>
                    <td><?php echo $row['sno']; ?></td>
                    <td><?php echo $row['accID']; ?></td>
                    
                    <td ><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['balance']; ?></td>
                    <td><a href="view_details.php?id=<?php echo $row['sno'] ?>"><button>View details</button></a></td>
                </tr>
                <?php
                }
                $conn->close();
                ?> 
            </table>
        </div>
</body>
</html>


