<?php
  $conn = @mysqli_connect("feenix-mariadb.swin.edu.au", "s100590129", "301196", "s100590129_db")
  Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";
?>