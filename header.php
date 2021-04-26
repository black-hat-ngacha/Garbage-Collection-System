<header id="header">




<nav style="background: silver; margin-top:2px; font-family:verdana; font-size:5px;" class="bg-success navbar navbar-expand-lg navbar-dark ">
<a href="index.php" class="navbar-brand">
<h3 style="color:orange;" class="px-5">
           <i class="fas fa-shopping-basket"></i> socko.com
         
           </h3>
</a>

<button class="navbar-toggler"
 type="submit"
 data-toggle="collapse"
 data-target="#navbarNavAltMarkup"
 aria-controls="navbarNavAltMarkup"
 aria-expanded="false"
 aria-label="toggle navigation"
>

<span class="navbar-toggler-icon"></span>
</button>


<div class="collapse navbar-collapse" id="navbarNavAltMarkup">

</div>
<div class="mr-auto">



  <a href="login.php" class="navbar-brand">
<h3 style="color:orange;" class="px-5">
           <i class="fas fa-sign-in-alt"></i> login
         
           </h3>
</a>


<div class="navbar-nav">
<a href="cart.php" class="nav-item nav-link active">

<h3 style="color:orange;" class="px-5 cart ">
           <i  class="fas fa-shopping-cart"></i> Cart 
          <?php
          if(isset($_SESSION['cart']))
          {
              $count=count($_SESSION['cart']);
              echo " <span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
          }
          else{
            echo " <span id=\"cart_count\"  class=\"text-success bg-light\">0</span>";
          }
          ?>
           </h3>

</a>

</div>
</div>
</nav>


</header>