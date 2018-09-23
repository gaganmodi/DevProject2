<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sale</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

    <div class="container" style="margin-top: 30px;">

        <div id="tableManager" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Add New Sale</h2>
                    </div>

                    <div class="modal-body">
                       Product ID:
                        <input type="number" class="form-control" placeholder="Product ID" id="ProductID"><br>
                        Date Of Sale:
                        <input type="date" class="form-control" placeholder="Date of sale" id="SaleDate"><br>
                        Number Of Sale:
                        <input type="number" class="form-control" placeholder="Number Of Sale" id="NumberOfSale"><br>

                    </div>

                    <div class="modal-footer">
                        <input type="button" onclick="manageData('addNew')" value="Save" class="btn btn-success">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Sales</h2>

                <input style="float: right" type="button" class="btn btn-success" id="addNew" value="Add New">
                <br><br>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Product ID</td>
                            <td>Date of Sale</td>
                            <td>Number Of Sale</td>
                            <td>Options</td>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#addNew").on('click', function () {
               $("#tableManager").modal('show');
            });

            getExistingData(0, 10);
        });

        function getExistingData(start, limit) {
            $.ajax({
                url: 'ajax.php',
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
                    }
                }
            });
        }

        function manageData(key) {
            var ProductID = $("#ProductID");
            var SaleDate = $("#SaleDate");
            var NumberOfSale = $("#NumberOfSale");

            if (isNotEmpty(ProductID) && isNotEmpty(SaleDate) && isNotEmpty(NumberOfSale)) {
                $.ajax({
                   url: 'ajax.php',
                   method: 'POST',
               //    dataType: 'text',
                   data: {
                       key: key,
                       ProductID: ProductID.val(),
                       SaleDate: SaleDate.val(),
                       NumberOfSale: NumberOfSale.val()
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