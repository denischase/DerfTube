<?php
include 'header.php';

?>
<div class="content">
    <!-- <div class="container"> -->
    <div class="row">
    <meta name="description" content="<?php echo$row['meta_description']; ?>">
    <title>DerfTube</title>
<?php 

$query = "SELECT * FROM movie";
$run = mysqli_query($con,$query);
if($run){
    while($row = mysqli_fetch_assoc($run)){
       ?>
       <div class="col">
       <div class="card" style="width: 18rem;text-align:center;">
  <img class="card-img-top" height="300px" width="100px" src="thumb/<?php echo$row['img'];?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo$row['mv_name']; ?></h5>
    <p class="card-text"><?php echo$row['director']."<br>".$row['date'];?></p>
    <?php 
    
    $id = $row['id'];
    $cal = (($id*123456789*54321)/956783);
    $url = "download.php?id=".urldecode(base64_encode($cal));

    $cal1 = (($id*123456789*54321)/956783);
    $url1 = "play.php?id=".urldecode(base64_encode($cal1));
    
    ?>
    
    <div class="row">
      <div class="col-7">
      <a href="<?php echo $url; ?>" class="btn btn" style="background-color:#726297; color:#fff;">Download</a>
      </div>
      <div class="col-3">
      <a href="<?php echo $url1; ?>"class="btn btn" style="background-color:#726297; color:#fff;">Play</a>
      </div>
    
    </div>
    
  </div>
</div>
       </div>
       <?php
    }
}

?>

</div>
</div>
<!-- </div> -->
<?php include 'sidebar.php'; include 'ft.php';?>