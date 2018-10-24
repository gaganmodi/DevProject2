<?php
  include '../conn.php';
  $supplierid = $_GET['supplierid'];
  $q = "DELETE FROM `PHPOrders` WHERE OrderID = $OrderID ";
  mysqli_query($conn,$q);
  header("Location: supplier.php");
?>
