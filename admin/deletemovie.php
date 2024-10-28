<?php 
include 'header.php';
include 'ft.php';
include 'db.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query2 = "SELECT * FROM movie where id=$id";
$run1 = mysqli_query($con,$query2);
if($run1){
    while($row = mysqli_fetch_assoc($run1)){
        $name = $row['img'];
    $query = "DELETE FROM `movie` WHERE id = $id";
    $run = mysqli_query($con,$query);

    if ($run) {
        echo "<script>alert('Movie Has Been Deleted');window.location.href='movielist.php';</script>";
        unlink("../thumb/".$name);
    }else{
        echo "<script>alert('something went wrong');window.location.href='movielist.php';</script>";
    }

}
}
}else{
    header('location:movielist.php');
}



?>
