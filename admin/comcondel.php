<?php 
include 'header.php';
include 'ft.php';
include 'db.php';
if(isset($_GET['id'])){


$id = $_GET['id'];
$query = "DELETE FROM `completecontact` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run) {
    echo "<script>alert('Request Has Been Deleted');window.location.href='complete.php';</script>";
}else{
    echo "<script>alert('something went wrong');window.location.href='complete.php';</script>";
}
}else{
    header("location:complete.php");
}
?>