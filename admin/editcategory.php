<?php
include 'header.php';
include 'ft.php';
include 'db.php';
?>

<?php 

if (isset($_GET['id'])){
    $id=$_GET['id'];
    $catname = $_GET['catname'];
    $fk = $_GET['Forkey'];
    if(isset($_POST['submit'])){
       $cname = $_POST['categoryname'];
       $frky = $_POST['frky'];
       $pid = $_POST['pid'];

       $query = "UPDATE `category` SET `id`=$pid,`category_id`=$frky,`category_name`='$cname' WHERE  id=$id";
       $run = mysqli_query($con,$query);
       if($run){
        echo "<script>alert('Category Successfully Updated.. :)');window.location.href='categorylist.php'</script>";
       }else{
        echo "<script>alert('Something went wrong');window.location.href='editcategory.php'</script>";
       }
    }

}else{
    header('location:categorylist.php');
}

?>
<div class="content">
<div class="container">
    <div class="head" style="text-align: center; padding:10px 0px 10px 0px;">
        <h1>Edit Category</h1>
    </div>
    <hr>
    <form action="#" method="post">
  <div class="form-row">
    <div class="col-7">
        <small>Category Name</small>
      <input type="text" name="categoryname" class="form-control" value="<?php echo $catname;?>" placeholder="Category Name">
    </div>
    <div class="col">
        <small>Foreign Key</small>
      <input type="text" name="frky"  class="form-control" value="<?php echo $fk;?>" placeholder="Foreign Key">
    </div>
    <div class="col">
        <small>Primary ID</small>
      <input type="text" name="pid"  class="form-control" value="<?php echo $id;?>" placeholder="Primary ID">
    </div>
  </div>
  <br>
  <br>
  <input type="submit" class="btn btn-outline-success" name="submit">
</form>
</div>
</div>
