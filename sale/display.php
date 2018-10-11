 
<!DOCTYPE html>
<html>
<head>
    <title></title>
    
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  
  
</head>
        
<body>
   
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#" style="font-size: 40px">SalePoint</a>
  
  <!-- Links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item" style="padding-right:200px">
      <a class="nav-link" href="../product/product.php" style="font-size: 20px">Current Stock</a>
    </li>
    <li class="nav-item" style="padding-right:200px">
      <a class="nav-link" href="../sale/display.php" style="font-size: 20px">Sales</a>
    </li>
    <li class="nav-item" style="padding-right:200px">
      <a class="nav-link" href="#" style="font-size: 20px">Reports</a>
    </li>
  </ul>
   <ul class="nav navbar-nav ml-auto">
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
</nav>
    
    <div class="container">
    <div class="col-lg-12">
        <br><br>
        
        <h1 class="text-info "> Sales </h1>

        <a style="float: right" href="addsale.php" class="btn btn-success" role="button">Add</a>
        <br>
        <table class="table table-striped table-hover table-boarder">
            
            <tr class="bg-dark text-white text-center">
                
                <th> ID </th>
                <th> Product ID </th>
                <th> Date Of Sale </th>
                <th> Number Of Sale </th>
                <th> Description </th>
                <th> Price </th>
                <th> Delete </th>
                <th> Edit </th>

            </tr>
<?php

include '../conn.php';


    
    $sql = "SELECT products.description, ((products.price * sales.NumberOfSale)) as price,sales.NumberOfSale,sales.id,sales.ProductID,sales.SaleDate
            FROM products
            INNER JOIN sales
            WHERE sales.ProductID = products.id";
    $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) > 0)
            {
           while($res = mysqli_fetch_array($result)){
    

?>

            <tr class="text-center">
                <td><?php echo $res['id']; ?> </td>
                <td><?php echo $res['ProductID']; ?> </td>
                <td><?php echo $res['SaleDate']; ?> </td>
                <td><?php echo $res['NumberOfSale']; ?> </td>
                <td><?php echo $res['description']; ?> </td>
                <td><?php echo $res['price']; ?> </td>
                <td><button class="btn-danger btn"> <a href="delete.php?id=<?php echo $res['id']; ?>" class="text-white"> Delete </a></button> </td>
                <td><button class="btn-primary btn"> <a href="edit.php?id=<?php echo $res['id']; ?>" class="text-white"> Edit </a></button> </td>
            </tr>

            <?php
                }
            }
            ?>
        </table>
        
    </div>
    </div>
    
</body>
</html>
