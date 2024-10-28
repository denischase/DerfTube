<?php 

include 'header.php';
include 'ft.php';
include 'db.php';

?>


<?php



if (isset($_POST['submit'])) {
    $mv_name = $_POST['mv_name'];
    $mv_m_desc = $_POST['mv_m_desc'];
    $mv_m_tag = $_POST['mv_m_tag'];
    $mv_link1 = $_POST['mv_link1'];
    $mv_link2 = $_FILES['mv_link2']['name'];
    $mv_lang = $_POST['mv_lang'];
    $cat_id = $_POST['cat_id'];
    $genre_id = $_POST['genre_id'];
    $mv_desc = $_POST['mv_desc'];
    $mv_director= $_POST['mv_director'];
   
    $mv_date = date('Y-m-d',strtotime($_POST['mv_date']));
    $target = "../thumb/".basename($_FILES['img']['name']);
    $mvtarget= "../uploadvideos/". basename($_FILES['mv_link2']['name']);
    $img = $_FILES['img']['name'];

    $query = "INSERT INTO `movie`(`cat_id`, `genre_id`, `mv_name`, `mv_des`, `mv_tag`, `link1`, `link2`, `img`, `date`, `lang`, `director`, 
    `meta_description`) VALUES ($cat_id,$genre_id,'$mv_name','$mv_desc','$mv_m_tag','$mv_link1','$mv_link2','$img','$mv_date','$mv_lang','$mv_director','$mv_m_desc')";

    $run = mysqli_query($con,$query);
    if($run){
    if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){
        if(move_uploaded_file($_FILES['mv_link2']['tmp_name'], $mvtarget)){
        echo "<script>alert('Movie Has Been Added.. :)');window.location.href='movielist.php'</script>";
    }
    }
}
    else
    {
        echo "<script>alert('Something went wrong');window.location.href='addmovie.php'</script>";
    }
}

?>