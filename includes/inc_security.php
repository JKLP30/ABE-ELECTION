<?php
	if($_SESSION['restrictLogin']==0)
	{
		header('location:index.php');
	}
?>