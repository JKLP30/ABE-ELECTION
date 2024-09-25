<!-- cnnects on DB to get the records -->
<?php require_once('Connection/conn.php'); 
// get secure session
include('includes/inc_security.php'); 

$currentpage = $_SERVER["PHP_SELF"];

$maxRows = 500;
$pagenum = 0;

if(isset($_GET['pagenum'])){
		$pagenum = $_GET['pagenum'];
	}
$startrow = $pagenum * $maxRows;


$sql ="SELECT tbl_users.id, CONCAT(tbl_users.first_name,' ', tbl_users.last_name) name, tbl_course.label course, tbl_userlevel.label userLevel, tbl_yearlevel.label yearLevel
FROM tbl_users
INNER JOIN tbl_course ON tbl_course.id = tbl_users.course
INNER JOIN tbl_userlevel ON tbl_userlevel.id = tbl_users.user_level
INNER JOIN tbl_yearlevel ON tbl_yearlevel.id = tbl_users.yearLevel
WHERE tbl_users.status = 1";

  //print_r($sql); die();
 $query = mysqli_query($conn,$sql);
 $data = mysqli_fetch_assoc($query);

?>

<script>
	function loadRec(c)
	{
	var xmlhttp;

	if (window.XMLHttpRequest)
	  {
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    document.getElementById("divuser").innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","ajax-load-scan-user.php?c="+c,true);
	xmlhttp.send();	
	}

  </script>

<!-- header -->
<?php include('includes/inc_header.php'); ?>
<?php require_once('includes/inc_nav.php'); ?>
<!-- navigation bar -->

<!-- content -->

   <h3>List of Active User</h3>
   
   <div class="form-group col-md-3 search">
		<label for="prof">Student's Name:</label>
		<input type="text" class="form-control" id="txtin" name="txtin" onkeyup="loadRec(this.value)">
	</div>
	<div id="divuser">
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
		<dir></dir>
				    <form name="form2" method="post" action="process.php">
						<input type="hidden" name="uID" id="hiddenField" value="<?php echo $row['id']; ?>">
						<input name="btnDeleteItem" type="submit" class="btn btn-info" id="btnDeleteItem" value="Delete">
				    </form>
			    </td>
						
			</tr>
	  	</tbody>
		<?php } ?>
	</table>
	</div>
</div>

<style>
table {
          border-collapse: collapse;
          width: 100%;
      }

      th {
          background-color: #3498db;
          color: white;
      }
</style>


<!-- footer part -->
<?php require_once('includes/inc_footer.php'); ?>