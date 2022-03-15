<?php
	
	function get_student_count()
	{
		include 'connection.php';
		$student_count = "";
		$Query = "SELECT count(*) as student_count FROM  `nineclass`";
		$QueryRun = mysqli_query($conn,$Query);
		while($Row = mysqli_fetch_assoc($QueryRun))
		{
			$student_count = $Row['student_count'];
		}
		return($student_count);
	}
	






?>