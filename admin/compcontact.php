<?php 

include 'db.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "Select * from contactus where id=$id";
    $r1 = mysqli_query($con,$sql);
    if($r1){
        while($row=mysqli_fetch_assoc($r1)){
            $name =  $row['uname'];
            $mail =  $row['mail'];
            $msg = $row['message'];

        $query = "INSERT INTO `completecontact`(`name`, `mail`, `message`) VALUES ('$name','$mail','$msg')";
        $run = mysqli_query($con,$query);
        if ($run){
            $q2 = "DELETE FROM `contactus` WHERE id = $id";
            $r2 = mysqli_query($con,$q2);
            if($r2){
                echo "<script>alert('Now, this will complete');window.location.href='contact.php'</script>";
            }else{
                echo "<script>alert('Something went wrong');window.location.href='contact.php'</script>";
            }
        }
    
    }
    }


}else{
    header('location:contact.php');
}

?>