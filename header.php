<?php

include "../db/db.php"

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="keywords" content="movie website,,
movie websites,
free movie website,
13377x movie website,
go movie website,
best movie website,
movie websites online free,
free download movie website,
movie websites like soap2day,
new movie website download,
download hollywood movie website,
hindi movie website,
online movie website,
online free movie website,
movie website api,
movie website app,
movie website app download,
movie website all,
movie website apk,
movie website all list,
movie website anime,
movie websites at school,
movie addiction website,
movie and website,
all movie website,
asian movie website,
anime movie website">
  <meta name="author" content="Derfla">
  <link rel="shortcut icon" href="img/fav.png" type="image/png">
  <title>DerfTube</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><img src="img/LogoMakr-4IqF74.png" style="height: 50px; width:auto; max-width: 100%;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="disclaimer.php">Disclaimer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="privacy.php">Privacy Policy</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- contact  -->
  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Contact</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="valicontact.php" method="post">
            <input type="text" required name="username" placeholder="Enter Your Name" class="form-control">
            <br>
            <input type="text" required name="email" placeholder="Enter Your Mail" class="form-control">
            <br>
            <input type="text" required name="msg" placeholder="Type Your Message" class="form-control">
            <br>
            <button name="csub" value="submit" class="btn btn" style="background-color: #726297;color:#fff;">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

  <!-- second nav -->
  <div class="topnav" id="myTopnav">
    <a href="#home" class="active">Category</a>
    <?php
    $q1 = "Select * from category";
    $run = mysqli_query($con,$q1);
    if($run){
      while($row = mysqli_fetch_assoc($run)){
        ?>

        <?php 
        $id = $row['id'];
        $enc1 = (($id*123456789*54321)/956783);
        $url = "category.php?id=".urldecode(base64_encode($enc1));
        ?>
        <a href="<?php echo$url ?>"><?php echo $row['category_name']; ?></a>
        <?php
      }
    }
    ?>
    <a href="#news"></a>
    
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  <br>
  <!-- marq -->
  <?php 
  $q2 = "Select * from movie ORDER BY mv_name DESC limit 1";
  $r2 = mysqli_query($con,$q2);
  if($r2){
    while ($ro = mysqli_fetch_assoc($r2)){
      ?>
        <marquee style="background-color: #ccc;" onmouseover="this.stop();" onmouseout="this.start();"><a href="#"><?php echo $ro['mv_name']; ?></a></marquee>
      <?Php
    }
  }
  ?>
  

  <!-- third nav -->
  <div class="topnav1" id="myTopnav1">
    <a href="#home" class="active">Genre</a>
    <?php
    $query= "Select * from genre";
    $run = mysqli_query($con,$query);
    if($run){
      while($rows = mysqli_fetch_assoc($run)){
        ?>
          <?php 
        $id = $rows['id'];
        $enc1 = (($id*123456789*54321)/956783);
        $url = "genre.php?id=".urldecode(base64_encode($enc1));
        ?>
        <a href="<?php echo$url;?>"><?php echo $rows['genre_name']; ?></a>
        <?php
      }
    }
    ?>
    <a href="#news"></a>
    
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>

  <!-- sidebar -->
