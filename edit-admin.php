<?php 
  require_once('Connection/conn.php'); 
  include('includes/inc_security.php'); 

  $sql="SELECT tbl_admin.first_name, tbl_admin.last_name, tbl_admin.middle_name, tbl_admin.user_name, tbl_admin.password, tbl_admin.id, tbl_position.Position
  FROM tbl_admin
  INNER JOIN tbl_position ON tbl_position.id = tbl_admin.position
  WHERE tbl_admin.id = '$_POST[adID]'";

  $q = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($q);
?>
<!-- header -->
<?php include('includes/inc_header.php'); ?>
<!-- navigation bar -->
<?php require_once('includes/inc_nav.php'); ?>

<!-- restrict numeric on textbox (firstname, lastname, middlename) -->
<script type="text/javascript">
  $(function () {
    $('#first_name').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var key = e.keyCode;
            if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                e.preventDefault();
            }
        }
    });
    $('#middle_name').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var key = e.keyCode;
            if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                e.preventDefault();
            }
        }
    });
    $('#last_name').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var key = e.keyCode;
            if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                e.preventDefault();
            }
        }
    });
  });
</script>

<div class="container">
  <!-- if the link has error message  -->
  <?php
    if(isset($_GET['_error_'])): ?>
      <div class="alert alert-danger">
      <strong>Danger!</strong> Usn are available in Database.
    </div>
    <?php endif;
  ?>
  <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Admin Information</h3>
        </div>
        <div class="panel-body">
          <form name="form1" method="post" action="process.php" enctype="multipart/form-data">
            <div class="form-group">
              <label>Upload Picture:</label>
              <input type="file" class="" name="imgupload" id="imgupload" required>
            </div>
            <div class="form-group">
              <label for="usn">USN:</label>
              <input type="text" class="form-control" name="usn" id="usn" value="<?= $row['user_name']?>" required>
            </div><div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password" id="password" value="<?= $row['password']?>" required>
            </div>
            <div class="form-group">
              <label for="middle_name">First name:</label>
              <input type="text" class="form-control" name="first_name" id="first_name" value="<?= $row['first_name']?>" required>
            </div>
            <div class="form-group">
              <label for="middle_name">Middle name:</label>
              <input type="text" class="form-control" name="middle_name" id="middle_name" value="<?= $row['middle_name']?>" required>
            </div>
            <div class="form-group">
              <label for="last_name">Last name:</label>
              <input type="text" class="form-control" name="last_name" id="last_name" value="<?= $row['last_name']?>" required>
            </div>
            <div class="form-group">
              <label for="user_level">User Level:</label>
              <select name="user_level" id="user_level" class="form-control" required>
                <option selected disabled value="">-- Selected User Level--</option>
                <?php 
                    $query = "select * from tbl_userlevel";
                    $result = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<option value=".$row['id']."> ".$row['label']." </option> ";
                    }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="position">Position :</label>
              <select name="position" id="position" class="form-control" required>
                <option selected disabled value="">-- Selected Year Level--</option>
                <?php 
                    $query = "select * from tbl_position where status = 1";
                    $result = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<option value=".$row['id']."> ".$row['Position']." </option> ";
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
            <input name="adID" type="hidden" id="adID" value="<?= $_POST['adID'] ?>"></td>
            <a href="admin_list.php" class="btn btn-info" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> BACK </a>
            <input name="btnEditAdmin" type="submit" class="btn btn-primary" id="btnEditAdmin" value="Update Admin">
          </form>
        </div>
  </div>
</div>


<!-- footer part -->
<?php require_once('includes/inc_footer.php'); ?>