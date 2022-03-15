<?php
	$servername = "localhost";
	$username = "root";
	$passwod = "";
	$database = "feesystem";
	$conn = mysqli_connect($servername,$username,$passwod,$database);
	if(!$conn)
	{
		echo "Sorry! Unfortunatly We Could Not Connect With The Database";
	}
	

?>