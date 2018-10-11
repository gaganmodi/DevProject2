<?php
include '../conn.php';

$id = $_GET['id'];


$q = "DELETE FROM `sales` WHERE id = $id ";

mysqli_query($con,$q);

 header("Location: http://localhost:8080/salepoint/display.php");




?>