<?php 
include 'ft.php';

?>
 <div class="sidebar">
    <div class="container" style="text-align: center;">
    <form action="search.php" method="post">
    <input type="text" name="search" placeholder="Search Movie" class="form-control" style="width: 70%;">
    <button name="submit" class="btn btn-" style="float:right; margin-top: -37px; background-color:#726297; color:#fff;">Submit</button>
  </form>
    </div>
    <div class="contanter" id="lp">
      <div class="latestpost">
        <?php 
        $query0 = "Select * from movie ORDER BY mv_name DESC limit 4";
        $run = mysqli_query($con,$query0);
        if($run){
          while($row0 = mysqli_fetch_assoc($run)){
            ?>
            <ul>
              <li>
                <?php
                $id = $row0['id'];
                $cal1 = (($id*123456789*54321)/956783);
                 $url1 = "play.php?id=".urldecode(base64_encode($cal1));
                ?>
                <a class="nav-link" id="a" href="<?php echo $url1; ?>"><?php echo$row0['mv_name'];?></a>
                
              </li>
            </ul>
            <?php
          }
        }
        ?>
      </div>
    </div>
    <div class="ads" style="text-align: center;margin-left: 20px;margin-top:20px;">
        <h1>ads</h1>
    </div>
  
</div>
