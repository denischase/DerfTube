<?php
if(isset($_POST['submit'])){
    $user = $_POST['uname'];
    $pwd = $_POST['pwd'];
    
    $query = "Select * from admin where uname = '$user' and pwd = '$pwd'";
    $run = mysqli_query($con,$query);
    
    if (mysqli_num_rows($run)>0){
        while ($row = mysqli_fetch_assoc($run)){
            if(password_verify($pwd,$row['pwd'])){
                $_SESSION['loginsuccessfull'] = 1;
                echo "<script>alert('log in Successfull');</script>";
                 header('location:index.php');
            }
        }
    }
    else
    {
        echo "<script>alert('log in Unsuccessfull');</script>";
    }
}
 
if (!mysqli_query($con, $query))
{
echo ("Error description: " . mysqli_error($con));
}else{echo "submit";}
