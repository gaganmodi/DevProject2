<?php
//fetch.php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect('127.0.0.1:3308', 'root', '', 'php');
 $output = '';
 if($_POST["action"] == "description")
 {
  $query = "SELECT id FROM `products` WHERE description = '".$_POST["query"]."' ";
  $result = mysqli_query($connect, $query);
     
  $output .= '<option value="">Product ID</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["id"].'">'.$row["id"].'</option>';
  }
 }
 //if($_POST["action"] == "state")
// {
//  $query = "SELECT city FROM country_state_city WHERE state = '".$_POST["query"]."'";
//  $result = mysqli_query($connect, $query);
//  $output .= '<option value="">Select City</option>';
//  while($row = mysqli_fetch_array($result))
//  {
//   $output .= '<option value="'.$row["city"].'">'.$row["city"].'</option>';
//  }
// }
 echo $output;
}
?>