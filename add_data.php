
<?php 

	session_start();

     require_once"db_connect.php";

		if(!isset($_SESSION['user_id'])){
			echo "error";
			//exit();
		}

		$id = $_SESSION['user_id'];

    //echo $id; 

    if(isset($_POST['add_btn'])){

    	$full_name = $_POST['full_name'];
		$nick_name = $_POST['nick_name'];
		$phn_number = $_POST['phn_number'];
		$address = $_POST['address'];
		$website = $_POST['website'];
		$birth_day = $_POST['birth_day'];

		if(!empty($_POST)){

			$sql_add = "INSERT INTO contact (FullName,NickName,PhoneNumber,Address,Website,BirthDay,user_id) VALUES ('$full_name','$nick_name','$phn_number','$address','$website','$birth_day','$id')";


			if(mysqli_query($con_db,$sql_add)){
				echo '<script language="javascript">';
				echo 'alert("Contect Add successfully ")';
				echo '</script>';

				$url_back = "result_show.php ? user_id= ".$id;

				header('location:'.$url_back);
				exit();
			}
    }

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Address Book</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="index_body">
	<div class="add_div1">
		<img src="images/1.jpg" class="user_pic">
		<h2>Add To Address Book</h2>

		<form action="add_data.php" method="POST">
			<label>Full Name :</label>
			<input type="text" name="full_name" placeholder="Enter Full Name" required><br>

			<label>Nick Name :</label>
			<input type="text" name="nick_name" placeholder="Enter Nick Name"><br>

			<label>Phone Number :</label>
			<input type="text" name="phn_number" placeholder="Enter Nick Name"><br>

			<label>Address :</label>
			<input type="text" name="address" placeholder="Write your address"><br>

			<label>Website :</label>
			<input type="text" name="website" placeholder="Enter Website"><br>

			<label>Birth Day :</label>
			<input type="date" name="birth_day" ><br>

			<input type="submit" name="add_btn" value="ADD">
		</form>
	</div>

</body>
</html>
