
<!-- cnnects on DB to get the records -->
<?php require_once('Connection/conn.php'); 
// get secure session
include('includes/inc_security.php'); 

$sql ="SELECT
  abeevaluation_db.tbl_professors.name,

  ROUND((SUM((abeevaluation_db.tbl_evaluation.val1+
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
  abeevaluation_db.tbl_evaluation.val20))/count(abeevaluation_db.tbl_evaluation.user_evaluated)),2) as 'total',

  

  ROUND((SUM(ROUND(((abeevaluation_db.tbl_evaluation.val1+
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
  abeevaluation_db.tbl_evaluation.val20)/20),2))/count(abeevaluation_db.tbl_evaluation.user_evaluated)),2) as 'average',

  ROUND((SUM(((((abeevaluation_db.tbl_evaluation.val1+
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
  abeevaluation_db.tbl_evaluation.val20)/20)/5)*100))/count(abeevaluation_db.tbl_evaluation.user_evaluated)),2) as 'percent',

  count(abeevaluation_db.tbl_evaluation.user_evaluated) as 'respondents',
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val1),2) AS Avg_val1,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val2,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val3,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val4,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val5,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val6,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val7,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val8,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val9,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val10,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val11,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val12,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val13,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val14,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val15,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val16,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val17,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val18,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val19,
  ROUND(Avg(abeevaluation_db.tbl_evaluation.val2),2) AS Avg_val20
FROM
  abeevaluation_db.tbl_evaluation
  INNER JOIN abeevaluation_db.tbl_professors ON abeevaluation_db.tbl_evaluation.Prof = abeevaluation_db.tbl_professors.id 
    WHERE abeevaluation_db.tbl_evaluation.status = '1' && abeevaluation_db.tbl_professors.name LIKE '%$_GET[b]%'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
        //print_r($row);

  $sql2= "SELECT abeevaluation_db.tbl_professors.id,abeevaluation_db.tbl_professors.name , abeevaluation_db.tbl_evaluation.comments as 'com'
  FROM abeevaluation_db.tbl_evaluation
  INNER JOIN abeevaluation_db.tbl_professors ON abeevaluation_db.tbl_evaluation.Prof = abeevaluation_db.tbl_professors.id
  WHERE abeevaluation_db.tbl_evaluation.status = '1' && abeevaluation_db.tbl_professors.name LIKE '%$_GET[b]%'";
        
        $que = mysqli_query($conn,$sql2);
        $data = mysqli_fetch_assoc($que);
        //print_r($data); die();
?>

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


  <?php if($query != null){ ?>
 <p> <center>                                                         
             Name: of Professor : <?php echo $row['name']; ?>         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             Evaluation Total : <?php echo $row['total']; ?>          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             Evaluation Average : <?php  
              $ave = $row['average']; 
              echo $ave.' (';
                    if($ave >= 4.51){
                      echo 'O)';
                    }
                    else{
                     if($ave >= 4){
                        echo 'VS)';
                     }
                     else{
                        if($ave >= 3){
                            echo 'S)';
                        }
                        else{
                          if($ave >= 2){
                            echo 'F)';
                        }
                        else{
                          if($ave >= 1.5){
                            echo 'NI)';
                          }
                          else{
                            echo 'P)';
                          }
                      }
                    }
                  }
                }
                 ?>
             </center>       
         </p>

         <p>                                                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             Evaluation Percentage : <?php echo $row['percent']; ?>       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             Number of Respondents : <?php echo $row['respondents']; ?>
             
         </p>
  <?php } else{ ?>
  No records found.....
  <?php } ?>

  <?php if($que != null){ ?>
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
        <?php } else{ ?>
  No records found.....
  <?php } ?>

<?php

$sql3 = "SELECT

  abeevaluation_db.tbl_evaluation.val1,
  abeevaluation_db.tbl_evaluation.val2,
  abeevaluation_db.tbl_evaluation.val3,
  abeevaluation_db.tbl_evaluation.val4,
  abeevaluation_db.tbl_evaluation.val5,
  abeevaluation_db.tbl_evaluation.val6,
  abeevaluation_db.tbl_evaluation.val7,
  abeevaluation_db.tbl_evaluation.val8,
  abeevaluation_db.tbl_evaluation.val9,
  abeevaluation_db.tbl_evaluation.val10,
  abeevaluation_db.tbl_evaluation.val11,
  abeevaluation_db.tbl_evaluation.val12,
  abeevaluation_db.tbl_evaluation.val13,
  abeevaluation_db.tbl_evaluation.val14,
  abeevaluation_db.tbl_evaluation.val15,
  abeevaluation_db.tbl_evaluation.val16,
  abeevaluation_db.tbl_evaluation.val17,
  abeevaluation_db.tbl_evaluation.val18,
  abeevaluation_db.tbl_evaluation.val19,
  abeevaluation_db.tbl_evaluation.val20,

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
  abeevaluation_db.tbl_evaluation.val20)/20)/5)*100),2) as 'percent'
FROM
  abeevaluation_db.tbl_evaluation
  INNER JOIN abeevaluation_db.tbl_professors ON abeevaluation_db.tbl_evaluation.Prof =
    abeevaluation_db.tbl_professors.id
WHERE abeevaluation_db.tbl_evaluation.status = '1' && abeevaluation_db.tbl_professors.name LIKE '%$_GET[b]%'";

 $query1=mysqli_query($conn,$sql3);
 $row1 = mysqli_fetch_assoc($query1);
//print_r($row1); //die();

$sql4 = "SELECT abeevaluation_db.tbl_professors.id, count(abeevaluation_db.tbl_evaluation.user_evaluated) as 'respondents' , 
  SUM((abeevaluation_db.tbl_evaluation.val1+
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
  abeevaluation_db.tbl_evaluation.val20)) totalsum
  FROM abeevaluation_db.tbl_evaluation
  INNER JOIN abeevaluation_db.tbl_professors ON abeevaluation_db.tbl_evaluation.Prof =
    abeevaluation_db.tbl_professors.id
  WHERE abeevaluation_db.tbl_evaluation.status = '1' && abeevaluation_db.tbl_professors.name LIKE '%$_GET[b]%'";

        $que1 = mysqli_query($conn,$sql4);
        $data1 = mysqli_fetch_assoc($que1);
      //print_r($data1); die();
?>

<?php if($query1 != null){ ?>
<table class="table table-striped table-bordered table-hover ">
      <thead>
        <tr>
          <th>Q1</th>
          <th>Q2</th>
          <th>Q3</th>
          <th>Q4</th>
          <th>Q5</th>
          <th>Q6</th>
          <th>Q7</th>
          <th>Q8</th>
          <th>Q9</th>
          <th>Q10</th>
          <th>Q11</th>
          <th>Q12</th>
          <th>Q13</th>
          <th>Q14</th>
          <th>Q15</th>
          <th>Q16</th>
          <th>Q17</th>
          <th>Q18</th>
          <th>Q19</th>
          <th>Q20</th>
          <th>Total</th>
          <th>AVG</th>
          <th>%</th>
        </tr>
      </thead>
        <tbody>
        <?php do{ ?>
        <tr>
            <td><?php echo $row1['val1']; ?></td>
            <td><?php echo $row1['val2']; ?></td>
            <td><?php echo $row1['val3']; ?></td>
            <td><?php echo $row1['val4']; ?></td>
            <td><?php echo $row1['val5']; ?></td>
            <td><?php echo $row1['val6']; ?></td>
            <td><?php echo $row1['val7']; ?></td>
            <td><?php echo $row1['val8']; ?></td>
            <td><?php echo $row1['val9']; ?></td>
            <td><?php echo $row1['val10']; ?></td>
            <td><?php echo $row1['val11']; ?></td>
            <td><?php echo $row1['val12']; ?></td>
            <td><?php echo $row1['val13']; ?></td>
            <td><?php echo $row1['val14']; ?></td>
            <td><?php echo $row1['val15']; ?></td>
            <td><?php echo $row1['val16']; ?></td>
            <td><?php echo $row1['val17']; ?></td>
            <td><?php echo $row1['val18']; ?></td>
            <td><?php echo $row1['val19']; ?></td>
            <td><?php echo $row1['val20']; ?></td>
            <td><?php echo $row1['total']; ?></td>
            <td><?php echo $row1['average']; ?></td>
            <td><?php echo $row1['percent']; ?></td>
        </tr>
        <?php } while($row1 = mysqli_fetch_assoc($query1)); ?>
        </tbody>
    </table>
<?php } else{ ?>
No records found.....
<?php } ?>


  </center>
<?php if($que != null){ ?>
  <div  class="form-group col-md-3 pull-right">
  </div>
    <table class="table table-striped table-bordered table-hover ">
      <thead>
        <tr><center>
          <th><center>Questions:</center></th>
          <th><center>Mean</center></th>
          <th><center>Descriptive Rating (DR)</center></th>
        </tr>
      </thead>
        <tbody>
        
        <tr>
            <td>1. Discusses the course outline or syllabus at the start of the term</td>
            <td><?php echo $row['Avg_val1']; ?></td>
            <td><?php  
              $ave_val1 = $row['Avg_val1']; 
                    if($ave_val1 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val1 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val1 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val1 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val1 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr> 
        <tr>
            <td>2. Comes to class prepares for the day's lesson</td>
            <td><?php echo $row['Avg_val2']; ?></td>
            <td><?php  
              $ave_val2 = $row['Avg_val2']; 
                    if($ave_val2 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val2 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val2 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val2 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val2 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
          <tr>
            <td>3. Discusses the lesson in a well-organized manner</td>
            <td><?php echo $row['Avg_val3']; ?></td>
            <td><?php  
              $ave_val3 = $row['Avg_val3']; 
                    if($ave_val2 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val3 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val3 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val3 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val3 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
        <tr>
            <td>4. Is well Informed of current trends and encourages students to keep up with the recent varied publications related to the subject matter</td>
            <td><?php echo $row['Avg_val4']; ?></td>
            <td><?php  
              $ave_val4 = $row['Avg_val4']; 
                    if($ave_val4 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val4 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val4 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val4 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val4 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
        <tr>
            <td>5. Relates the lessons to everyday experience</td>
            <td><?php echo $row['Avg_val5']; ?></td>
            <td><?php  
              $ave_val5 = $row['Avg_val5']; 
                    if($ave_val4 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val5 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val5 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val5 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val5 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
           <tr>
            <td>6. Is Fluent in the use of language (English, Filipino, depending on the subject matter</td>
            <td><?php echo $row['Avg_val6']; ?></td>
            <td><?php  
              $ave_val6 = $row['Avg_val6']; 
                    if($ave_val6 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val6 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val6 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val6 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val6 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
           <tr>
            <td>7. Diversifies his/her teaching method to make the teaching learning experience more effective</td>
            <td><?php echo $row['Avg_val7']; ?></td>
            <td><?php  
              $ave_val7 = $row['Avg_val7']; 
                    if($ave_val7 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val7>= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val7 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val7 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val7 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
           <tr>
            <td>8. Maintains disipline and yet establishes a friendly atmosphere in the classroom</td>
            <td><?php echo $row['Avg_val8']; ?></td>
            <td><?php  
              $ave_val8 = $row['Avg_val8']; 
                    if($ave_val8 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val8 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val8 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val8 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val8 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
           <tr>
            <td>9. Encourages students to make independent study a habit and check homework regularly</td>
            <td><?php echo $row['Avg_val9']; ?></td>
            <td><?php  
              $ave_val9 = $row['Avg_val9']; 
                    if($ave_val9 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val9 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val9 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val9 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val9 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
           <tr>
            <td>10. Encourages question and discussions in class</td>
            <td><?php echo $row['Avg_val10']; ?></td>
            <td><?php  
              $ave_val10 = $row['Avg_val10']; 
                    if($ave_val10 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val10 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val10 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val10 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val10 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
           <tr>
            <td>11. Show Fairness and impartiality</td>
            <td><?php echo $row['Avg_val11']; ?></td>
            <td><?php  
              $ave_val11 = $row['Avg_val11']; 
                    if($ave_val11 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val11 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val11 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val11 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val11 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
           <tr>
            <td>12. Shows interest and concern for welfare of students</td>
            <td><?php echo $row['Avg_val12']; ?></td>
            <td><?php  
              $ave_val12 = $row['Avg_val12']; 
                    if($ave_val12 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val12 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val12 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val12 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val12 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
           <tr>
            <td>13. Allows the student to express opinions contrary to his/her own</td>
            <td><?php echo $row['Avg_val13']; ?></td>
            <td><?php  
              $ave_val13 = $row['Avg_val13']; 
                    if($ave_val13 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val13 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val13 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val13 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val13 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
           <tr>
            <td>14. Gives test that cover important lessons assigned or taken up in class</td>
            <td><?php echo $row['Avg_val14']; ?></td>
            <td><?php  
              $ave_val14 = $row['Avg_val14']; 
                    if($ave_val14 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val14 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val14 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val14 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val14 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
           <tr>
            <td>15. Discusses test results and discusses problem areas</td>
            <td><?php echo $row['Avg_val15']; ?></td>
            <td><?php  
              $ave_val15 = $row['Avg_val15']; 
                    if($ave_val6 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val15 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val15 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val15 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val15 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
           <tr>
            <td>16. Explains to the students how their grades are computed</td>
            <td><?php echo $row['Avg_val16']; ?></td>
            <td><?php  
              $ave_val16 = $row['Avg_val16']; 
                    if($ave_val16 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val16 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val16 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val16 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val16 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
           <tr>
            <td>17. Starts the class on time</td>
            <td><?php echo $row['Avg_val17']; ?></td>
            <td><?php  
              $ave_val17 = $row['Avg_val17']; 
                    if($ave_val17 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val17 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val17 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val17 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val17 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
           <tr>
            <td>18. Dismisses the class on time</td>
           <td><?php echo $row['Avg_val17']; ?></td>
            <td><?php  
              $ave_val17 = $row['Avg_val17']; 
                    if($ave_val17 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val17 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val17 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val17 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val17 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
           <tr>
            <td>19. Holds class regularly</td>
            <td><?php echo $row['Avg_val19']; ?></td>
            <td><?php  
              $ave_val19= $row['Avg_val19']; 
                    if($ave_val19 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val19 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val19 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val19 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val19 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>  
           <tr>
            <td>20. Is neat and is appropriately dressediscusses the course outline or syllabus at the start of the term</td>
            <td><?php echo $row['Avg_val20']; ?></td>
            <td><?php  
              $ave_val20 = $row['Avg_val6']; 
                    if($ave_val20 >= 4.51){
                      echo 'Outstanding';
                    }
                    else{
                     if($ave_val20 >= 4){
                        echo 'Very Satisfactory';
                     }
                     else{
                        if($ave_val20 >= 3){
                            echo 'Satisfactory';
                        }
                        else{
                          if($ave_val20 >= 2){
                            echo 'Fair';
                        }
                        else{
                          if($ave_val20 >= 1.5){
                            echo 'Needs Improvement';
                          }
                          else{
                            echo 'Poor';
                          }
                      }
                    }
                  }
                }
                 ?></td>
        </tr>      
        </tbody>
    
    </table>

    <?php } else{ ?>
  No records found.....
  <?php } ?>
  </center>

<?php if($que != null){ ?>
    <p>Comments and Suggestions:</p>
    <?php do{ ?>
      <p> <?php echo $data['com']; ?></p>
    <?php }while($data = mysqli_fetch_assoc($que)); ?>
    <?php } else{ ?>
  No records found.....
  <?php } ?>