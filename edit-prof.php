<?php 
  require_once('Connection/conn.php'); 
  include('includes/inc_security.php'); 

  $sql="SELECT tbl_professors.name, tbl_department.label, tbl_professors.id
  FROM tbl_professors
  INNER JOIN tbl_department ON tbl_department.id = tbl_professors.department 
  WHERE tbl_professors.id = '$_POST[pID]'";
  $q = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($q);
?>
<!-- header -->
<?php include('includes/inc_header.php'); ?>
<!-- navigation bar -->
<?php require_once('includes/inc_nav.php'); ?>

<div class="container">
  <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Professor Information</h3>
        </div>
        <div class="panel-body">
          <form name="form1" method="post" action="process.php" enctype="multipart/form-data"> 
           <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" id="name" value="<?= $row['name']?>" required>
            </div>
            <div class="form-group">
              <label for="dept">Department: </label>
              <select name="department" id="department" class="form-control" required>
                <option selected disabled value="">-- Selected Department--</option>
                <?php 
                    $query = "select * from tbl_department where status = 1";
                    $result = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<option value=".$row['id']."> ".$row['label']." </option> ";
                    }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="status">Status:</label>
              <select name="status" id="status" class="form-control" value="<?= $row['status'] ?>" required>
                <option selected disabled value="">-- Selected Status--</option>
                <?php 
                    $query = "select * from status";
                    $result = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<option value=".$row['id']."> ".$row['label']." </option> ";
                    }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Upload Picture:</label>
              <input type="file" class="" name="imgupload" id="imgupload" required>
            </div>
            <input name="pID" type="hidden" id="pID" value="<?= $_POST['pID'] ?>"></td>
            <a href="v_prof.php" class="btn btn-info" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> BACK </a>
            <input name="btnEditProf" type="submit" class="btn btn-primary" id="btnEditProf" value="Update Professor">
          </form>
        </div>
  </div>
</div>


<!-- footer part -->
<?php require_once('includes/inc_footer.php'); ?>