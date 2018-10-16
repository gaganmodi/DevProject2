<?php
  include '../conn.php';
  if(isset($_POST['done'])){
    $id = $_GET['id'];
    $ProductID = $_POST['ProductID'];
    $SaleDate = $_POST['SaleDate'];
    $NumberOfSale = $_POST['NumberOfSale'];
    $StaffID = $_POST['StaffID'];
    $q = " UPDATE PHPSales SET id = $id, ProductID = '$ProductID', SaleDate = '$SaleDate', NumberOfSale = '$NumberOfSale', StaffID= '$StaffID' where id=$id ";
        
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
    <title>Edit Sale</title>
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
                <h1 class="text-white text-center"> Edit Sale </h1>
              </div>
              <br> 
              <label>Product ID</label>
              <input type="text" name="ProductID" class="form-control" value=<?php echo $_GET['ProductID'] ?>> <br>
              <label>Date Of Sale </label>
              <input type="Date" name="SaleDate" class="form-control" value=<?php echo $_GET['SaleDate'] ?>> <br>
              <label>Number of Sale</label>
              <input type="text" name="NumberOfSale" class="form-control" value=<?php echo $_GET['NumberOfSale'] ?>> <br>
              <label>Staff ID</label>
              <input type="number" name="StaffID" class="form-control" value=<?php echo $_GET['StaffID'] ?>> <br>
              <button class="btn btn-success" type="submit" name="done"> Submit </button>
            </div>
          </form>
        </div>
      </div>
      <?php include '../footer.php'; ?>
    </div>
  </body>
</html>