<?php
session_start();
if(isset($_SESSION['uid']))
{
    header('location: product/product.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
<meta charset="utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css">

</head>
    <body>
      <h1 align="center">Welcome to SalePoint</h1><br>
       <h2 align="center">Login Here</h2>
       <form action="login.php" method="post">
           
           <table align="center">
               <tr>
                   <td>Username</td><td><input type="text" name="uname" required></td>
               </tr>
                <tr>
                   <td>Password</td><td><input type="password" name="pass" required></td>
               </tr>
                <tr>
                   <td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
               </tr>
           </table>
       </form>
        
        
        
    </body>    
</html>

<?php

include('conn.php');

if(isset($_POST['login']))
{
    
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    
    $qry = "SELECT * FROM `staff_login` WHERE `username` ='$username' AND `password`='$password'";
    
    $run = mysqli_query($con,$qry);
    $row = mysqli_num_rows($run);
    
    if($row<1)
    {
        ?>
        <script>
            alert('username or password not match !!');
            window.open('login.php','self');
        </script>
        <?php
    }
    else
        $data =mysqli_fetch_assoc($run);
        $id = $data['id'];
//        echo "id = ".$id;
    
    $_SESSION['uid'] =$id;
    header('location: product/product.php');
    
    
}

?>