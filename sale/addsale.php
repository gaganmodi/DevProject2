<?php

include '../conn.php';
$description ='';
    $query = "SELECT description FROM `products` ORDER BY description ASC";
    $result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $description .='<option value="'.$row["description"].'">'.$row["description"].'</option>';
}
//$q2 = "SELECT product.id FROM `products` INNER JOIN `sales ON Product.id = sales.ProductID";
//    $result = mysqli_query($con,$q1);
//    $result2 = mysqli_query($con,$q2);


if(isset($_POST['done'])){
    
    $ProductID = $_POST['productID'];
    $SaleDate = $_POST['SaleDate'];
    $NumberOfSale = $_POST['NumberOfSale'];

   $q = " INSERT INTO `sales`(`ProductID`,`SaleDate`,`NumberOfSale`) VALUE ('$ProductID','$SaleDate','$NumberOfSale')";
    
       
   $query = mysqli_query($con,$q);
   header("Location: http://localhost:8080/salepoint/sale/display.php");
    

    
}
?>
       
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
   
   <br><br>
    
    <div class="col-lg-6 m-auto">
        
        <form method="post">
           
           <div class="modal-body">
               
               <div class="card-header bg-info">
                  <h1 class="text-white text-center"> Add New Sale </h1>
                   
               </div>
               <br>
               <label>Product Name</label>
               <select class="form-control action" name="description" id="description">
                <option value="">Select ProductName</option>
                <?php echo $description; ?>
               </select><br>
               
                <label>Product ID</label> 
               <select class="form-control" name="productID" id="productID">
               <option value="">Product ID</option>
               </select><br>
               
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

<script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "description")
   {
    result = 'productID';
   }
//   else
//   {
//    result = 'city';
//   }
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});
</script>