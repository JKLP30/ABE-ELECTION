<?php
require_once('Connection/conn.php'); 

$sql = "SELECT
  abeevaluation_db.tbl_professors.name,
  abeevaluation_db.tbl_evaluation.academicYear,
  abeevaluation_db.tbl_evaluation.date,
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
  abeevaluation_db.tbl_evaluation.user_evaluated,

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
WHERE abeevaluation_db.tbl_evaluation.status = '1' && abeevaluation_db.tbl_professors.name LIKE '%$_GET[a]%'";

 $query=mysqli_query($conn,$sql);
 $count = mysqli_num_rows($query);
// print_r($query); die();

$sql2= "SELECT abeevaluation_db.tbl_professors.id, count(abeevaluation_db.tbl_evaluation.user_evaluated) as 'respondents' 
  FROM abeevaluation_db.tbl_evaluation
  INNER JOIN abeevaluation_db.tbl_professors ON abeevaluation_db.tbl_evaluation.Prof =
    abeevaluation_db.tbl_professors.id
  WHERE abeevaluation_db.tbl_evaluation.status = '1' && abeevaluation_db.tbl_professors.name LIKE '%$_GET[a]%'";

        $que = mysqli_query($conn,$sql2);
        $data = mysqli_fetch_assoc($que);
        //print_r($data); die();
?>
<?php if($que != null){ ?>
  <div  class="form-group col-md-3 pull-right">
      <p>Total Number of Respondents : <?php echo $data['respondents']; ?></p>
  </div>
<?php } else{ ?>
No records found.....
<?php } ?>
<?php if($query != null){ ?>
<table class="table table-striped table-bordered table-hover ">
      <thead>
        <tr>
          <th>Professor's Name</th>
          <th>Date</th>
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
          <th>Student Name</th>
          <th>Total</th>
          <th>AVG</th>
          <th>%</th>
        </tr>
      </thead>
        <tbody>
        <?php while($row = mysqli_fetch_assoc($query)){ ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['val1']; ?></td>
            <td><?php echo $row['val2']; ?></td>
            <td><?php echo $row['val3']; ?></td>
            <td><?php echo $row['val4']; ?></td>
            <td><?php echo $row['val5']; ?></td>
            <td><?php echo $row['val6']; ?></td>
            <td><?php echo $row['val7']; ?></td>
            <td><?php echo $row['val8']; ?></td>
            <td><?php echo $row['val9']; ?></td>
            <td><?php echo $row['val10']; ?></td>
            <td><?php echo $row['val11']; ?></td>
            <td><?php echo $row['val12']; ?></td>
            <td><?php echo $row['val13']; ?></td>
            <td><?php echo $row['val14']; ?></td>
            <td><?php echo $row['val15']; ?></td>
            <td><?php echo $row['val16']; ?></td>
            <td><?php echo $row['val17']; ?></td>
            <td><?php echo $row['val18']; ?></td>
            <td><?php echo $row['val19']; ?></td>
            <td><?php echo $row['val20']; ?></td>
            <td><?php echo $row['user_evaluated']; ?></td>
            <td><?php echo $row['total']; ?></td>
            <td><?php echo $row['average']; ?></td>
            <td><?php echo $row['percent']; ?></td>
        </tr>
        </tbody>
      <?php } ?>
    </table>
<?php } else{ ?>

No records found.....
<?php } ?>