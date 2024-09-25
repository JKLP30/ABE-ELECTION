<?php 
  require_once('Connection/conn.php'); 
  include('includes/inc_security.php'); 

  $sql = "SELECT evaluate_status from tbl_users Where `id` = '$_SESSION[id]'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);

  // print_r($row['evaluate_status']); die();
  // if($row['evaluate_status'] == '1'){
  // 	die('You done evaulating');
  // }
?>
<!-- header -->
<?php include('includes/inc_header.php'); ?>

<style type="text/css">
	.page {
	    display: none;
	}
	.active {
	    display: inherit;
	}
</style>

<!-- navigation bar -->
<?php require_once('includes/inc_nav.php'); ?>

	<center><h4>STUDENT EVALUATION OF FACULTY PERFORMANCE ( <?= date('Y') ?> )</h4></center> 
	<br>

	<div class="container">
		<form action="process.php" method="post" name="eval">
			<div class="page active container">
				<div class="form-group col-md-3">
	              <label for="prof"><b> Professor: </b></label>
	              <select name="prof" id="prof" class="form-control" required>
	                <option selected disabled value="">-- Selected Professor--</option>
	                <?php 
	                    $query = "select * from tbl_professors where status = 1";
	                    $result = mysqli_query($conn,$query);
	                    while($row = mysqli_fetch_assoc($result))
	                    {
	                        echo "<option value=".$row['id']."> ".$row['name']." </option> ";
	                    }
	                ?>
	              </select>
	            </div>
				<div class="form-group col-md-3">
	              <label for="aca"><b> Academic Year: </b></label>
	              <select name="aca" id="aca" class="form-control" required>
	                <option selected disabled value="">-- Selected Academic Year--</option>
	                <?php 
	                    $query = "select * from tbl_academic";
	                    $result = mysqli_query($conn,$query);
	                    while($row = mysqli_fetch_assoc($result))
	                    {
	                        echo "<option value=".$row['id']."> ".$row['label']." </option> ";
	                    }
	                ?>
	              </select>
	            </div>
				<div class="form-group col-md-3">
	              <label for="date"><b> Date: </b></label>
	              <input type="date" class="form-control" name="date" value="<?= date('Y-m-d'); ?>">
	            </div>
	            <br>
	            <br>
	            <br>
	            <br>
	            <br>
	       		<div>
	                <p> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Please answer the following questions as honostly and as objectively as you can. The information you'll be giving us will be kept confidential. You do not need to write your name. Please click the desired button, the score the best describes the instructor in reference to the question. The following rating scales shall be used.
			</p>
	       			
	       		</div>

			<center><p>
				5 - Always &nbsp
				4 - Often	&nbsp
				3 - Sometimes	&nbsp
				2 - Seldom	&nbsp
				1 - Never
			</p>
	           
		</center>
			</div>

			<div class="page">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td bgcolor="#3498db"><font color="#fff">
								The Instructor of this course	</font>
							</td>	
							<td bgcolor="#3498db"><font color="#fff">
								Always	</font>
							</td>
							<td bgcolor="#3498db"><font color="#fff">
								Often	</font>
							</td>
						 	<td bgcolor="#3498db"><font color="#fff">
								Sometimes	</font>
							</td>
							<td bgcolor="#3498db"><font color="#fff">
								Seldom	</font>
							</td>
							<td bgcolor="#3498db"><font color="#fff">
								Never	</font>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								1. Discusses the course outline or syllabus at the start of the term
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val1" required></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val1" required></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val1" required></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val1" required></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val1" required></center>
							</td>
						</tr>
						<tr>
							<td>
								2. Comes to class prepares for the day's lesson
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val2" required></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val2" required></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val2" required></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val2" required></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val2" required></center>
							</td>
						</tr>
						<tr>
							<td>
								3. Discusses the lesson in a well-organized manner
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val3" required></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val3" required></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val3" required></center>
							</td>
							<td>
			                   	<center><input value="2" type="radio" name="val3" required></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val3" required></center>
							</td>
						</tr>
						<tr>
							<td>
								4. Is well Informed of current trends and encourages students to keep up with the recent varied publications related to the subject matter
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val4" required></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val4" required></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val4" required></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val4" required></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val4" required></center>
							</td>
						</tr>
						<tr>
							<td>
								5. Relates the lessons to everyday experience
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val5" required></center>
							</td>
							<td>
			                   <center><input value="4" type="radio" name="val5" required></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val5" required></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val5" required></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val5" required></center>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="page">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>
								The Instructor of this course
							</td>
							<td>
								Always
							</td>
							<td>
								Often
							</td>
							<td>
								Sometimes
							</td>
							<td>
								Seldom
							</td>
							<td>
								Never
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								6. Is Fluent in the use of language (English, Filipino, depending on the subject matter
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val6" required /></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val6" required /></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val6" required /></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val6" required /></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val6" required /></center>
							</td>
						</tr>
						<tr>
							<td>
								7. Diversifies his/her teaching method to make the teaching learning experience more effective
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val7" required /></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val7" required /></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val7" required /></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val7" required /></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val7" required /></center>
							</td>
						</tr>
						<tr>
							<td>
								8. Maintains disipline and yet establishes a friendly atmosphere in the classroom
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val8" required /></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val8" required /></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val8" required /></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val8" required /></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val8" required /></center>
							</td>
						</tr>
						<tr>
							<td>
								9. Encourages students to make independent study a habit and check homework regularly
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val9" required /></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val9" required /></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val9" required /></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val9" required /></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val9" required /></center>
							</td>
						</tr>
						<tr>
							<td>
								10. Encourages question and discussions in class
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val10" required /></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val10" required /></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val10" required /></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val10" required /></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val10" required /></center>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="page">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>
								The Instructor of this course
							</td>
							<td>
								Always
							</td>
							<td>
								Often
							</td>
							<td>
								Sometimes
							</td>
							<td>
								Seldom
							</td>
							<td>
								Never
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								11. Show Fairness and impartiality
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val11" required /></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val11" required /></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val11" required /></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val11" required /></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val11" required /></center>
							</td>
						</tr>
						<tr>
							<td>
								12. Shows interest and concern for welfare of students
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val12" required /></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val12" required /></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val12" required /></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val12" required /></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val12" required /></center>
							</td>
						</tr>
						<tr>
							<td>
								13. Allows the student to express opinions contrary to his/her own
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val13" required /></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val13" required /></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val13" required /></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val13" required /></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val13" required /></center>
							</td>
						</tr>
						<tr>
							<td>
								14. Gives test that cover important lessons assigned or taken up in class
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val14" required /></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val14" required /></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val14" required /></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val14" required /></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val14" required /></center>
							</td>
						</tr>
						<tr>
							<td>
								15. Discusses test results and discusses problem areas
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val15" required /></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val15" required /></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val15" required /></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val15" required /></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val15" required /></center>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="page">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>
								The Instructor of this course
							</td>
							<td>
								Always
							</td>
							<td>
								Often
							</td>
							<td>
								Sometimes
							</td>
							<td>
								Seldom
							</td>
							<td>
								Never
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								16. Explains to the students how their grades are computed
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val16" required /></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val16" required /></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val16" required /></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val16" required /></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val16" required /></center>
							</td>
						</tr>
						<tr>
							<td>
								17. Starts the class on time
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val17" required /></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val17" required /></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val17" required /></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val17" required /></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val17" required /></center>
							</td>
						</tr>
						<tr>
							<td>
								18. Dismisses the class on time
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val18" required /></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val18" required /></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val18" required /></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val18" required /></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val18" required /></center>
							</td>
						</tr>
						<tr>
							<td>
								19. Holds class regularly
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val19" required /></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val19" required /></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val19" required /></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val19" required /></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val19" required /></center>
							</td>
						</tr>
						<tr>
							<td>
								20. Is neat and is appropriately dressed
							</td>
							<td>
			                    <center><input value="5" type="radio" name="val20" required /></center>
							</td>
							<td>
			                    <center><input value="4" type="radio" name="val20" required /></center>
							</td>
							<td>
			                    <center><input value="3" type="radio" name="val20" required /></center>
							</td>
							<td>
			                    <center><input value="2" type="radio" name="val20" required /></center>
							</td>
							<td>
			                    <center><input value="1" type="radio" name="val20" required /></center>
							</td>
						</tr>
					</tbody>
				</table>
				<p>Comments and Suggestions:</p>
							
			                    <center><textarea name="comments" rows="4" cols="50"></textarea></center>
							
			</div>

			<div class="row">
				<a id="prev" class="btn btn-info">Prev</a>
				<a id="next" class="btn btn-primary">Next</a>
				<input type="submit" class="btn btn-success btn-submit" name="btnEvaluate"> 
			</div>
		</form>
	</div>

<script type="text/javascript">
	$(".btn-submit").hide();
	$("#prev").click(function(){
		$(".btn-submit").hide();
		$("#next").show();
	    if($(".page.active").index() > 0){
    		$(".page.active").removeClass("active").prev().addClass("active");	
	    }

	    if($(".page:first()").hasClass('active')){
			$("#next").show();
			$(".btn-submit").hide();
		}
		if($(".page:first()").hasClass('active')){
			$("#prev").hide();
		}
	});
	$("#next").click(function(){
	    if($(".page.active").index() < $(".page").length-1){
	        $(".page.active").removeClass("active").next().addClass("active");
	    }
	    if($(".page:last()").hasClass('active')){
			$("#next").hide();
			$(".btn-submit").show();
		}
		if($(".page:last()").hasClass('active')){
			$("#prev").show();
		}
	});
	if($(".page:first()").hasClass('active')){
		$("#next").show();
		$(".btn-submit").hide();
	}
	if($(".page:first()").hasClass('active')){
		$("#prev").hide();
	}
	if($(".page:last()").hasClass('active')){
			$("#next").hide();
			$(".btn-submit").show();
		}
		if($(".page:last()").hasClass('active')){
			$("#prev").show();
		}
</script>

<?php require_once('includes/inc_footer.php'); ?>