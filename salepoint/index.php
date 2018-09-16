<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SalePoint</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/scripts.js"></script>
</head>
<body>
      <header class="header">
          
          
          <a class="link-title" href="index.php">SalePoint</a>
          
                    
      </header>



<form action="login.php" method="post">
    
    
    <table align="center">
        <tr>
            <td>Username</td><td><input type="text" name="uname" required></td>
        </tr>
        <tr>
           
            <td>Password</td><td><input type="password" name="pass" required></td>
            
        </tr>
        <tr>
           
             <td calspan="2" align="center"><input type="submit" name="login" value="Login"></td>
            
        </tr>
        
        
    </table>
    
    
</form>
<!-- <form method="post" action="index.php">
<table style="width:30%;" align="center">
    <tr>
        <td colspan="2" align="center">Item Information</td>
        
    </tr>
    

    <tr>
        <td align="right">Enter ItemNo</td>
        <td><input type="text" name="itemno" required>
                
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" name="submit" value="Show info"> </td>
    </tr>
    
</table>

</form> -->

</body>
<?php
if(isset($_GET['uname']) && $_GET['uname']!=='' && isset($_GET['pass']) && $_GET['pass']!=='')
    {
        $uname = $_GET['uname'];
        $pass = $_GET['pass'];

        $DBConnect = @mysqli_connect("feenix-mariadb.swin.edu.au", "s100590129","301196", "s100590129_db")
        Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";

        $SQLstring = "SELECT staff_id, staff_pass FROM PHPStaff WHERE staff_id = '$uname' AND staff_pass = '$pass'";

        $queryResult = @mysqli_query($DBConnect, $SQLstring)
        Or die ("<p>Unable to query the $TableName table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";

        if (mysqli_num_rows($queryResult) > 0)
        {
            header("Location:main.php?cust=".$cust);
            exit;
        }
        else
        {
            echo "Username or Password are invalid!";
        }
    }
?>
</html>