<!DOCTYPE html>
<html>
<head>
	<title>Address Book</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="index_body">
	<div class="test">
		<p>Welcome To Online Address Book</p>
	</div>
	<div class="index_div1">
		<img src="images/1.jpg" class="user_pic">
		<h2>Registetion form</h2>

		<form method="POST" action="regestation.php">

			<p>User Name</p>
			<input type="text" name="user_name_registation" placeholder="Enter User Name" required>
			<p>Password</p>
			<input type="password" name="password_registation" placeholder="Enter Password" required>

			<input type="submit" name="submit" value="Register">

			<p style="font-size: 15px">Already Member? <a href="index.php"><span class="re_option"> LogIn here</span></p>
		</form>
	</div>

</body>
</html>

<?php 

	session_start();

	if(isset($_POST['submit'])){

		require_once"db_connect.php";

		$user_name_registation = $_POST['user_name_registation'];
		$password_registation = $_POST['password_registation'];

		if(!empty($_POST)){

			$sql = "INSERT INTO users (username,password) VALUES ('$user_name_registation','$password_registation')";

			$sql1 = "SELECT ID from users WHERE username = '$user_name_registation' AND password = '$password_registation'";

			echo $sql1;

			if(mysqli_query($con_db,$sql)){
				echo '<script language="javascript">';
				echo 'alert("successfully Register")';
				echo '</script>';

				$result1 = mysqli_query($con_db,$sql1);

				$Id = mysqli_fetch_assoc($result1);

				$_SESSION['user_id'] = $Id['ID'];
				$url = "result_show.php";

				//echo $user_name_login;;
				header('location:'.$url);
				exit();
			}
		}
			
		
	}
 ?>