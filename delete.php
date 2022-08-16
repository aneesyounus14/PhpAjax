<?php 
	
	if (isset($_GET['student_id'])) {
		
		$id = $_GET['student_id'];

		include 'connection.php';

		$deleteQuery = "DELETE FROM `students` WHERE student_id =" .$id;

		$runQuery = mysqli_query($connection, $deleteQuery);

		if($runQuery == true){
			echo "Delete Successfully.";
			header("refresh:2; url=record.php");
		}
	}

?>