<?php 
  require_once('Connection/conn.php'); 
  include('includes/inc_security.php'); 

  $sql="SELECT tbl_announcement.desc, status.label, tbl_announcement.status
  FROM tbl_announcement
  INNER JOIN status ON status.id = tbl_announcement.status 
  WHERE tbl_announcement.id = '$_POST[aID]'";
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
          <h3 class="panel-title">Update Announcement Information</h3>
        </div>
        <div class="panel-body">
          <form name="form1" method="post" action="process.php">
           <div class="form-group">
              <label for="name">Announcement Title:</label>
              <input type="text" class="form-control" name="announcement" id="announcement" value="<?= $row['desc']?>" required>
            </div>
            <div class="form-group">
              <label for="status">Status:</label>
              <select name="status" id="status" class="form-control" required>
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

            <input name="aID" type="hidden" id="aID" value="<?= $_POST['aID'] ?>"></td>
            <a href="announcement.php" class="btn btn-info" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> BACK </a>
            <input name="btnEditAnnouncement" type="submit" class="btn btn-primary" id="btnEditAnnouncement" value="Update Announcement">
          </form>
        </div>
  </div>
</div>


<!-- footer part -->
<?php require_once('includes/inc_footer.php'); ?>