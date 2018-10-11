<?php
	if (isset($_POST['key'])) {

		$conn = new mysqli('127.0.0.1:3308', 'root', '', 'php');

		if ($_POST['key'] == 'getExistingData') {
			$start = $conn->real_escape_string($_POST['start']);
			$limit = $conn->real_escape_string($_POST['limit']);

			$sql = $conn->query("SELECT products.id,products.description, products.price,products.startingInventory,products.minRequired,IFNULL(SUM(sales.NumberOfSale),0) as NumberOfSale,sales.ProductID
            FROM products
            LEFT JOIN sales
            ON products.id = sales.ProductID
        GROUP By id LIMIT $start, $limit");
			if ($sql->num_rows > 0) {
				$response = "";
				while($data = $sql->fetch_array()) {
					$response .= '
						<tr>
							<td>'.$data["id"].'</td>
							<td>'.$data["description"].'</td>
                            <td>'.$data["price"].'</td>
                            <td>'.$data["startingInventory"].'</td>
                            <td></td>
                            <td>'.$data["NumberOfSale"].'</td>
                            <td></td>
                            <td>'.$data["minRequired"].'</td>
                        </tr>
					';
				}
				exit($response);
			} else
				exit('reachedMax');
		}

		$description = $conn->real_escape_string($_POST['description']);
		$price = $conn->real_escape_string($_POST['price']);
		$startingInventory = $conn->real_escape_string($_POST['startingInventory']);
        $minRequired  = $conn->real_escape_string($_POST['minRequired']);
		if ($_POST['key'] == 'addNew') {

				$conn->query("INSERT INTO `products`(`description`,`price`,`minRequired`,`startingInventory`) VALUE ('$description','$price','$startingInventory','$minRequired')");
				exit('New Sale Has Been Inserted!');
		
		}
	}
?>