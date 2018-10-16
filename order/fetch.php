<?php
  include '../conn.php';
  if(isset($_POST["action"])) {
    $output = '';
    if($_POST["action"] == "item_name") {
      $query = "SELECT item_id FROM `PHPInventory` WHERE item_name = '".$_POST["query"]."' ";
      $result = @mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($result))
      {
        $output .= '<option value="'.$row["item_id"].'" selected>'.$row["item_id"].'</option>';
      }
    }
    if($_POST["action"] == "staff_name") {
      $name = $_POST["query"];
      list($fname, $lname) = explode(" ", $name);
      $query = "SELECT staff_id FROM `PHPStaff` WHERE staff_fname = '".$fname."' AND staff_lname = '".$lname."' ";
      $result = @mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($result))
      {
        $output .= '<option value="'.$row["staff_id"].'" selected>'.$row["staff_id"].'</option>';
      }
    }
    echo $output;
  }
?>