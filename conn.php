<?php

$con = mysqli_connect('127.0.0.1:3308', 'root', '', 'php');

mysqli_select_db($con,'php');

if($con){
    
}
else
{  
    echo "DB not Connected";
}

?>