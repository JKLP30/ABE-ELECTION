<?php 
  require_once('Connection/conn.php'); 
  include('includes/inc_security.php'); 

  $sql="SELECT `desc`
  FROM tbl_announcement
  WHERE status = 1";
  $q = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($q);

  // print_r($row['desc']); die();
?>

<!-- header -->
<?php include('includes/inc_header.php'); ?>
<!-- navigation bar -->
<?php require_once('includes/inc_nav.php'); ?>

<div class="container">
  <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Announcement Information</h3>
        </div>
        <div class="panel-body">
          <form action="process.php" method="post" enctype="multipart/form-data" name="form1">
            <!-- <label>Upload Picture:</label>
            <input type="file" class="" name="imgupload" id="imgupload"> -->
            <div class="form-group">
              <label for="name">Announcement Title:</label>
              <input type="text" class="form-control" name="name" id="name" required>
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


            <input name="btnAddAnnouncement" type="submit" class="btn btn-primary" id="btnAddAnnouncement" value="Add Announcement">
          </form>
        </div>
  </div>
</div>

<style>


