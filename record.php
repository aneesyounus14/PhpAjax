<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>JAVASCIPT TASK</title>
	<link rel="stylesheet" href="all.min.css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet"  href="fontawesome.css">

	<style>

		.container{
			width: 1200px;
			margin: 0 auto;
		}
		table tr td{
			font-size: 18px;
			text-align: center;
		}
		table tr td h5{
			text-align: center;
			margin-top: 10px;
			font-weight: bold;
		}
		table tr td span{
			cursor: pointer;
			color: #02aaf2;
			font-weight: bold;
		}
		table tr td span:hover{
			color: black;
		}
		table tr td a{
			cursor: pointer;
			color: #02aaf2;
			font-weight: bold;
		}
		table tr td a:hover{
			text-decoration: none;
			color: black;
		}
	</style>
	

</head>
<body>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card mt-5">
					<div class="card-header">
						<h4>Ajax Practice</h4>
					</div>
				</div>
			</div>

			<div class="col-md-12">

				<div class="card mt-4">
					<div class="card-body">

						<table width="100%" border="1">

							<tr>
								<td><h5>Student ID</h5></td>
								<td><h5>Student Name<h5></td>
								<td><h5>Student Subject<h5></td>
								<td><h5>Student Number<h5></td>
								<td><h5>Student Address<h5></td>
								<td><h5>Delete<h5></td>
								<td><h5>Update<h5></td>
							</tr>

							<?php 

								include 'connection.php';

								$selectQuery = "SELECT * FROM `students`";

								$runQuery = mysqli_query($connection, $selectQuery);

								while($array = mysqli_fetch_array($runQuery)){
									
									echo "<tr>";
									
										echo "<td>" .$array['student_id']. "</td>";
										echo "<td>" .$array['student_name']. "</td>";
										echo "<td><img src='https://chart.googleapis.com/chart?cht=qr&chl=" . $array['student_subject'] . "&chs=160x160&chld=L|0'/></td>";
										echo "<td>" .$array['student_number']. "</td>";
										echo "<td>" .$array['student_address']. "</td>";

										echo "<td> 
											<span onclick='loadDoc(" .$array['student_id']. ", this)'>Delete</span>

											</td>";

										echo "<td> 
											<a href='update.php?student_id=".$array['student_id']."'>Update</a>

											</td>";

									echo "</tr>";
								}

							?>

						</table>
						
					</div>
				</div>
				
			</div>

		</div>
	</div>

	<div id="demo"></div>

	<script>

		function loadDoc(firstname, buttonData){
			var xhttp = new XMLHttpRequest();
			xhttp.open("GET","delete.php?student_id=" + firstname);
			xhttp.send();

			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					buttonData.parentElement.parentElement.style.display= 'none';
				}
			};
		}

	</script>


	
</body>
</html>