<?php 
  require_once('Connection/conn.php'); 
  include('includes/inc_security.php'); 

  $sql="SELECT tbl_users.first_name, tbl_users.last_name, tbl_users.middle_name, tbl_users.usn, tbl_users.password, tbl_users.id, tbl_yearlevel.label
  FROM tbl_users
  INNER JOIN tbl_yearlevel ON tbl_yearlevel.id = tbl_users.yearLevel
  WHERE tbl_users.id = '$_POST[uID]'";
  $q = mysqli_query($conn,$sql);
  //print_r($sql); die();
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
        if (e.shiftKey || e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var key = e.keyCode;
            if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                e.preventDefault();
            }
        }
    });
    $('#middle_name').keydown(function (e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var key = e.keyCode;
            if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                e.preventDefault();
            }
        }
    });
    $('#last_name').keydown(function (e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) {
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
          <h3 class="panel-title">User Information</h3>
        </div>
        <div class="panel-body">
          <form name="form1" method="post" action="process.php" enctype="multipart/form-data">
            <div class="form-group">
              <label for="usn">USN:</label>
              <input type="number" class="form-control" name="usn" id="usn" value="<?= $row['usn']?>" required>
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
              <label for="yearlevel">Year Level:</label>
              <select name="yearlevel" id="yearlevel" class="form-control" required>
                <option selected disabled value="">-- Selected Year Level--</option>
                <?php 
                    $query = "select * from tbl_yearlevel where status = 1";
                    $result = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<option value=".$row['id']."> ".$row['label']." </option> ";
                    }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="course">Course:</label>
              <select name="course" id="course" class="form-control" required>
                <option selected disabled value="">-- Selected Course--</option>
                <?php 
                    $query = "select * from tbl_course where status = 1";
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
            <input name="uID" type="hidden" id="uID" value="<?= $_POST['uID'] ?>"></td>
            <a href="users.php" class="btn btn-info" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> BACK </a>
            <input name="btnEditUser" type="submit" class="btn btn-primary" id="btnEditUser" value="Update User">
          </form>
        </div>
  </div>
</div>


<!-- footer part -->
<?php require_once('includes/inc_footer.php'); ?>