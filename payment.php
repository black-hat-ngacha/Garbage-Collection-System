<?php

require('server.php');

if(!isset($_SESSION))
{
session_start();
}
$user='';

if($_SESSION['username']){

$user=$_SESSION['username'];

}
else{
header("location:login.php");
}

$sql="SELECT* from customer where customer_username='$user'";

$result=mysqli_query($connect,$sql);


 while($row=mysqli_fetch_array($result))
{




?>

<html>
	<head>
	<title>Confirm order payment</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="webtools/boot/css/styles.css" rel="stylesheet" />
 <link href="webtools/boot/css/bootstrap.css" rel="stylesheet" />
 <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
 <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css" />
 <link href="css/style.css" rel="stylesheet"/>
 <link href="css/styles.css" rel="stylesheet"/>
 <link href="css/styling.css" rel="stylesheet"/>
 <script src="webtools/boot/js/bootstrap.js"></script>
 <script src="webtools/boot/js/scripts.js"></script>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<style>
body{
    background:grey;
}
</style>
</head>

</body class="sb-nav-fixed" style="background:maroon;">

	<div class="container" style="background:#fff; height:700px;">
		<h2 style="font-family:verdana; color: white; background:lightgreen;"><center>Transaction</center></h2>
		<h5 style="font-family:tahoma; color:orange;"> Thank you for choosing oue services <?php echo $user; ?></h5>
		<a href="cart.php" >Click Here to Go Back.</a> | <a href="logout.php">logout</a><br/>
		<br/><br/>

       

        <div class="card-header"><h3 class="text-center font-weight-light my-4">please enter the data</h3></div>
        <div class="card-body">
       <form action="checkout.php" method="post">
       
                                            
              <input type="hidden" name="customer_id" value="<?php echo $row['customer_id'];?>">    

              <?php
}
              ?>                              
       
         <div class="form-group">
        <label class="small mb-1" for="inputFirstName">Mode of payment</label>
         <select name="mode" id="">
        
         <option value="cash_on_deliverly">Cash on Delivery</option>
         </select>
         </div>

         <div class="form-group">
        <label class="small mb-1" for="inputFirstName">Enter your location </label>

         <input class="form-control py-4" id="inputFirstName" name="location" type="text" placeholder="Tigoni" />
         </div>

         <div class="form-group">
        <label class="small mb-1" for="inputFirstName">House/Apartment name </label>

         <input class="form-control py-4" id="inputFirstName" name="apartment" type="text" placeholder="Raha appartments" />
         </div>

         <div class="form-group">
        <label class="small mb-1" for="inputFirstName">Confirm the amount</label>
         <input class="form-control py-4" id="inputFirstName" name="amount" type="text" placeholder="$100, ksh: 20000/=" />
         </div>

         <div class="form-group">
        <label class="small mb-1" for="inputFirstName">Reference code (for cash on deliverly, insert for xs- xxxx)</label>
         <input class="form-control py-4" id="inputFirstName" name="transaction" type="text" placeholder="XXXXXXXXX" />
         </div>

			
			<input type="submit" name="pay" class="btn btn-success" value="complete transaction"/>
         
		</form>
        </div>
		<br/>
        <?php
            
       // }
    
            ?>


	

    <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; socko.com 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            </div>
	</body>
	
</html>
