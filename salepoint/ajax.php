<?php
	if (isset($_POST['key'])) {

		$conn = new mysqli('localhost', 'root', '', 'php');

		if ($_POST['key'] == 'getExistingData') {
			$start = $conn->real_escape_string($_POST['start']);
			$limit = $conn->real_escape_string($_POST['limit']);

			$sql = $conn->query("SELECT id, ProductID, SaleDate, NumberOfSale FROM sales LIMIT $start, $limit");
			if ($sql->num_rows > 0) {
				$response = "";
				while($data = $sql->fetch_array()) {
					$response .= '
						<tr>
							<td>'.$data["id"].'</td>
							<td>'.$data["ProductID"].'</td>
                            <td>'.$data["SaleDate"].'</td>
                            <td>'.$data["NumberOfSale"].'</td>
							<td>
								<input type="button" value="Edit" class="btn btn-primary">
								<input type="button" value="Delete" class="btn btn-danger">
							</td>
						</tr>
					';
				}
				exit($response);
			} else
				exit('reachedMax');
		}

		$ProductID = $conn->real_escape_string($_POST['ProductID']);
		$SaleDate = $conn->real_escape_string($_POST['SaleDate']);
		$NumberOfSale = $conn->real_escape_string($_POST['NumberOfSale']);

		if ($_POST['key'] == 'addNew') {

				$conn->query("INSERT INTO sales (ProductID, SaleDate, NumberOfSale) 
							VALUES ('$ProductID', '$SaleDate', '$NumberOfSale')");
				exit('New Sale Has Been Inserted!');
		
		}
	}
?>