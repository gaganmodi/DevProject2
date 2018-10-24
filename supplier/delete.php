<?php
  include '../conn.php';
  $OrderID = $_GET['OrderID'];
  $q = "DELETE FROM `PHPOrders` WHERE OrderID = $OrderID ";
  mysqli_query($conn,$q);
  header("Location: order.php");
?>