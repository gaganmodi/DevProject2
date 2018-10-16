<?php
  include '../conn.php';
  $itemName ='';
  $query = "SELECT item_name FROM `PHPInventory` ORDER BY item_name ASC";
  $result = @mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result)) {
    $itemName .='<option value="'.$row["item_name"].'">'.$row["item_name"].'</option>';
  }
  $staffName='';
  $q2 = "SELECT staff_fname, staff_lname FROM PHPStaff";
  $result2 = @mysqli_query($conn, $q2);
  while($row = mysqli_fetch_array($result2)) {
    $staffName .='<option value="'.$row["staff_fname"].' '.$row["staff_lname"].'">'.$row["staff_fname"].' '.$row["staff_lname"].'</option>';
  }

  if(isset($_POST['done'])){
    $ProductID = $_POST['productID'];
    $SaleDate = $_POST['SaleDate'];
    $NumberOfSale = $_POST['NumberOfSale'];
    $StaffID = $_POST['staffID'];
    $q = "
      INSERT INTO PHPSales (ProductID, SaleDate, NumberOfSale, StaffID)
      VALUES ('$ProductID', '$SaleDate', '$NumberOfSale', '$StaffID')
    ";
    $query = mysqli_query($conn,$q);
    header("Location: sale.php");
  }
?>   
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Add Sale</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
  </head>
  <body>
    <?php include '../header.php'; ?>
    <div class="container" style="margin-top: 30px;">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post">
            <div class="modal-body">
              <div class="card-header bg-info">
                <h1 class="text-white text-center"> Add New Sale </h1>
              </div>
              <br>
              <label>Product Name</label>
              <select class="form-control actionItem" name="item_name" id="item_name">
                <option value="">Select ProductName</option>
                <?php echo $itemName; ?>
              </select><br>
              <label>Product ID</label> 
              <select class="form-control" name="productID" id="productID">
                
              </select><br>
              <label>Date Of Sale </label>
              <input type="Date" name="SaleDate" class="form-control"> <br>
              <label>Number of Sale</label>
              <input type="text" name="NumberOfSale" class="form-control"> <br>
              <label>Registrar</label>
              <select class="form-control actionStaff" name="staff_name" id="staff_name">
                <option value="">Select Staff Member</option>
                <?php echo $staffName; ?>
              </select><br>
              <label>Staff ID</label> 
              <select class="form-control" name="staffID" id="staffID">
                
              </select><br>
              <button class="btn btn-success" type="submit" name="done"> Submit </button>
            </div>
          </form>
        </div>
      </div>
      <?php include '../footer.php'; ?>
    </div>
  </body>
</html>
<script src="js/add.js" type="text/javascript"></script>