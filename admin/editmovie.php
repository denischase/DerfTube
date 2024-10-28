<?php

include 'db.php';
include 'header.php';
include 'ft.php';
?>
<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "SELECT * FROM movie where id = $id";
  $run = mysqli_query($con, $query);
  if ($run) {
    while ($row = mysqli_fetch_assoc($run)) {
?>
  <div class="content">
      <div class="container">
        <div class="jumbotron">
          <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">

              <input type="text" value="<?php echo $row['mv_name']; ?>" name="mv_name" class="form-control" placeholder="Enter Movie Name">
            </div>
            <div class="form-group">

              <input type="text" value="<?php echo $row['meta_description']; ?>" name="mv_m_desc" class="form-control" placeholder="Enter meta description">
            </div>
            <div class="form-group">

              <input type="text" value="<?php echo $row['mv_tag']; ?>" name="mv_m_tag" class="form-control" placeholder="Enter Meta Tags">
            </div>
            <div class="form-group">

              <input type="text" value="<?php echo $row['link1']; ?>" name="mv_link1" class="form-control" placeholder="Enter Link 1">
            </div>
            <div class="form-group">

              <input type="text" value="<?php echo $row['link2']; ?>" name="mv_link2" class="form-control" placeholder="Enter Link 2">
            </div>
            <div class="form-group">

              <input type="date" value="<?php echo $row['date']; ?>" name="mv_date" class="form-control" placeholder="Enter Date">
            </div>
            <div class="form-group">

              <input type="text" value="<?php echo $row['lang']; ?>" name="mv_lang" class="form-control" placeholder="Enter Movie Language">
            </div>
            <div class="form-group">

              <input type="text" value="<?php echo $row['director']; ?>" name="mv_director" class="form-control" placeholder="Enter Movie Director">
            </div>
            <div class="form-group">

              <input type="text" value="<?php echo $row['cat_id']; ?>" name="cat_id" class="form-control" placeholder="Enter Category ID">
            </div>
            <div class="form-group">

              <input type="text" value="<?php echo $row['genre_id']; ?>" name="genre_id" class="form-control" placeholder="Enter Genre ID">
            </div>
            <div class="custom-file">
              <input type="file" name="img" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
              <img src="<?php echo "../thumb/" . $row['img']; ?>" height="100px">
              <input type="hidden" value="<?php echo $row['img']; ?>" name="old_img">
            </div>
            <br>
            <br>
            <br>
            <div class="form-group">
              <input type="text" value="<?php echo $row['mv_des']; ?>" name="mv_desc" class="form-control" placeholder="Enter Movie description" rows="4">

            </div>

            <button type="submit" name="submit" class="btn btn-info btn-lg">Submit</button>
          </form>
        </div>
      </div>
      </div>  
      <?php

      if (isset($_POST['submit'])) {
        $mv_name = $_POST['mv_name'];
        $mv_m_desc = $_POST['mv_m_desc'];
        $mv_m_tag = $_POST['mv_m_tag'];
        $mv_link1 = $_POST['mv_link1'];
        $mv_link2 = $_POST['mv_link2'];
        $mv_lang = $_POST['mv_lang'];
        $cat_id = $_POST['cat_id'];
        $genre_id = $_POST['genre_id'];
        $mv_desc = $_POST['mv_desc'];
        $mv_director = $_POST['mv_director'];

        $mv_date = date('Y-m-d', strtotime($_POST['mv_date']));
        $target = "../thumb/" . basename($_FILES['img']['name']);
        $newimg = $_FILES['img']['name'];
        $old_img = $_POST['old_img'];

        if ($newimg != '') {
          $update_filename = $newimg;
        } else {
          $update_filename = $old_img;
        }
        if ($_FILES['img']['name'] != '') {
          if (file_exists("../thumb/" . $newimg)) {
            $filename = $newimg;
            echo "<script>alert('Image Already Added.. :)');window.location.href='editmovie.php'</script>";
            }else {
              $query1 = "UPDATE `movie` SET `cat_id`=$cat_id,`genre_id`=$genre_id,`mv_name`='$mv_name',`mv_des`='$mv_desc',`mv_tag`='$mv_m_tag',`link1`='$mv_link1'
        ,`link2`='$mv_link2',`img`='$update_filename',`date`='$mv_date',`lang`='$mv_lang',`director`='$mv_director',`meta_description`='$mv_m_desc' WHERE id=$id";
              $qr = mysqli_query($con, $query1);
              if ($qr) {
                if ($newimg != '') {
                  if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
                    echo "<script>alert('Movie Has Been Updated.. :)');window.location.href='movielist.php'</script>";
                    unlink("../thumb/".$old_img);
                  } else {
                    echo "<script>alert('Something went wrong');window.location.href='editmovie.php'</script>";
                  }
                }
              }
            }  
          } //else {
           // $query1 = "UPDATE `movie` SET `cat_id`=$cat_id,`genre_id`=$genre_id,`mv_name`='$mv_name',`mv_des`='$mv_desc',`mv_tag`='$mv_m_tag',`link1`='$mv_link1'
     // ,`link2`='$mv_link2',`img`='$update_filename',`date`='$mv_date',`lang`='$mv_lang',`director`='$mv_director',`meta_description`='$mv_m_desc' WHERE id=$id";
            //$qr = mysqli_query($con, $query1);
            //if ($qr) {
             // if ($newimg != '') {
                //if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
                 // echo "<script>alert('Movie Has Been Updated.. :)');window.location.href='movielist.php'</script>";
               // } else {
                 // echo "<script>alert('Something went wrong');window.location.href='editmovie.php'</script>";
               // }
             // }
           // }
         // }
        
      }
      ?>
<?php
    }
  }
} else {
  header('location:movielist.php');
}
?>