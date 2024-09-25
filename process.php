<?php require_once('Connection/conn.php'); 

//login validation
if(isset($_POST['btnLogin']))
{	$sql = "SELECT usn, password, user_level
    FROM tbl_users 
    WHERE usn='$_POST[usn]' AND password='$_POST[password]' 
    UNION 
    SELECT user_name, password, user_level
    FROM tbl_admin 
    WHERE user_name='$_POST[usn]' AND password='$_POST[password]'";

	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($query);
	//print_r($row); die();

	if($row['user_level'] == 2){
		
		$sql="select * from tbl_users where usn='$_POST[usn]' and password='$_POST[password]' AND status = 1";

		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);	
		$counter = mysqli_num_rows($query);

		if($counter==1)
		{
			$_SESSION['restrictLogin']=1;
			$_SESSION['user_level'] =$row['user_level'];
			$_SESSION['id'] =$row['id'];
			$_SESSION['fullname'] =$row['first_name']." ".$row['last_name'];
			
			header("location:home.php"); 
		}
		else
		{
			$_SESSION['errors'] = array("Your username or password was incorrect.");
			header('location:index.php?msg=ERROR');
		}

		
		mysqli_close($conn);
	}
	else{
		$sql="select * from tbl_admin where user_name='$_POST[usn]' and password='$_POST[password]' AND status = 1";

		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);	
		$counter = mysqli_num_rows($query);

		if($counter==1)
		{
			$_SESSION['restrictLogin']=1;
			$_SESSION['user_level'] =$row['user_level'];
			$_SESSION['id'] =$row['id'];
			$_SESSION['fullname'] =$row['first_name']." ".$row['last_name'];
			
			header("location:home.php"); 
		}
		else
		{
			$_SESSION['errors'] = array("Your username or password was incorrect.");
			header('location:index.php?msg=ERROR');
		}

		
		mysqli_close($conn);
	}
	
}

//add professor
if(isset($_POST['btnAddProf']))
{	
	if($_FILES['imgupload']['name']!='')
	{
		$filename = md5(date('Ymdhis')).".jpg";
		move_uploaded_file($_FILES['imgupload']['tmp_name'],'uploads/'.$filename);
	}else{
		$filename='';
	}

	$sql = "insert into tbl_professors (`name`,`department`, `professorpicture`) values ('$_POST[name]', '$_POST[department]', '$filename');";
	mysqli_query($conn,$sql);

	mysqli_close($conn);
	header("location:v_prof.php");
}
// update professor
if(isset($_POST['btnEditProf']))
{
	if($_FILES['imgupload']['name']!='')
	{
		$filename = md5(date('Ymdhis')).".jpg";
		move_uploaded_file($_FILES['imgupload']['tmp_name'],'uploads/'.$filename);
	}else{
		$filename='';
	}
	$sql = "UPDATE tbl_professors SET name = '$_POST[name]', 
									  department = '$_POST[department]', 
									  professorpicture = '$filename', 
									  status = '$_POST[status]' WHERE id = '$_POST[pID]'";
	mysqli_query($conn,$sql);
	header("location:v_prof.php");
}

//add User
if(isset($_POST['btnAddUser']))
{

	$sqlunique ="select `usn` from tbl_users where usn='$_POST[usn]'";
	$query = mysqli_query($conn,$sqlunique);
	$row = mysqli_fetch_assoc($query);	
	$counter = mysqli_num_rows($query);
	
	// print_r($counter); die();
	if($counter>=1)
	{
		mysqli_close($conn);
		header('location:add-user.php?_error_');
	}
	else
	{
		//insert query goes here
		$sql = "insert into tbl_users (`usn`,`password`, `first_name`, `middle_name`, `last_name`,`yearLevel`, `course`, `user_level`, `status`) 
		values ('$_POST[usn]', '$_POST[password]', '$_POST[first_name]', '$_POST[middle_name]', '$_POST[last_name]', '$_POST[yearlevel]', 
			'$_POST[course]', '$_POST[user_level]', '$_POST[status]')";



		mysqli_query($conn,$sql);
		// print_r($sql); die();
		mysqli_close($conn);
		header("location:users.php");
	}
}

// update User
if(isset($_POST['btnEditUser']))
{
	
	$sql = "UPDATE tbl_users 
	SET 
	usn 		= '$_POST[usn]', 
	password 	= '$_POST[password]', 
	first_name 	= '$_POST[first_name]', 
	last_name 	= '$_POST[last_name]',
	middle_name = '$_POST[middle_name]',
	yearLevel 	= '$_POST[yearlevel]',
	course 		= '$_POST[course]',
	user_level 	= '$_POST[user_level]',
	status 		= '$_POST[status]'

	WHERE id = '$_POST[uID]'";

	// print_r($sql); die();
	mysqli_query($conn,$sql);
	header("location:users.php");
}
//add admin
if(isset($_POST['btnAddAdmin']))
{	

	if($_FILES['imgupload']['name']!='')
	{
		$filename = md5(date('Ymdhis')).".jpg";
		move_uploaded_file($_FILES['imgupload']['tmp_name'],'uploads/'.$filename);
	}else{
		$filename='';
	}

	$sqlunique ="select `user_name` from tbl_admin where user_name='$_POST[usn]'";
	$query = mysqli_query($conn,$sqlunique);
	$row = mysqli_fetch_assoc($query);	
	$counter = mysqli_num_rows($query);
	
	// print_r($counter); die();
	if($counter>=1)
	{
		mysqli_close($conn);
		header('location:add-admin.php?_error_');
	}
	else
	{
		//insert query goes here
		$sql = "insert into tbl_admin (`user_name`,`password`, `first_name`, `middle_name`, `last_name`, `position`, `user_level`, `profilepicture`, `status`) 
		values ('$_POST[usn]', '$_POST[password]', '$_POST[first_name]', '$_POST[middle_name]', '$_POST[last_name]', '$_POST[position]', '$_POST[user_level]', '$filename', '$_POST[status]')";
		mysqli_query($conn,$sql);
		//print_r($sql); die();
		mysqli_close($conn);
		header("location:admin_list.php");
	}
}
// update admin
if(isset($_POST['btnEditAdmin']))
{
	if($_FILES['imgupload']['name']!='')
	{
		$filename = md5(date('Ymdhis')).".jpg";
		move_uploaded_file($_FILES['imgupload']['tmp_name'],'uploads/'.$filename);
	}else{
		$filename='';
	}
	
	$sql = "UPDATE tbl_admin 
	SET 
	first_name 	= '$_POST[first_name]', 
	last_name 	= '$_POST[last_name]',
	middle_name = '$_POST[middle_name]',
	user_name 		= '$_POST[usn]', 
	password 	= '$_POST[password]', 
	position 	= '$_POST[position]',
	user_level 	= '$_POST[user_level]',
	profilepicture 	= '$filename',
	status 		= '$_POST[status]'

	WHERE id = '$_POST[adID]'";

	//print_r($sql); die();
	mysqli_query($conn,$sql);
	header("location:admin_list.php");
}

// update Announcement
if(isset($_POST['btnEditAnnouncement']))
{
	// print_r($_POST['aID']); die();
	$sql = "UPDATE tbl_announcement
	SET `desc` = '$_POST[announcement]',
		`status`	= '$_POST[status]'
	WHERE `id` = '$_POST[aID]'";

	mysqli_query($conn,$sql);
	header("location:announcement.php");
}
// new eval
if(isset($_POST['btnNewEval']))
{
	$sql = "UPDATE tbl_evaluation
	SET 
	status 		= '2'
	WHERE status = '1'";
	$sql2 = "UPDATE tbl_evaluation
	SET 
	status 		= '2'
	WHERE status = '3'";
	

	//print_r($sql); die();
	mysqli_query($conn,$sql2);

	//print_r($sql); die();
	mysqli_query($conn,$sql);
	header("location:evaluate.php");
}
// add announcement
if(isset($_POST['btnAddAnnouncement']))
{	
	$sql = "insert into tbl_announcement (`desc`,`status`) values ('$_POST[name]', '$_POST[status]');";
	mysqli_query($conn,$sql);

	mysqli_close($conn);
	header("location:announcement.php");
}
//evaluate
if(isset($_POST['btnEvaluate']))
{
	$sql = "select prof, user_evaluated from tbl_evaluation 
	where user_evaluated = '$_SESSION[fullname]' and prof = '$_POST[prof]'";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($query);
	$fname = $_SESSION['fullname'];
	$profname = $_POST['prof'];

	if($fname = $row['user_evaluated'] && $profname = $row['prof']){
                        //print_r($row); die();
		echo '<center><H1>You Have Already Evaluated that professor <a href="evaluate-form.php">Go Back</a></H1></center>';
	}else
	{
		$sql2 = "insert into tbl_evaluation (`prof`,`academicYear`,`date`,`val1`,`val2`,`val3`,`val4`,`val5`,`val6`,`val7`,`val8`,`val9`,`val10`
	,`val11`,`val12`,`val13`,`val14`,`val15`,`val16`,`val17`,`val18`,`val19`,`val20`,`comments`,`user_evaluated`) 
	values ('$_POST[prof]','$_POST[aca]', '$_POST[date]',
			'$_POST[val1]', '$_POST[val2]', '$_POST[val3]', '$_POST[val4]', '$_POST[val5]', '$_POST[val6]', '$_POST[val7]', 
			'$_POST[val8]', '$_POST[val9]', '$_POST[val10]', 
			'$_POST[val11]', '$_POST[val12]', '$_POST[val13]', '$_POST[val14]', '$_POST[val15]', '$_POST[val16]', '$_POST[val17]', '$_POST[val18]', '$_POST[val19]', '$_POST[val20]'
			,'$_POST[comments]', '$_SESSION[fullname]')";
	mysqli_query($conn,$sql2);	
	mysqli_close($conn);
	header("location:home.php");
	}
}

//Delete user
if(isset($_POST['btnDeleteItem']))
{
	$sql = "DELETE FROM tbl_users WHERE id = '$_POST[uID]'; " ;
	mysqli_query($conn,$sql);
	$sql1 = "DELETE FROM tbl_evaluation WHERE user_evaluated = '$_SESSION[fullname]'; " ;
	mysqli_query($conn,$sql);
	//print_r($sql); die();
	header("location:users.php");
}
 // Delete announcement
if(isset($_POST['btnDeleteann']))
{
	$sql = "DELETE FROM tbl_announcement WHERE id = '$_POST[aID]'; " ;
	mysqli_query($conn,$sql);
	//print_r($sql); die();
	header("location:announcement.php");
}
//Delete adminlist
if(isset($_POST['btndeleteAdmin']))
{
	$sql = "DELETE FROM tbl_admin WHERE id = '$_POST[adID]'; " ;
	mysqli_query($conn,$sql);
	//print_r($sql); die();
	header("location:admin_list.php");
}

//Delete professors
if(isset($_POST['btnDeleten']))
{
	$sql = "DELETE FROM tbl_professors WHERE id = '$_POST[pID]'; " ;
	mysqli_query($conn,$sql);
	//print_r($sql); die();
	header("location:v_prof.php");
}
if(isset($_POST['btnLogout']))
{
	session_start();
	session_unset();
	session_destroy();

	header("location:index.php");
	exit();
}