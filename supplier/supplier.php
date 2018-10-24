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
          <h2>Suppliers</h2>
          <br>
          <table class="table table-hover table-bordered">
            <thead>
              <tr class="bg-dark text-white text-center">
                <td> Supplier ID </td>
                <td> Supplier Name </td>
                <td> Product Name </td>
                <td> Quantity </td>
                <td> Add to order table </td>
              </tr>
            </thead>
            <tbody>
            <?php
              include '../conn.php';
              $sql = "
                SELECT supplierid, supplier_name, item_name, item_stock
                FROM PHPSuppliers
                INNER JOIN PHPInventory
                ON prodid = item_id
              ";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($res = mysqli_fetch_array($result)){
                  ?>
                  <tr class="text-center">
                    <td><?php echo $res['supplierid']; ?> </td>
                    <td><?php echo $res['supplier_name']; ?> </td>
                    <td><?php echo $res['item_name']; ?> </td>
                    <td><?php echo $res['item_stock']; ?> </td>
                    <td><button class="btn-success btn"> <a href="add.php?supplierid=<?php echo $res['supplierid']; ?>" class="text-white"> Add </a></button> </td>
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
