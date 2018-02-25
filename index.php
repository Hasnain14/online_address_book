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
		<h2>LogIn</h2>

		<form method="post" action="index.php">
			<p>User Name</p>
			<input type="text" name="user_name_login" placeholder="Enter User Name">
			<p>Password</p>
			<input type="password" name="password_login" placeholder="Enter Password">
			<input type="submit" name="login_button" value="LogIn">

			<p style="font-size: 15px">New Member? <a href="Regestation.php"><span class="re_option"> register here</span></p>

		</form>
	</div>

</body>
</html>

<?php 

	session_start();

	if(isset($_POST['login_button'])){

		require_once"db_connect.php";

		$user_name_login = $_POST['user_name_login'];
		$password_login = $_POST['password_login'];

		if(!empty($_POST)){

			$sql = "SELECT * from users WHERE username = '$user_name_login' AND password = '$password_login'";

			$result = mysqli_query($con_db,$sql);

			$sql1 = "SELECT ID from users WHERE username = '$user_name_login' AND password = '$password_login'";

	      
			//echo $Id['ID'];

			if(mysqli_num_rows($result)==1){
				echo '<script language="javascript">';
				echo 'alert("successfully login")';
				echo '</script>';

				$result1 = mysqli_query($con_db,$sql1);

				$Id = mysqli_fetch_assoc($result1);

				$_SESSION['user_id'] = $Id['ID'];
				$url = "result_show.php";

				//$url = "result_show.php ? user_id= ".$Id['ID'];

				//echo $user_name_login;;
				header('location:'.$url);
				exit();
			}
		}
		
	}
 ?>