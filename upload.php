<?php
$con=mysqli_connect('localhost','root','','socko');

$msg="";
if(isset($_POST['upload']))
{
    $target="trash/".basename($_FILES['image']['name']);

    $image=$_FILES['image']['name'];
    $name=$_POST['name'];
    $category=$_POST['category'];
    $quantity=$_POST['product_quantity'];
    $price=$_POST['price'];
   

    // $sql="INSERT INTO products(product_name,product_image,product_manufacturer,product_description,product_number,product_price,discount)
    //  VALUES('$name','$image','$manufacturer','$description','$quantity','$price','$discount')";

     $sql="INSERT INTO `trash`(`trash_categories`, `trash_prices`, `image`, `trash_name`,`quantity`)
              VALUES ('$category','$price','$image','$name','$quantity')";
    mysqli_query($con,$sql);

    if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
    {
        $msg="file uploaded successfully";
    }
    else{
        $msg="file not uploaded, try again later";
    }
    echo $msg;
}

?>
<doctype html>
    <html>
 <head>
 <title>Set Trash Details</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="css/styles.css" rel="stylesheet" />
 <link href="css/bootstrap.css" rel="stylesheet" />
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
</head>
<</body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar bg" style="background-color: #4a15ab;">
           
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <a class="navbar-brand" href="index.html">socko.com</a>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
</nav>

<div class="container">
<!--<div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>-->


 <form action="#" method="post" enctype="multipart/form-data">
 <input type="hidden" value="" size="10000">

 <div>
 <input type="file" name="image" value="image">
 </div>
 
 <div>
 <input type="text" name="name" placeholder="Trash name">
 </div>

 <div>
 <select name="category" id="">
 <option value="garbage">garbage</option>
 <option value="recycle">Recycle Products</option>
 </select>
 </div>

 

 <div>
 <input type="text" name="product_quantity" placeholder="quantity required">
 </div>

 <div>
 <input type="text" name="price" placeholder="quote price">
 </div>

 
 <div>
 <button class="btn btn-success" name="upload">upload The Data</button>
 </div>
 </form>

 <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>


</body>
</html>