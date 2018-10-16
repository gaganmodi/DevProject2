<?php 
  require '../conn.php';
	if (isset($_POST['key'])) {

		if ($_POST['key'] == 'getExistingData') {
			$limit = intval($_POST['limit']);

			$query = "
				SELECT item_id, item_name, item_price, startingInventory, minRequired, IFNULL(SUM(NumberOfSale),0) as NumberOfSale, IFNULL(SUM(OrderQuantity),0) as Quantity
				FROM PHPInventory
				LEFT JOIN PHPSales
				ON item_id = ProductID
				LEFT JOIN PHPOrders
				ON item_id = OrderProductID
				GROUP BY item_id
			";
			
			$sql = @mysqli_query($conn, $query)
			Or die ("<p>Unable to query the $TableName table.</p>"."<p>Error code ". mysqli_errno($conn). ": ".mysqli_error($conn)). "</p>";
			
			if ((mysqli_num_rows($sql) > 0) && (mysqli_num_rows($sql) < $limit)) {
				$response = "";
				while($data = mysqli_fetch_array($sql)) {
					$invOnHand = intval($data['startingInventory']) - intval($data['NumberOfSale']) + intval($data['Quantity']);
					$response .= "
						<tr>
							<td>" . $data['item_id'] . "</td>
							<td>" . $data['item_name'] . "</td>
              <td>" . $data['item_price'] . "</td>
              <td>" . $data['startingInventory'] . "</td>
              <td>" . $data['Quantity'] . "</td>
              <td>" . $data['NumberOfSale'] . "</td>
              <td>" . $invOnHand . "</td>
              <td>" . $data['minRequired'] . "</td>
            </tr>
					";
				}
        // Free result set
        mysqli_free_result($sql);
				exit($response);
			} else
				exit('reachedMax');
			
			mysqli_close($conn);
		}

		$itemName = mysqli_real_escape_string($conn, $_POST['itemName']);
		$itemCategory = mysqli_real_escape_string($conn, $_POST['itemCategory']);
		$price = mysqli_real_escape_string($conn, $_POST['price']);
		$startingInventory = mysqli_real_escape_string($conn, $_POST['startingInventory']);
        $minRequired  = mysqli_real_escape_string($conn, $_POST['minRequired']);
		$maxCapacity  = mysqli_real_escape_string($conn, $_POST['maxCapacity']);
		if ($_POST['key'] == 'addNew') {
				$query = "
					INSERT INTO PHPInventory (
						item_name, item_price, item_stock, item_maxcapacity, item_category, minRequired, startingInventory
					) 
					VALUES (
						'$itemName', '$price', '$startingInventory', '$maxCapacity', '$itemCategory', '$minRequired', '$startingInventory'
					)";
				$sql = @mysqli_query($conn, $query)
				Or die (mysqli_errno($conn). ": ".mysqli_error($conn));
				mysqli_close($conn);
				exit('New Sale Has Been Inserted!');
		
		}
	}
?>