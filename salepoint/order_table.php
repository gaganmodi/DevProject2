<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!--<link rel="stylesheet" type="text/css" href="css/style.css">-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>
  <?php

  $DBconnect = @mysqli_connect("feenix-mariadb.swin.edu.au", "s100590129","301196", "s100590129_db");
  $query = "SELECT * FROM PHPOrders ORDER BY id DESC";
  $result = mysqli_query($DBconnect, $query);

  ?>

  <div class="container">
    <header class="header">
      <a class="link-title" href="index.php">SalePoint</a>
    </header>
    <div class="main">
      <a href="sale.php" class="button">VIEW</a>
      <a href="manger.html" class="button">Report</a>
      <a href="add.php" class="button">ADD</a>
      <a href="edit.html" class="button">EDIT</a>
    </div>

    <?php

    echo'<table border=1px>';  // opening table tag
    echo'<th>Order Id</th><th>Order Product ID</th><th>Order quantity</th> <th> Order Cost</th><th>Order date</th><th>Order staff ID</th>'; //table headers
    while($data = mysqli_fetch_array($result))
    {
      // we are running a while loop to print all the rows in a table
      echo'<tr>'; // printing table row
      echo '<td>'.$data['OrderID'].'</td><td>'.$data['OrderProductID'].'</td><td>'.$data['OrderQuantity'].'</td><td>'.$data['OrderCost'].'</td><td>'.$data['OrderDate'].'</td><td>'.$data['OrderStaffID'].'</td>'; // we are looping all data to be printed till last row in the table
      echo '<td><input type="button" name="delete" value="delete"></td>';
    }

    echo'</tr>'; // closing table row
    echo '</table>';
    ?>


</html>

    <footer>
      &copy; 2018 SalePoint &nbsp; <span class="separator">|</span> Design by GROUP 03
    </footer>
   </div>
</body>
</html>
