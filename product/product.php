<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Sale</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    
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
      
      
       <div class="container">
<!--
      <header class="header">
          
          
          <a class="link-title" href="index.php">SalePoint</a>
        
      </header>
    
-->

    <div class="container" style="margin-top: 30px;">

        <div id="tableManager" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Add New Product</h2>
                    </div>

                    <div class="modal-body">
                      
                        Description:
                        <input type="text" class="form-control" placeholder="Description..." id="description"><br>
                        Price:
                        <input type="double" class="form-control" placeholder="Price..." id="price"><br>
                        Minimum Required:
                        <input type="number" class="form-control" placeholder="Minimum Required..." id="minRequired"><br>
                        Starting Inventory:
                        <input type="number" class="form-control" placeholder="Starting Inventory..." id="startingInventory"><br>
                        

                    </div>

                    <div class="modal-footer">
                        <input type="button" onclick="manageData('addNew')" value="Save" class="btn btn-success">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Products</h2>

                <input style="float: right" type="button" class="btn btn-success" id="addNew" value="Add New">
                
                <table class="table table-hover table-bordered">
                     <thead>


                
                        <tr class="bg-dark text-white text-center">
                            <td> Product ID </td>
                            <td> Description </td>
                            <td> Price </td>
                            <td> Starting Inventory</td>
                            <td> Inventory Purchase</td>
                            <td> Inventory Sold </td>
                            <td> Inventory On Hand</td>
                            <td> Minimum Required </td>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#addNew").on('click', function () {
               $("#tableManager").modal('show');
            });

            getExistingData(0, 10);
        });

        function getExistingData(start, limit) {
            $.ajax({
                url: 'insert.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    key: 'getExistingData',
                    start: start,
                    limit: limit
                }, success: function (response) {
                    if (response != "reachedMax") {
                        $('tbody').append(response);
                
                        start += limit;
                        getExistingData(start, limit);
                    } else
                        $(".table").DataTable();
                }
            });
        }

        function manageData(key) {
            var description = $("#description");
            var price = $("#price");
            var minRequired = $("#minRequired");
            var startingInventory = $("#startingInventory");

            if (isNotEmpty(description) && isNotEmpty(price) && isNotEmpty(minRequired) && isNotEmpty(startingInventory)) {
                $.ajax({
                   url: 'insert.php',
                   method: 'POST',
                  dataType: 'text',
                   data: {
                       key: key,
                       description: description.val(),
                       price: price.val(),
                       minRequired: minRequired.val(),
                       startingInventory: startingInventory.val()
                   }, success: function (response) {
                        alert(response);
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == '') {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }









    </script>
</body>
</html>