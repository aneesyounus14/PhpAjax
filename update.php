<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Update</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="all.min.css">

	<style>
		body{
			width: 600px;
			margin: 0 auto;
			background-color: #eaecef;
			margin-top: 100px;
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

	<?php 

		if (isset($_GET['student_id'])) {
			$id = $_GET['student_id'];

			include 'connection.php';

			$select = "SELECT * FROM `students` WHERE student_id=" .$id;

			$runQuery = mysqli_query($connection, $select);

			$array = mysqli_fetch_array($runQuery);

			$name = $array['student_name'];
			$subject = $array['student_subject'];
			$number = $array['student_number'];
			$address = $array['student_address'];
		}

	?>

	<form method="POST" action="">
		<input type="text" class="form-control" name="update_name" value="<?php echo $name ?>">
		<input type="text" class="form-control" name="update_subject" value="<?php echo $subject ?>">
		<input type="text" class="form-control" name="update_number" value="<?php echo $number ?>">
		<input type="text" class="form-control" name="update_address" value="<?php echo $address ?>">

		<button class="btn btn-outline-primary">Update</button>
	</form>

	<?php 

		if(isset($_POST['update_name'])){
			$updateName = $_POST['update_name'];
			$updateSubject = $_POST['update_subject'];
			$updateNumber = $_POST['update_number'];
			$updateAddress = $_POST['update_address'];

			$updateQuery = "UPDATE `students` SET `student_name`='$updateName',`student_subject`='$updateSubject',`student_number`='$updateNumber',`student_address`='$updateAddress' WHERE student_id=" .$id;

			$runUpdate = mysqli_query($connection, $updateQuery);

			if($runQuery == true){
				header("refresh:1; url=record.php");
			}else{
				echo "Do it again.";
			}
		}

	?>
	
</body>
</html>