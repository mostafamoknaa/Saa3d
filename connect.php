<?php
$server="localhost";
$user="root";
$pass="12345";
$database="project";

$con=new mysqli($server,$user,$pass,$database);
if(!$con){
    echo "error";
}

?>