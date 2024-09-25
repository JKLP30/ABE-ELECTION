<!-- cnnects on DB to get the records -->
<?php require_once('Connection/conn.php'); 
// get secure session
include('includes/inc_security.php'); 

$currentpage = $_SERVER["PHP_SELF"];

$maxRows = 20;
$pagenum = 0;

if(isset($_GET['pagenum'])){
		$pagenum = $_GET['pagenum'];
	}
$startrow = $pagenum * $maxRows;


$sql ="SELECT CONCAT(tbl_admin.first_name,' ', tbl_admin.last_name) name, tbl_position.Position position, tbl_admin.id, tbl_admin.profilepicture, tbl_userlevel.label userLevel
FROM tbl_admin
INNER JOIN tbl_position ON tbl_position.id = tbl_admin.position
INNER JOIN tbl_userlevel ON tbl_userlevel.id = tbl_admin.user_level
WHERE tbl_admin.status = 1 AND tbl_admin.user_level = 1";

  $query_limit = sprintf("%s LIMIT %d,%d", $sql,$startrow, $maxRows);
  
$query = mysqli_query($conn,$query_limit);
if (isset($_GET['totalrows'])){
		$totalrows = $_GET['totalrows'];
	}else{
			$all = mysqli_query($conn,$sql);
			//print_r($all); die();
			$totalrows = mysqli_num_rows($all);
		}
	$totalpages = ceil ($totalrows/$maxRows) -1;
	
	$queryString = "";
	if(!empty($_SERVER['QUERY_STRING'])){
				$params = explode("&", $_SERVER['QUERY_STRING']);
				$newparams = array();
				foreach( $params as $param){
						if(stristr($param,"pagenum") == false && stristr ($param, "totalrows") == false){
								array_push($newparams, $param);
							}
					}
				if(count ($newparams) != 0 ){
						$queryString = "&" . htmlentities(implode("&", $newparams));
					}
		}
		$queryString = sprintf("totalrows=%d%s", $totalrows, $queryString);
?>

<!-- header -->
<?php include('includes/inc_header.php'); ?>
<!-- navigation bar -->
<?php require_once('includes/inc_nav.php'); ?>

   <h3>List of Active Admin</h3>
	<table class="table table-striped table-bordered table-hover ">
		<thead>
			<tr>
				<th>Profile Picture</th>
				<th>Name</th>
				<th>Position</th>
				<!-- <th>Subject</th> -->
				<th>Action</th>
				<th>Action</th>
			</tr>
		</thead>
	  	<tbody>
			<?php while($row = mysqli_fetch_assoc($query)){ ?>
			<tr>
			    <td><center><img src="uploads/<?php echo $row['profilepicture']; ?>" width="100"></center></td>
			    <td><?php echo $row['name']; ?></td>
			    <td><?php echo $row['position']; ?></td>
			    <td>
				    <form name="form1" method="post" action="edit-admin.php">
						<input type="hidden" name="adID" id="hiddenField" value="<?php echo $row['id']; ?>">
						<input name="btnEditItem" type="submit" class="btn btn-info" id="btnEditItem" value="Update">
						
				    </form>
			    </td>
			    <td>
				    <form name="form2" method="post" action="process.php">
						<input type="hidden" name="adID" id="hiddenField" value="<?php echo $row['id']; ?>">
						<input name="btndeleteAdmin" type="submit" class="btn btn-info" id="btndeleteAdmin" value="Delete">
				    </form>
			    </td>
			</tr>
	  	</tbody>
		<?php } ?>
	</table>
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