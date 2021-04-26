<?php
session_start();

if(isset($_SESSION['pay']))
{
$pay=$_SESSION['pay'];
}
else{
    $pay=0;
}

if(isset($_SESSION['sent']))
{
$sent=$_SESSION['sent'];
}
else{
    $sent=0;
}
require_once('createDB.php');

$db=new createDB('socko','trash');

if(isset($_POST['remove']))
{
   if($_GET['action']=='remove')
   {
       foreach($_SESSION['cart'] as $key => $value)
    {
        if($value['product_id']==$_GET['id'])
        {
            unset($_SESSION['cart'][$key]);
            unset($_SESSION['pay']);
            unset($_SESSION['sent']);
            echo "<script>alert('product successfully removed!')</script>";
            echo "<script>window.location='cart.php'</script>";
        }
    }
   }
}

?>

<doctype html>
    <html>
 <head>
 <title>The selling Cart</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="css/styles.css" rel="stylesheet" />
 <link href="css/bootstrap.css" rel="stylesheet" />
 <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
 <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css" />
 <link href="style.css" rel="stylesheet"/>
 <link href="css/stylel.css" rel="stylesheet"/>
 <link href="styling.css" rel="stylesheet"/>
 <script src="webtools/boot/js/bootstrap.js"></script>
 <script src="webtools/boot/js/scripts.js"></script>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
</head>
</body class="sb-nav-fixed">
<?php
require('header.php');
?>

<div class="container-fluid">
<div class="row px-5">
<div class="col-md-7">
<div class="shopping-cart">
<h6>My Cart</h6>
<hr>

<?php

$product_id=array_column($_SESSION['cart'], "product_id");



$result=$db->getData();
$total=0;

$sent=0;
while($row=mysqli_fetch_array($result))
{
    foreach($product_id as $id)
    {
        if($row['trash_id']==$id)
        {
?>
            <form action="cart.php?action=remove&id=<?php echo $row['trash_id'];?>" method="post" class="cart-items">
<div class="border rounded">
<div class="row bg-white">
<div class="col-md-3">

<?php
  echo "<div id='img-div'>";
  echo "<img src='trash/".$row['image']."' class='img-fluid mb-2'>";
  echo " </div>";

?>

</div>
<div class="col-md-6">
<h5 class="pt-2"><?php echo $row['trash_name'];?></h5>
<small class="text-secondary">seller: johny d developer..</small>
<h5 class="pt-2">Ksh<?php echo $pay?></h5>
<button type="submit" class="btn btn-warning">save for Later</button>
<button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button>
</div>
<div class="col-md-3 py-5">
<div>
<button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button>
<input type="text" value="<?php echo $sent; ?>" class="form-control w-25 d-inline">
<button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>
</div>
</div>
</div>
</div>
</form>


<?php
$total=$total+$row['trash_prices'];
//$sent=$_SESSION['sent'];
//$pay=$_SESSION['pay'];
        }
    }
}
?>


</div>
</div>
<div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

<div class="pt-4">
<h6 class="text-success bg-light"><center>Price Details</center></h6>
<hr>
<div class="row price-details">
<div class="col-md-6">
<?php
if(isset($_SESSION['cart']))
{
    $count=count($_SESSION['cart']);
     echo "<h6>Price ($count items)</h6>";
}
else{
    echo "<h6>Price (0 items)</h6>";
}
?>

<h6>Shipping Charges</h6>
<hr>
<h6>Amount Payable</h6>
<hr>
Quantity posted
<hr>
Total pay
<hr>
<h6>Continue Checkout</h6>
</div>
<div class="col-md-6">
<h6><?php echo "Ksh ".$total; ?></h6>
<h6 class="text-success">FREE</h6>
<hr>
<h6>
<?php
 echo "Ksh ".$total. " per item";
?>
</h6>
<hr>
<?php 


if(isset($_SESSION['sent']))
{
    
    echo $_SESSION['sent'];
}
else{
    echo "0";
}
?>
<hr>
<?php
if(isset($_SESSION['pay']))
{
    
     echo $_SESSION['pay'];
}
else{
    echo "0";
}
?>
<hr>
<form action="payment.php" method="POST">
<button class="btn btn-warning">Checkout</button>
</form>
</div>
</div>
</div>
</div>
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