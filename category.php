<?php 
include 'header.php';
include 'ft.php';
?>
<div class="content">
    <!-- <div class="container"> -->
    <div class="row">
<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
   // echo "This is full encrypted ID  ".$id."<br>";
foreach ($_GET as $key => $id){
   $data = $_GET['$key'] = base64_decode(urldecode($id));
  // echo "This is Decode with Base64  ".$data."<br>";
   $dec1 = ((($data*956783)/54321)/123456789);
  // echo "This is fully decrypt  ".$dec1."<br>";

  $query = "Select * from movie,category where category.category_id=movie.cat_id and category.category_id=$dec1";

  $run = mysqli_query($con,$query);
  if(mysqli_num_rows($run)>0){
    while ($row=mysqli_fetch_assoc($run)){
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
  else{
    echo "<h1>No Movie Found</h1>";
  }
}
    
}

?>
    </div>
</div>
<?php
include 'sidebar.php';

?>