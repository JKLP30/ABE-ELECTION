<?php
require_once('Connection/conn.php'); 
include('includes/inc_security.php'); 

$sql ="SELECT tbl_users.id, CONCAT(tbl_users.first_name,' ', tbl_users.last_name) name, tbl_course.label course, tbl_userlevel.label userLevel, tbl_yearlevel.label yearLevel
FROM tbl_users
INNER JOIN tbl_course ON tbl_course.id = tbl_users.course
INNER JOIN tbl_userlevel ON tbl_userlevel.id = tbl_users.user_level
INNER JOIN tbl_yearlevel ON tbl_yearlevel.id = tbl_users.yearLevel
WHERE  tbl_users.first_name LIKE '$_GET[c]%' || tbl_users.last_name LIKE '$_GET[c]%' AND  tbl_users.status = 1";

 $query=mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($query);
  //print_r($sql); die();
 ?>

<?php if($query != null){ ?>
<table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        
        <th>Name</th>
        <th>Course</th>
        <th>Year Level</th>
        <th>User Level</th>
        <th>Action</th>
        <th>Action</th>
      </tr>
    </thead>
      <tbody>
      <?php while($row = mysqli_fetch_assoc($query)){ ?>
      <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['course']; ?></td>
          <td><?php echo $row['yearLevel']; ?></td>
          <td><?php echo $row['userLevel']; ?></td>
          <td>
            <form name="form1" method="post" action="edit-user.php">
            <input type="hidden" name="uID" id="hiddenField" value="<?php echo $row['id']; ?>">
            <input name="btnEditItem" type="submit" class="btn btn-info" id="btnEditItem" value="Update">
            </form>
          </td>
          <td>
            <form name="form2" method="post" action="process.php">
            <input type="hidden" name="uID" id="hiddenField" value="<?php echo $row['id']; ?>">
            <input name="btnDeleteItem" type="submit" class="btn btn-info" id="btnDeleteItem" value="Delete">
            </form>
          </td>
            
      </tr>
      </tbody>
    <?php } ?>
  </table>

<?php } else{ ?>

No records found.....
<?php } ?>