<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>insert</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="all.min.css">

	<style>

		body{
			width: 600px;
			margin: 0 auto;
			background-color: #eaecef;
		}
		h1{
			font-family: sans-serif;
			text-align: center;
			font-weight: bold;
			margin-top: 120px;
			margin-bottom: 60px;
			font-size: 42px;
		}

		.form-control{
			margin: 0 auto;
			display: block;
			width: 85%;
			border-radius: 10px;
			color: #000000;
			height: 52px;
			font-size: 20px;
			padding-left: 10px;
			font-family: sans-serif;
			margin-bottom: 40px;

		}:focus{
			outline: none !important;
			border-color: none;
		}

		.qr-coding{
			margin-left: 170px;
		}
		.btn{
			margin: 0 auto;
			display: block;
			width: 45%;
			height: 50px;
			font-family: sans-serif;
			font-size: 20px;
			margin-bottom: 20px;
		}

	</style>

</head>
<body>
	<h1>Kindly Enter Your Data First</h1>

	<form method="POST" action="insert.php">
		<input type="text" class="form-control" name="s_name" placeholder="Your Name">
		<input type="text" class="form-control" name="s_subjects" placeholder="Your Subject">
		<input type="text" class="form-control" name="s_number" placeholder="Your Number">
		<input type="text" class="form-control" name="s_address" placeholder="Your Address">
		<button class="btn btn-outline-primary">Submit Your Data</button>
	</form>

	<?php 

		if(isset($_POST['s_name'])){
			$name = $_POST['s_name'];
			$subject = $_POST['s_subjects'];
			$number = $_POST['s_number'];
			$address = $_POST['s_address'];

			include 'connection.php';

			$insertQuery = "INSERT INTO `students`(`student_name`, `student_subject`, `student_number`, `student_address`) VALUES ('$name', '$subject', '$number', '$address')";

			$runQuery = mysqli_query($connection, $insertQuery);

			if($runQuery == true){
				header("refresh:2; url=insert.php");
			}
		}

	?>
	
</body>
</html>