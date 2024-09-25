<!-- cnnects on DB to get the records -->
<?php require_once('Connection/conn.php'); 
// get secure session
include('includes/inc_security.php'); 

$currentpage = $_SERVER["PHP_SELF"];

$maxRows = 10;
$pagenum = 0;

if(isset($_GET['pagenum'])){
		$pagenum = $_GET['pagenum'];
	}
$startrow = $pagenum * $maxRows;


$sql ="SELECT tbl_evaluation.Prof_name prof, tbl_evaluation.evaluation eval, tbl_evaluation.user_voted, tbl_users.id, CONCAT(tbl_users.first_name,' ', tbl_users.last_name) name
FROM tbl_evaluation
INNER JOIN tbl_users ON tbl_users.id = tbl_evaluation.user_voted
WHERE tbl_users.status = 1";

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
<div class="container">
   	<div class="paginationTable">
    	<strong>
    	<?php if($pagenum > 0){?>   
            <a href="<?php printf("%s?pagenum=%d%s",$currentpage,0, $queryString);?>">First</a>
         <?php }else{echo "First";}?>
         
        <?php if($pagenum > 0){?>   
            <a href="<?php printf("%s?pagenum=%d%s",$currentpage,max(0, $pagenum - 1), $queryString);?>">Previous</a> 
        <?php }else{echo "Previous";}?>
           
         <?php if($pagenum < $totalpages){?>   
            <a href="<?php printf("%s?pagenum=%d%s",$currentpage,min($totalpages, $pagenum + 1), $queryString);?>">Next</a>
         <?php }else{echo "Next";}?>
         
         <?php if($pagenum < $totalpages){?>   
            <a href="<?php printf("%s?pagenum=%d%s",$currentpage,$totalpages, $queryString);?>">Last</a>
         <?php }else{echo "Last";}?>
    	</strong>
    </div>
   
   <h3>List of Active User</h3>
	<table class="table table-striped table-bordered table-hover ">
		<thead>
			<tr>
				<th>Professor's Name</th>
				<th>Rating</th>
				<th>Student Name</th>
			</tr>
		</thead>
	  	<tbody>
			<?php while($row = mysqli_fetch_assoc($query)){ ?>
			<tr>
			    <td><?php echo $row['prof']; ?></td>
			    <td><?php echo $row['eval']; ?></td>
			    <td><?php echo $row['name']; ?></td>
			    <td>
				    <form name="form1" method="post" action="edit-user.php">
						<input type="hidden" name="uID" id="hiddenField" value="<?php echo $row['id']; ?>">
						<input name="btnEditItem" type="submit" class="btn btn-info" id="btnEditItem" value="Edit Item">
				    </form>
			    </td>
			</tr>
	  	</tbody>
		<?php } ?>
	</table>
</div>


<!-- footer part -->
<?php require_once('includes/inc_footer.php'); ?>