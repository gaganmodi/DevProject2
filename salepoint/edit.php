<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <div class="container">
      <header class="header">
          
          
          <a class="link-title" href="index.php">SalePoint</a>
          
                    
      </header>
       
       <ul id="nav">
          <li><a class="active" href="#home">Display</a></li>
          <li><a href="#news">Add</a></li>
          <li><a href="#contact">Edit</a></li>
          <li><a href="#about">Delete</a></li>
        </ul>
  
   </div>
<?php
    $DBConnect = @mysqli_connect("feenix-mariadb.swin.edu.au", "s100590129","301196", "s100590129_db")
        Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";
    $SQLstring = "SELECT item_id, item_name, item_desc, item_normalprice, item_currentprice, item_cost, item_stock, item_stockorder, item_category  FROM PHPSales";
        $queryResult = @mysqli_query($DBConnect, $SQLstring)
        Or die ("<p>Unable to query the $TableName table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";

        echo "<h1>Product Table</h1>";
        echo "<table width='100%' border='1'>";
        echo "<th>Item ID</th><th>Item Name</th><th>Item Description</th><th>Retail Price</th><th>Current Price</th><th>Item Cost</th><th>Stock Level</th><th>Stock Order</th><th>Category</th>";
        $row = mysqli_fetch_row($queryResult);
  
        while ($row) 
        {
          echo "<tr><td>{$row[0]}</td>";
          echo "<td>{$row[1]}</td>";
          echo "<td>{$row[2]}</td>";
          echo "<td>{$row[3]}</td>";
          echo "<td>{$row[4]}</td>";
          echo "<td>{$row[5]}</td>";
          echo "<td>{$row[6]}</td>";
          echo "<td>{$row[7]}</td>";
          echo "<td>{$row[8]}</td></tr>";
          $row = mysqli_fetch_row($queryResult);
        } 
        echo "</table>";
        mysqli_close($DBConnect);
?>
</body>
</html>