<?php 
  require_once('Connection/conn.php'); 
  include('includes/inc_security.php'); 

  $sql="SELECT *
  FROM tbl_professors
  WHERE status = 1";

  $q = mysqli_query($conn,$sql);

?>
<center><p>STUDENT EVALUATION OF FACULTY PERFORMANCE ( )</p></center>


