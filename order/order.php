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
    <title>Orders</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
  </head>
  <body>
    <?php include '../header.php'; ?>
    <div class="container" style="margin-top: 30px;">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2>Orders</h2>
          <a style="float: right" href="add.php" class="btn btn-success" role="button">Add</a>
          <br>
          <table class="table table-hover table-bordered">
            <thead>
              <tr class="bg-dark text-white text-center">
                <td> ID </td>
                <td> Product ID </td>
                <td> Product Name </td>
                <td> Quantity </td>
                <td> Cost </td>
                <td> Order Date </td>
                <td> Registrar </td>
                <td> Delete </td>
                <td> Edit </td>
              </tr>
            </thead>
            <tbody>
            <?php
              include '../conn.php';
              $sql = "
                SELECT OrderID, OrderProductID, item_name, OrderQuantity, OrderCost, OrderDate, OrderStaffID, staff_fname, staff_lname
                FROM PHPOrders
                INNER JOIN PHPInventory
                ON OrderProductID = item_id
                INNER JOIN PHPStaff
                ON OrderStaffID = staff_id
              ";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($res = mysqli_fetch_array($result)){
                  ?>
                  <tr class="text-center">
                    <td><?php echo $res['OrderID']; ?> </td>
                    <td><?php echo $res['OrderProductID']; ?> </td>
                    <td><?php echo $res['item_name']; ?> </td>
                    <td><?php echo $res['OrderQuantity']; ?> </td>
                    <td><?php echo $res['OrderCost']; ?> </td>
                    <td><?php echo $res['OrderDate']; ?> </td>
                    <td><?php echo $res['staff_fname'] . " " . $res['staff_lname']; ?> </td>
                    <td><button class="btn-danger btn"> <a href="delete.php?OrderID=<?php echo $res['OrderID']; ?>" class="text-white"> Delete </a></button> </td>
                    <td><button class="btn-primary btn"> <a href="edit.php?OrderID=<?php echo $res['OrderID'];?>&OrderProductID=<?php echo $res['OrderProductID'];?>&OrderQuantity=<?php echo $res['OrderQuantity'];?>&OrderCost=<?php echo $res['OrderCost'];?>&OrderDate=<?php echo $res['OrderDate'];?>&OrderStaffID=<?php echo $res['OrderStaffID']; ?>" class="text-white"> Edit </a></button> </td>
                  </tr>
                  <?php
                }
              }
            ?>
            </tbody>
          </table>
        
        </div>
      </div>
      <?php include '../footer.php'; ?>
    </div>
  </body>
</html>
