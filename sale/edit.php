<?php

include '../conn.php';

if(isset($_POST['done'])){
    
    $id = $_GET['id'];
    $ProductID = $_POST['ProductID'];
    $SaleDate = $_POST['SaleDate'];
    $NumberOfSale = $_POST['NumberOfSale'];

    $q = " update sales set id = $id,ProductID = '$ProductID', SaleDate = '$SaleDate',NumberOfSale = '$NumberOfSale'  where id=$id ";
        
    $query = mysqli_query($con,$q);
    header("Location: http://localhost:8080/salepoint/display.php");
    
}
?>
       
<!DOCTYPE html>
<html>
<head>
    <title></title>
    
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
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
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
</nav>
    <br><br>
    <div class="col-lg-6 m-auto">
        
        <form method="post">
           
           <div class="modal-body">
               
               <div class="card-header bg-secondary">
                  <h1 class="text-white"> Edit Sale </h1>
                 
               </div>
                <br> 
               <label>Product ID</label>
               <input type="text" name="ProductID" class="form-control"> <br>
               
               <label>Date Of Sale </label>
               <input type="Date" name="SaleDate" class="form-control"> <br>
               
               <label>Number of Sale</label>
               <input type="text" name="NumberOfSale" class="form-control"> <br>
               
               <button class="btn btn-success" type="submit" name="done"> Submit </button>
           </div>
            
            
        </form>
        
        
    </div>
    
</body>
</html>