<?php 
	include 'connection.php';
	session_start();
	$DID = $_REQUEST['did'];
	$DeleteQuery = "DELETE FROM `nineclass` WHERE `ID` = '$DID'";
	$QueryRun = mysqli_query($conn,$DeleteQuery);
	if($QueryRun)
	{
		echo "<script>alert('Selected Student Deleted')
			window.location.href='manage_9th_profile.php'
		</script>";
	}


?>