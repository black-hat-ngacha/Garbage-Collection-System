<?php
/*connecting to the server---working */
if(!isset($_SESSION))
{
session_start();
}

$connect=mysqli_connect('localhost','root','','socko');

$errors=array();

if(isset($_POST['register']))
{
    $first_name=strip_tags($_POST['fullnames']);//remove html tags
	$first_name=str_replace(' ','',$first_name);// remove spaces
	$first_name=ucfirst(strtolower($first_name));
    $_SESSION['fullnames']=$first_name;//stores first name in session variable

 

    $email=strip_tags($_POST['email']);//remove html tags
	$email=str_replace(' ','',$email);// remove spaces
	$email=ucfirst(strtolower($email));
    $_SESSION['email']=$email;//stores first name in session variable

   
    /*login table*/

  

    $password1=strip_tags($_POST['password']);//remove html tags
	$password1=str_replace(' ','',$password1);// remove spaces
    $password1=ucfirst(strtolower($password1));
    $_SESSION['password']=$password1;//stores first name in session variable
    
  $rank=$_POST['rank'];

  

 //sql comes here

 $sql="INSERT INTO `login`(`login_username`, `login_password`, `login_rank`) 
       VALUES ('$first_name','$password','$rank')";

$result=$connect->query($sql);

 if($result)
 {

    $login=$connect->insert_id;

    $sql="INSERT INTO `customer`(`customer_username`, `customer_email`, `customer_login_id`)
          VALUES ('$first_name','$email','$login')";

$result=$connect->query($sql);
 
    
      if($result)  
      {               
           // $_SESSION['username']= $first_name;
           // $_SESSION['success']="you are now logged in";
            header('location: index.php');//redirects to homepage

      }
      else{
        header('location: register.php');//redirects to homepage 
      }

}
}



/*login to the system */

if(isset($_POST['login'])){

    
	$username=strip_tags($_POST['username']);//remove html tags
	$username=str_replace(' ','',$username);// remove spaces
	$username=ucfirst(strtolower($username));
    $_SESSION['username']=$username;//stores first name in session variable
    
    
	$password=strip_tags($_POST['password']);//remove html tags
	$password=str_replace(' ','',$password);// remove spaces
	$password=ucfirst(strtolower($password));
    $_SESSION['password']=$password;//stores first name in session variable
    
     
    if(empty($username)){
        array_push($errors,"username is required");
    }
    if(empty($password)){
        array_push($errors,"password is required");
    }
    

    if(count($errors)==0){

        //$password=hash('sha256',$password);

        $query="SELECT * FROM login WHERE login_username='$username' AND login_password='$password'";
        
        $result= mysqli_query($connect, $query);

        if(mysqli_num_rows($result) >  0){
             
          //  mysqli_query($db,$query);

            $_SESSION['username']= $username;
            $_SESSION['success']= "you are now logged in";
            header('location: index.php');//redirects to homepage

        }
        if(mysqli_num_rows($result)<=0)
        {
            array_push($errors,"the username/password combination is wrong");
      
            header('location: login.php');
        }
        
    }
   
    

}
//logout

//logout
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location:login.php');
}


?>