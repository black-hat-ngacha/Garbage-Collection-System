<?php
//require_once('createDB.php');
$con=mysqli_connect('localhost','root','','socko');

//create an instance of createDB
////$database=new createDB('ibiashara','products')

session_start();

if(isset($_POST['add']))
{

    $sent=0;
    $pay=0;

    $sent=$sent+$_POST['send_quantity'];
    $pay=$sent*$_POST['hidden_price'];
//print_r($_POST['product_id']);
if(isset($_SESSION['cart']))
{

    $item_array_id=array_column($_SESSION['cart'], "product_id");

   // print_r($item_array_id);

   if(in_array($_POST['product_id'], $item_array_id))
   {
       echo '<script>alert("product already in the cart")</script>';
       echo "<script>window.location='index.php'</script>";
   }
   else{

  $count=count($_SESSION['cart']);

  $item_array= array(
    'product_id'=> $_POST['product_id']
);

  $_SESSION['cart'][$count]=$item_array;
$_SESSION['pay']=$pay;
$_SESSION['sent']=$sent;
  //print_r($_SESSION['cart']);

   }
   // print_r($_SESSION['cart']);

}
else{
    $item_array= array(
        'product_id'=> $_POST['product_id']
    );

    $_SESSION['cart'][0]=$item_array;

    //print_r($_SESSION['cart']);
}
}
?>

<doctype html>
    <html>
 <head>
 <title>Trash dashboard</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="webtools/boot/css/styles.css" rel="stylesheet" />
 <link href="webtools/boot/css/bootstrap.css" rel="stylesheet" />
 <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
 <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css" />
 <link href="style.css" rel="stylesheet"/>
 <link href="css/stylel.css" rel="stylesheet"/>
 <link href="styling.css" rel="stylesheet"/>
 <script src="webtools/boot/js/bootstrap.js"></script>
 <script src="webtools/boot/js/scripts.js"></script>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
 
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
 <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

 <style>

 form .input-group .form-control{
 
 border-radius:5rem;
 height:2.5rem;
 width:50.5rem;
}

 </style>
</head>
</body class="sb-nav-fixed">





<?php
require('header.php');
?>
<hr>
<p style="font-family:sans-serrif; font-size:18px"><a class="nav-link bg-light"href="" ><center>categories:  bottles || paper bags || Garbage || kitchen refuse || scrap Metals || Recycle products</center> </a></p>
<hr>
<div class="container">

<div class="row">




<?php

$sql="SELECT * FROM trash";

$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result) > 0)
{
    while($row=mysqli_fetch_array($result))
    {
?>
<div class="cards-container col-md-4 col-sm-6 col-lg-3" >
<form action='' method='post'>
<div class="card">
<div class="card-title">
<?php
 echo "<div id='img-div'>";
 echo "<img src='trash/".$row['image']."' class='img-fluid mb-2'>";
 echo " </div>";

?>
</div>
<div class="card-body">

<p><h5>Category:<div style="color:green"> <?php echo $row['trash_categories'];?></div></h5></p>
<p><h5><?php echo $row['trash_name'];?></h5></p>
<p>price per Kg: <span>Ksh<?php echo $row['trash_prices']?></span></p>
<p style="color:red">Quantity required <?php echo $row['quantity']?> Kgs</p>
<input type="number" name="send_quantity" placeholder="quantity to post in KGS" required/> 
<input type="hidden" name="hidden_name" value="<?php echo $row["trash_name"]; ?>"/>
 <input type="hidden" name="hidden_price" value="<?php echo $row["trash_prices"]; ?>"/>
<button class="btn btn-success" name="add">Send to Socko cart <i class="fas fa-shopping-cart"></i></button>
<input type="hidden" name="product_id" value="<?php echo $row["trash_id"]; ?>"/>
</div>
</div>
</form>
</div>
<?php
   }
}
?>



</div>
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