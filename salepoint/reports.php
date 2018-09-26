<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Reports</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/scripts.js"></script>
</head>
<body>
	<div class="container">
		<header class="header">
			<a class="link-title" href="index.php">SalePoint</a>
        </header>
		<nav class="menu">
			<a href="view.html" class="button">VIEW</a>
            <a href="add.html" class="button">ADD</a>
            <a href="edit.html" class="button">EDIT</a>
			<a href="reports.html" class="button">Reports</a>
        </nav>
		<div class="main">
            <form method="post" action="">
				<p>
					<label for="startDate">Report Start Date:</label>
					<input type="date" name="start_date" id="startDate">
				</p>
				<p>
					<label for="endDate">Report End Date:</label>
					<input type="date" name="end_date" id="endDate">
				</p>
				<input type="submit" value="Submit">
			</form>
        </div>
		<?php
			/* Attempt MySQL server connection. Assuming you are running MySQL
			server with default setting (user 'root' with no password) */
			$DBConnect = @mysqli_connect("feenix-mariadb.swin.edu.au", "s100590129","301196", "s100590129_db")
			Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";

			if ($_POST){
				$start_date = date('Y-m-d', strtotime($_POST['start_date']));
				$end_date = date('Y-m-d', strtotime($_POST['end_date']));

				// Attempt select query execution
				$SQLstring = "SELECT item_name, SaleDate, NumberOfSale, staff_fname, staff_lname  FROM PHPSales, PHPInventory, PHPStaff WHERE StaffID = staff_id AND ProductID = item_id AND SaleDate BETWEEN '$start_date' AND '$end_date'";
				
				$queryResult = @mysqli_query($DBConnect, $SQLstring)
				Or die ("<p>Unable to query the $TableName table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
				
				if(mysqli_num_rows($queryResult) > 0){
					echo "<table>";
						echo "<tr>";
							echo "<th>Item Name</th>";
							echo "<th>Sale Date</th>";
							echo "<th>Number of Sale</th>";
							echo "<th>Staff Name</th>";
						echo "</tr>";
					while($row = mysqli_fetch_array($queryResult)){
						echo "<tr>";
							echo "<td>" . $row['item_name'] . "</td>";
							echo "<td>" . $row['SaleDate'] . "</td>";
							echo "<td>" . $row['NumberOfSale'] . "</td>";
							echo "<td>" . $row['staff_fname'] . " " . $row['staff_lname'] . "</td>";
						echo "</tr>";
					}
					echo "</table>";
					// Free result set
					mysqli_free_result($queryResult);
				} else{
					echo "No records matching your query were found.";
				}
			}
			 
			// Close connection
			mysqli_close($DBConnect);
		?>
        <footer>
			&copy; 2030 SalePoint &nbsp; <span class="separator">|</span> Design by GROUP 03 
		</footer> 
       
       
   </div>
    
</body>
</html>