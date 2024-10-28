<?php
include 'header.php';
include 'ft.php';
include 'db.php';
?>
<!-- table -->
<div class="content">
<div class="container">
    <div class="head" style="padding-top:10px;padding-bottom:10px;text-align:center;">
        <h1>Admin List</h1>
        <hr>
    </div>
<table class="table table-striped">
  <thead>
   
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Curd</th>
    </tr>
  </thead>
  <?php 
    $query = "SELECT * from admin";
    $run = mysqli_query($con,$query);
    if ($run) {
        while ($row = mysqli_fetch_assoc($run)){
            
   ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['uname']; ?></td>
      <td><pre>Password Encrypted</pre></td>
      <td><a class="btn btn-danger" href="deleteadmin.php?unameid=<?php echo $row['id']; ?>">Delete</a> <a class="btn btn-success" href="registeradmin.php">New Admin</a></td>
    </tr>
    <?php
}
}

?>
  </tbody>
</table>
</div>
</div>
<!-- table end -->