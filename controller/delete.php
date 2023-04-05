<?php
include '../env.php';

$id=$_REQUEST['id'];

$query= "DELETE FROM addresses WHERE id='$id'";
//mysqli_query($dbconnect,$query);
$response=mysqli_query($dbconnect,$query);

if($response){
    header("Location: ../allmembers.php");
}
