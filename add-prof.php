<?php require_once('Connection/conn.php'); ?>

<?php include('includes/inc_security.php'); ?>

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
          <form action="process.php" method="post" enctype="multipart/form-data" name="form1">
            <!-- <label>Upload Picture:</label>
            <input type="file" class="" name="imgupload" id="imgupload"> -->
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group">
              <label for="dept">Department:</label>
              <select name="department" id="department" class="form-control" required>
                <option selected disabled>-- Selected Option--</option>
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
              <label>Upload Picture:</label>
              <input type="file" class="" name="imgupload" id="imgupload" required>
            </div>


            <input name="btnAddProf" type="submit" class="btn btn-primary" id="btnAddProf" value="Add Professor">
          </form>
        </div>
  </div>
</div>


<!-- footer part -->
<?php require_once('includes/inc_footer.php'); ?>