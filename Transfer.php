<!-- 
MADE BY Pallavi Kande

THIS PAGE IS FOR TRANSACTION OF MONEY FROM ONE BANK ACCOUNT TO ANOTHER.
ON THIS PAGE,
user has to enter the account no of payer, payee and amount that needs to be transferred. 
Then click proceed to confirm transaction. If the transfer is successful then user will be shown details
of the two account else they will be shown errors. 
-->
<?php


//CONNECTING TO THE DATABASE
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "spark bank"; 
    
    $conn = new mysqli($servername, $username, $password, $dbname); 
    //IF CONNECTION IS NOT SUCCESSSFUL
    if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
    } 
?>
<!--HTML CODE STARTS -->
<html>
<head> 
    <title>Transaction Page</title>
    <style>
    body { 
               font-size:25px;
               background: white;
        }
    /* .transferMoney{
        color:white;
        background: #91c1c9;
        background: -webkit-linear-gradient(to bottom,  #91c1c9, #5e9da8 );
        background: linear-gradient(to bottom, #91c1c9, #3a5f66);
        padding: 50px;
        position:fixed;
        top:50%;
        left:50%;
        transform: translate(-50%, -50%);
    } */
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
        .table th { padding-top: 12px; padding-bottom: 12px; text-align:left; background-color: #333; color:white; }
 
    </style>   
    <script type="text/javascript">
    
        if(window.history.replaceState){
            
            window.history.replaceState(null, null, window.location.href); 
        }
       
    </script>
      
     
</head>
<!-- BODY-->
<body>
<!-- INCLUDING NAVBAR-->
<?php include('navbar.php'); ?>
<div class="container">
<!-- Creating Form to collect information related to do transaction-->
<h1>Transfer Money</h1>
    <!-- Form's action attribute points to this page only-->
    <!-- Note: To redirect page to samee php write "php echo $_SERVER['PHP_SELF'];" in action attribute-->
    <form name="myForm" action="ResultPage.php"  onsubmit="return validateForm()" method="post">
    <!-- To structurise form it is put in a table--onsubmit="return validateForm()"-->
        <div class="form-group">
        <table class='table'>
        <!-- ROW 1 : PAYER ACCOUNT ID IS ASKED-->
        <tr class="form-group">
            <td>Payer Account No</td>
            <td><input class="form-group" type="number" name="payerID"  min=100 required><td>
        </tr>
        <!-- ROW 2 : PAYEE ACCOUNT ID IS ASKED-->
        <tr class="form-group">
            <td>Payee Account No</td>
            <td><input class="form-group" type="number" name="payeeID" min=100 required ><td>
        </tr>
        <!-- ROW 3 : AMOUNT TO BE TRANSFERRED IS ASKED-->
        <tr class="form-group">
            <td>Amount (in Rupees)</td>
            <td><input class="form-group" type="number" name="amount" min=1 required><td>
        </tr>
        <!-- ROW 4 : BUTTON TO ASK TO CONFIRM TRANSACTION-->
        <tr class="form-group">
            <td><input type= "hidden" name= "form_submitted" value="1"></td>
            <td> <input class="form-group" type="submit" value="PROCEED"><td>
        </tr>
       
        </table>
        </div>
    </form>
</div>
 <!-- FORM / TABLE ENDS HERE WITH DIV TAG-->
 <script>
 
 function validateForm() {
            var x = document.forms["myForm"]["payerID"].value;
            var y = document.forms["myForm"]["payeeID"].value;
            var z = document.forms["myForm"]["amount"].value;
            var regex=/^[0-9]+$/;

            
            if (x == "" || y=="" || z=="") {
                alert("Fill it!!");
                return false;
            }

            //var num = z>0?1:-1;
            if((Math.sign(z)==-1)||(Math.sign(z)==-0)||z==0){
                alert("Enter a valid amount to do transaction");
                return false;
            }
            if(isNaN(z)|| !x.match(regex)|| !y.match(regex) ||!z.match(regex)){
                alert("Enter correct input!");
                return false;
            }
            
           // var data = <?php //echo json_encode("42", JSON_HEX_TAG); ?>;
        }
            
 </script>
</body>
</html>
<!--HTML CODE ENDS HERE-->
<!--MADE BY Pallavi Kande-->
