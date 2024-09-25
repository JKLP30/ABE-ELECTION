
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


$sql ="SELECT
  abeevaluation_db.tbl_professors.name,


  (abeevaluation_db.tbl_evaluation.val1+
  abeevaluation_db.tbl_evaluation.val2+
  abeevaluation_db.tbl_evaluation.val3+
  abeevaluation_db.tbl_evaluation.val4+
  abeevaluation_db.tbl_evaluation.val5+
  abeevaluation_db.tbl_evaluation.val6+
  abeevaluation_db.tbl_evaluation.val7+
  abeevaluation_db.tbl_evaluation.val8+
  abeevaluation_db.tbl_evaluation.val9+
  abeevaluation_db.tbl_evaluation.val10+
  abeevaluation_db.tbl_evaluation.val11+
  abeevaluation_db.tbl_evaluation.val12+
  abeevaluation_db.tbl_evaluation.val13+
  abeevaluation_db.tbl_evaluation.val14+
  abeevaluation_db.tbl_evaluation.val15+
  abeevaluation_db.tbl_evaluation.val16+
  abeevaluation_db.tbl_evaluation.val17+
  abeevaluation_db.tbl_evaluation.val18+
  abeevaluation_db.tbl_evaluation.val19+
  abeevaluation_db.tbl_evaluation.val20) as 'total',

  ROUND(((abeevaluation_db.tbl_evaluation.val1+
  abeevaluation_db.tbl_evaluation.val2+
  abeevaluation_db.tbl_evaluation.val3+
  abeevaluation_db.tbl_evaluation.val4+
  abeevaluation_db.tbl_evaluation.val5+
  abeevaluation_db.tbl_evaluation.val6+
  abeevaluation_db.tbl_evaluation.val7+
  abeevaluation_db.tbl_evaluation.val8+
  abeevaluation_db.tbl_evaluation.val9+
  abeevaluation_db.tbl_evaluation.val10+
  abeevaluation_db.tbl_evaluation.val11+
  abeevaluation_db.tbl_evaluation.val12+
  abeevaluation_db.tbl_evaluation.val13+
  abeevaluation_db.tbl_evaluation.val14+
  abeevaluation_db.tbl_evaluation.val15+
  abeevaluation_db.tbl_evaluation.val16+
  abeevaluation_db.tbl_evaluation.val17+
  abeevaluation_db.tbl_evaluation.val18+
  abeevaluation_db.tbl_evaluation.val19+
  abeevaluation_db.tbl_evaluation.val20)/20),2) as 'average',

  ROUND(((((abeevaluation_db.tbl_evaluation.val1+
  abeevaluation_db.tbl_evaluation.val2+
  abeevaluation_db.tbl_evaluation.val3+
  abeevaluation_db.tbl_evaluation.val4+
  abeevaluation_db.tbl_evaluation.val5+
  abeevaluation_db.tbl_evaluation.val6+
  abeevaluation_db.tbl_evaluation.val7+
  abeevaluation_db.tbl_evaluation.val8+
  abeevaluation_db.tbl_evaluation.val9+
  abeevaluation_db.tbl_evaluation.val10+
  abeevaluation_db.tbl_evaluation.val11+
  abeevaluation_db.tbl_evaluation.val12+
  abeevaluation_db.tbl_evaluation.val13+
  abeevaluation_db.tbl_evaluation.val14+
  abeevaluation_db.tbl_evaluation.val15+
  abeevaluation_db.tbl_evaluation.val16+
  abeevaluation_db.tbl_evaluation.val17+
  abeevaluation_db.tbl_evaluation.val18+
  abeevaluation_db.tbl_evaluation.val19+
  abeevaluation_db.tbl_evaluation.val20)/20)/5)*100),2) as 'percent',

  abeevaluation_db.tbl_evaluation.comments as 'com',

  Avg(abeevaluation_db.tbl_evaluation.val1) AS Avg_val1
FROM
  abeevaluation_db.tbl_evaluation
  INNER JOIN abeevaluation_db.tbl_professors ON abeevaluation_db.tbl_evaluation.Prof =
    abeevaluation_db.tbl_professors.id WHERE abeevaluation_db.tbl_professors.name = ''";

        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
        //print_r($row); die();

  $sql2= "SELECT abeevaluation_db.tbl_professors.id, count(abeevaluation_db.tbl_evaluation.user_evaluated) as 'respondents' 
  FROM abeevaluation_db.tbl_evaluation
  INNER JOIN abeevaluation_db.tbl_professors ON abeevaluation_db.tbl_evaluation.Prof = abeevaluation_db.tbl_professors.id
   WHERE abeevaluation_db.tbl_professors.name = ''";

        $que = mysqli_query($conn,$sql2);
        $data = mysqli_fetch_assoc($que);
        //print_r($data); die();
?>
<?php include('includes/inc_header.php'); ?>
<script>
  function loadRec(b)
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
    document.getElementById("loadType1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax-load-scan-report.php?b="+b,true);
xmlhttp.send(); 
  }

</script>

<script>
$(document).ready(function(){
    $("button").click(function(){
        $("#PrintForm").remove();
    });
});
</script>

<!-- navigation bar -->
<?php require_once('includes/inc_nav.php'); ?>
<div class="container PrintForm">
  
  <div class="pull-right" id="print">
      <input class="btn-primary" name="button" type="button" class="btnlink" id="button" value="Print Document" onClick="window.print();">
   </div>
  <div class="form-group col-md-3 search">
    <label for="prof">Professor's name:</label>
    <input type="text" class="form-control" id="txtin" name="txtin" onkeyup="loadRec(this.value)">

  </div>
</div>
<!-- content -->
<div class="container" pull="right">
    <div>
      <img class="img-responsive" src="assets/img/logo.png" style="float:left;width:200px;height:80px;">
       <center>
        <h6>ABE INTERNATIONAL BUSINESS COLLEGE CALOOCAN</h6>
      <h6>Faculty Evaluation<br>
      
          <?php 
          if(date('m') > 5 && date('m') < 9){
                echo 'First Trimester'; 
            }
            else{
              if(date('m') > 10 && date('m') < 12){
                echo 'Second Trimester'; 
              }
              else{
                echo 'Third Trimester';
              }
              }
     ?>




              </h6></center><br>

    <div id="loadType1">                                          
         <p> <center>                                                         
             Name: of Professor : <?php echo $row['name']; ?>         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             Evaluation Total : <?php echo $row['total']; ?>          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp                                                         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp                                                         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             Evaluation Average : <?php  
              $ave = $row['average']; 
              echo $ave;
                    if($ave >= 4.51){
                      echo 'O';
                    }
                    else{
                     if($ave >= 4){
                        echo 'VS';
                     }
                     else{
                        if($ave >= 3){
                            echo 'S';
                        }
                        else{
                          if($ave >= 2){
                            echo 'F';
                        }
                        else{
                          if($ave >= 1.5){
                            echo 'NI';
                          }
                          else{
                            echo 'P';
                          }
                      }
                    }
                  }
                }
                 ?>
             </center>       
         </p>

         <p>      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp           
         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

             Evaluation Percentage : <?php echo $row['percent']; ?>       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

             Number of Respondents : <?php echo $data['respondents']; ?>
             
         </p>
<br><br>
         <center> <p>
               O - Outstanding [5 - 4.51] &nbsp
               VS - Very Statisfactory [4.5 - 4] &nbsp
               S - Satisfactory [3.99 - 3] &nbsp
               F - Fair [2.99 - 2] <br>
               NI - Needs Improvement [1.99 - 1.5] &nbsp
               P - Poor [1.49 - 1] 
          </p>
<br><br>

        </center>
    <center>
    <?php do{ ?>
      <p> <?php echo $row['com']; ?></p>
    <?php }while($row = mysqli_fetch_assoc($que)) ?>
    </center>
    </div>
