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

$sql ="SELECT tbl_professors.name, tbl_department.label, tbl_professors.id, tbl_professors.professorpicture
FROM tbl_professors
INNER JOIN tbl_department ON tbl_department.id = tbl_professors.department 
WHERE tbl_professors.status = 1";

  $query_limit = sprintf("%s LIMIT %d,%d", $sql,$startrow, $maxRows);
  
$query = mysqli_query($conn,$query_limit);
if (isset($_GET['totalrows'])){
		$totalrows = $_GET['totalrows'];
	}else{
			$all = mysqli_query($conn,$sql);
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

<!-- content -->

   	<h3>List of Registered Professor</h3>
	<table class="table table-striped table-bordered table-hover " background-color: "#0400ff!important">
		<thead>
			<tr>
				<th >Professors Name</th>
				<th>Professors Picture</th>
				<th>Department</th>
				<th>Action</th>
				<th>Action</th>
			</tr>
		</thead>
	  	<tbody>
			<?php while($row = mysqli_fetch_assoc($query)){ ?>
			<tr>
			    <td><?php echo $row['name']; ?></td>
			    <td><center><img src="uploads/<?php echo $row['professorpicture']; ?>" width="100"></center></td>
			    <td><?php echo $row['label']; ?></td>
			    <td>
				    <form name="form1" method="post" action="edit-prof.php">
						<input type="hidden" name="pID" id="hiddenField" value="<?php echo $row['id']; ?>">
						<input name="btnEditItem" type="submit" class="btn btn-info" id="btnEditItem" value="Update">
						 
				    </form>
			    </td>

			     <td>
				    <form name="form1" method="post" action="process.php">
						<input type="hidden" name="pID" id="hiddenField" value="<?php echo $row['id']; ?>">
						<input name="btnDeleten" type="submit" class="btn btn-info" id="btnDeleten" value="Delete">
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