<?php 

	require_once"db_connect.php";

	global $ID_t;
	$my_id = "";


	if(isset($_GET['id'])){

	$my_id = $_GET['id'];

	echo $my_id;

	$sql_show = "SELECT * from contact WHERE ID = '$my_id'";

	$result_show = mysqli_query($con_db,$sql_show);
	$data = mysqli_fetch_assoc($result_show);

	$full_name = $data['FullName'];
	$nick_name = $data['NickName'];
	$phn_number = $data['PhoneNumber'];
	$address = $data['Address'];
	$website = $data['Website'];
	$birth_day = $data['BirthDay'];
	$user_id = $data['user_id'];
	$ID_t	= $data['ID'];



	}

    if(isset($_POST['update_btn'])){

    	echo $ID_t;

    	$full_name = $_POST['full_name'];
		$nick_name = $_POST['nick_name'];
		$phn_number = $_POST['phn_number'];
		$address = $_POST['address'];
		$website = $_POST['website'];
		$birth_day = $_POST['birth_day'];
		$user_id = $_POST['id'];


		if(!empty($_POST)){

			echo $my_id . "aa";

			$sql_add = "UPDATE  contact SET FullName = '$full_name',NickName = '$nick_name', PhoneNumber = '$phn_number',Address = '$address',Website = '$website',BirthDay = '$birth_day' WHERE ID = '$user_id'";

			
			/*(FullName,NickName,PhoneNumber,Address,Website,BirthDay,user_id) VALUES ('$full_name','$nick_name','$phn_number','$address','$website','$birth_day','$id')";*/


			if(mysqli_query($con_db,$sql_add)){
				echo '<script language="javascript">';
				echo 'alert("Contect Update successfully ")';
				echo '</script>';

				$url_back = "result_show.php ? user_id= ".$my_id;

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
		<h2>Update Contact</h2>

		<form action="edit_contact.php" method="POST">
			<input type="hidden" name="id" value="<?= (isset($ID_t)) ? $ID_t : '';?>">
			<label>Full Name :</label>
			<input type="text" name="full_name" placeholder="Enter Full Name" value="<?= (isset($full_name)) ? $full_name : '';?>" required><br>

			<label>Nick Name :</label>
			<input type="text" name="nick_name" placeholder="Enter Nick Name" value="<?= (isset($nick_name)) ? $nick_name : '';?>"><br>

			<label>Phone Number :</label>
			<input type="text" name="phn_number" placeholder="Enter Nick Name" value="<?= (isset($phn_number)) ? $phn_number : '';?>"><br>

			<label>Address :</label>
			<input type="text" name="address" placeholder="Write your address" value="<?= (isset($address)) ? $address : '';?>"><br>

			<label>Website :</label>
			<input type="text" name="website" placeholder="Enter Website" value="<?= (isset($website)) ? $website : '';?>"><br>

			<label>Birth Day :</label>
			<input type="date" name="birth_day" value="<?= (isset($birth_day)) ? $birth_day : '';?>"><br>

			<input type="submit" name="update_btn" value="Update">
		</form>
	</div>

</body>
</html>
