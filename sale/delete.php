<?php
  include '../conn.php';
  $id = $_GET['id'];
  $q = "DELETE FROM `PHPSales` WHERE id = $id ";
  mysqli_query($conn,$q);
  header("Location: sale.php");
?>