<?php 
  require '../conn.php';
  if (isset($_POST['export'])) {
    $start_date = date('Y-m-d', strtotime($_POST['start_date']));
    $end_date = date('Y-m-d', strtotime($_POST['end_date']));

    // Attempt select query execution
    $query = "
      SELECT item_name, item_price, item_stock, SaleDate, NumberOfSale, staff_fname, staff_lname 
      FROM PHPSales
      LEFT JOIN PHPInventory
      ON ProductID = item_id
      LEFT JOIN PHPStaff
      ON StaffID = staff_id
      WHERE SaleDate BETWEEN '$start_date' AND '$end_date'
    ";
    
    $sql = @mysqli_query($conn, $query)
    Or die ("<p>Unable to query the $TableName table.</p>"."<p>Error code ". mysqli_errno($conn). ": ".mysqli_error($conn)). "</p>";
    
    if(mysqli_num_rows($sql) > 0){
      $filename = "report_" . $start_date . "_to_" . $end_date . ".csv";
      
      // Create a file pointer
      $f = fopen('php://output', 'w');
      
      // Set column headers
      $fields = array('Product Name', 'Price', 'Quantity Sold', 'Total Sale Amount', 'Sale Date', 'Registrar');
      fputcsv($f, $fields);
      
      while($data = mysqli_fetch_array($sql)){
        $total_sale = intval($data['item_price']) * intval($data['NumberOfSale']);
        $staff_name = $data['staff_fname'] . " " . $data['staff_lname'];
        // Ouput each row of the data, format line as csv and write to file pointer
        $lineData = array($data['item_name'], $data['item_price'], $data['NumberOfSale'], $total_sale, $data['SaleDate'], $staff_name);
        fputcsv($f, $lineData);
      }
      header('Content-type: application/csv; charset=utf-8');
      header('Content-Disposition: attachment;filename="'.$filename.'"');
      // Output all remaining data on a file pointer
      fpassthru($f);
      
      // Free result set
      mysqli_free_result($sql);
      exit('');
    } else {
      exit('<p>No records matching your query were found.</p>');
    }
    mysqli_close($conn);
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
    <title>Reports</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
  </head>
  <body>
    <?php include '../header.php'; ?>
    <div class="container" style="margin-top: 30px;">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form method="post" action="">
            <div class="modal-body">
              <div class="card-header bg-info">
                <h1 class="text-white text-center"> Report Date Selector </h1>
              </div>
              <label for="startDate">Report Start Date:</label>
              <input type="date" name="start_date" id="startDate" class="form-control" /><br>
              <label for="endDate">Report End Date:</label>
              <input type="date" name="end_date" id="endDate" class="form-control" /><br>
              <input type="submit" value="Show Report" name="show" class="btn btn-success" />
              <input type="submit" value="Export Report to CSV" name="export" class="btn btn-success" />
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2>Products</h2>
          <table class="table table-hover table-bordered">
            <thead>
              <tr class="bg-dark text-white text-center">
                <td> Product Name </td>
                <td> Price </td>
                <td> Quantity Sold </td>
                <td> Total Sale Amount </td>
                <td> Sale Date </td>
                <td> Registrar </td>
              </tr>
            </thead>
            <tbody>
            <?php 
              require '../conn.php';
              if (isset($_POST['show'])) {
                $start_date = date('Y-m-d', strtotime($_POST['start_date']));
                $end_date = date('Y-m-d', strtotime($_POST['end_date']));

                // Attempt select query execution
                $query = "
                  SELECT item_name, item_price, item_stock, SaleDate, NumberOfSale, staff_fname, staff_lname 
                  FROM PHPSales
                  LEFT JOIN PHPInventory
                  ON ProductID = item_id
                  LEFT JOIN PHPStaff
                  ON StaffID = staff_id
                  WHERE SaleDate BETWEEN '$start_date' AND '$end_date'
                ";
                
                $sql = @mysqli_query($conn, $query)
                Or die ("<p>Unable to query the $TableName table.</p>"."<p>Error code ". mysqli_errno($conn). ": ".mysqli_error($conn)). "</p>";
                
                if(mysqli_num_rows($sql) > 0){
                  while($data = mysqli_fetch_array($sql)){
                    $total_sale = intval($data['item_price']) * intval($data['NumberOfSale']);
                    $staff_name = $data['staff_fname'] . " " . $data['staff_lname'];
                    echo "<tr>
                        <td>" . $data['item_name'] . "</td>
                        <td>" . $data['item_price'] . "</td>
                        <td>" . $data['NumberOfSale'] . "</td>
                        <td>" . $total_sale . "</td>
                        <td>" . $data['SaleDate'] . "</td>
                        <td>" . $staff_name . "</td>
                      </tr>
                    ";
                  }
                  // Free result set
                  mysqli_free_result($sql);
                } else {
                  exit('<p>No records matching your query were found.</p>');
                }

                // Close connection
                mysqli_close($conn);
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
