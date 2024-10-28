<?php 
include 'header.php';
include 'ft.php';

?>
<style>
    /*css video*/
  video{
    height: auto;
  width: 100%;
    
    align-items: center;
    
    justify-content: center;
    padding-left: 5%;
    
}

html{
        scroll-behavior: smooth;
    }
    #lbtn1{
        padding: 10px 20px;
    background-color: #726297;
    border: 1px solid #726297;
    text-decoration: none;
    color: #fff;
  }
  #lbtn2{
        padding: 10px 20px;
    background-color: none;
    
    text-decoration: none;
    color: #726297;
  }
  #lbtn1:hover{
    background-color: #fff;
    color: #726297;
    border-radius: 10px;
  }
  #lbtn2:hover{
    background-color: #726297;
    color: #fff;
    border-radius: 10px;
  }

</style>
<?php 
if(isset($_GET['id'])){
 $id = $_GET['id'];
 foreach ($_GET as $key => $id){
$dec = $_GET[$key] = base64_decode(urldecode($id));
$uncal = ((($dec*956783)/54321)/123456789);

$query = "SELECT * FROM movie where id=$uncal";
$run = mysqli_query($con,$query);
if($run){
     while($row = mysqli_fetch_assoc($run)){
        ?>
        <title><?php echo$row['mv_name'];?></title>
          <meta charset="UTF-8">
  <meta name="description" content="<?php echo$row['meta_description']; ?>">
  <meta name="keywords" content="<?php echo$row['mv_tag']; ?>">
  <meta name="author" content="Derfla">
        <div class="container text-center">
            <div class=" text-nowrap">
            <h2>Play <b><?php echo$row['mv_name']; ?></h2></b>
            </div>
            <?php
            $movie ="uploadvideos/".$row['link2'];
            


          //   echo '<video controls="controls" class="embed-responsive-item">
          // <source src="'.$url.'" type="video/mp4"> 
          // Your browser does not support the HTML5 Video element.
          // </video>
          // '; 
            ?>
            <div class="div">
            <video src="<?php echo $movie; ?>" controls></video>
            </div>
            <!-- <div class="embed-responsive embed-responsive-16by9">
            <video src="<?php //echo 'Not available yet'; ?>"></video>
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
            </div> -->
            <br>
            <br>
            <div class="row">
                <div class="col-3 text-nowrap">
            <div class="img">
                <img src="thumb/<?php echo$row['img'];?>" height="200px" width="150px" style="max-width: 100%;">
            </div>
            <div class="div">
            <h4><?php echo$row['mv_name']; ?></h4>
            </div>
            <br>
            <div id="but">
            <a href="#download" onclick="myfun()" class="btn btn" style="background-color:#726297; color:#fff;">Download</a>
            </div>
            </div>
            <div class="col-3 text-justify text-nowrap">
            <p>Movie Language:- <b><i><?php echo$row['lang']; ?></i></b></p>
                <p>Directed By <b><i><?php echo$row['director']; ?></i></b></p>
                <p>Release Date:- <b><i><?php echo$row['date']; ?></i></b></p>

            </div>
            </div>


            <br>
           <div class="row">
            <div class="container ">
                
                
                
                <div class="jumbotron">
                <p><?php echo$row['mv_des']; ?></p>
                </div>
                
            </div>
            </div>


            

            <div id="download" style="display: none;">
                <a id="lbtn1" href="<?php echo$row['link1'];?>">Download 1</a>
                <a id="lbtn2"href="<?php echo$row['link2'];?>">Download 2</a>
            </div>

        </div>
        <script>
            function myfun(show,hide){
                document.getElementById('download').style.display='block';
                document.getElementById('but').style.display='none';
            }
        </script>
        <?php
     }
}

}
}else{
    echo "<script>window.location.href='index.php';</script>";
}

?>

    <div class="container">
    <div class="row">
<?php 
if(isset($_GET['id'])){
   // $id1 = $_GET['id'];
   // foreach ($_GET as $key => $id1){
   //$dec1 = $_GET[$key] = base64_decode(urldecode($id1));
   //$uncal1 = ((($dec1*956783)/54321)/123456789);
   
 
 // $query1 = "Select * from movie,category where category.category_id=movie.cat_id and category.category_id=$uncal";
 //$query1 = "SELECT * FROM movie";
 //$query1 = "SELECT * FROM movie where cat_id=$uncal";
$query1 = "Select * from movie ORDER BY mv_name DESC limit 4";
//$query1 = "SELECT * FROM movie where cat_id=$uncal";
  
  //echo $uncal1;
 
  $run1 = mysqli_query($con,$query1);
  if(mysqli_num_rows($run1)>0){
    while ($row1=mysqli_fetch_assoc($run1)){
        
  ?>
  
  <div class="col-sm-3">
       <div class="card" style="width: 18rem;text-align:center;">
  <img class="card-img-top" height="300px" width="100px" src="thumb/<?php echo$row1['img'];?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo$row1['mv_name']; ?></h5>
    <p class="card-text"><?php echo$row1['director']."<br>".$row1['date'];?></p>
    <?php 
    
    $id = $row1['id'];
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
//}

?>

<!-- <div class="">
  <div class="row text-center" style="">
    <a class="btn btn-sm btn-outline-secondary " href=""><p>View More</p></a>
  </div>
</div>
<br> -->

    </div>
</div>
