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


<h2 align="right" style="margin-right:20px;"><a href="adminlogin.php">Admin Login</a></h2>

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
</html>